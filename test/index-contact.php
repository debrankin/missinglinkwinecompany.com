<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
<title>Missing Link Wine Company</title>
<script type="text/javascript" src="p7ehc/p7EHCscripts.js"></script>
<link href="p7dmm/p7DMM01.css" rel="stylesheet" type="text/css" media="all">
<script type="text/javascript" src="p7dmm/p7DMMscripts.js"></script>
<link href="p7affinity/p7affinity-1_03.css" rel="stylesheet" type="text/css">
<link href="p7affinity/p7affinity_print.css" rel="stylesheet" type="text/css" media="print">
<script type="text/javascript" src="p7ap3/p7AP3scripts.js"></script>
<link href="p7ap3/p7ap3-columns.css" rel="stylesheet" type="text/css" media="all">
<link href="p7ap3/p7AP3-01.css" rel="stylesheet" type="text/css" media="all">
<link href="http://fonts.googleapis.com/css?family=Federo" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
<![endif]-->
<script type="text/javascript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
</script>
<script type="text/javascript">var switchTo5x=true;</script>
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/sofia:n4:default;unkempt:n4:default;tangerine:n4:default;kaushan-script:n4:default;noticia-text:n4:default.js" type="text/javascript"></script>
<!-- Add jQuery library -->
<script type="text/javascript" src="fancyBox/lib/jquery-1.10.1.min.js"></script>
<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="fancyBox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="fancyBox/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="fancyBox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
<!-- Add Button helper (this is optional) -->
<link rel="stylesheet" type="text/css" href="fancyBox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
<script type="text/javascript" src="fancyBox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<!-- Add Thumbnail helper (this is optional) -->
<link rel="stylesheet" type="text/css" href="fancyBox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
<script type="text/javascript" src="fancyBox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<!-- Add Media helper (this is optional) -->
<script type="text/javascript" src="fancyBox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
<script type="text/javascript">
$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();
			$(".fancybox").fancybox({"width":400,"height":300});

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'fade',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : true,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			
			});
    </script>
<?php
  $bg = array('bg-01.png', 'bg-02.png', 'bg-03.png', 'vy-landscape.jpg'); // array of filenames

  $i = rand(0, count($bg)-1); // generate random number size of the array
  $selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen
?>
<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
}
body{
background: url(images/<?php echo $selectedBg; ?>) no-repeat;
background-attachment: fixed
}

	</style>
<link href="SpryAssets/jquery.ui.button.min.css" rel="stylesheet" type="text/css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$(window).scroll(function() {
		if($(this).scrollTop() != 0) {
			$('#backtotop').fadeIn();	
		} else {
			$('#backtotop').fadeOut();
		}
	});
 
	$('#backtotop').click(function() {
		$('body,html').animate({scrollTop:0},800);
	});	
});
</script>
<link rel="stylesheet" type="text/css" href="includes/ContactForms/xtdContactForms.css">
<script type="text/javascript" src="includes/extendjQuery.js"></script>
<script type="text/javascript" src="includes/ContactForms/xtdContactForms.js"></script>
<script type="text/javascript" src="includes/ContactForms/xtdContactFormsInstances.js"></script>
</head>

<body onLoad="MM_preloadImages('images/redwine.png','images/redwine-op.png')">
<div class="content-wrapper" style="margin-top:0px;">  <div class="masthead">
  <div class="head-logo">
 <a href="#"><img src="images/mlwc-logo-215w.png" alt="missing link wine companhy" width="264" height="160" class="scalable" onClick="P7_AP3control('p7AP3t3_1','trigger')"/></a>
 
  </div ><div class="sitecoming">
    <h1 style="font-family:federo;">Web Site Comming this Summer</h1>
  </div><br clear="all" />
  </div>
<div class="columns-wrapper">
    <div class="main-content" style="width:44%;">
      <div class="content p7ehc-1">
        <h2 style="font-family:federo;">Contact Us</h2>
        <p><strong>Office:</strong> 860.519.5790</p>
        <p><strong>Email:</strong> <a href="mailto:doug@missinglinkwinecompany.com">doug@missinglinkwinecompany.com</a> or fill out our form</p>
        <p><strong>Mailing:</strong><br>
          PO Box 270173<br>
        West Hartford, CT  06127</p>
        <p>&nbsp;</p>
      </div>
    </div>
    <div class="main-content" style="width:53%;text-align:center;">
      <div class="content p7ehc-1">
        <h2>
        

<form class="form-align-left ContactForms1 contactForm-skin08 contactForm-base" role="form"> 
	<div class="form-group required"> 
 		<label for="name1">Name</label>
		<div class="control-holder">
 			<input type="text" id="name1" class="form-control" maxlength="50"/>
		</div>
 	</div>
	<div class="form-group required"> 
 		<label for="phone1">Phone</label>
		<div class="control-holder">
 		<input type="text" id="phone1" class="form-control" maxlength="50"/>
		</div>
 	</div>
	<div class="form-group required">
 		<label for="message1">Message</label>
 		<div class="control-holder">
 			<textarea id="message1" class="form-control" maxlength="500" ></textarea>
 		</div>
 	</div>
	<div class="form-group"> 
 		<button type="submit" class="btn btn-default">Send form</button>
 	</div>
 </form>


</h2>
        <p>&nbsp;</p>
        <h2>&nbsp;</h2>
      </div>
    </div>
</div>
</div>

<div class="footer">
  
    <div class="contact-bar"><p class="copyright">&nbsp;</p>
    <p class="copyright">&copy;2015 <a href="#">Missing Link Wine Company</a></p></div>
    
   
</div>
 <!--<script type="text/javascript">stLight.options({publisher: "9b38de72-2c09-4e11-9f2e-16a703036b49", doNotHash: false, doNotCopy: false, hashAddressBar: true});</script>
<script>
var options={ "publisher": "9b38de72-2c09-4e11-9f2e-16a703036b49", "logo": { "visible": true, "url": "http://missinglinkwinecompany.com", "img": "http://missinglinkwinecompany.com/images/logo.png", "height": 15}, "ad": { "visible": false, "openDelay": "5", "closeDelay": "0"}, "livestream": { "domain": "", "type": "sharethis"}, "ticker": { "visible": false, "domain": "", "title": "", "type": "sharethis"}, "facebook": { "visible": true, "profile": "missinglinkwinecompany"}, "fblike": { "visible": true, "url": ""}, "twitter": { "visible": true, "user": "http://twitter.com/missinglinkwinecompany"}, "twfollow": { "visible": true, "url": "http://twitter.com/missinglinkwinecompany"}, "custom": [{ "visible": false, "title": "Custom 1", "url": "", "img": "", "popup": false, "popupCustom": { "width": 300, "height": 250}}, { "visible": false, "title": "Custom 2", "url": "", "img": "", "popup": false, "popupCustom": { "width": 300, "height": 250}}, { "visible": false, "title": "Custom 3", "url": "", "img": "", "popup": false, "popupCustom": { "width": 300, "height": 250}}], "chicklets": { "items": ["facebook", "twitter", "linkedin", "pinterest", "email", "sharethis"]}};
var st_bar_widget = new sharethis.widgets.sharebar(options);
</script>-->
</body>
</html>
