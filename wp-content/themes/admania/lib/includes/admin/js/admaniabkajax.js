var $j = jQuery.noConflict();
		$j(document).ready(function($j) {

		  $j('form#admaniathemesupport').submit(function() {
		  
			  var data = $j(this).serialize();
			  $j.post(admaniabk_ajaxobject.admania_bkajaxurl, data, function(response) {

			  if(response == 1) {
				   
			  $j('#admania_savealert').addClass('admania_savedone');
			  t = setTimeout('admania_fademessage()', 3000);
			  
			  }
			  else if( response == 2 ){
			  
			  location.reload();
			  }
			  
			  else {
				  return false;
			  }
			  
			  });
			  return false;
		  });
		  
		});
		
		function admania_fademessage() {
			$j('#admania_savealert').fadeOut(function() {

				$j('#admania_savealert').removeClass('admania_savedone');

			});
			clearTimeout(t);
		}
		
		
