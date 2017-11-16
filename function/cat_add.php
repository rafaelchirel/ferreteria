<?php
//Insertando nueva Categoria

$cat = $_POST["descripcion"];

if (!consulta($cat)) {
    include 'conexion.php';
    //Realizamos la insercion en SQL
    $sql = "INSERT INTO categoriaprod (descripcionprod) VALUES ('$cat')";
    mysql_query($sql, $con);
   	header("Location: ../index.php?id=1&data=$cat");
}else{
	header("Location: ../index.php");
}

function consulta($cat){
    include 'conexion.php';
	//Realizando la consulta
	$sql = "SELECT * FROM `categoriaprod` WHERE `descripcionprod` = '$cat'";
    $resul = mysql_query($sql, $con);
    if(mysql_num_rows($resul) > 0){return true;}
}

