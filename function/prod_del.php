<?php

include "conexion.php";

$prod = $_GET['prod'];
$id   = $_GET['id'];

if (isset($id)) {
    $sql = "DELETE FROM producto WHERE idproducto = $id";
    $res = mysql_query($sql, $con);
    header("Location: ../producto.php?id=3&data=$prod");
}