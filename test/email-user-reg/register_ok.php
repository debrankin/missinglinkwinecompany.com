<?php require_once('../Connections/clients.php'); ?>
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

mysql_select_db($database_clients, $clients);
$query_rsOK = "SELECT * FROM `admin` ORDER BY id DESC LIMIT 1";
$rsOK = mysql_query($query_rsOK, $clients) or die(mysql_error());
$row_rsOK = mysql_fetch_assoc($rsOK);
$totalRows_rsOK = mysql_num_rows($rsOK);

$my_activation = $row_rsOK['activation'];
$to = $row_rsOK['email'];
$subject = "Hi ".$row_rsOK['name'];
$body = "<html><body>" .
		"<h2>Thank you for your registration.</h2>" .
		"<p>To active your account, please visit this link</p>".
		"http://missinglinkwinecompany.com/test/email-user-reg/activate.php?activation=".$my_activation."".
		"";
$headers = 	"From: Webmaster <contact@missinglinkwinecompany.com>\r\n" . 
			"MIME-Version: 1.0\r\n" .
			"Content-type: text/html; charset=UTF-8";
			
if (!mail($to, $subject, $body, $headers)) {
	$redirect= "register_error.php";
  header( "Location: ".$redirect ) ;
 } 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>

</head>

<body>

    <h2>Welcome ...</h2>
    <p>Thank you for your registration. An email with activation link of your account has been sent to you.</p>
    <p><a href="../email-user-reg/login.php">Login</a></p>
 
  <div class="footer">  <a href="../email-user-reg/login.php">Login</a> | <a href="../email-user-reg/admin.php">Admin</a> | Log Out</div>
</div>
</body>
</html>
<?php
mysql_free_result($rsOK);
?>
