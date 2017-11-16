<?php

$class     = [1 => 'success', 2 => 'warning', 3 => 'danger'];
$messages  = [1 => 'Registrado', 2 => 'Editado', 3 => 'Eliminado'];
$data      = @ $_GET["data"];
$id        = @ $_GET['id'];

if (isset($id) && isset($data)) {
	echo "<br><br>
	<div class = 'alert alert-$class[$id]'>
	<a href = '#' class = 'close' data-dismiss = 'alert' aria-label = 'close'>&times;
	</a><strong>¡Listo!</strong> Categoria <strong> $data </strong>  ha sido $messages[$id] exitosamente.</div>";
} 
