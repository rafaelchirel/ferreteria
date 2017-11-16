<?php

$con = mysql_connect('localhost', 'root');
	if (!$con) {
	    die('No es posible conectar con la BDD' . mysql_error());
	}
$db_selected = mysql_select_db("ferreteria", $con);
