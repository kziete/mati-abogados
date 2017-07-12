<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        ?>
        <div>
            Agregar
        </div>
        <div>
            Listar
        </div>
        <div>
            Consultar

        </div>
        <div>
            Eliminar
        </div>
        <div>
            <h4>Listar</h4>
            <div>
                <?php
                include 'class/DaoAtencion.php';
                $dao = new DaoAtencion();
                $resultado = $dao->listar();
                if ($resultado != null) {
                    echo '<table border="1">';
                    echo '<tr>';
                    echo '<td>Id</td>';
                    echo '<td>Estatus</td>';
                    echo '<td>Fecha</td>';
                    echo '<td>Hora</td>';
                    echo '<td>Cliente</td>';
                    echo '<td>Abogado</td>';
                    echo '</tr>';
                    while ($row = mysqli_fetch_array($resultado)) {
                        echo '<tr>';
                        echo '<td>' . $row[0] . '</td>';
                        echo '<td>' . $row[1] . '</td>';
                        echo '<td>' . $row[2] . '</td>';
                        echo '<td>' . $row[3] . '</td>';
                        echo '<td>' . $row[4] . '</td>';
                        echo '<td>' . $row[5] . '</td>';
                        echo '</tr>';
                    }
                }else{
                    echo'<h4>no hay atenciones</h4>';
                }
                ?>
            </div>
        </div>
    </body>
</html>
