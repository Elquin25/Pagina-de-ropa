<?php
$conexion=mysqli_connect('127.0.0.1','root','','modanova');
$consulta="SELECT * FROM inventario;";

header ("content-Type:  application/vnd.ms-excel; charset=iso-8859-1");
header ("content-Disposition: attachment; filename=datos-Inventario.xls");
?>

<table>

   <caption> Datos de los productos</caption>
   <tr>
        <th>ID PRODUCTO</th>
        <th>NOMBRE PRODUCTO</th>
        <th>PRECIO PRODUCTO</th>
        <th>CATEGORIA PRODUCTO</th>
        <th>PROVEEDOR PRODUCTO</th>
   </tr>

   <?php
       $resultado=mysqli_query($conexion, $consulta);
       while ($filas=mysqli_fetch_assoc($resultado))
    {?>

        <tr>
            <td><?php echo $filas["id_producto"]; ?></td>
            <td><?php echo $filas["nombre_producto"]; ?></td>
            <td><?php echo $filas["precio_producto"]; ?></td>
            <td><?php echo $filas["id_categoria"]; ?></td>
            <td><?php echo $filas["id_proveedor"]; ?></td>
        </tr>
       <?php } ?>
</table>