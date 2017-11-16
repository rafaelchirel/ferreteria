<?php


$descproducto   = $_POST["descproducto"];
$cantproducto   = $_POST["cantproducto"];
$precioproducto = $_POST["precioproducto"];
$catproducto    = $_POST["catproducto"];

if (isset($descproducto) && isset($cantproducto) && isset($precioproducto) && !consulta($descproducto)) {
    //Insertando datos
    include 'conexion.php';
    $sql = "INSERT INTO producto (descproducto,cantprod,precio,categoriaid) VALUES ('$descproducto','$cantproducto','$precioproducto','$catproducto')";
    mysql_query($sql, $con);
    mysql_close($con);
    header("Location: ../producto.php?id=1&data=$data");
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