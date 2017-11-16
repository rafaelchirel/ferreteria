<?php
//Listado de Categorias

include 'conexion.php';

$sql = "SELECT * FROM categoriaprod ORDER BY idcategoria DESC";
$resultados = mysql_query($sql, $con);
$resultado = mysql_query($sql, $con);
mysql_close($con);