<?php

$id = $_GET['id_producto'];

$conexion = mysqli_connect('127.0.0.1','root','','modanova');
$consulta = "DELETE FROM inventario WHERE id_producto='$id'";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado) {
    echo "<script>alert('Usuario eliminado exitosamente');
              location.href='inventario.php';
              </script>";
} else {
    echo "<script>alert('Hubo un error al eliminar');
              location.href='inventario.php';
              </script>";
}
?>