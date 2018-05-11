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

// *** Redirect if username exists
$MM_flag="MM_insert";
if (isset($_POST[$MM_flag])) {
  $MM_dupKeyRedirect="name-error.php";
  $loginUsername = $_POST['username'];
  $LoginRS__query = sprintf("SELECT username FROM clients WHERE username=%s", GetSQLValueString($loginUsername, "text"));
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
  $insertSQL = sprintf("INSERT INTO clients (company, city, `state`, phone, contact_first_name, contact_last_name, email, username, password, url, ID) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['company'], "text"),
                       GetSQLValueString($_POST['city'], "text"),
                       GetSQLValueString($_POST['state'], "text"),
                       GetSQLValueString($_POST['phone'], "text"),
                       GetSQLValueString($_POST['contact_first_name'], "text"),
                       GetSQLValueString($_POST['contact_last_name'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['url'], "text"),
                       GetSQLValueString($_POST['ID'], "int"));

  mysql_select_db($database_clients, $clients);
  $Result1 = mysql_query($insertSQL, $clients) or die(mysql_error());

  $insertGoTo = "thankyou.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?><!doctype html>
<html><!-- InstanceBegin template="/Templates/template.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width">
<!-- InstanceBeginEditable name="doctitle" -->
<title>PVII Affinity CSS/HTML5 Template: Layout 2</title>
<!-- InstanceEndEditable -->
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
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
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
                <li><a href="index.php?panel=2#Accordion1">Calendar of Events</a></li>
                <li><a href="#">Tastings</a></li>
                <li><a href="">Price List</a></li>
                <li><a href="#">Inbound Containers</a></li>
              </ul>
            </div>
          </li>
          <li><a id="p7DMMt1_2" href="about.html">About Us</a>
            <div id="p7DMMs1_2" class="p7dmm-sub-wrapper">
              <ul>
                <li><a href="#">Philosophy</a></li>
                <li><a href="#">HIstory</a></li>
                <li><a href="#">Community Involvement</a></li>
              </ul>
            </div>
          </li>
          <li><a id="p7DMMt1_3" href="#">Customer Service</a></li>
          <li><a id="p7DMMt1_4" href="importers.html">Wine Importers</a>
            <div id="p7DMMs1_4" class="p7dmm-sub-wrapper">
              <ul>
                <li><a href="#">Menu Item</a></li>
                <li><a href="#">Menu Item</a></li>
                <li><a href="#">Menu Item</a></li>
              </ul>
            </div>
          </li>
          <li><a id="p7DMMt1_5" href="winemakers.html">Winemakers</a></li>
          <li><a id="p7DMMt1_6" href="contact.html">Contact Us</a></li>
        </ul>
        <script type="text/javascript">P7_opDMM('p7DMM_1',3,450,0,1,1,1,1,0,1);</script>
      </div>
    </div>
  </div>

<div class="content-wrapper">  <div class="masthead">
  <div class="head-logo">
 <a href="#"><img src="images/mlwc-logo-215w.png" width="264" height="160" alt="missing link wine companhy" class="scalable"/></a>
 
  </div><div class="gs-mast"><script>
  (function() {
    var cx = '002074179271500854031:fdnxpsz-vj0';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//www.google.com/cse/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search></gcse:search></div>
  </div>
  <!-- InstanceBeginEditable name="page-content" -->
  <div class="columns-wrapper">
    <div class="main-content">
      <div class="content p7ehc-1">
        <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Company:</td>
      <td><input type="text" name="company" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">City:</td>
      <td><input type="text" name="city" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">State:</td>
      <td><input type="text" name="state" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Phone:</td>
      <td><input type="text" name="phone" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">First Name:</td>
      <td><input type="text" name="contact_first_name" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Las Name:</td>
      <td><input type="text" name="contact_last_name" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Email:</td>
      <td><input type="text" name="email" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Url:</td>
      <td><input type="text" name="url" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><p>&nbsp;</p>
      <p>&nbsp;</p></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Create <br>
        Username:</td>
      <td><input type="text" name="username" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Create <br>
        Password:</td>
      <td><input type="text" name="password" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
      </div>
    </div>
    <div class="main-content">
      <div class="content p7ehc-1">
        <h2>&nbsp;</h2>
        <p>&nbsp;</p>
      </div>
    </div>
    <div class="sidebar">
      <div class="content p7ehc-1">
        <h2>Monthy Feature?</h2>
        <div class="noborder"><a href="#"> <img src="images/glass-lrg-op.png" name="sidewine" width="265" height="529" class="scalable fancy" id="sidewine" onMouseOver="MM_swapImage('sidewine','','images/redwine-op.png',1)" onMouseOut="MM_swapImgRestore()" /></a></div>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Quisque congue tristique eros. Nulla facilisi. Quisque sem mauris, ullamcorper ac, gravida id, mattis id, sapien. <a href="#">Nullam adipiscing</a> enim dapibus felis. Fusce a nisi in odio pulvinar fringilla. Nunc blandit interdum metus.</p>
      </div>
    </div>
  </div>
  <!-- InstanceEndEditable --></div>

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
<!-- InstanceEnd --></html>
