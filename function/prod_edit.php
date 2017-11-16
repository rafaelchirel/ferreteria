<?php

$idproducto    = $_POST['id'];
$desproducto   = $_POST['descproducto'];
$cantproducto  = $_POST['cantproducto'];
$precproducto  = $_POST['precioproducto'];
$categproducto = $_POST['catproducto'];

//Actualizamos el registro
if (!consulta($desproducto)) {
	include 'conexion.php';
    $sql = mysql_query("UPDATE producto SET descproducto = '$desproducto' , cantprod = '$cantproducto', precio = '$precproducto',categoriaid = '$categproducto' WHERE idproducto = '$idproducto'", $con) or die(mysql_error());
    header("Location: ../producto.php?id=2&data=$desproducto");
}else{
	header("Location: ../producto.php");
}

function consulta($prod){
    include 'conexion.php';
	//Realizando la consulta
	$sql = "SELECT * FROM `producto` WHERE `descproducto` = '$prod'";
    $resul = mysql_query($sql, $con);
    if(mysql_num_rows($resul) > 0){return true;}
}
