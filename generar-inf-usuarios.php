<?php
$conexion=mysqli_connect('127.0.0.1','root','','modanova');
$consulta="SELECT * FROM usuarios;";

header ("content-Type:  application/vnd.ms-excel; charset=iso-8859-1");
header ("content-Disposition: attachment; filename=datos-Usuarios.xls");
?>

<table>

   <caption> Datos de los usuarios</caption>
   <tr>
                <th scope="col">ID</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">CORREO</th>
                <th scope="col">FECHA NAC</th>
                <th scope="col">NUM DOC</th>
                <th scope="col">TELEFONO</th>
                <th scope="col">CIUDAD</th>
                <th scope="col">DIRECCION</th>
                <th scope="col">GENERO</th>
                <th scope="col">METODO PAGO</th>
                <th scope="col">TIPO DOC</th>
                <th scope="col">ROL</th>
   </tr>

   <?php
       $resultado=mysqli_query($conexion, $consulta);
       while ($filas=mysqli_fetch_assoc($resultado))
    {?>

        <tr>
                <td><?php echo $filas['id_usuario']; ?></td>
                <td><?php echo $filas['nombre_usuario']; ?></td>
                <td><?php echo $filas['correo_usuario']; ?></td>
                <td><?php echo $filas['fecha_nacimiento_usuario']; ?></td>
                <td><?php echo $filas['numero_documento_usuario']; ?></td>
                <td><?php echo $filas['telefono_usuario']; ?></td>
                <td><?php echo $filas['ciudad_usuario']; ?></td>
                <td><?php echo $filas['direccion_usuario']; ?></td>
                <td><?php echo $filas['id_genero']; ?></td>
                <td><?php echo $filas['id_metodo_pago']; ?></td>
                <td><?php echo $filas['id_tipo_documento']; ?></td>
                <td><?php echo $filas['id_rol']; ?></td>
        </tr>
       <?php } ?>
</table>