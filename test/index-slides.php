<?php require_once('Connections/clients.php'); ?>
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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "level";
  $MM_redirectLoginSuccess = "pricelist.php";
  $MM_redirectLoginFailed = "login-error.php";
  $MM_redirecttoReferrer = true;
  mysql_select_db($database_clients, $clients);
  	
  $LoginRS__query=sprintf("SELECT username, password, level FROM `admin` WHERE username=%s AND password=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $clients) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'level');
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && true) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
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
// *** Redirect if username exists
$MM_flag="MM_insert";
if (isset($_POST[$MM_flag])) {
  $MM_dupKeyRedirect="name-error.php?panel=3#Accordion1";
  $loginUsername = $_POST['username'];
  $LoginRS__query = sprintf("SELECT username FROM admin WHERE username=%s", GetSQLValueString($loginUsername, "text"));
  mysql_select_db($database_clients, $clients);
  $LoginRS=mysql_query($LoginRS__query, $clients) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);

  //if there is a row in the database, the username was found - can not add the requested username
  if($loginFoundUser){
    $MM_qsChar = "?";
    //append the username to the redirect page
    if (substr_count($MM_dupKeyRedirect,"?") >=1) $MM_qsChar = "&";
    $MM_dupKeyRedirect = $MM_dupKeyRedirect . $MM_qsChar ."requsername=".$loginUsername;
    header ("Location: $MM_dupKeyRedirect");
    exit;
  }
}
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
	$my_activation= md5($_POST['username']); 
  $insertSQL = sprintf("INSERT INTO `admin` (name, email, username, password, activation) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($my_activation, "text"));

  mysql_select_db($database_clients, $clients);
  $Result1 = mysql_query($insertSQL, $clients) or die(mysql_error());

  $insertGoTo = "register_ok.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
<title>Missing Link Wine Company</title>
<script type="text/javascript" src="p7ehc/p7EHCscripts.js"></script>
<link href="p7dmm/p7DMM01.css" rel="stylesheet" type="text/css" media="all">
<script type="text/javascript" src="p7dmm/p7DMMscripts.js"></script>
<script src="SpryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="SpryAssets/jquery-ui-1.9.2.dialog.custom.min.js" type="text/javascript"></script>
<script src="SpryAssets/jquery-ui-1.9.2.button.custom.min.js" type="text/javascript"></script>
<link href="p7affinity/p7affinity-1_03.css" rel="stylesheet" type="text/css">
<link href="p7affinity/p7affinity_print.css" rel="stylesheet" type="text/css" media="print">
<link href="http://fonts.googleapis.com/css?family=Federo" rel="stylesheet" type="text/css">
<!--[if lte IE 7]>
<style>
body {min-width: 1020px;}
.columns-wrapper, .menu-top-wrapper, .p7dmm-sub-wrapper {width: 980px;}
</style>
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
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript" src="http://s.sharethis.com/loader.js"></script>
<link href="p7ap3/p7ap3-columns.css" rel="stylesheet" type="text/css" media="all">
<script type="text/javascript" src="p7ap3/p7AP3scripts.js"></script>

<link href="p7ap3/p7AP3-01.css" rel="stylesheet" type="text/css" media="all">
<link href="SpryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/jquery.ui.dialog.min.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/jquery.ui.resizable.min.css" rel="stylesheet" type="text/css">
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
		
	.slides {
	background-color: rgba(232,240,203,0.38);
	padding-top: 1%;
	padding-right: 1%;
	padding-left: 1%;
	padding-bottom: 1%;
	height: 100px;
	width: 98%;
	margin-bottom: 15px;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	border: 1px solid rgba(246,246,246,1.00);
	border-radius: 8px;
}
    </style>
	<link href="SpryAssets/jquery.ui.button.min.css" rel="stylesheet" type="text/css">
</head>
<body onLoad="MM_preloadImages('images/redwine.png','images/redwine-op.png')">
<div id="p7AP3_3" class="p7AP3-01 p7AP3" style="margin-bottom:-20px">
  <div class="p7AP3trig p7ap3-theme-01" style="display:none;">
    <a href="#p7AP3c3_1" id="p7AP3t3_1">Hide this</a>
  </div>
  <div id="p7AP3w3_1" class="p7AP3cwrapper p7ap3-theme-01">
    <div id="p7AP3c3_1" class="p7AP3content p7ap3-theme-01">
      <div id="p7AP3p3_1" class="p7AP3panelcontent p7ap3-theme-01" style="border-radius:0px;">
        <div class="p7ap3-col-wrapper no-columns" id="contact">
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
         <li><a href="index.php" title="Home" id="p7DMMt1_1" class="tooltip2"><img src="images/home.png" alt="" width="70" height="59" title="Home"/></a>
            <div id="p7DMMs1_1" class="p7dmm-sub-wrapper">
              <ul>
                <li><a href="#" onClick="P7_AP3control('p7AP3t1_1','trigger');P7_AP3controlAll('p7AP3_2','close')">What's New</a></li>
                <li><a href="#" onClick="P7_AP3control('p7AP3t1_2','trigger');P7_AP3controlAll('p7AP3_2','close')">Calendar of Events</a></li>
                <li><a href="#" onClick="P7_AP3control('p7AP3t1_3','trigger');P7_AP3controlAll('p7AP3_2','close')">Price List</a></li>
                <li><a href="#" onClick="P7_AP3control('p7AP3t2_1','trigger');P7_AP3controlAll('p7AP3_1','close')">New Wines</a></li>
                <li><a href="#" onClick="P7_AP3control('p7AP3t2_2','trigger');P7_AP3controlAll('p7AP3_1','close')">Tastings</a></li>
                <li><a href="#" onClick="P7_AP3control('p7AP3t2_3','trigger');P7_AP3controlAll('p7AP3_1','close')">Resources</a></li>
              </ul>
            </div>
          </li>
          <li><a href="about.php" title="About Us" id="p7DMMt1_2" class="tooltip2"><img src="images/about.png" alt="" width="70" height="59" title="About Us"/></a>
            <div id="p7DMMs1_2" class="p7dmm-sub-wrapper">
              <ul>
                <li><a href="#">Philosophy</a></li>
                <li><a href="#">HIstory</a></li>
                <li><a href="#">Community Involvement</a></li>
              </ul>
            </div>
          </li>
          <li><a href="wines.php" title="Wines" id="p7DMMt1_3" class="tooltip2"><img src="images/wines2.png" alt="" width="70" height="59" title="Wines"/></a>
            <div id="p7DMMs1_3" class="p7dmm-sub-wrapper">
              <ul>
                 <li><a href="wines.php">All</a></li>
                <li><a href="wines-select.php?country=Argentina">Argentina</a></li>
                <li><a href="wines-select.php?country=France">France</a></li>
                <li><a href="wines-select.php?country=Germany">Germany</a></li>
                <li><a href="wines-select.php?country=Italy">Italy</a></li>
                <li><a href="wines-select.php?country=Spain">Spain</a></li>
                <li><a href="wines-select.php?country=USA">USA</a></li>
                <li><a href="wines-type.php">By Type</a></li>
                <li><a href="pricelist.php">Price List</a></li>
              </ul>
            </div>
          </li>
          <li><a href="producers.php" title="Producers" id="p7DMMt1_4" class="tooltip2"><img src="images/estate.png" alt="" width="70" height="59" title="Producers"/></a>
            <div id="p7DMMs1_4" class="p7dmm-sub-wrapper">
              <ul>
                <li><a href="producers.php">All</a></li>
                <li><a href="producers-select.php?country=Argentina">Argentina</a></li>
                <li><a href="producers-select.php?country=France">France</a></li>
                <li><a href="producers-select.php?country=Germany">Germany</a></li>
                <li><a href="producers-select.php?country=Italy">Italy</a></li>
                <li><a href="producers-select.php?country=Spain">Spain</a></li>
                <li><a href="producers-select.php?country=USA">USA</a></li>
                <li style="visibility:hidden;"><a href="producers-detail.php">Details</a></li>
                <li style="visibility:hidden;"><a href="producers-wines.php">Details</a></li>
              </ul>
            </div>
          </li>
          <!--<li><a id="p7DMMt1_5" href="#">Customer Service</a></li>-->
          <li><a href="#" onClick="P7_AP3control('p7AP3t3_1','trigger')" title="Contact Us"  class="tooltip2"><img src="images/phone2.png" width="70" height="59" alt=""/></a></li>
        </ul>
        <script type="text/javascript">P7_opDMM('p7DMM_1',3,450,0,1,1,1,1,0,1);</script>
      </div>
    </div>
  </div>

<div class="content-wrapper">  <div class="masthead">
  <div class="head-logo">
 <a href="#"><img src="images/mlwc-logo-215w.png" alt="missing link wine companhy" width="264" height="160" class="scalable" onClick="P7_AP3control('p7AP3t3_1','trigger')"/></a></div>
 <div class="gs-mast"><form name="search" method="post" action="searchform.php">
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
 </form></div>
  <div class="cc-signup"><a class="fancybox fancybox.iframe" href="signup.html">
   Join our elist
  </a></div>
  </div>
<div class="columns-wrapper">
  <div class="slides">rotating photos can go here</div>
    <div class="main-content">
      <div class="content p7ehc-1">
        <div id="p7AP3_1" class="p7AP3-01 p7AP3">
          <div class="p7AP3trig p7ap3-theme-01" onClick="P7_AP3controlAll('p7AP3_2','close')">
          <h3>  <a href="#p7AP3c1_1" id="p7AP3t1_1">What's New</a></h3>
         
  
          </div>
          <div id="p7AP3w1_1" class="p7AP3cwrapper p7ap3-theme-01">
            <div id="p7AP3c1_1" class="p7AP3content p7ap3-theme-01">
              <div id="p7AP3p1_1" class="p7AP3panelcontent p7ap3-theme-01">
                <div class="p7ap3-col-wrapper no-columns">
                  <p style="color: #98BC1B">Retailers and restaurants want to see on home page:</p>
                  <p>-<a href="#">What's new:</a> inbound containers, tastings, price lis<br>
                    -Calendar of events<br>
                    -Search tool for individual wines and wineries<br>
                    -List of suppliers (Brazos, Bon Vivant, Kermit Lynch, etc)<br>
                    -Resources (shelf talkers, supplier websites, wine reviews, press)</p>
                  <p>twitter.com/missinglinkwines</p>
                  <p>user: missinglinkwines</p>
                  <p>pass: missinglinkwines</p>
                  <div class="dot4">::</div>
                </div>
              </div>
            </div>
          </div>
         
          <div class="p7AP3trig p7ap3-theme-01" onClick="P7_AP3controlAll('p7AP3_2','close')">
            <h3><a href="#p7AP3c1_3" id="p7AP3t1_3">Price List</a></h3>
          </div>
          <div id="p7AP3w1_3" class="p7AP3cwrapper p7ap3-theme-01">
            <div id="p7AP3c1_3" class="p7AP3content p7ap3-theme-01">
              <div id="p7AP3p1_3" class="p7AP3panelcontent p7ap3-theme-01">
                <div class="p7ap3-col-wrapper no-columns">
                  <p>Registered users login to view our price list:
                  <form id="form" name="form" method="POST" action="<?php echo $loginFormAction; ?>">
                    <p>
                      <label for="username">Username:</label>
                      <input name="username" type="text" id="username" placeholder="User Name" />
                    </p>
                    <p>
                      <label for="password">Password:</label>
                      <input name="password" type="password" id="password" placeholder="Password" />
                    </p>
                    <p>
                      <input type="submit" name="submit" id="submit" value="Login" />
                      <input type="reset" name="submit2" id="submit2" value="Reset" />
                    </p>
                  </form>
                  New users register here:
                  <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
                    <table align="center" width="98%">
                      <tr valign="baseline">
                        <td nowrap="nowrap" align="right">&nbsp;</td>
                        <td><input name="name" type="text" placeholder="Name" value="" /></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap="nowrap" align="right">&nbsp;</td>
                        <td><input name="email" type="text" placeholder="Email" value="" /></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap="nowrap" align="right">&nbsp;</td>
                        <td><input name="username" type="text" placeholder="Username" value="" /></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap="nowrap" align="right">&nbsp;</td>
                        <td><input name="password" type="password" placeholder="Password" value="" /></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap="nowrap" align="right">&nbsp;</td>
                        <td><input type="submit" value="Register" /></td>
                      </tr>
                    </table>
                    <input type="hidden" name="activation" />
                    <input type="hidden" name="MM_insert" value="form1" />
                  </form>
                  <p></p>
                  <div class="dot4">::</div>
                </div>
              </div>
            </div>
          </div> <div class="p7AP3trig p7ap3-theme-01" onClick="P7_AP3controlAll('p7AP3_2','close')">
            <h3><a href="#p7AP3c1_2" id="p7AP3t1_2">In the News</a></h3>
          </div>
          <div id="p7AP3w1_2" class="p7AP3cwrapper p7ap3-theme-01">
            <div id="p7AP3c1_2" class="p7AP3content p7ap3-theme-01">
              <div id="p7AP3p1_2" class="p7AP3panelcontent p7ap3-theme-01">
                <div class="p7ap3-col-wrapper no-columns">
                  <p>felis. Fusce a nisi in odio pulvinar </p>
                  <div class="dot4">::</div>
                </div>
              </div>
            </div>
          </div>
          <!--[if lte IE 7]><style>.p7AP3, .p7AP3cwrapper, .p7AP3panelcontent, .p7AP3trig a {zoom: 1;}</style><![endif]-->
          <!--[if IE 5]><style>.p7AP3cwrapper {height: auto !important;}</style><![endif]-->
          <script type="text/javascript">P7_opAP3('p7AP3_1',1,3,0,0,1,0,0,0,1,0,1000,250,1,1);</script>
        </div>
        <div class="offsetbg">
          <div class="offsetbox">
            <div class="text-pad">
              <p>Menu <br>
                <a href="#">eu, massa. Suspendisse potenti. </a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="main-content">
      <div class="content p7ehc-1">
        <div id="p7AP3_2" class="p7AP3-01 p7AP3">
          <div class="p7AP3trig p7ap3-theme-01" onClick="P7_AP3controlAll('p7AP3_1','close')">
            <h3><a href="#p7AP3c2_1" id="p7AP3t2_1">New Wines</a></h3>
          </div>
          <div id="p7AP3w2_1" class="p7AP3cwrapper p7ap3-theme-01">
            <div id="p7AP3c2_1" class="p7AP3content p7ap3-theme-01">
              <div id="p7AP3p2_1" class="p7AP3panelcontent p7ap3-theme-01">
                <div class="p7ap3-col-wrapper no-columns">
                  <p>New wines will be posted each month, so be sure to take a peek&nbsp;here!</p>
                </div>
              </div>
            </div>
          </div>
          <div class="p7AP3trig p7ap3-theme-01" onClick="P7_AP3controlAll('p7AP3_1','close')">
            <h3><a href="#p7AP3c2_2" id="p7AP3t2_2">Wine Tastings</a></h3>
          </div>
          <div id="p7AP3w2_2" class="p7AP3cwrapper p7ap3-theme-01">
            <div id="p7AP3c2_2" class="p7AP3content p7ap3-theme-01">
              <div id="p7AP3p2_2" class="p7AP3panelcontent p7ap3-theme-01">
                <div class="p7ap3-col-wrapper no-columns">
                  <p>We will post upcoming events as they become available. Please check back!</p>
                </div>
              </div>
            </div>
          </div>
          <div class="p7AP3trig p7ap3-theme-01" onClick="P7_AP3controlAll('p7AP3_1','close')">
            <h3><a href="#p7AP3c2_3" id="p7AP3t2_3">Daily Wine Picks</a></h3>
          </div>
          <div id="p7AP3w2_3" class="p7AP3cwrapper p7ap3-theme-01">
            <div id="p7AP3c2_3" class="p7AP3content p7ap3-theme-01">
              <div id="p7AP3p2_3" class="p7AP3panelcontent p7ap3-theme-01">
                <div class="p7ap3-col-wrapper no-columns">
                  <p>Doug's favorites! </p>
                </div>
              </div>
            </div>
          </div>
          <!--[if lte IE 7]><style>.p7AP3, .p7AP3cwrapper, .p7AP3panelcontent, .p7AP3trig a {zoom: 1;}</style><![endif]-->
          <!--[if IE 5]><style>.p7AP3cwrapper {height: auto !important;}</style><![endif]-->
          <script type="text/javascript">P7_opAP3('p7AP3_2',1,3,0,0,1,0,0,0,1,0,1000,250,1,1);</script>        </div>
   <!-- <div class="offsetbg" id=b2>
          <div class="offsetbox">
            <div class="text-pad">
              <p>in the news<br>
              <a href="#b2">eu, massa. Suspendisse potenti. </a></p>
            </div>
          </div>
        </div> -->
   <div class="offsetbg">
          <div class="offsetbox" id="b3">
            <div class="text-pad">
              <p>Menu <br>
              <a href="#m1">eu, massa. Suspendisse potenti. </a></p>
            </div>
          </div>
        </div>
        <p><a href="#"></a></p>
        
      </div>
    </div>
    <div class="sidebar">
      <div class="content p7ehc-1">
        <h2>Featured Wine</h2>
        <div class="noborder"><a href="#"> <img src="images/3glasses2-bw.png" name="sidewine" width="265" height="427" class="scalable fancy" id="sidewine" onMouseOver="MM_swapImage('sidewine','','images/3glasses2.png',1)" onMouseOut="MM_swapImgRestore()" /></a></div>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Quisque congue </p>
        <h2>Featured Producer</h2>
        <p>&nbsp;</p>
      </div>
    </div>
  </div>
</div>

<div class="footer">
  <p class="copyright">&nbsp;</p>
    <p class="copyright">&copy;2013 <a href="#">Missing Link Wine Company</a></p>
   
</div>
<!-- <script type="text/javascript">stLight.options({publisher: "9b38de72-2c09-4e11-9f2e-16a703036b49", doNotHash: false, doNotCopy: false, hashAddressBar: true});</script>
<script>
var options={ "publisher": "9b38de72-2c09-4e11-9f2e-16a703036b49", "logo": { "visible": true, "url": "http://missinglinkwinecompany.com", "img": "http://missinglinkwinecompany.com/images/logo.png", "height": 15}, "ad": { "visible": false, "openDelay": "5", "closeDelay": "0"}, "livestream": { "domain": "", "type": "sharethis"}, "ticker": { "visible": false, "domain": "", "title": "", "type": "sharethis"}, "facebook": { "visible": true, "profile": "missinglinkwinecompany"}, "fblike": { "visible": true, "url": ""}, "twitter": { "visible": true, "user": "http://twitter.com/missinglinkwinecompany"}, "twfollow": { "visible": true, "url": "http://twitter.com/missinglinkwinecompany"}, "custom": [{ "visible": false, "title": "Custom 1", "url": "", "img": "", "popup": false, "popupCustom": { "width": 300, "height": 250}}, { "visible": false, "title": "Custom 2", "url": "", "img": "", "popup": false, "popupCustom": { "width": 300, "height": 250}}, { "visible": false, "title": "Custom 3", "url": "", "img": "", "popup": false, "popupCustom": { "width": 300, "height": 250}}], "chicklets": { "items": ["facebook", "twitter", "linkedin", "pinterest", "email", "sharethis"]}};
var st_bar_widget = new sharethis.widgets.sharebar(options);
</script>-->

<script type="text/javascript">
$(function() {
	$( "#Button1" ).button({
		label:"Join our community",
		icons:{primary: "ui-icon-heart"}
	}); 
});
</script>
</body>
</html>
