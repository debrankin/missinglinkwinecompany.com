<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_clients = "localhost";
$database_clients = "debran5_mlw";
$username_clients = "debran5_mlw";
$password_clients = "winelink";
$clients = mysql_pconnect($hostname_clients, $username_clients, $password_clients) or trigger_error(mysql_error(),E_USER_ERROR);
?>