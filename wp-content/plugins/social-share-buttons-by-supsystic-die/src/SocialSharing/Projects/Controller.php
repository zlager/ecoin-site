<?php

/**
 * Class SocialSharing_Projects_Controller
 *
 * Projects controller.
 */
class SocialSharing_Projects_Controller extends SocialSharing_Core_BaseController
{

    /**
     * Shows list of the created projects.
     *
     * @param Rsc_Http_Request $request Http request
     * @return Rsc_Http_Response
     */
    public function indexAction(Rsc_Http_Request $request)
    {
        $projects = $this->modelsFactory->get('projects')->all();

        if ($projects && count($projects)) {
            foreach($projects as $project) {
                $shares = $this->modelsFactory->get('shares')->getProjectShares($project->id);
                $totalShares = 0;

                foreach($shares as $share) {
                    $totalShares += $share->shares;
                }
                $project->totalShares = $totalShares;
                $project->totalViews = $this->modelsFactory->get('views', 'shares')->getProjectTotalViews($project->id);
            }
        }

        return $this->response('@projects/index.twig', array(
            'projects' => $projects
        ));
    }

    /**
     * @param Rsc_Http_Request $request
     * @return Rsc_Http_Response
     */
    public function addAction(Rsc_Http_Request $request)
    {
        $title = $request->post->get('title');
        $design = $request->post->get('design');
        $networksInProject = $request->post->get('networks');
        $networks = $this->modelsFactory->get('networks')->all();
        $networkModel = $this->modelsFactory->get('projectNetworks', 'networks');

        if(empty($title) || empty($title)) {
            $buttonsPreview = $this->getModelsFactory()->get('projects')->getButtonsDesignPreview();
            
            return $this->response('@projects/add_new.twig',
                array(
                    'buttons_preview' => $buttonsPreview,
                    'networks'        => $networks,
                )
            );
        } else {
            try {
                $insertId = $this->modelsFactory->get('projects')->create(
                    $title,
                    $design
                );

                foreach ((array)$networksInProject as $key => $networkId) {
                    if (!$networkModel->has($insertId, $networkId)) {
                        $networkModel->add($insertId, $networkId, $key);
                    }
                }

            } catch (RuntimeException $e) {
                return $this->ajaxError($e->getMessage());
            }

            return $this->ajaxSuccess(array(
                'redirect_url' => $this->generateUrl(
                    'projects',
                    'view',
                    array(
                        'id' => $insertId
                    )
                )
            ));
        }
    }

    /**
     * @param Rsc_Http_Request $request
     * @return Rsc_Http_Response
     */
    public function saveAction(Rsc_Http_Request $request)
    {
        $id = $request->post->get('id');
        $settings = $request->post->get('settings');
        $projects = $this->modelsFactory->get('projects');

        if (array_key_exists('popup_id', $settings)) {
            /** @var SocialSharing_Popup_Module $popup */
            $popup = $this->getEnvironment()->getModule('popup');

            if (!$popup->isInstalled()) {
                $settings['popup_id'] = 0;
            } else {
                $hasPopup = $popup->call('getModule', array('popup'))
                    ->getModel()
                    ->getById((int)$settings['popup_id']);

                if (!$hasPopup) {
                    $settings['popup_id'] = 0;
				} else {
					if(!isset($hasPopup['params']['tpl']['enb_sm']) || empty($hasPopup['params']['tpl']['enb_sm'])) {
						$hasPopup['params']['tpl']['enb_sm'] = 1;
						$hasPopup['params']['tpl']['use_sss_prj_id'] = 1;
						$popup->call('getModule', array('popup'))
							->getModel()
							->updateParamsById( $hasPopup );
					}
				}
            }
        }
        if($settings['where_to_show'] != 'grid_gallery'){
            $this->getEnvironment()->getModule('gridGallery')->disableSocialSharing($id);
        } else {
			$this->getEnvironment()->getModule('gridGallery')->cleanSocialSharingCache($id);
		}
		if($settings['where_to_show'] != 'slider'){
			$this->getEnvironment()->getModule('slider')->disableSocialSharing($id);
		} else {
			$this->getEnvironment()->getModule('slider')->cleanSocialSharingCache($id);
		}
        $projects->save($id, $settings);

        return $this->ajaxSuccess(array('popup_id' => $settings['popup_id']));
    }

    /**
     * View specific project.
     *
     * @param Rsc_Http_Request $request Http request
     * @return Rsc_Http_Response Http response
     */
    public function viewAction(Rsc_Http_Request $request)
    {
        $projectId = (int)$request->query->get('id');

        $project = $this->modelsFactory->get('projects')->get($projectId);
        $networks = $this->modelsFactory->get('networks')->all();
        $tooltips = $this->modelsFactory->get('projects')->getTooltips();
        $buttonsPreview = $this->getModelsFactory()->get('projects')->getButtonsDesignPreview();
        $sharesModel = $this->getEnvironment()->getModule('shares')->getModelsFactory()->get('shares');
        
        $popup = $this->getEnvironment()->getModule('popup');
		$popupInstalled = $popup->isInstalled();
		$popups = $popupInstalled ? $popup->getModel()->getSimpleList('original_id != 0') : array();
		$popupAddUrl = $popupInstalled ? $popup->call('getModule', array('options'))->getTabUrl('popup_add_new') : '';

		$slider = $this->getEnvironment()->getModule('slider');
		$sliderInstalled = $slider->isInstalled();

        $gridGallery = $this->getEnvironment()->getModule('gridGallery');
        $galleryInstalled = $gridGallery->isInstalled();

		$gmap = $this->getEnvironment()->getModule('googleMaps');
		$gmapInstalled = $gmap->isInstalled();
		$gmaps = $gmapInstalled ? $gmap->getModel()->getAllMaps() : array();
		$gmapAddUrl = $gmapInstalled ? $gmap->call('getModule', array('options'))->getTabUrl('gmap_add_new') : '';

        $dispatcher = $this->getEnvironment()->getDispatcher();
        $buttonSets = $dispatcher->apply(
            'button_sets',
            array(
                array(
                    new SocialSharing_Projects_ButtonSet(
                        'flat',
                        9,
                        array(8, 9)
                    )
                )
            )
        );

        $otherPostTypes = get_post_types(array('public' => true));

        if (isset($otherPostTypes['post']))
        {
            unset($otherPostTypes['post']);
        }

        if (isset($otherPostTypes['page']))
        {
            unset($otherPostTypes['page']);
        }

		$postsList = $this->modelsFactory->get('projects')->getPosts();
		$pageList = $this->modelsFactory->get('projects')->getPages();

        // Load wp media script
        wp_enqueue_media();

        return $this->response(
            '@projects/view.twig',
            array(
                'project'            => $project,
                'networks'           => $networks,
                'posts'              => $postsList,
                'pages'              => $pageList,
                'post_types'         => get_post_types(array('public' => true)),
                'other_post_types'   => $otherPostTypes,
                'popup_installed'    => $popupInstalled,
                'slider_installed'   => $sliderInstalled,
				'gallery_installed'  => $galleryInstalled,
				'gmap_installed'  	 => $gmapInstalled,
				'popup_activate'	 => $popupInstalled ? '' : admin_url('plugin-install.php?s=popup+by+supsystic&tab=search&type=term'),
				'slider_activate'	 => $sliderInstalled ? '' : admin_url('plugin-install.php?s=slider+by+supsystic&tab=search&type=term'),
				'gallery_activate'	 => $galleryInstalled ? '' : admin_url('plugin-install.php?s=gallery+by+supsystic&tab=search&type=term'),
				'gmap_activate'		 => $gmapInstalled ? '' : admin_url('plugin-install.php?s=google+maps+by+supsystic&tab=search&type=term'),
                'popups'             => $popups,
				'popup_add_new_url'  => $popupAddUrl,
				'gmaps'              => $gmaps,
				'gmap_add_new_url'   => $gmapAddUrl,
                'tooltips'           => $tooltips,
                'buttons_preview'    => $buttonsPreview,
                'button_sets'        => $buttonSets,
                'statistics_options' => $sharesModel->getOptionList($projectId),
                'templates'          => array(
                    'twitter', 'pinterest', 'facebook', 'digg'
                ),
            )
        );
    }

    /**
     * @param Rsc_Http_Request $request
     * @return Rsc_Http_Response
     */
    public function deleteAction(Rsc_Http_Request $request)
    {
        $this->modelsFactory->get('projects')->delete($request->query->get('id'));

        return $this->redirect($this->generateUrl('projects', 'index'));
    }

    public function renameAction(Rsc_Http_Request $request)
    {
        try {
            $projects = $this->modelsFactory->get('projects');

            $projects->rename(
                $request->post->get('id'),
                $request->post->get('title')
            );
        } catch (Exception $e) {
            return $this->ajaxError($this->translate(sprintf('Failed to rename project: %s', $e->getMessage())));
        }

        return $this->ajaxSuccess();
    }

    public function cloneAction(Rsc_Http_Request $request)
    {
        $id = $request->post->get('id', $request->query->get('id'));

        try {
            $cloneId = $this->modelsFactory
                ->get('projects')
                ->makeClone($id);

            $prototype = $this->modelsFactory->get('projects')->get($id);
            $this->modelsFactory->get('projectNetworks', 'Networks')
                ->cloneNetworks($cloneId, $prototype);

            $redirectUri = $this->generateUrl(
                'projects',
                'view',
                array('id' => $cloneId)
            );

            if ($request->isXmlHttpRequest()) {
                return $this->response(
                    Rsc_Http_Response::AJAX,
                    array(
                        'location' => $redirectUri
                    )
                );
            }

            return $this->redirect($redirectUri);
        } catch (InvalidArgumentException $e) {
            throw $this->error(
                sprintf(
                    $this->translate('Unable to clone project: %s'),
                    $e->getMessage()
                )
            );
        } catch (RuntimeException $e) {
            throw $this->error(
                sprintf(
                    $this->translate(
                        'Unable to clone project due database error: %s'
                    ),
                    $e->getMessage()
                )
            );
        }
    }

    public function removeNetworkAction(Rsc_Http_Request $request)
    {
        /** @var int $networkId */
        $networkId = (int) $request->post->get('network_id');
        /** @var int $projectId */
        $projectId = (int) $request->post->get('project_id');
        /** @var SocialSharing_Networks_Model_ProjectNetworks $projectNetworks */
        $projectNetworks = $this->getModelsFactory()->get('projectNetworks', 'networks');

        try {
            $projectNetworks->removeNetworkFromProject($networkId, $projectId);
        } catch (RuntimeException $e) {
            return $this->ajaxError($e->getMessage());
        }

        return $this->ajaxSuccess();
    }

    public function devPreviewAction()
    {
        return $this->response('@projects/dev_preview.twig');
    }

    protected function getButtonSets($design)
    {
        $hasPrefix = strripos($design, '-1') == strlen($design) - 2;

        if ($hasPrefix)
            $design = substr($design, 0, -2);

        $environment = $this->getEnvironment();
        $sets = array(
            new SocialSharing_Projects_ButtonSet(
                $design,
                9,
                array(8, 9)
            )
        );

        return $sets;
    }
}
