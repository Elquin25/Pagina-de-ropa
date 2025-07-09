<?php

$id = $_GET['id_usuario'];

$conexion = mysqli_connect('127.0.0.1','root','','modanova');
$consulta = "DELETE FROM usuarios WHERE id_usuario='$id'";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado) {
    echo "<script>alert('Usuario eliminado exitosamente');
              location.href='usuarios.php';
              </script>";
} else {
    echo "<script>alert('Hubo un error al eliminar');
              location.href='usuarios.php';
              </script>";
}
?>