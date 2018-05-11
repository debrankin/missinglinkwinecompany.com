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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE `admin` SET `level`=%s WHERE activation=%s",
                       GetSQLValueString($_POST['level'], "int"),
                       GetSQLValueString($_POST['activation'], "text"));

  mysql_select_db($database_clients, $clients);
  $Result1 = mysql_query($updateSQL, $clients) or die(mysql_error());

  $updateGoTo = "../email-user-reg/login.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_rsActivate = "-1";
if (isset($_GET['activation'])) {
  $colname_rsActivate = $_GET['activation'];
}
mysql_select_db($database_clients, $clients);
$query_rsActivate = sprintf("SELECT * FROM `admin` WHERE activation = %s", GetSQLValueString($colname_rsActivate, "text"));
$rsActivate = mysql_query($query_rsActivate, $clients) or die(mysql_error());
$row_rsActivate = mysql_fetch_assoc($rsActivate);
$totalRows_rsActivate = mysql_num_rows($rsActivate);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
</head>

<body>

    <h2>Activate your account</h2>
    <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
      <table align="center">
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Hi <strong><?php echo $row_rsActivate['name']; ?></strong>. Activate your accunt clicking Activate button.</td>
          <td><input type="submit" value="Activate my account" /></td>
        </tr>
      </table>
      <input type="hidden" name="level" value="1" />
      <input type="hidden" name="MM_update" value="form1" />
      <input type="hidden" name="activation" value="<?php echo $row_rsActivate['activation']; ?>" />
    </form>
   
  <div class="footer">  <a href="../email-user-reg/login.php">Login</a> | <a href="../email-user-reg/admin.php">Admin</a> | Log Out</div>
</div>
</body>
</html>
<?php
mysql_free_result($rsActivate);
?>
