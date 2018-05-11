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
                <li><a href="index.php?apm3=#p7AP3c1_1">What's New</a></li>
                <li><a href="index.php?apm3=#p7AP3c1_2">Calendar of Events</a></li>
                <li><a href="index.php?apm3=#p7AP3c1_3">Price List</a></li>
                <li><a href="index.php?apm3=#p7AP3c2_1">Inbound Containers</a></li>
                <li><a href="index.php?apm3=#p7AP3c2_2">Tastings</a></li>
                <li><a href="index.php?apm3=#p7AP3c2_3">Resources</a></li>
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
 
  </div><div class="gs-mast"><form name="search" method="post" action="searchform1.php">
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
    <div class="main-content" style="width:74%">
      <div class="content p7ehc-1">
        <h2>Search Results</h2>
        <p>&nbsp;</p> 

 <? 
 $field = $_REQUEST['field'];
$searching = $_REQUEST['searching'];
$find = $_REQUEST['find'];
 //This is only displayed if they have submitted the form 
 if ($searching =="yes") 
 { 
 echo "<h2>Results</h2><p>"; 
 
 //If they did not enter a search term we give them an error 
 if ($find == "") 
 { 
 echo "<p>You forgot to enter a search term"; 
 exit; 
 } 
 //Now we search for our search term, in the field the user specified 
 $data = mysql_query("SELECT * FROM sitesearch WHERE upper($field) LIKE'%$find%'"); 
 
 //And we display the results 
 while($result = mysql_fetch_array( $data )) 
 {
 ?>

 <div style="float: left; margin-right: 15px; margin-bottom: 15px; width: 45%; border: solid 1px #000000; padding: 5px; background-color: #F6F6F6; overflow: scroll; height: 150px;">

     <h2> <?php echo $result['producer'];?></h2><br />
    <?php echo $result['wines'];?><br />
      <?php echo $result['type'];?><br />
 </div>
 <?php
 }
 //This counts the number or results - and if there wasn't any it gives them a little message explaining that 
 $anymatches=mysql_num_rows($data); 
 if ($anymatches == 0) 
 { 
 echo "Sorry, but we can not find an entry to match your query<br><br>"; 
 } 
 
 //And we remind them what they searched for 
 echo "<b>Searched For:</b> " .$find; 
 } 
 ?><br clear="all" />
      </div>
    </div>
    <div class="sidebar">
      <div class="content p7ehc-1">
        <h2>Monthy Feature?</h2>
        <a href="#"> <img src="images/glass-lrg-op.png" name="sidewine" width="265" height="529" class="scalable fancy" id="sidewine" onMouseOver="MM_swapImage('sidewine','','images/redwine-op.png',1)" onMouseOut="MM_swapImgRestore()" /></a>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Quisque congue tristique eros. Nulla facilisi. Quisque sem mauris, ullamcorper ac, gravida id, mattis id, sapien. <a href="#">Nullam adipiscing</a> enim dapibus felis. Fusce a nisi in odio pulvinar fringilla. Nunc blandit interdum metus.</p>
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
<?php
mysql_free_result($Recordset1);
?>