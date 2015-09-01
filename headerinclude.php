<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="scripts/sorttable.js" type="text/javascript"></script>
<link rel="stylesheet" href="dtheme/cascade.css" type="text/css"  media="screen" />
<link rel="stylesheet" href="dtheme/screensmall.css" type="text/css" media="screen" />
<link rel="stylesheet" href="dtheme/jquery-ui.css" type="text/css" media="screen" />
<!--<script type="text/javascript" src="scripts/mootools.js"></script>
<script type="text/javascript" src="scripts/moocheck.js"></script>-->

<script src="scripts/jquery-1.4.4.min.js" type="text/javascript" charset="utf-8"></script>
<script src="scripts/jquery.maskedinput.js" type="text/javascript"></script>
<script src="scripts/jquery-ui.min.js"></script>
<script src="scripts/validate.js" type="text/javascript" ></script>
<?PHP include("headers/libN.php");?>
<script type="text/javascript" src="scripts/popup.js"></script>
        <script type="text/javascript">
		$(document).ready(function() {
			var popMargTop, popMargLeft;
			//When you click on a link with class of poplight and the href starts with a # 
			$('a.poplight[href^=#]').click(function() {
				
				var checking_html = '<img src="loading.gif">Loading'; 
				$('#loadGif').html(checking_html);  
				 
				var popID = $(this).attr('rel'); //Get Popup Name
				var popURL = $(this).attr('href'); //Get Popup href to define size
			
				//Pull Query & Variables from href URL
				var query= popURL.split('?');
				var dim= query[1].split('&');
				var popWidth = dim[0].split('=')[1]; //Gets the first query string value
				
				
			
				//Fade in the Popup and add close button
				$('#' + popID).fadeIn().css({ 'width': Number( popWidth ) }).prepend('<a href="#" class="close"><img src="close.png" border="0" class="btn_close" title="Close Window" alt="Close" /></a>');
			
				//Define margin for center alignment (vertical   horizontal) - we add 80px to the height/width to accomodate for the padding  and border width defined in the css
				//var popMargTop = ($('#' + popID).height() + 80) / 2;
//				var popMargLeft = ($('#' + popID).width() + 80) / 2;
				if(window.screen.width == 800){
					popMargTop = 200;
					popMargLeft = 300;
				}else if(window.screen.width == 1024){
					popMargTop = 235;
					popMargLeft = 350;
				}else if(window.screen.width == 1280){
					popMargTop = 235;
					popMargLeft = 450;
				}else if(window.screen.width == 1366){
					popMargTop = 235;
					popMargLeft = 500;
				}
			
				//Apply Margin to Popup
				$('#' + popID).css({
					'margin-top' : popMargTop,
					'margin-left' : popMargLeft
				});
			
				//Fade in Background
				$('body').append('<div id="fade"></div>'); //Add the fade layer to bottom of the body tag.
				$('#fade').css({'filter' : 'alpha(opacity=60)'}).fadeIn(); //Fade in the fade layer - .css({'filter' : 'alpha(opacity=80)'}) is used to fix the IE Bug on fading transparencies 
			
				return false;
			});
			
			//Close Popups and Fade Layer
			$('a.close, #fade').live('click', function() { //When clicking on the close or fade layer...
				$('#fade , .popup_block').fadeOut(function() {
					document.getElementById('detail').innerHTML= "";
					$('#fade, a.close').remove();  //fade them both out
				});
				return false;
			});
		});
	</script>
