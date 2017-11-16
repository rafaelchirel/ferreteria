<?php

include 'conexion.php';

//Listado de productos relacionado con categoria
$sql = "SELECT * FROM producto,categoriaprod WHERE producto.categoriaid=categoriaprod.idcategoria";
	//Listado Table
$resultados = mysql_query($sql, $con);
	//Listado Modal Edit
$resultado = mysql_query($sql, $con);

//Listado de Categoria / Select
$getcategoria = "SELECT * FROM categoriaprod";
	//Primer select / Modal agregar
$rescategoria = mysql_query($getcategoria);
	//Primer Select / Modal Editar
$rescategorias = mysql_query($getcategoria);