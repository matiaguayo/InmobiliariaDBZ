<?php

include("setup/config.php");
session_start();



if (isset($_SESSION['usu'])) {
    switch ($_SESSION['tipo']) {
        case 1:
            $tipo = "SUPER ADMINISTRADOR";
            break;
        case 2:
            $tipo = "PROPIETARIO";
            break;
        case 3:
            $tipo = "VENDEDOR";
            break;
    }

    if(isset($_GET['id']))
    {
        $sql_usu="select * from usuarios where id=".$_GET['id'];
        $result_usu=mysqli_query(conectar(), $sql_usu);
        $datos_usu=mysqli_fetch_array($result_usu);
    }


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>dashboard</title>
        <link rel="stylesheet" href="css/Bootstrap.style.css">
        <link rel="stylesheet" href="css/frm_vendedores.css">
    </head>

    <body>
        <div clas="sesion">
            <div class="card" id="sesion">
                <div class="card-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                        <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5" />
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                    </svg>
                    Bienvenido Usuario
                </div>
                <div class="card-body">Usuario: <?php echo $_SESSION['usu']; ?> <br> <b> <?php echo $tipo; ?></br></div>

                <div class="card-footer"><a href="cerrar.php" class="cerrarsesion">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z" />
                            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
                            </svg>

                        Cerrar Sesión</a>  &nbsp; &nbsp; <a href="dashboard.php" class="cerrarsesion" ><img src="img/icons/VolverAtras.png" width="18px"> Volver Atras</a>
                    </div>
            </div>
        </div>
        <br> 
        <br>
        <div class="menu frm">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Administrador de Vendedores</h4>
                </div>
                <div class="card-body col-auto">
                    <form action="crud_vendedores.php" method="post" name="frm_usu">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" class="form-control space" id="frm_name" name="frm_name" placeholder="Nombre" 
                                    value="<?php if (isset($_GET['id'])){ echo $datos_usu['nombre'];} ?>">
                                    <input type="text" class="form-control space" id="frm_apellido" name="frm_apellido" placeholder="Apellido" value="<?php if (isset($_GET['id'])){ echo $datos_usu['apellido'];} ?>">
                                    <input type="text" class="form-control space" id="frm_rut" name="frm_rut" placeholder="Rut"
                                    value="<?php if (isset($_GET['id'])){ echo $datos_usu['rut'];} ?>">
                                    <?php if (!isset($_GET['id'])){?>
                                    <input type="password" class="form-control space" id="frm_clave" name="frm_clave" placeholder="Clave">
                                    <?php }?>
                                    <span class="form-label">Estado:</span>
                                    <select class="form-control form-control-lg form-control-a space" name="frm_estado" id="estado">
                                        <option value="0" selected> Seleccionar</option>
                                        <option value="1" <?php if (isset($_GET['id'])){ if($datos_usu['estado']==1) {?> selected <?php }}?>>Activo</option>
                                        <option value="2" <?php if (isset($_GET['id'])){ if($datos_usu['estado']==0) {?> selected <?php }}?>>Inactivo</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <input type="date" class="form-control space" id="frm_fecha" name="frm_fecha" placeholder="Fecha Nacimiento" value="<?php if (isset($_GET['id'])){ echo $datos_usu['fechaNacimiento'];} ?>">
                                    <input type="text" class="form-control space" id="frm_sexo" name="frm_sexo" placeholder="Sexo" 
                                    value="<?php if (isset($_GET['id'])){ echo $datos_usu['sexo'];} ?>">
                                    <input type="email" class="form-control space" id="frm_email" name="frm_email" placeholder="Email" 
                                    value="<?php if (isset($_GET['id'])){ echo $datos_usu['mailUsuario'];} ?>">
                                    <?php if (!isset($_GET['id'])){?>
                                    <input type="password" class="form-control space" id="frm_re_clave" name="frm_re_clave" placeholder="Repetir Clave">
                                    <?php }?>
                                    <span class="form-label">Tipo de Usuario:</span>
                                    <select class="form-control form-control-lg form-control-a space" name="frm_id_tipo" id="tdusuario">
                                        <option value="0" selected> Seleccionar</option>
                                        <?php

                                        $sql = "select * from tipo_usuario where estado = 1";
                                        $result = mysqli_query(conectar(), $sql);
                                        while ($datos = mysqli_fetch_array($result)) {
                                        ?>
                                            <option value="<?php echo $datos['id_tipo']; ?>" <?php if (isset($_GET['id'])){ if($datos_usu['id_tipo']==$datos['id_tipo']) {?> selected <?php }}?>><?php echo $datos['tipo']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="col-sm-12 textaling">
                                <?php


                                if (!isset($_GET['id'])) 
                                {
                                ?>
                                    <input type="button" value="Ingresar" onclick="validar(this.value);" class="btn btn-primary boton">
                                <?php


                                } else {
                                ?>
                                    <input type="button" value="Modificar" onclick="validar(this.value);" class="btn btn-success boton">
                                    <input type="button" value="Eliminar" onclick="validar(this.value);" class="btn btn-danger boton">

                                <?php
                                }
                                ?>
                                <input type="button" value="Cancelar" onclick="validar(this.value);" class="btn btn-secondary boton">
                                <input type="hidden" name="accion">
                                <input type="hidden" name="idoculto" value="<?php if(isset($_GET['id'])){ echo $_GET['id'];}?>">

                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <div class="menu tamaño">
            <div class="card">
                <div class="card-header" style="text-align: center;">
                    <h5>Listados de Vendedores</h5>
                </div>
                <div class="card-body">
                    <table class="table table-dark table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Rut</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Fecha Nacimiento</th>
                                <th>Sexo</th>
                                <th>Mail Usuario</th>
                                <th>Estado</th>
                                <th>Tipo de Usuario</th>
                                <th>Accion</th>

                            </tr>
                        </thead>
                        <?php
                        // TRAEMOS LOS CAMPOS DE LA BASE DE DATOS  
                        $sql = "select * from usuarios where id_tipo=3";
                        $result = mysqli_query(conectar(), $sql);
                        $con = mysqli_num_rows($result);

                        ?>
                        <tbody class="textaling">
                            <!-- CREAMOS UN CICLO PARA TRAER LOS DATOS -->
                            <?php
                            $cont = 1;

                            while ($datos = mysqli_fetch_array($result)) {

                            ?>
                                <tr class="textaling">
                                    <td><?php echo $cont; ?></td>
                                    <td><?php echo $datos['rut']; ?></td>
                                    <td><?php echo $datos['nombre']; ?></td>
                                    <td><?php echo $datos['apellido']; ?></td>
                                    <td><?php echo $datos['fechaNacimiento']; ?></td>
                                    <td><?php echo $datos['sexo']; ?></td>
                                    <td><?php echo $datos['mailUsuario']; ?></td>
                                    <td><?php


                                        if ($datos['estado'] == 1) {
                                        ?>
                                            <img src="img/icons/ok.png" alt="">
                                        <?php
                                        } else {
                                        ?>
                                            <a href="crud_vendedores.php?id=<?php echo $datos['id']; ?>&estado=<?php echo $datos['estado']; ?>"><img src="img/icons/x.png" alt=""></a>
                                        <?php
                                        }


                                        ?>
                                    </td>
                                    <td>
                                        <p class="<?php echo color($datos['id_tipo']); ?>"><strong><?php echo sabertipo($datos['id_tipo']); ?></strong></p>
                                    </td>
                                    <td>
                                        <?php
                                        if($_SESSION['tipo']!=$datos['id_tipo'])
                                        {
                                            ?>
                                        <a href="frm_vendedores.php?id=<?php echo $datos['id']; ?>"><img src="img/icons/reload.png" alt="" width="25px"></a> &nbsp; &nbsp; <?php if ($datos['estado'] == 1) { ?>| &nbsp; &nbsp;

                                        <!-- Mandamos datos por href -->
                                        <a href="crud_vendedores.php?id=<?php echo $datos['id'];?>&estado=<?php echo $datos['estado'];?>">
                                            <img src="img/icons/eliminar.png" alt="" width="25px">
                                        </a><?php } ?>
                                        <?php
                                        }
                                        ?>
                                    </td>

                                </tr>
                            <?php
                                $cont++;
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
        <div class="card-footer"><h4> Total de Vendedores (<?php echo $con; ?>)</h4> <hr> <a class="cerrarsesion" href="exportarExcel.php"><h4> Exportar a Excel <img src="img/icons/excel_888900 (1).png" alt="" width="25px"></h4></a></div>
        </div>
        </div>


    </body>
    <script src="js/validabtn.js"></script>

    </html>
<?php
} else {
    header("Location:error.html");
}
?>