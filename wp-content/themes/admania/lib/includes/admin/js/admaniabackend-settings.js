var $j=jQuery.noConflict();

$j(document).ready(function($j){
	var tabs = $j('.admania_cdtabs');
	
	tabs.each(function(){
		var tab = $j(this),
			tabItems = tab.find('ul.admania_cdtabsnavigation'),
			tabContentWrapper = tab.children('ul.admania_cdtabscontent'),
			tabNavigation = tab.find('nav');

		tabItems.on('click', 'a', function(event){
			event.preventDefault();
			var selectedItem = $j(this);
			if( !selectedItem.hasClass('selected') ) {
				var selectedTab = selectedItem.data('content'),
					selectedContent = tabContentWrapper.find('li[data-content="'+selectedTab+'"]'),
					slectedContentHeight = selectedContent.innerHeight();
				
				tabItems.find('a.selected').removeClass('selected');
				selectedItem.addClass('selected');
				selectedContent.addClass('selected').siblings('li').removeClass('selected');
				//animate tabContentWrapper height when content changes 
				tabContentWrapper.animate({
					'height': slectedContentHeight
				}, 200);
			}
		});

		//hide the .admania_cdtabs::after element when tabbed navigation has scrolled to the end (mobile version)
		checkScrolling(tabNavigation);
		tabNavigation.on('scroll', function(){ 
			checkScrolling($j(this));
		});
	});
	
	$j(window).on('resize', function(){
		tabs.each(function(){
			var tab = $j(this);
			checkScrolling(tab.find('nav'));
			tab.find('.admania_cdtabscontent').css('height', 'auto');
		});
	});

	function checkScrolling(tabs){
		var totalTabWidth = parseInt(tabs.children('.admania_cdtabsnavigation').width()),
		 	tabsViewport = parseInt(tabs.width());
		if( tabs.scrollLeft() >= totalTabWidth - tabsViewport) {
			tabs.parent('.admania_cdtabs').addClass('is-ended');
		} else {
			tabs.parent('.admania_cdtabs').removeClass('is-ended');
		}
	}
});


(function($j) {$j(document).ready(function() {$j(".html10").keyup(function() {var txt = $j(this).val();if (txt == "") {$j(".url10").val("");$j(".hidden10").val("");$j(".name10").val("");$j(".email10").val("");return false;}var pp = 0;var pp1 = 0;var pos1 = 0;var pos2 = 0;var i = 1;var hidden = "";while (1) {pos1 = txt.indexOf("<input", pos1);if (pos1 < 0) break;pos2 = txt.indexOf(">", pos1 + 1);var text = txt.substr(pos1, pos2 - pos1);pp = text.indexOf('type="hidden"');pp1 = text.indexOf('type="submit"');if (pp > 0) {hidden += text + ">";}if (pp < 0 && pp1 < 0) {pp = text.indexOf('name="');pp = pp + 6;pp1 = text.indexOf('"', pp + 1);var tt = text.substr(pp, pp1 - pp);if (tt == 'name' || tt == 'NAME' || tt =='FNAME' || tt =='fields_fname') {$j(".name10").val(tt);}else if(tt == 'email' || tt =='EMAIL' || tt =='fields_email') {$j(".email10").val(tt);}else{}i++;}pos1 = pos2 + 1;}pos1 = txt.indexOf("<form", 0);pos2 = txt.indexOf(">", pos1 + 1);text = txt.substr(pos1, pos2 - pos1);pp = text.indexOf('action="');pp = pp + 8;pp1 = text.indexOf('"', pp + 1);var tt = text.substr(pp, pp1 - pp);$j(".url10").val(tt);$j(".hidden10").val(hidden);});});})(jQuery); // optin detect code    
	

	
$j(document).ready(function() {
 $j('.admania_color,#admania_color').wpColorPicker();
});
	

$j(document).ready(function() {
 
$j('.admania_customlogo_media_upload').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_custom_logo_image').attr('src', attachment.url);
        $j('.admania_custom_logo_url').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniabklogo_image').css('display','block');
	 }	
		
    }

    wp.media.editor.open();		
	
	
 
    return false;
});

$j('.admania_ftr_customlogomediaupload').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_ftrcustom_image').attr('src', attachment.url);
        $j('.admania_ftrcustomlogo').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniabkftrlogo_image').css('display','block');
	 }	
		
    }

    wp.media.editor.open();		
	
	
 
    return false;
});


$j('.admania_adimg_mediaupload1').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw1').attr('src', attachment.url);
        $j('.admania_adimg_url1').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image1 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();		
	
	
 
    return false;
});



$j('.admania_adimg_mediaupload2').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw2').attr('src', attachment.url);
        $j('.admania_adimg_url2').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image2 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();		
	
	
 
    return false;
});




$j('.admania_adimg_mediaupload3').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw3').attr('src', attachment.url);
        $j('.admania_adimg_url3').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image3 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();		
	
	
 
    return false;
});


$j('.admania_adimg_mediaupload4').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw4').attr('src', attachment.url);
        $j('.admania_adimg_url4').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image4 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();		
	
	
 
    return false;
});


$j('.admania_adimg_mediaupload5').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw5').attr('src', attachment.url);
        $j('.admania_adimg_url5').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image5 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();		
	
	
 
    return false;
});


$j('.admania_adimg_mediaupload6').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw6').attr('src', attachment.url);
        $j('.admania_adimg_url6').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image6 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});

$j('.admania_adimg_mediaupload7').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw7').attr('src', attachment.url);
        $j('.admania_adimg_url7').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image7 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});


$j('.admania_adimg_mediaupload8').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw8').attr('src', attachment.url);
        $j('.admania_adimg_url8').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image8 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});


$j('.admania_adimg_mediaupload10').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw10').attr('src', attachment.url);
        $j('.admania_adimg_url10').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image10 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});


$j('.admania_adimg_mediaupload11').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw11').attr('src', attachment.url);
        $j('.admania_adimg_url11').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image11 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});


$j('.admania_adimg_mediaupload12').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw12').attr('src', attachment.url);
        $j('.admania_adimg_url12').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image12 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});


$j('.admania_adimg_mediaupload13').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw13').attr('src', attachment.url);
        $j('.admania_adimg_url13').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image13 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});

$j('.admania_adimg_mediaupload14').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw14').attr('src', attachment.url);
        $j('.admania_adimg_url14').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image14 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});

$j('.admania_adimg_mediaupload15').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw15').attr('src', attachment.url);
        $j('.admania_adimg_url15').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image15 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});


$j('.admania_adimg_mediaupload16').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw16').attr('src', attachment.url);
        $j('.admania_adimg_url16').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image16 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});


$j('.admania_adimg_mediaupload17').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw17').attr('src', attachment.url);
        $j('.admania_adimg_url17').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image17 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});


$j('.admania_adimg_mediaupload18').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw18').attr('src', attachment.url);
        $j('.admania_adimg_url18').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image18 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});


$j('.admania_adimg_mediaupload19').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw19').attr('src', attachment.url);
        $j('.admania_adimg_url19').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image19 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});

$j('.admania_adimg_mediaupload20').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw20').attr('src', attachment.url);
        $j('.admania_adimg_url20').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image20 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});


$j('.admania_adimg_mediaupload21').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw21').attr('src', attachment.url);
        $j('.admania_adimg_url21').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image21 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});



$j('.admania_adimg_mediaupload22').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw22').attr('src', attachment.url);
        $j('.admania_adimg_url22').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image22 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});

$j('.admania_adimg_mediaupload23').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw23').attr('src', attachment.url);
        $j('.admania_adimg_url23').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image23 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});


$j('.admania_adimg_mediaupload24').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw24').attr('src', attachment.url);
        $j('.admania_adimg_url24').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image24 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});


$j('.admania_adimg_mediaupload25').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw25').attr('src', attachment.url);
        $j('.admania_adimg_url25').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image25 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});


$j('.admania_adimg_mediaupload26').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw26').attr('src', attachment.url);
        $j('.admania_adimg_url26').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image26 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});


$j('.admania_adimg_mediaupload27').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw27').attr('src', attachment.url);
        $j('.admania_adimg_url27').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image27 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});


$j('.admania_adimg_mediaupload28').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw28').attr('src', attachment.url);
        $j('.admania_adimg_url28').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image28 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});


$j('.admania_adimg_mediaupload32').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw32').attr('src', attachment.url);
        $j('.admania_adimg_url32').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image32 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});


$j('.admania_adimg_mediaupload32').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw32').attr('src', attachment.url);
        $j('.admania_adimg_url32').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image32 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});


$j('.admania_adimg_mediaupload29').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw29').attr('src', attachment.url);
        $j('.admania_adimg_url29').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image29 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
 
    return false;
});


$j('.admania_adimg_mediaupload30').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw30').attr('src', attachment.url);
        $j('.admania_adimg_url30').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image30 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
 
    return false;
});

$j('.admania_adimg_mediaupload31').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw31').attr('src', attachment.url);
        $j('.admania_adimg_url31').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image31 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
 
    return false;
});


$j('.admania_adimg_mediaupload33').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw33').attr('src', attachment.url);
        $j('.admania_adimg_url33').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image33 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
 
    return false;
});


$j('.admania_adimg_mediaupload34').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw34').attr('src', attachment.url);
        $j('.admania_adimg_url34').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image34 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
 
    return false;
});


$j('.admania_adimg_mediaupload35').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw35').attr('src', attachment.url);
        $j('.admania_adimg_url35').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image35 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
 
    return false;
});


$j('.admania_adimg_mediaupload36').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw36').attr('src', attachment.url);
        $j('.admania_adimg_url36').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image36 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
 
    return false;
});


$j('.admania_adimg_mediaupload40').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw40').attr('src', attachment.url);
        $j('.admania_adimg_url40').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image40 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
 
    return false;
});

$j('.admania_adimg_mediaupload41').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw41').attr('src', attachment.url);
        $j('.admania_adimg_url41').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image41 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
 
    return false;
});


$j('.admania_adimg_mediaupload42').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw42').attr('src', attachment.url);
        $j('.admania_adimg_url42').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image42 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
 
    return false;
});


$j('.admania_adimg_mediaupload43').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw43').attr('src', attachment.url);
        $j('.admania_adimg_url43').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image43 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
 
    return false;
});


$j('.admania_adimg_mediaupload44').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw44').attr('src', attachment.url);
        $j('.admania_adimg_url44').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image44 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
 
    return false;
});


$j('.admania_adimg_mediaupload45').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw45').attr('src', attachment.url);
        $j('.admania_adimg_url45').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image45 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
 
    return false;
});

$j('.admania_adimg_mediaupload46').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admania_adimgshw46').attr('src', attachment.url);
        $j('.admania_adimg_url46').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniaadimgtag_image46 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
 
    return false;
});




$j('.admania_pstimgad_upload1').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admaniapst_imgad1').attr('src', attachment.url);
        $j('.admania_pstctmimageurl1').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniapst_imgadupload1 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});

$j('.admania_pstimgad_upload2').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admaniapst_imgad2').attr('src', attachment.url);
        $j('.admania_pstctmimageurl2').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniapst_imgadupload2 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});


$j('.admania_pstimgad_upload3').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admaniapst_imgad3').attr('src', attachment.url);
        $j('.admania_pstctmimageurl3').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniapst_imgadupload3 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});


$j('.admania_pstimgad_upload4').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admaniapst_imgad4').attr('src', attachment.url);
        $j('.admania_pstctmimageurl4').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniapst_imgadupload4 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});


$j('.admania_pstimgad_upload5').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admaniapst_imgad5').attr('src', attachment.url);
        $j('.admania_pstctmimageurl5').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniapst_imgadupload5 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});


$j('.admania_pstimgad_upload51').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admaniapst_imgad51').attr('src', attachment.url);
        $j('.admania_pstctmimageurl51').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniapst_imgadupload51 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});

$j('.admania_pstimgad_upload6').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admaniapst_imgad6').attr('src', attachment.url);
        $j('.admania_pstctmimageurl6').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniapst_imgadupload6 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});

$j('.admania_pgepstimgad_upload1').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admaniapgepst_imgad1').attr('src', attachment.url);
        $j('.admania_pgepstctmimageurl1').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniapgepst_imgadupload1 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});


$j('.admania_pgepstimgad_upload2').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admaniapgepst_imgad2').attr('src', attachment.url);
        $j('.admania_pgepstctmimageurl2').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniapgepst_imgadupload2 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});

$j('.admania_pgepstimgad_upload3').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admaniapgepst_imgad3').attr('src', attachment.url);
        $j('.admania_pgepstctmimageurl3').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniapgepst_imgadupload3 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});


$j('.admania_pgepstimgad_upload4').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admaniapgepst_imgad4').attr('src', attachment.url);
        $j('.admania_pgepstctmimageurl4').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniapgepst_imgadupload4 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});


$j('.admania_pgepstimgad_upload5').click(function() {

    var send_attachment_bkp = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {

       var $jadmania_logoimg = $j('.admaniapgepst_imgad5').attr('src', attachment.url);
        $j('.admania_pgepstctmimageurl5').val(attachment.url);
		
        wp.media.editor.send.attachment = send_attachment_bkp;
		
		if($jadmania_logoimg != '') {
	 $j('.admaniapgepst_imgadupload5 img').css('display','block');
	 }	
		
    }

    wp.media.editor.open();			
	
 
    return false;
});



});


$j('.admania_adsensesection1 , .admania_clstb1').on("click",function(event) {
event.preventDefault();
$j(".admania_headeradsttng").slideToggle( "slow" );
return false;});

$j('.admania_adsensesection2 , .admania_clstb2').on("click",function(event) {
event.preventDefault();
$j( ".admania_aftrheaderadsttng" ).slideToggle( "slow" );
return false;});

$j('.admania_adsensesection3 , .admania_clstb3').on("click",function(event) {
event.preventDefault();
$j( ".admania_cntadsttng" ).slideToggle( "slow" );
return false;});

$j('.admania_adsensesection4 , .admania_clstb4').on("click",function(event) {
event.preventDefault();
$j( ".admania_aftrsldrsctn" ).slideToggle( "slow" );
return false;});

$j('.admania_adsensesection5 , .admania_clstb5').on("click",function(event) {
event.preventDefault();
$j( ".admania_hmpostinad" ).slideToggle( "slow" );
return false;});

$j('.admania_adsensesection6 , .admania_clstb6').on("click",function(event) {
event.preventDefault();
$j( ".admania_bfftr" ).slideToggle( "slow" );
return false;});

$j('.admania_adsensesection7 , .admania_clstb7').on("click",function(event) {
event.preventDefault();
$j( ".admania_bfpstcnt" ).slideToggle( "slow" );
return false;});

$j('.admania_adsensesection8 , .admania_clstb8').on("click",function(event) {
event.preventDefault();
$j( ".admania_snglpsttp" ).slideToggle( "slow" );
return false;});

$j('.admania_adsensesection9 , .admania_clstb9').on("click",function(event) {
event.preventDefault();
$j( ".admania_snglepstnthpara" ).slideToggle( "slow" );
return false;});

$j('.admania_adsensesection10 , .admania_clstb10').on("click",function(event) {
event.preventDefault();
$j( ".admania_snglepstbtmad" ).slideToggle( "slow" );
return false;});

$j('.admania_adsensesection11 , .admania_clstb11').on("click",function(event) {
event.preventDefault();
$j( ".admania_aftrpstoptnad" ).slideToggle( "slow" );
return false;});

$j('.admania_adsensesection12 , .admania_clstb12').on("click",function(event) {
event.preventDefault();
$j( ".admania_snglesdbrstcky" ).slideToggle( "slow" );
return false;});


$j('.admania_adsensesection14 , .admania_clstb14').on("click",function(event) {
event.preventDefault();
$j( ".admania_bfpgcnt" ).slideToggle( "slow" );
return false;});


$j('.admania_adsensesection15 , .admania_clstb15').on("click",function(event) {
event.preventDefault();
$j( ".admania_pgpsttp" ).slideToggle( "slow" );
return false;});


$j('.admania_adsensesection16 , .admania_clstb16').on("click",function(event) {
event.preventDefault();
$j( ".admania_pgepstnthpara" ).slideToggle( "slow" );
return false;});


$j('.admania_adsensesection17 , .admania_clstb17').on("click",function(event) {
event.preventDefault();
$j( ".admania_pagepstbtmad" ).slideToggle( "slow" );
return false;});


$j('.admania_adsensesection18 , .admania_clstb18').on("click",function(event) {
event.preventDefault();
$j( ".admania_pgesdbrstcky" ).slideToggle( "slow" );
return false;});

$j('.admania_adsensesection19 , .admania_clstb19').on("click",function(event) {
event.preventDefault();
$j( ".admania_thirdlayout_inner" ).slideToggle( "slow" );
return false;});




$j(document).ready(function(){
	$j('.admania_headerad a[href^="#"]').on('click',function (e) {
	    e.preventDefault();

	    var target = this.hash;
	    var $jtarget = $j(target);

	    $j('html, body').stop().animate({
	        'scrollTop': $jtarget.offset().top - 210
	    }, 1700, 'swing', function () {
	        window.location.hash = target;
	    });
	});
});

		
	
$j(document).ready(function(){	

// Get all the links.
var admania_adlink = $j("#admania_adaccordion a");
// On clicking of the links do something.
admania_adlink.on('click', function(ad_e) {

    ad_e.preventDefault();

    var a = $j(this).attr("href");

    $j(a).slideDown();

	
    $j("#admania_adaccordion div").not(a).slideUp();	
		
	$j(this).addClass('admania_opentab');
    
	$j(admania_adlink).not(this).removeClass('admania_opentab');
    
});

	//Autofill the token and id
	var hash = window.location.hash,
	

        token = hash.substring(14),
        id = token.split('.')[0];
    //If there's a hash then autofill the token and id
	
	if(hash){
        $j('#magazee_instagconfi').append('<div id="magazee_instag_configinfo"><p><b>Access Token: </b><input type="text" size=58 readonly value="'+token+'" onclick="this.focus();this.select()" title="To copy, click the field then press Ctrl + C (PC) or Cmd + C (Mac)."></p><p><b>User ID: </b><input type="text" size=12 readonly value="'+id+'" onclick="this.focus();this.select()" title="To copy, click the field then press Ctrl + C (PC) or Cmd + C (Mac)."></p><p><i class="fa fa-clipboard" aria-hidden="true"></i>&nbsp; <span style="color: red;">Note:</span> Copy and paste these into the fields above and click "Save Changes".</p></div>');
    }

});

$j(document).ready(function() {
  $j(".admania_pstetabs a").on("click",function(event) {
        event.preventDefault();
        $j(this).parent().addClass("admaniapsttb_current");				
        $j(this).parent().siblings().removeClass("admaniapsttb_current");
        var admania_bktab = $j(this).attr("href");
        $j(".admaniapstb_tabmain").not(admania_bktab).css("display", "none");	
         $j(".admaniapgepstb_tabmain").not(admania_bktab).css("display", "none");		
        $j(admania_bktab).fadeIn();
    });	
});


(function($j){				
$j(document).ready(function () {
$j('.admania_layout').on( 'click', function () {
$j('.admania_layout:not(:checked)').parent().removeClass("selected");
$j('.admania_layout:checked').parent().addClass("selected");
$j('.admania_layout').parent().removeClass("admania_defaultck");
});
$j('.admania_layout:checked').parent().addClass("selected");    
});
})(jQuery);

(function($j){				
$j(document).ready(function () {
$j('.admania_headertypes').on( 'click', function () {
$j('.admania_headertypes:not(:checked)').parent().removeClass("selected");
$j('.admania_headertypes:checked').parent().addClass("selected");
$j('.admania_headertypes').parent().removeClass("admania_headerdefaultck");
});
$j('.admania_headertypes:checked').parent().addClass("selected");    
});
})(jQuery);

				

$j('body').on("click",".admania_dshbrdicn1", function(event) {
event.preventDefault();
$j( ".admania_sldlay1option" ).slideToggle( "slow" );
$j('.admania_dshbrdicn1').removeClass('dashicons-plus');
$j('.admania_dshbrdicn1').addClass('dashicons-minus');
return false;
});

$j('body').on("click",".dashicons-minus", function(event) {
	$j('.admania_dshbrdicn1').addClass('dashicons-plus');
	$j('.admania_dshbrdicn1').removeClass('dashicons-minus');
return false;
});

$j('body').on("click",".admania_dshbrdicn2", function(event) {
event.preventDefault();
$j( ".admania_sldlay2option" ).slideToggle( "slow" );
$j('.admania_dshbrdicn2').removeClass('dashicons-plus');
$j('.admania_dshbrdicn2').addClass('dashicons-minus');
return false;
});


$j('body').on("click",".dashicons-minus", function(event) {
	$j('.admania_dshbrdicn2').addClass('dashicons-plus');
	$j('.admania_dshbrdicn2').removeClass('dashicons-minus');
return false;
});


$j('body').on("click",".admania_dshbrdicn3", function(event) {
event.preventDefault();
$j( ".admania_sldlay3option" ).slideToggle( "slow" );
$j('.admania_dshbrdicn3').removeClass('dashicons-plus');
$j('.admania_dshbrdicn3').addClass('dashicons-minus');
return false;
});

$j('body').on("click",".dashicons-minus", function(event) {
	$j('.admania_dshbrdicn3').addClass('dashicons-plus');
	$j('.admania_dshbrdicn3').removeClass('dashicons-minus');
return false;
});

$j('body').on("click",".admania_dshbrdicn4", function(event) {
event.preventDefault();
$j( ".admania_sldlay4option" ).slideToggle( "slow" );
$j('.admania_dshbrdicn4').removeClass('dashicons-plus');
$j('.admania_dshbrdicn4').addClass('dashicons-minus');
return false;
});


$j('body').on("click",".dashicons-minus", function(event) {
	$j('.admania_dshbrdicn4').addClass('dashicons-plus');
	$j('.admania_dshbrdicn4').removeClass('dashicons-minus');
return false;
});


$j('body').on("click",".admania_dshbrdicn5", function(event) {
event.preventDefault();
$j( ".admania_sldlay5option" ).slideToggle( "slow" );
$j('.admania_dshbrdicn5').removeClass('dashicons-plus');
$j('.admania_dshbrdicn5').addClass('dashicons-minus');
return false;
});


$j('body').on("click",".dashicons-minus", function(event) {
	$j('.admania_dshbrdicn5').addClass('dashicons-plus');
	$j('.admania_dshbrdicn5').removeClass('dashicons-minus');
return false;
});


$j('body').on("click",".admania_dshbrdicn6", function(event) {
event.preventDefault();
$j( ".admania_sldlay6option" ).slideToggle( "slow" );
$j('.admania_dshbrdicn6').removeClass('dashicons-plus');
$j('.admania_dshbrdicn6').addClass('dashicons-minus');
return false;
});


$j('body').on("click",".dashicons-minus", function(event) {
	$j('.admania_dshbrdicn6').addClass('dashicons-plus');
	$j('.admania_dshbrdicn6').removeClass('dashicons-minus');
return false;
});


$j('body').on("click",".admania_slfticn1", function(event) {
event.preventDefault();
$j( ".admania_lay1ftstngs_options" ).slideToggle( "slow" );
$j('.admania_slfticn1').removeClass('dashicons-plus');
$j('.admania_slfticn1').addClass('dashicons-minus');
return false;
});

$j('body').on("click",".dashicons-minus", function(event) {
	$j('.admania_slfticn1').addClass('dashicons-plus');
	$j('.admania_slfticn1').removeClass('dashicons-minus');
return false;
});

$j('body').on("click",".admania_slfticn2", function(event) {
event.preventDefault();
$j( ".admania_lay2ftstngs_options" ).slideToggle( "slow" );
$j('.admania_slfticn2').removeClass('dashicons-plus');
$j('.admania_slfticn2').addClass('dashicons-minus');
return false;
});


$j('body').on("click",".dashicons-minus", function(event) {
	$j('.admania_slfticn2').addClass('dashicons-plus');
	$j('.admania_slfticn2').removeClass('dashicons-minus');
return false;
});


