<?php
//Listado de producto
include 'function/prod_list.php';
?>
    <!-- CABECERA - HEADER -->
    <?php include './function/header.php'; ?>
    
    <body>
    <!-- NavBar--> 
     <?php include './function/menu.php'; ?>

        <div class="container">
            <br><br>
            <div class="starter-template">
                <h1>Lista de Producto</h1>

                <!--  Modal Registrar Producto -->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target=".agregar">Agregar producto</button>
                <div class = "modal fade agregar" tabindex = "-1" role = "dialog" aria-labelledby = "mySmallModalLabel" aria-hidden = "true">
                    <div class = "modal-dialog modal-sm">
                        <div class = "modal-content">
                            <div class = "starter-template">
                                <h1 style = "font-size: 1em;
                                    font-weight: bold;
                                    " class = "text-uppercase text-center">ingrese un nuevo producto</h1>
                                <form id = "categoria" name = "categoria" method = "POST" action = "function/prod_add.php">
                                    <label>DESCRIPCION</label>
                                    <div id = "descripcion1" class = "error4">
                                        <div class = "form-group">
                                            <input class = "form-control" id = "descproducto" name = "descproducto" required="" type = "text" value = "" maxlength="35" onkeypress = "return soloLetras(event)" onblur = "limpia()" id = "miInput">
                                        </div>
                                    </div>
                                    <label>STOCK</label>
                                    <div id = "stock1" class = "error4">
                                        <div class = "form-group">
                                            <input class = "form-control" id = "cantproducto" name = "cantproducto" required="" type = "text" value = "" maxlength="3" onkeypress = "return solonum()">
                                        </div>
                                    </div>
                                    <label>PRECIO</label>
                                    <div id = "precio1" class = "error4">
                                        <div class = "form-group">
                                            <input class = "form-control" id = "precioproducto" name = "precioproducto" required="" type = "text" value = "" maxlength="10" onkeypress = "return solonum()">
                                        </div>
                                    </div>
                                    <label class="text-uppercase">Categoria del producto</label><br>
                                    <?php
                                    echo "<select name='catproducto'";
                                    echo "<option value=''></option>";
                                    while ($fila = mysql_fetch_array($rescategoria)) {
                                        echo "<option value='" . $fila['idcategoria'] . "'>" . $fila['descripcionprod'] . "</option>";
                                    }
                                    echo "</select><br><br>";
                                    ?>
                                    <div class="text-center">
                                        <input type = "submit" class="btn btn-default text-center" name = "producto" id = "producto" value = "Agregar producto" onclick="separador(1)">
                                    </div><br>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  / Modal Registrar Producto -->

                <?php include('function/notificacion.php') ?>

                <!-- Table Listado de productos -->
                <table class="table table-hover">
                    <tr>
                        <td><b>DESCRIPCION</b></td>
                        <td><b>STOCK</b></td>
                        <td><b>PRECIO</b></td>
                        <td><b>CATEGORIA</b></td>
                        <td><b>ACCION</b></td>
                    </tr>
                    <tr>
                    <tr>
                        <?php while ($fila = mysql_fetch_array($resultado, MYSQL_ASSOC)) { ?>
                                <td> <?php echo $fila['descproducto']; ?> </td>
                                <td> <?php echo $fila['cantprod']; ?> </td>
                                <td><?php echo $fila['precio']; ?></td>
                                <td> <?php echo $fila['descripcionprod']; ?> </td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".<?php echo $fila['idproducto']; ?>">Editar</button>
                                    <a href="function/prod_del.php?id=<?php echo $fila['idproducto']; ?>&prod=<?php echo $fila['descproducto']; ?>" class="btn btn-danger" role="button" onclick="return confirmation()">Eliminar</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tr>
                </table>
                <!-- / Table Listado de productos-->

                <!-- Modal Editar Producto-->
                <?php while ($fila = mysql_fetch_array($resultados, MYSQL_ASSOC)) { ?>
                    <div class = "modal fade <?php echo $fila['idproducto']; ?>" tabindex = "-1" role = "dialog" aria-labelledby = "mySmallModalLabel" aria-hidden = "true">
                        <div class = "modal-dialog modal-sm">
                            <div class = "modal-content">

                                <div class = "starter-template">
                                    <h1 style = "font-size: 1em;
                                        font-weight: bold;
                                        " class = "text-uppercase text-center">Editar producto</h1>

                                    <form id = "fproducto" name = "fproducto" method = "post" action = "function/prod_edit.php">

                                        <div class="oculto">
                                            <label>ID</label>
                                            <div id = "id1" class = "error4">
                                                <div class = "form-group">
                                                    <input class = "form-control" id = "id" name = "id" type = "text" value = "<?php echo $fila['idproducto']; ?>" maxlength="35" onkeypress = "return soloLetras(event)" onblur = "limpia()" id = "miInput">
                                                </div>
                                            </div></div>

                                        <label>DESCRIPCION</label>
                                        <div id = "descripcion1" class = "error4">
                                            <div class = "form-group">
                                                <input class = "form-control" id = "descproductos[<?php echo $fila['idproducto']; ?>]" name = "descproducto" required="" type = "text" value = "<?php echo $fila['descproducto']; ?>" maxlength="35" onkeypress = "return soloLetras(event)" onblur = "limpia()" id = "miInput">
                                            </div>
                                        </div>

                                        <label>STOCK</label>
                                        <div id = "stock1" class = "error4">
                                            <div class = "form-group">
                                                <input class = "form-control" id = "cantproductos[<?php echo $fila['idproducto']; ?>]" name = "cantproducto" required="" type = "text" value = "<?php echo $fila['cantprod']; ?>" maxlength="3" onkeypress = "return solonum()">
                                            </div>
                                        </div>

                                        <label>PRECIO</label>
                                        <div id = "precio1" class = "error4">
                                            <div class = "form-group">
                                                <input class = "form-control" id = "precioproductos[<?php echo $fila['idproducto']; ?>]" name = "precioproducto" required="" type = "text" value = "<?php echo $fila['precio']; ?>" maxlength="10" onclick="return blanco(<?php echo $fila['idproducto']; ?>)" onkeypress = "return solonum()">
                                            </div>
                                        </div>
                                        <div class="oculto">
                                            <label>ORIGINAL/label>
                                                <div>
                                                    <div class = "form-group">
                                                        <input class = "form-control" id = "original[<?php echo $fila['idproducto']; ?>]" name = "original" type = "text" value = "<?php echo $fila['precio']; ?>">
                                                    </div>
                                                </div>
                                        </div>

                                        <label class="text-uppercase">Listado de Categorias</label><br>
                                        <?php
                                            echo "<select name='catproducto'<option value=''></option>";
                                            while ($filas = mysql_fetch_array($rescategorias, MYSQL_ASSOC)) {
                                                echo "<option value='" . $filas['idcategoria'] . "'>" . $filas['descripcionprod'] . "</option>";
                                            }
                                            echo "</select><br><br>";
                                        ?>
                                        <div class="text-center">
                                            <input type = "submit" class="btn btn-default" name = "actualizar" id = "actualizar" value = "Editar producto" onclick="separadorr(<?php echo $fila['idproducto']; ?>)">
                                        </div><br>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                 <?php } ?>
                <!-- / Modal Editar Producto-->
            </div>
        </div>

        <?php include('function/footer.php') ?>

             <script>
                function blanco(z) {
                    document.getElementById("precioproductos[" + z + "]").value = "";
                }
                function separadorr(z) {
                    var b  = document.getElementById("descproductos[" + z + "]").value;
                    var b1 = document.getElementById("cantproductos[" + z + "]").value;
                    var b2 = document.getElementById("precioproductos[" + z + "]").value;
                    var o  = document.getElementById("original[" + z + "]").value;

                    if (b == null || b.length == 0 || b == "" || b1 == null || b1.length == 0 || b1 == "" || b2 == null || b2.length == 0 || b2 == "") {
                        document.getElementById("precioproductos[" + z + "]").value = "";
                    } else if (b2 == o) {

                    } else {
                        document.getElementById("precioproductos[" + z + "]").value = formatNumber.new(b2, "BsF ");
                    }
                }
            </script>
    </body>
</html>
