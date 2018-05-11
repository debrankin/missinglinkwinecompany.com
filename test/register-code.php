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
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
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
      <td nowrap align="right">Contact_first_name:</td>
      <td><input type="text" name="contact_first_name" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Contact_last_name:</td>
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
      <td nowrap align="right">Create Username:</td>
      <td><input type="text" name="username" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Create Password:</td>
      <td><input type="text" name="password" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
<p>&nbsp;</p>
</body>
</html>