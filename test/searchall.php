<?php include("Connections/admin.php"); ?>
 <?php
if ($_REQUEST["string"]<>'') {
	$search_string = " AND (wine LIKE '%".mysql_real_escape_string($_REQUEST["string"])."%' OR producer LIKE '%".mysql_real_escape_string($_REQUEST["string"])."%')";	
}

?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
</head>

<body><div class="masthead"><div class="gs-mast"><form>
  <p>
    <input type="text" name="string" id="string" value="<?php echo stripcslashes($_REQUEST["string"]); ?>" />
    <input type="submit" name="button" id="button" value="Filter" />
  </p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="780">
    <tr>
    <td><?php echo $row["wines"]; ?></td>
    <td><?php echo $row["producer"]; ?></td>
    <td><?php echo $row["type"]; ?></td>
    <td><?php echo $row["description"]; ?></td>
    <td><?php echo $row["code"]; ?></td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp; </p>
</form>
 

</body>
</html>