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

mysql_select_db($database_admin, $admin);
$query_Recordset1 = "SELECT * FROM sitesearch";
$Recordset1 = mysql_query($query_Recordset1, $admin) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width">
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

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}
</script>
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript" src="http://s.sharethis.com/loader.js"></script><script type="text/javascript">
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
</script><!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/sofia:n4:default;unkempt:n4:default;tangerine:n4:default.js" type="text/javascript"></script>
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
  $bg = array('bg-01.png', 'bg-02.png', 'bg-03.png', 'wine-bg-rev-sm2.png'); // array of filenames

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
</head>

<body onLoad="MM_preloadImages('images/redwine.png','images/redwine-op.png')">
<div id="p7AP3_3" class="p7AP3-01 p7AP3" style="margin-bottom:-20px">
  <div class="p7AP3trig p7ap3-theme-01" style="display:none;">
    <a href="#p7AP3c3_1" id="p7AP3t3_1">Hide this</a>
  </div>
  <!--[if lte IE 7]><style>.p7AP3, .p7AP3cwrapper, .p7AP3panelcontent, .p7AP3trig a {zoom: 1;}</style><![endif]-->
  <!--[if IE 5]><style>.p7AP3cwrapper {height: auto !important;}</style><![endif]-->
  <script type="text/javascript">P7_opAP3('p7AP3_3',1,3,0,0,1,0,0,0,1,0,1000,250,1,1);</script>
</div>
<div class="content-wrapper">  <div class="masthead"><div class="gs-mast"><form name="search" method="post" action="searchform-all.php">
 Search for: 
     <input type="text" name="find" /><input type="hidden" name="searching" value="yes" />
 
 <Select NAME="field">
  <Option VALUE="" selected="selected">All</option>
   <Option VALUE="wines">Wines</option>
  
 <Option VALUE="producer">Producer</option>
 <Option VALUE="type">Color</option>
 <Option VALUE="country">Country</option>
 </Select>
 
 <input type="submit" name="Filter" value="Filter" />
 </form></div> <div class="cc-signup"><a class="fancybox fancybox.iframe" href="signup.html">
   Join our elist
  </a></div><br clear="all" />
  </div>
<div class="columns-wrapper">
  <div class="main-content-wide">
      <div class="content p7ehc-1">
       <!-- <h2>Search Results</h2> -->

 <? 
 $field = $_REQUEST['field'];
$searching = $_REQUEST['searching'];
$find = $_REQUEST['find'];
 //This is only displayed if they have submitted the form 
 
  if ($searching =="") 
 { 
 echo "<h2>Search Results</h2><p>"; 
 
 echo "<p>Please enter search term"; 
 exit; 
 } 
 if ($searching =="yes") 
 { 
 echo "<h2>Search Results</h2><p>"; 
 
 //If they did not enter a search term we give them an error 
 if ($find == "") 
 { 
 echo "<p>Please enter search term"; 
 exit; 
 }
  if ($field == "")
 { 
  $data = mysql_query("SELECT * FROM sitesearch WHERE producer LIKE '%$find%' OR wines LIKE '%$find%' OR type LIKE '%$find%' OR description LIKE '%$find%'"); //And we remind them what they searched for 
 echo "<b>Searched For:</b> " .$find; 
 } 
 //And we display the results 
 while($result = mysql_fetch_array( $data )) //ERROR WITH THIS SYNTAX WHEN SEARCHING BY BY INDIVIDUAL FIELD**********************

{ 
echo "<div class='search-results'>"; 

 echo "Wine: ".'<a href="wines-detail.php?recordID='.$result['code'].' ">'.$result['wines'].'</a>';

 echo " <br>"; 
 echo "Type: ".$result['type'];
  echo "<br>";
  echo "Year: ".$result['year'];
  echo "<br>"; 
   echo "<br>";  
  echo "Producer: ". '<a href="producers-detail.php?recordID='.$result['producer_id'].' ">'.$result['producer'].'</a>';
   echo "<br>";
 echo "Country: ".$result['country']; 

  echo ""."<br>";
 
 echo "Description: ".$result['description']; 
 echo "<br>"; 
 echo "<br>"; 
 echo "</div>";
 
 } 
 
 echo "<br clear='all';"; //CRITICAL PLACEMENT
 //This counts the number or results - and if there wasn't any it gives them a little message explaining that 

 
  if ($field !== "")
 //Now we search for our search term, in the field the user specified 
 $data2 = mysql_query("SELECT * FROM sitesearch WHERE upper($field) LIKE'%$find%'"); 
  //And we remind them what they searched for 
 echo "<b>Searched For:</b> " .$find; 
 } 
 //And we display the results 
 while($result = mysql_fetch_array( $data2 )) //ERROR WITH THIS SYNTAX WHEN SEARCHING ALL FIELDS**********************

{ 
echo "<div class='search-results'>"; 

 echo "Wine: ".'<a href="wines-detail.php?recordID='.$result['code'].' ">'.$result['wines'].'</a>';

 echo " <br>"; 
 echo "Type: ".$result['type'];
  echo "<br>";
  echo "Year: ".$result['year'];
  echo "<br>"; 
   echo "<br>";  
  echo "Producer: ". '<a href="producers-detail.php?recordID='.$result['producer_id'].' ">'.$result['producer'].'</a>';
   echo "<br>";
 echo "Country: ".$result['country']; 

  echo ""."<br>";
 
 echo "Description: ".$result['description']; 
 echo "<br>"; 
 echo "<br>"; 
 echo "</div>";
 
 } 
 
 
 echo "<br clear='all';";
 

 ?>
 </div>
    </div>

  </div>
</div>
<!--<script type="text/javascript">stLight.options({publisher: "9b38de72-2c09-4e11-9f2e-16a703036b49", doNotHash: false, doNotCopy: false, hashAddressBar: true});</script>
<script>
var options={ "publisher": "9b38de72-2c09-4e11-9f2e-16a703036b49", "logo": { "visible": true, "url": "http://missinglinkwinecompany.com", "img": "http://missinglinkwinecompany.com/images/logo.png", "height": 15}, "ad": { "visible": false, "openDelay": "5", "closeDelay": "0"}, "livestream": { "domain": "", "type": "sharethis"}, "ticker": { "visible": false, "domain": "", "title": "", "type": "sharethis"}, "facebook": { "visible": true, "profile": "missinglinkwinecompany"}, "fblike": { "visible": true, "url": ""}, "twitter": { "visible": true, "user": "http://twitter.com/missinglinkwinecompany"}, "twfollow": { "visible": true, "url": "http://twitter.com/missinglinkwinecompany"}, "custom": [{ "visible": false, "title": "Custom 1", "url": "", "img": "", "popup": false, "popupCustom": { "width": 300, "height": 250}}, { "visible": false, "title": "Custom 2", "url": "", "img": "", "popup": false, "popupCustom": { "width": 300, "height": 250}}, { "visible": false, "title": "Custom 3", "url": "", "img": "", "popup": false, "popupCustom": { "width": 300, "height": 250}}], "chicklets": { "items": ["facebook", "twitter", "linkedin", "pinterest", "email", "sharethis"]}};
var st_bar_widget = new sharethis.widgets.sharebar(options);
</script>-->
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>