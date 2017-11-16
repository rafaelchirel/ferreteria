<?php

$id  = $_POST["eid"];
$cat = $_POST['edescripcion'];

if (consulta($id)) {
	include 'conexion.php';
	$sql = "UPDATE `categoriaprod` SET `descripcionprod` = '$cat' WHERE `categoriaprod`.`idcategoria` = $id";
	mysql_query($sql, $con);
	header("Location: ../index.php?id=2&data=$cat");
}else{
	header("Location: ../index.php");
}

function consulta($id){
	include 'conexion.php';
	//Realizando la consulta
	$sql = "SELECT * FROM `categoriaprod` WHERE `idcategoria` = '$id'";
    $resul = mysql_query($sql, $con);
    if(mysql_num_rows($resul) > 0){return true;}
}
