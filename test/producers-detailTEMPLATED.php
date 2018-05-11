<?php require_once('Connections/admin.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_rs_producer_details = "-1";
if (isset($_GET['recordID'])) {
  $colname_rs_producer_details = $_GET['recordID'];
}

mysql_select_db($database_admin, $admin);
$query_rs_producer_details = sprintf("SELECT * FROM producers WHERE id = %s", GetSQLValueString($colname_rs_producer_details, "int"));
$rs_producer_details = mysql_query($query_rs_producer_details, $admin) or die(mysql_error());
$row_rs_producer_details = mysql_fetch_assoc($rs_producer_details);
$totalRows_rs_producer_details = mysql_num_rows($rs_producer_details);

$colname_rs_join = "-1";
if (isset($_GET['recordID'])) {
  $colname_rs_join = $_GET['recordID'];
}

mysql_select_db($database_admin, $admin);
$query_rs_join = sprintf("SELECT producers.id, sitesearch.wines FROM producers LEFT JOIN sitesearch ON producers.id = sitesearch.producer_id WHERE producers.id = %s",GetSQLValueString($colname_rs_join, "int"));
$rs_join = mysql_query($query_rs_join, $admin) or die(mysql_error());
$row_rs_join = mysql_fetch_assoc($rs_join);
$totalRows_rs_join = mysql_num_rows($rs_join);


?>

<!doctype html>
<html><!-- InstanceBegin template="/Templates/template.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Missing Link Wine Company - Producers by Country</title>
<!-- InstanceEndEditable -->
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

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
<script type="text/javascript">var switchTo5x=true;</script>

<!-- InstanceBeginEditable name="head" -->
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.--><script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/sofia:n4:default;unkempt:n4:default;tangerine:n4:default;kaushan-script:n4:default;noticia-text:n4:default.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
P7_DMMmark('p7DMM_1',2,'Producers');
//-->
</script>
<!-- InstanceEndEditable -->
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/sofia:n4:default;unkempt:n4:default;tangerine:n4:default;kaushan-script:n4:default;noticia-text:n4:default.js" type="text/javascript"></script>
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
</head>

<body onLoad="MM_preloadImages('images/redwine.png','images/redwine-op.png')">
<div id="p7AP3_3" class="p7AP3-01 p7AP3" style="margin-bottom:-20px">
  <div class="p7AP3trig p7ap3-theme-01" style="display:none;">
    <a href="#p7AP3c3_1" id="p7AP3t3_1">Hide this</a>
  </div>
  <div id="p7AP3w3_1" class="p7AP3cwrapper p7ap3-theme-01">
    <div id="p7AP3c3_1" class="p7AP3content p7ap3-theme-01">
      <div id="p7AP3p3_1" class="p7AP3panelcontent p7ap3-theme-01" style="border-radius:0px;">
        <div class="p7ap3-col-wrapper no-columns" >
          <p>Email <a href="mailto:doug@missinglinkwinecompany.com">doug@missinglinkwinecompany.com</a> or Call (203) 313 0922</p>
        </div>
      </div>
    </div>
  </div>
  <!--[if lte IE 7]><style>.p7AP3, .p7AP3cwrapper, .p7AP3panelcontent, .p7AP3trig a {zoom: 1;}</style><![endif]-->
  <!--[if IE 5]><style>.p7AP3cwrapper {height: auto !important;}</style><![endif]-->
  <script type="text/javascript">P7_opAP3('p7AP3_3',1,3,0,0,1,0,0,0,1,0,1000,250,1,1);</script>
</div>
  <div class="top-navigation">
    <div class="menu-top-wrapper">
      <div id="p7DMM_1" class="p7DMM01 p7DMM p7dmm-centered responsive">
        <div id="p7DMMtb_1" class="p7DMM-toolbar closed"><a href="#" title="Hide/Show Menu"><img src="p7dmm/img/toggle-icon.png" alt="Toggle Menu"></a></div>
        <ul id="p7DMMu_1" class="p7DMM01-menu closed">
          <li><a href="index.php" title="Home" id="p7DMMt1_1" class="tooltip2"><img src="images/home.png" width="70" height="59" alt=""/></a>
            <div id="p7DMMs1_1" class="p7dmm-sub-wrapper">
              <ul>
                <li><a href="index.php?apm3=#p7AP3c1_1">What's New</a></li>
                <li><a href="index.php?apm3=#p7AP3c1_2">Calendar of Events</a></li>
                <li><a href="index.php?apm3=#p7AP3c1_3">Price List</a></li>
                <li><a href="index.php?apm3=#p7AP3c2_1">New Wines</a></li>
                <li><a href="index.php?apm3=#p7AP3c2_2">Tastings</a></li>
                <li><a href="index.php?apm3=#p7AP3c2_3">Resources</a></li>
              </ul>
            </div>
          </li>
          <li><a href="about.php" title="About Us" id="p7DMMt1_2" class="tooltip2"><img src="images/about.png" width="70" height="59" alt=""/></a>
            <div id="p7DMMs1_2" class="p7dmm-sub-wrapper">
              <ul>
                <li><a href="#">Philosophy</a></li>
                <li><a href="#">HIstory</a></li>
                <li><a href="#">Community Involvement</a></li>
              </ul>
            </div>
          </li>
          <li><a href="wines.php" title="Wines" id="p7DMMt1_3" class="tooltip2"><img src="images/wines2.png" width="70" height="59" alt=""/></a>
            <div id="p7DMMs1_3" class="p7dmm-sub-wrapper">
              <ul>
                 <li><a href="wines.php">All</a></li>
                <li><a href="wines-select.php?country=Argentina">Argentina</a></li>
                <li><a href="wines-select.php?country=California">California</a></li>
                <li><a href="wines-select.php?country=France">France</a></li>
                <li><a href="wines-select.php?country=Germany">Germany</a></li>
                <li><a href="wines-select.php?country=Italy">Italy</a></li>
                <li><a href="wines-select.php?country=Oregon">Oregon</a></li>
                <li><a href="wines-select.php?country=Spain">Spain</a></li>
                
                <li><a href="wines-type.php">By Type</a></li>
                <li><a href="pricelist.php">Price List</a></li>
              </ul>
            </div>
          </li>
          <li><a href="producers.php" title="Producers" id="p7DMMt1_4" class="tooltip2"><img src="images/estate.png" width="70" height="59" alt=""/></a>
            <div id="p7DMMs1_4" class="p7dmm-sub-wrapper">
              <ul>
                <li><a href="producers.php">All</a></li>
                <li><a href="producers-select.php?country=Argentina">Argentina</a></li>
                <li><a href="producers-select.php?country=California">California</a></li>
                 <li><a href="producers-select.php?country=Czech%20Republic">Czech Republic</a></li>
                <li><a href="producers-select.php?country=France">France</a></li>
                <li><a href="producers-select.php?country=Germany">Germany</a></li>
                <li><a href="producers-select.php?country=Italy">Italy</a></li>
                <li><a href="producers-select.php?country=Oregon">Oregon</a></li>
                <li><a href="producers-select.php?country=Spain">Spain</a></li>
                
                <li style="visibility:hidden;"><a href="producers-detail.php">info</a></li>
                <li style="visibility:hidden;"><a href="producers-wines.php">wines</a></li>
              </ul>
            </div>
          </li>
        <!--  <li><a id="p7DMMt1_5" href="#">Customer Service</a></li>-->
          <li><a href="#" onClick="P7_AP3control('p7AP3t3_1','trigger')" title="Contact Us"  class="tooltip2"><img src="images/phone2.png" width="70" height="59" alt=""/></a></li>
        </ul>
        <script type="text/javascript">P7_opDMM('p7DMM_1',3,450,0,1,1,1,1,0,1);</script>
      </div>
    </div>
  </div>

<div class="content-wrapper">  <div class="masthead">
  <div class="head-logo">
 <a href="#"><img src="images/mlwc-logo-215w.png" alt="missing link wine companhy" width="264" height="160" class="scalable" onClick="P7_AP3control('p7AP3t3_1','trigger')"/></a>
 
  </div><div class="gs-mast"><form name="search" method="post" action="searchform.php">
 Search for: 
     <input type="text" name="find" /> 
     <input type="hidden" name="field" value=""/>
 <!-- <Select NAME="field">
 <Option VALUE="">all</option>
<Option VALUE="wines">Wines</option>
<Option VALUE="producer">Producer</option>
 <Option VALUE="type">Color</option>
 <Option VALUE="country">Country</option>-->
 </Select>
 <input type="hidden" name="searching" value="yes" />
 <input type="submit" name="search" value="Search" />
 </form></div> <div class="cc-signup"><a class="fancybox fancybox.iframe" href="signup.html">
   Join our elist
  </a></div><br clear="all" />
  </div>
  <!-- InstanceBeginEditable name="page-content" -->
  <div class="columns-wrapper">
         <div class="sidebar" id="clinks">
        <div class="content p7ehc-1">
          <h2>Images
          </h2>
          <div class="clearfloat"></div>
        </div>
      </div>
      <div class="main-content-wide">
        <div class="content p7ehc-1">
          <h2><?php echo $row_rs_producer_details['producer']; ?></h2>
          <div class="repeatregion">
            <div class="producer"></div>
            <div class="label"><img src="images/logos/<?php echo $row_rs_producer_details['logo']; ?>.png" class="scalable"></div>
            <div style="width: 65%; float: left;"><?php echo $row_rs_producer_details['description']; ?></div>
            <p>&nbsp;</p>
            <br clear="all" /><p><a href="producers-wines.php?recordsetPRODUCER=<?php echo $row_rs_producer_details['id']; ?>">wines - detailed descriptions</a></p>
            <div class="wines"><?php do { ?><div class="wine-details"><?php echo $row_rs_join['wines']; ?></div><?php } while ($row_rs_join = mysql_fetch_assoc($rs_join)); ?></div>
            <p><br clear="all" />
            </p>
          </div>
<br clear="all" />
        </div>
      </div>

  </div>
  <!-- InstanceEndEditable --></div>

<div class="footer">
  
    <div class="contact-bar"><p class="copyright">&nbsp;</p>
    <p class="copyright">&copy;2014 <a href="#">Missing Link Wine Company</a></p></div>
    
   
  </div>
 <!--<script type="text/javascript">stLight.options({publisher: "9b38de72-2c09-4e11-9f2e-16a703036b49", doNotHash: false, doNotCopy: false, hashAddressBar: true});</script>
<script>
var options={ "publisher": "9b38de72-2c09-4e11-9f2e-16a703036b49", "logo": { "visible": true, "url": "http://missinglinkwinecompany.com", "img": "http://missinglinkwinecompany.com/images/logo.png", "height": 15}, "ad": { "visible": false, "openDelay": "5", "closeDelay": "0"}, "livestream": { "domain": "", "type": "sharethis"}, "ticker": { "visible": false, "domain": "", "title": "", "type": "sharethis"}, "facebook": { "visible": true, "profile": "missinglinkwinecompany"}, "fblike": { "visible": true, "url": ""}, "twitter": { "visible": true, "user": "http://twitter.com/missinglinkwinecompany"}, "twfollow": { "visible": true, "url": "http://twitter.com/missinglinkwinecompany"}, "custom": [{ "visible": false, "title": "Custom 1", "url": "", "img": "", "popup": false, "popupCustom": { "width": 300, "height": 250}}, { "visible": false, "title": "Custom 2", "url": "", "img": "", "popup": false, "popupCustom": { "width": 300, "height": 250}}, { "visible": false, "title": "Custom 3", "url": "", "img": "", "popup": false, "popupCustom": { "width": 300, "height": 250}}], "chicklets": { "items": ["facebook", "twitter", "linkedin", "pinterest", "email", "sharethis"]}};
var st_bar_widget = new sharethis.widgets.sharebar(options);
</script>-->
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($rs_producer_details);

?>
