<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_admin = "127.0.0.1";
$database_admin = "debran5_mlw";
$username_admin = "debran5_mlw";
$password_admin = "winelink";
$admin = ($GLOBALS["___mysqli_ston"] = mysqli_connect($hostname_admin,  $username_admin,  $password_admin)) or trigger_error(((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)),E_USER_ERROR); 
?>