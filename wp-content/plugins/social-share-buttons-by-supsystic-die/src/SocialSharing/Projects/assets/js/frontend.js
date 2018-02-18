(function ($, window, app) {

    $(document).ready(function () {
        var bgClass = "bg-modal";

        $('.supsystic-social-sharing a.social-sharing-button:not(".pinterest")').on('click', function (e) {
            e.preventDefault();

            if (e.currentTarget.href.slice(-1) !== '#') {
                window.open(e.currentTarget.href, 'mw' + e.timeStamp, 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0');
            }
        });

        $('.supsystic-social-sharing a.social-sharing-button.pinterest').on('click', function (e) {
            e.preventDefault();
            var self = this;
            var parentEvent = e;
            var imageLogo;

            e.preventDefault();
            // select image to pin
            if($('.'+bgClass).length) {
                $('.'+bgClass).show();
                return;
            }
            var bgElement =  $('<div class="'+bgClass+'"></div>').appendTo(document.body);

            if(theme_data.themeLogo[0] !== 'undefined') {
                imageLogo = theme_data.themeLogo[0];
                sssDisplayPageImagesFiltered(bgElement, imageLogo);
            } else {
                sssDisplayPageImagesFiltered(bgElement);
            }

            $(document).on('click', '.pinterest-image-to-select', function (event) {
                var src = $(event.target).attr('src');
                var replaced = $(self).attr('href').replace(/&media=(.*?)&/, '/&media=' + src + '&');
                $(self).attr('href', replaced);
                bgElement.hide();
                if (parentEvent.currentTarget.href.slice(-1) !== '#') {
                    window.open(parentEvent.currentTarget.href, 'mw' + parentEvent.timeStamp, 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0');
                }
            });
        });

        $(document).keyup(function(e) {
            if($('.' + bgClass).length) {
                if ((e.keyCode === 27) && $('.' + bgClass).is(":visible")) {
                    $('.' + bgClass).hide();
                }
                ;   // esc
            }
        });

        function sssDisplayPageImagesFiltered(bgElement,imageLogo) {

            bgElement.show();
            var images = $('img').filter(function(i) { return $(this).width() > 100});
            var wrapper = $("<div id='pinterest-images-select-wrapper'></div>").appendTo(bgElement);
            $.each(images,function( i, image ) {
                $('<img src="'+$(image).attr('src')+'" class="pinterest-image-to-select">').appendTo(wrapper);
            });
            if (typeof imageLogo !== 'undefined') {
                var filenameBase = imageLogo.substring(0,(imageLogo.length - 12));

                if(bgElement.find('img[src^="'+filenameBase+'"]').length)
                    return;
                $('<img src="'+ imageLogo +'" class="pinterest-image-to-select">').appendTo(wrapper);
            }

        }

        window.initSupsysticSocialSharing = function ($container) {
            if (!($container instanceof jQuery)) {
                $container = $($container);
            }

			if(!$container.length) return;

            var $buttons = $container.find('a'),
                animation = $container.attr('data-animation'),
                iconsAnimation = $container.attr('data-icons-animation'),
                buttonChangeSize = $container.attr('data-change-size'),
                $navButton = $container.find('.nav-button'),
                $printButton = $container.find('.print'),
                $bookmarkButton = $container.find('.bookmark'),
                $twitterFollowButton = $container.find('.twitter-follow'),
                $mailButton = $container.find('.mail'),
                animationEndEvents = 'webkitAnimationEnd mozAnimationEnd ' +
                    'MSAnimationEnd oanimationend animationend',
                transitionHelper = {
                    'supsystic-social-sharing-right':  {
                        'transition': 'translateX(160px)',
                        'display':    'block'
                    },
                    'supsystic-social-sharing-left':   {
                        'transition': 'translateX(-160px)',
                        'display':    'block'
                    },
                    'supsystic-social-sharing-top':    {
                        'transition': 'translateY(-160px)',
                        'display':    'inline-block'
                    },
                    'supsystic-social-sharing-bottom': {
                        'transition': 'translateY(160px)',
                        'display':    'inline-block'
                    }
                },
                buttonsTransition = null;

            var getAnimationClasses = function (animation) {
                return 'animated ' + animation;
            };

            var checkNavOrientation = function ($c) {
                $.each(transitionHelper, function (index, value) {
                    if (typeof $c.attr('class') !== 'undefined' && ($.inArray(index, $c.attr('class').split(' ')) > -1)) {
                        $c.find('.nav-button').css({
                            'display': value['display']
                        });

                        buttonsTransition = value['transition'];
                    }
                });
            };

            var initNetworksPopup = function () {
                var $networksContainer = $('.networks-list-container'),
                    $button = $('.list-button');

                $button.on('click', function () {
                    $networksContainer.removeClass('hidden')
                        .bPopup({
                            position: [0, 200]
                        });
                });
            };


            if ($buttons.length) {
                $buttons.hover(function () {
                    $(this).addClass(getAnimationClasses(animation))
                        .one(animationEndEvents, function () {
                            $(this).removeClass(getAnimationClasses(animation));
                        });
                    $(this).find('i.fa').addClass(getAnimationClasses(iconsAnimation))
                        .one(animationEndEvents, function () {
                            $(this).removeClass(getAnimationClasses(iconsAnimation));
                        });
                });
                var pinterestBtn = $buttons.filter('.pinterest');
                if(pinterestBtn && pinterestBtn.size()) {
                    var $img = sssFindMostImportantImg();
                    if($img) {
                        pinterestBtn.attr('href', pinterestBtn.attr('href')+
                            '&media='+ encodeURIComponent($img.attr('src'))+
                            '&description='+ encodeURIComponent(pinterestBtn.attr('data-description')));
                    }
                }
            }

            checkNavOrientation($container);
            $navButton.on('click', function () {
                if ($(this).hasClass('hide')) {
                    $(this).removeClass('hide').addClass('show');

                    $container
                        .find('a').css('transform', buttonsTransition);

                    $container
                        .find('.list-button').css('transform', buttonsTransition);
                } else {
                    $(this).addClass('hide').removeClass('show');

                    $container.find('a').css('transform', 'translateX(0)');

                    $container
                        .find('.list-button').css('transform', 'translateX(0)');
                }
            });

            initNetworksPopup();

            $printButton.on('click', function () {
                window.print();
            });

            $bookmarkButton.on('click', function () {
                if (window.sidebar && window.sidebar.addPanel) { // Mozilla Firefox Bookmark
                    window.sidebar.addPanel(document.title, window.location.href, '');
                } else if (window.external && ('AddFavorite' in window.external)) { // IE Favorite
                    window.external.AddFavorite(location.href, document.title);
                } else if (window.opera && window.print) { // Opera Hotlist
                    this.title = document.title;
                    return true;
                } else { // webkit - safari/chrome
                    alert('Press ' + (navigator.userAgent.toLowerCase().indexOf('mac') != -1 ? 'Command/Cmd' : 'CTRL') + ' + D to bookmark this page.');
                }
            });

            if($twitterFollowButton.length) {
                loadTwitterWidgetApi();

                $twitterFollowButton.each(function() {
                    var name = $(this).data('name');

                    $(this)
                        .attr('href', 'https://twitter.com/intent/follow?screen_name=' + name);
                });
            }

            if($container.find('a').hasClass('have-all-counter') && $('.counter').length) {
                var summ = 0;

                $('.counter').each(function() {
                    var counter = parseInt($(this).text());

                    if(typeof counter === 'number') summ += counter;
                });

                var htmlTotalCounter  = '<div class="supsystic-social-sharing-total-counter counter-wrap">';
                    htmlTotalCounter += '<span>Shares</span> ';
                    htmlTotalCounter += '<span>' + summ + '</span>';
                    htmlTotalCounter += '</div>';
                $container.prepend(htmlTotalCounter);
            }

            if($container.data('text')) {
                var text = $container.data('text');
                var htmlButtons  = '<div>';
                    htmlButtons += '<span>' + text + '</span>';
                    htmlButtons += '</div>';
                $container.append(htmlButtons);
            }
            

            $mailButton.each(function () {
                var url = encodeURIComponent(window.location.href);

                if ($(this).parent().hasClass('supsystic-social-homepage')) {
                    url += '?p=' + $(this).attr('data-post-id');
                }

                var src = 'mailto:?subject=' + encodeURIComponent(document.title) + '&body=' + url;
                $(this).attr('href', src);
            });

            $('div.supsystic-social-sharing-bottom a.social-sharing-button.tooltip-icon').tooltipster({
                animation: 'swing',
                position:  'top',
                theme:     'tooltipster-shadow'
            });

            $('div.supsystic-social-sharing-top a.social-sharing-button.tooltip-icon, div.supsystic-social-sharing-content a.social-sharing-button.tooltip-icon').tooltipster({
                animation: 'swing',
                position:  'bottom',
                theme:     'tooltipster-shadow'
            });

            $('div.supsystic-social-sharing-left a.social-sharing-button.tooltip-icon').tooltipster({
                animation: 'swing',
                position:  'right',
                theme:     'tooltipster-shadow'
            });

            $('div.supsystic-social-sharing-right a.social-sharing-button.tooltip-icon').tooltipster({
                animation: 'swing',
                position:  'left',
                theme:     'tooltipster-shadow'
            });

            $container.addClass('supsystic-social-sharing-init');

            var containerShow = false;

            if ($container.hasClass('supsystic-social-sharing-hide-on-mobile')) {
                if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                    containerShow = false;
                } else {
                    if (!$container.hasClass('supsystic-social-sharing-click')) {
                        containerShow = true;
                    }
                }
            } else if($container.hasClass('supsystic-social-sharing-show-only-on-mobile')) {
                if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                    if (!$container.hasClass('supsystic-social-sharing-click')) {
                        containerShow = true;
                    }
                } else {
                    containerShow = false;
                }
            } else if (!$container.hasClass('supsystic-social-sharing-click')) {
                $container.addClass('supsystic-social-sharing-loaded');
                containerShow = true;
            }

            if ($container.hasClass('supsystic-social-sharing-hide-on-homepage') 
            && $('body').hasClass('home')) {
                containerShow = false;
            }

            if (containerShow)
                $container.show();
            else
                $container.hide();
        };

        var onResize = function () {
            $('.supsystic-social-sharing-left, .supsystic-social-sharing-right').each(function (index, container) {
                var $container = $(container),
                    outerheight = $container.outerHeight(true),
                    totalHeighht = $(window).height();

                $container.animate({top: totalHeighht / 2 - outerheight / 2}, 200);
            });
        };

        onResize.call();
        $(window).on('resize', onResize);

        $(document).on('click', function () {
            var $projectContainer = $('.supsystic-social-sharing-click');

            if ($projectContainer.hasClass('supsystic-social-sharing-hide-on-homepage') 
            && $projectContainer.hasClass('supsystic-social-homepage'))
                return;

            $projectContainer.show();
        });

        // Init social sharing.
        $('.supsystic-social-sharing:not(.supsystic-social-sharing-init)').each(function (index, el) {
            window.initSupsysticSocialSharing(el);
        });

        document.body.addEventListener("DOMSubtreeModified", function () {
            $('.supsystic-social-sharing:not(.supsystic-social-sharing-init)').each(function (index, el) {
                window.initSupsysticSocialSharing(el);
            });
        }, false);
    });

}(window.jQuery, window));
function sssFindMostImportantImg() {
    var $img = null;
    var findWhere = ['.woocommerce-main-image', 'article', '.entry-content', 'body'];
    for(var i = 0; i < findWhere.length; i++) {
        $img = _sssFindImg( jQuery(findWhere[i]) );
        if($img)
            break;
    }
    return $img;
}
function _sssFindImg($el) {
    if($el && $el.size()) {
        var $img = null;
        $el.each(function(){
            $img = jQuery(this).find('img');
            if($img && $img.size()) {
                return false;
            }
        });
        return $img && $img.size() ? $img : false;
    }
    return false;
}
function loadTwitterWidgetApi() {
    window.twttr = (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0],
            t = window.twttr || {};
        if (d.getElementById(id)) return t;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://platform.twitter.com/widgets.js";
        fjs.parentNode.insertBefore(js, fjs);

        t._e = [];
        t.ready = function(f) {
            t._e.push(f);
        };

        return t;
    }(document, "script", "twitter-wjs"));
}