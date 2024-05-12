<?php

include("setup/config.php");

$filename = "listadoDeUsers.xls";

header("Content-Type: application/vnd.ms-excel");

header("Content-Disposition: attachment; filename=".$filename);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Excel</title>
</head>
<body>
<table class="table table-hover">
                        <thead>
                            <tr class="textaling">
                                <th>ID</th>
                                <th>Rut</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Fecha Nacimiento</th>
                                <th>Sexo</th>
                                <th>Mail Usuario</th>
                                <th>Estado</th>

                            </tr>
                        </thead>
                        <?php
                        // TRAEMOS LOS CAMPOS DE LA BASE DE DATOS  
                        $sql = "select * from usuarios";
                        $result = mysqli_query(conectar(), $sql);
                        $con = mysqli_num_rows($result);

                        ?>
                        <tbody>
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
                                        
                                            echo "Activo";
                                        } else {
                                            echo "Inactivo";
                                        }


                                        ?>
                                    </td>
                                    <td>
                                        <p class="<?php echo color($datos['id_tipo']); ?>"><strong><?php echo sabertipo($datos['id_tipo']); ?></strong></p>
                                    </td>

                                </tr>
                            <?php
                                $cont++;
                            }

                            ?>
                        </tbody>
                    </table>
</body>
</html>