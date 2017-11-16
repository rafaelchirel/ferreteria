<?php

include "conexion.php";

$id = $_GET['id'];
$cat = $_GET['cat'];

if (isset($id)) {
    $sql = "DELETE FROM categoriaprod WHERE idcategoria = $id";
    mysql_query($sql, $con);
    header("Location: ../index.php?id=3&data=$cat");
}