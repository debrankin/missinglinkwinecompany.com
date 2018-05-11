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
  $MM_redirectLoginSuccess = "admin.php";
  $MM_redirectLoginFailed = "login.php";
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
<meta name="viewport" content="width=device-width">
<title>Missing Link Wine Company</title>
<script type="text/javascript" src="p7ehc/p7EHCscripts.js"></script>
<link href="p7dmm/p7DMM01.css" rel="stylesheet" type="text/css" media="all">
<script type="text/javascript" src="p7dmm/p7DMMscripts.js"></script>
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
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/sofia:n4:default;unkempt:n4:default;tangerine:n4:default.js" type="text/javascript"></script>
</head>

<body onLoad="MM_preloadImages('images/redwine.png','images/redwine-op.png')">
  <div class="top-navigation">
    <div class="menu-top-wrapper">
      <div id="p7DMM_1" class="p7DMM01 p7DMM p7dmm-centered responsive">
        <div id="p7DMMtb_1" class="p7DMM-toolbar closed"><a href="#" title="Hide/Show Menu"><img src="p7dmm/img/toggle-icon.png" alt="Toggle Menu"></a></div>
        <ul id="p7DMMu_1" class="p7DMM01-menu closed">
          <li><a id="p7DMMt1_1" href="index.php">Home</a>
            <div id="p7DMMs1_1" class="p7dmm-sub-wrapper">
              <ul>
                <li><a href="#" onClick="P7_AP3control('p7AP3t1_1','open');P7_AP3controlAll('p7AP3_2','close')">What's New</a></li>
                <li><a href="#" onClick="P7_AP3control('p7AP3t1_2','open');P7_AP3controlAll('p7AP3_2','close')">Calendar of Events</a></li>
                <li><a href="#" onClick="P7_AP3control('p7AP3t1_3','open');P7_AP3controlAll('p7AP3_2','close')">Price List</a></li>
                <li><a href="#" onClick="P7_AP3control('p7AP3t2_1','trigger');P7_AP3controlAll('p7AP3_1','close')">Inbound Containers</a></li>
                <li><a href="#" onClick="P7_AP3control('p7AP3t2_2','trigger');P7_AP3controlAll('p7AP3_1','close')">Tastings</a></li>
                <li><a href="#" onClick="P7_AP3control('p7AP3t2_3','trigger');P7_AP3controlAll('p7AP3_1','close')">Resources</a></li>
              </ul>
            </div>
          </li>
          <li><a id="p7DMMt1_2" href="about.php">About Us</a>
            <div id="p7DMMs1_2" class="p7dmm-sub-wrapper">
              <ul>
                <li><a href="#">Philosophy</a></li>
                <li><a href="#">HIstory</a></li>
                <li><a href="#">Community Involvement</a></li>
              </ul>
            </div>
          </li>
          <li><a id="p7DMMt1_3" href="wines.php">Wines</a>
            <div id="p7DMMs1_3" class="p7dmm-sub-wrapper">
              <ul>
                <li><a href="#">Location</a></li>
                <li><a href="#">Color</a></li>
              </ul>
            </div>
          </li>
          <li><a id="p7DMMt1_4" href="producers.php">Producers</a>
            <div id="p7DMMs1_4" class="p7dmm-sub-wrapper">
              <ul>
                <li><a href="#">Location</a></li>
                <li><a href="#">Color</a></li>
              </ul>
            </div>
          </li>
          <li><a id="p7DMMt1_5" href="#">Customer Service</a></li>
          <li><a id="p7DMMt1_6" href="contact.php">Contact Us</a></li>
        </ul>
        <script type="text/javascript">P7_opDMM('p7DMM_1',3,450,0,1,1,1,1,0,1);</script>
      </div>
    </div>
  </div>

<div class="content-wrapper">  <div class="masthead">
  <div class="head-logo">
 <a href="#"><img src="images/mlwc-logo-215w.png" width="264" height="160" alt="missing link wine companhy" class="scalable"/></a>
 
  </div><div class="gs-mast"><form name="search" method="post" action="searchform.php">
 Search for: 
     <input type="text" name="find" /> in 
 <Select NAME="field">
 <Option VALUE="wines">Wines</option>
 <Option VALUE="producer">Producer</option>
 <Option VALUE="type">Color</option>
 <Option VALUE="country">Country</option>
 </Select>
 <input type="hidden" name="searching" value="yes" />
 <input type="submit" name="search" value="Search" />
 </form></div>
  </div>
<div class="columns-wrapper">
    <div class="main-content">
      <div class="content p7ehc-1">
        <div id="p7AP3_1" class="p7AP3-01 p7AP3">
          <div class="p7AP3trig p7ap3-theme-01">
            <h3><a href="#p7AP3c1_1" id="p7AP3t1_1">What's New</a></h3>
          </div>
          <div id="p7AP3w1_1" class="p7AP3cwrapper p7ap3-theme-01">
            <div id="p7AP3c1_1" class="p7AP3content p7ap3-theme-01">
              <div id="p7AP3p1_1" class="p7AP3panelcontent p7ap3-theme-01">
                <div class="p7ap3-col-wrapper no-columns">
                  <p>Retailers and restaurants want to see on home page:</p>
                  <p>-What's new: inbound containers, tastings, price list<br>
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
          <div class="p7AP3trig p7ap3-theme-01">
            <h3><a href="#p7AP3c1_2" id="p7AP3t1_2">Calendar of Events</a></h3>
          </div>
          <div id="p7AP3w1_2" class="p7AP3cwrapper p7ap3-theme-01">
            <div id="p7AP3c1_2" class="p7AP3content p7ap3-theme-01">
              <div id="p7AP3p1_2" class="p7AP3panelcontent p7ap3-theme-01">
                <div class="p7ap3-col-wrapper no-columns">
                  <p>felis. Fusce a nisi in odio pulvinar fringilla. Nunc blandit interdum metus. Duis leo nunc, sollicitudin ut, fermentum congue, pharetra eu, massa. Suspendisse pBlack &amp; White Layout<br>
                    Full Screen<br>
                    Responsive<br>
                    Gray scale and color rollovers<br>
                    Zachary Barowitz and ultranoir websites </p>
                  <div class="dot4">::</div>
                </div>
              </div>
            </div>
          </div>
          <div class="p7AP3trig p7ap3-theme-01">
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
                      <input type="text" name="username" id="username" />
                    </p>
                    <p>
                      <label for="password">Password:</label>
                      <input type="password" name="password" id="password" />
                    </p>
                    <p>
                      <input type="submit" name="submit" id="submit" value="Submit" />
                      <input type="reset" name="submit2" id="submit2" value="Reset" />
                    </p>
                  </form>
                  New users register here:
                  <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
                    <table align="center" width="98%">
                      <tr valign="baseline">
                        <td nowrap="nowrap" align="right">Name:</td>
                        <td><input type="text" name="name" value="" size="18" /></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap="nowrap" align="right">Email:</td>
                        <td><input type="text" name="email" value="" size="18" /></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap="nowrap" align="right">Username:</td>
                        <td><input type="text" name="username" value="" size="18" /></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap="nowrap" align="right">Password:</td>
                        <td><input type="password" name="password" value="" size="18" /></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap="nowrap" align="right">&nbsp;</td>
                        <td><input type="submit" value="Insert record" /></td>
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
          </div>
          <!--[if lte IE 7]><style>.p7AP3, .p7AP3cwrapper, .p7AP3panelcontent, .p7AP3trig a {zoom: 1;}</style><![endif]-->
          <!--[if IE 5]><style>.p7AP3cwrapper {height: auto !important;}</style><![endif]-->
          <script type="text/javascript">P7_opAP3('p7AP3_1',1,1,0,0,1,0,0,0,1,0,1000,250,1,1);</script>
        </div>
      </div>
    </div>
    <div class="main-content">
      <div class="content p7ehc-1">
        <div id="p7AP3_2" class="p7AP3-01 p7AP3">
          <div class="p7AP3trig p7ap3-theme-01">
            <h3><a href="#p7AP3c2_1" id="p7AP3t2_1">Inbound Containers</a></h3>
          </div>
          <div id="p7AP3w2_1" class="p7AP3cwrapper p7ap3-theme-01">
            <div id="p7AP3c2_1" class="p7AP3content p7ap3-theme-01">
              <div id="p7AP3p2_1" class="p7AP3panelcontent p7ap3-theme-01">
                <div class="p7ap3-col-wrapper no-columns">
                  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Quisque congue tristique eros. Nulla facilisi. Quisque sem mauris, ullamcorper ac, gravida id, mattis id, sapien. Nullam adipiscing enim dapibus felis. Fusce a nisi in odio pulvinar fringilla. Nunc blandit interdum metus. Duis leo nunc, sollicitudin ut, fermentum congue, pharetra eu, massa. Suspendisse potenti. Morbi commodo mauris. Ut at pede. Ut id nisi. Donec scelerisque urna quis ligula. Praesent est. Vestibulum scelerisque. Curabitur quam. Fusce rhoncus pellentesque ipsum. Aenean venenatis metus ac quam. Maecenas lacus lacus, sagittis vitae, congue at, euismod eu, urna. Maecenas vitae purus. Praesent eros lectus, porta et, semper nec, molestie eget, tortor.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="p7AP3trig p7ap3-theme-01">
            <h3><a href="#p7AP3c2_2" id="p7AP3t2_2">Wine Tastings</a></h3>
          </div>
          <div id="p7AP3w2_2" class="p7AP3cwrapper p7ap3-theme-01">
            <div id="p7AP3c2_2" class="p7AP3content p7ap3-theme-01">
              <div id="p7AP3p2_2" class="p7AP3panelcontent p7ap3-theme-01">
                <div class="p7ap3-col-wrapper no-columns">
                  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Quisque congue tristique eros. Nulla facilisi. Quisque sem mauris, ullamcorper ac, gravida id, mattis id, sapien. Nullam adipiscing enim dapibus felis. Fusce a nisi in odio pulvinar fringilla. Nunc blandit interdum metus. Duis leo nunc, sollicitudin ut, fermentum congue, pharetra eu, massa. Suspendisse potenti. Morbi commodo mauris. Ut at pede. Ut id nisi. Donec scelerisque urna quis ligula. Praesent est. Vestibulum scelerisque. Curabitur quam. Fusce rhoncus pellentesque ipsum. Aenean venenatis metus ac quam. Maecenas lacus lacus, sagittis vitae, congue at, euismod eu, urna. Maecenas vitae purus. Praesent eros lectus, porta et, semper nec, molestie eget, tortor.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="p7AP3trig p7ap3-theme-01">
            <h3><a href="#p7AP3c2_3" id="p7AP3t2_3">Resources</a></h3>
          </div>
          <div id="p7AP3w2_3" class="p7AP3cwrapper p7ap3-theme-01">
            <div id="p7AP3c2_3" class="p7AP3content p7ap3-theme-01">
              <div id="p7AP3p2_3" class="p7AP3panelcontent p7ap3-theme-01">
                <div class="p7ap3-col-wrapper no-columns">
                  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Quisque congue tristique eros. Nulla facilisi. Quisque sem mauris, ullamcorper ac, gravida id, mattis id, sapien. Nullam adipiscing enim dapibus felis. Fusce a nisi in odio pulvinar fringilla. Nunc blandit interdum metus. Duis leo nunc, sollicitudin ut, fermentum congue, pharetra eu, massa. Suspendisse potenti. Morbi commodo mauris. Ut at pede. Ut id nisi. Donec scelerisque urna quis ligula. Praesent est. Vestibulum scelerisque. Curabitur quam. Fusce rhoncus pellentesque ipsum. Aenean venenatis metus ac quam. Maecenas lacus lacus, sagittis vitae, congue at, euismod eu, urna. Maecenas vitae purus. Praesent eros lectus, porta et, semper nec, molestie eget, tortor.</p>
                </div>
              </div>
            </div>
          </div>
          <!--[if lte IE 7]><style>.p7AP3, .p7AP3cwrapper, .p7AP3panelcontent, .p7AP3trig a {zoom: 1;}</style><![endif]-->
          <!--[if IE 5]><style>.p7AP3cwrapper {height: auto !important;}</style><![endif]-->
          <script type="text/javascript">P7_opAP3('p7AP3_2',1,2,0,0,1,0,0,0,1,0,1000,250,1,1);</script>
        </div>
<p>&nbsp;</p>
        <p>&nbsp;</p>
        <div class="offsetbg">
          <div class="offsetbox">
            <div class="text-pad">
              <p>Menu <br>
                <a href="#">eu, massa. Suspendisse potenti. Morbi </a><br>
                Home - up to date info/news/facebook feed<br>
                About Contact<br>
                Wine importers Winemakers</p>
            </div>
          </div>
        </div>
        <p><a href="#"></a></p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      </div>
    </div>
    <div class="sidebar">
      <div class="content p7ehc-1">
        <h2>Feature Wine</h2>
        <div class="noborder"><a href="#"> <img src="images/glass-lrg-op.png" name="sidewine" width="265" height="529" class="scalable fancy" id="sidewine" onMouseOver="MM_swapImage('sidewine','','images/redwine-op.png',1)" onMouseOut="MM_swapImgRestore()" /></a></div>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Quisque congue </p>
        <h2>Feature Producer</h2>
      </div>
    </div>
  </div>
</div>

<div class="footer">
  <p class="copyright">&nbsp;</p>
    <p class="copyright">&copy;2013 <a href="#">Missing Link Wine Company</a></p>
   
  </div>
 <script type="text/javascript">stLight.options({publisher: "9b38de72-2c09-4e11-9f2e-16a703036b49", doNotHash: false, doNotCopy: false, hashAddressBar: true});</script>
<script>
var options={ "publisher": "9b38de72-2c09-4e11-9f2e-16a703036b49", "logo": { "visible": true, "url": "http://missinglinkwinecompany.com", "img": "http://missinglinkwinecompany.com/images/logo.png", "height": 15}, "ad": { "visible": false, "openDelay": "5", "closeDelay": "0"}, "livestream": { "domain": "", "type": "sharethis"}, "ticker": { "visible": false, "domain": "", "title": "", "type": "sharethis"}, "facebook": { "visible": true, "profile": "missinglinkwinecompany"}, "fblike": { "visible": true, "url": ""}, "twitter": { "visible": true, "user": "http://twitter.com/missinglinkwinecompany"}, "twfollow": { "visible": true, "url": "http://twitter.com/missinglinkwinecompany"}, "custom": [{ "visible": false, "title": "Custom 1", "url": "", "img": "", "popup": false, "popupCustom": { "width": 300, "height": 250}}, { "visible": false, "title": "Custom 2", "url": "", "img": "", "popup": false, "popupCustom": { "width": 300, "height": 250}}, { "visible": false, "title": "Custom 3", "url": "", "img": "", "popup": false, "popupCustom": { "width": 300, "height": 250}}], "chicklets": { "items": ["facebook", "twitter", "linkedin", "pinterest", "email", "sharethis"]}};
var st_bar_widget = new sharethis.widgets.sharebar(options);
</script>
</body>
</html>
