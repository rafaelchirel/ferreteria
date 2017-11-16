<?php include('function/cat_list.php');?>

    <!-- CABECERA - HEADER -->
    <?php include 'function/header.php'; ?>

    <body>
    <!-- NavBar -->
        <?php include 'function/menu.php'; ?>

        <div class="container">
            <br><br>

            <div class="starter-template">
                <h1>Lista de Categorias</h1>

                <!--este es el modal de ingresar nueva categoria-->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".agregar">Agregar Categoria</button>

                <!-- Notificaciones -->
                <?php include('function/notificacion.php'); ?>

                <p style="margin:-3% 0;"></p>
                
                <!-- Modal Nueva Categoria-->
                <div class = "modal fade agregar" tabindex = "-1" role = "dialog" aria-labelledby = "mySmallModalLabel" aria-hidden = "true">
                    <div class = "modal-dialog modal-sm">
                        <div class = "modal-content">
                            <div class = "starter-template">
                                <h1 style = "font-size: 1em;
                                    font-weight: bold;
                                    " class = "text-uppercase text-center">Registrar Nueva Categoria</h1>
                                <form id = "categoria" name = "categoria" method = "post" action = "function/cat_add.php" onsubmit = "return sorteo(1)">
                                    <label>Descripcion</label>
                                    <div id = "error" class = "error4">
                                        <div class = "form-group">
                                            <input class = "form-control" id = "descripcion" name = "descripcion" type = "text" value = "" maxlength="35" onkeypress = "return soloLetras(event)" onblur = "limpia()" id = "miInput">
                                        </div>
                                    </div>
                                    <div id = "error3" class = "oculto">
                                        <div class = "form-group has-error has-feedback">
                                            <input type = "text" class = "form-control" id = "inputError2" value = "" onclick = "sorteo(2)">
                                            <span class = "glyphicon glyphicon-remove form-control-feedback"></span>
                                        </div>
                                    </div>
                                    <p id = "error2" class = "oculto">ingrese una categoria valida</p>
                                    <div class="text-center">
                                        <input type = "submit" class="btn btn-default" value = "Agregar Categoria">
                                    </div><br>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / Modal Nueva Categoria-->

                <br><br>
                
                <!-- Tabla Listado de Categorias-->
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>DESCRIPCION</th>
                            <th>ACCION</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php  while ($fila=mysql_fetch_array($resultados, MYSQL_ASSOC)) { ?>
                        <tr>
                            <td> <?php echo $fila['descripcionprod']; ?> </td>
                            <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".<?php echo $fila['idcategoria']; ?>">Editar</button>
                            <a href="function/cat_del.php?id=<?php echo $fila['idcategoria']; ?>&cat=<?php echo $fila['descripcionprod']; ?>" class="btn btn-danger" role="button" onclick="return confirmation()">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <!-- / Tabla Listado de Categorias-->

                <!-- Modal Editar Categoria -->
                <?php  while ($fila=mysql_fetch_array($resultado, MYSQL_ASSOC)) { ?>
                    <div class = "modal fade <?php echo $fila['idcategoria']; ?>" tabindex = "-1" role = "dialog" aria-labelledby = "mySmallModalLabel" aria-hidden = "true">
                        <div class = "modal-dialog modal-sm">
                            <div class = "modal-content">

                                <div class = "starter-template">
                                    <h1 style = "font-size: 1em;
                                        font-weight: bold;
                                        " class = "text-uppercase text-center">Editar Categoria</h1>
                                    <form id = "categoriaa" name = "categoriaa" method ="POST" action = "function/cat_edit.php">
                                        <label>Descripcion</label>
                                        <div id = "error99" class = "oculto">
                                            <div class = "form-group">
                                                <input class = "form-control" id = "eid" name = "eid" type = "text" value = "<?php echo $fila['idcategoria']; ?>">
                                            </div>
                                        </div>

                                        <div id = "error5" class = "error4">
                                            <div class = "form-group">
                                                <input class = "form-control" required="" id = "edescripcion" name = "edescripcion" type = "text" value = "<?php echo $fila['descripcionprod']; ?>" maxlength="35" onkeypress = "return soloLetras(event)" onblur = "limpia()" id = "miInput">
                                            </div>
                                        </div>

                                        <div id = "error6" class = "oculto">
                                            <div class = "form-group has-error has-feedback">
                                                <input type = "text" class = "form-control" id = "inputError5" value = "">
                                                <span class = "glyphicon glyphicon-remove form-control-feedback"></span>
                                            </div>
                                        </div>
                                        <p id = "error7" class = "oculto">ingrese una categoria valida</p>
                                        <div class="text-center">
                                            <input type = "submit" class="btn btn-default" name = "categoriaa" id ="categoriaa" value ="Editar Categoria">
                                        </div><br>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div> 
                <?php } ?>
                <!-- / Modal Editar Categoria -->

        <?php include('function/footer.php') ?>

    </body>
</html>
