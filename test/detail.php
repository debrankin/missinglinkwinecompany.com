<?php require_once('Connections/admin.php'); ?><?php
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

$colname_DetailRS1 = "-1";
if (isset($_GET['recordID'])) {
  $colname_DetailRS1 = $_GET['recordID'];
}
mysql_select_db($database_admin, $admin);
$query_DetailRS1 = sprintf("SELECT * FROM producers WHERE id = %s", GetSQLValueString($colname_DetailRS1, "int"));
$DetailRS1 = mysql_query($query_DetailRS1, $admin) or die(mysql_error());
$row_DetailRS1 = mysql_fetch_assoc($DetailRS1);
$totalRows_DetailRS1 = mysql_num_rows($DetailRS1);
?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>

		
<table border="1" align="center">
  
  <tr>
    <td>id</td>
    <td><?php echo $row_DetailRS1['id']; ?> </td>
  </tr>
  <tr>
    <td>producer</td>
    <td><?php echo $row_DetailRS1['producer']; ?> </td>
  </tr>
  <tr>
    <td>state</td>
    <td><?php echo $row_DetailRS1['state']; ?> </td>
  </tr>
  <tr>
    <td>zip</td>
    <td><?php echo $row_DetailRS1['zip']; ?> </td>
  </tr>
  <tr>
    <td>phone</td>
    <td><?php echo $row_DetailRS1['phone']; ?> </td>
  </tr>
  <tr>
    <td>email</td>
    <td><?php echo $row_DetailRS1['email']; ?> </td>
  </tr>
  <tr>
    <td>URL</td>
    <td><?php echo $row_DetailRS1['URL']; ?> </td>
  </tr>
  <tr>
    <td>contact_name</td>
    <td><?php echo $row_DetailRS1['contact_name']; ?> </td>
  </tr>
  <tr>
    <td>description</td>
    <td><?php echo $row_DetailRS1['description']; ?> </td>
  </tr>
  <tr>
    <td>country</td>
    <td><?php echo $row_DetailRS1['country']; ?> </td>
  </tr>
  <tr>
    <td>logo</td>
    <td><?php echo $row_DetailRS1['logo']; ?> </td>
  </tr>
  
  
</table>
</body>
</html><?php
mysql_free_result($DetailRS1);
?>