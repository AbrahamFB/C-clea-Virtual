<?php
$host = "162.241.62.191";
$dbuser = "tecnoso5_master";
$dbpwd = "nKwuIMe#Nj*8";
$db = "tecnoso5_cocleavirtual";

$connect = mysql_connect ($host, $dbuser, $dbpwd);
	if(!$connect)
		echo ("No se ha conectado a la base de datos");
	else
		$select = mysql_select_db ($db);
?>