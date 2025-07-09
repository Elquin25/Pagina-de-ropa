<?php

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$fecha = $_POST['fecha-nac'];
$tipo_doc = $_POST['tipo-doc'];
$num_doc = $_POST['num-doc'];
$ciudad = $_POST['ciudad'];
$direccion = $_POST['direccion'];
$genero = $_POST['genero'];
$metodo_pago = $_POST['metodo-pago'];
$telefono = $_POST['telefono'];
$contraseña = $_POST['contraseña'];
$rol = $_POST['rol'];

$conexion = mysqli_connect('127.0.0.1','root','','modanova');
$consulta = "UPDATE usuarios SET nombre_usuario='$nombre', correo_usuario='$correo', fecha_nacimiento_usuario='$fecha', id_tipo_documento='$tipo_doc', numero_documento_usuario='$num_doc', ciudad_usuario='$ciudad', direccion_usuario='$direccion', id_genero='$genero', id_metodo_pago='$metodo_pago', telefono_usuario='$telefono', contraseña_usuario='$contraseña', id_rol='$rol'";
$resultado = mysqli_query($conexion, $consulta);

if(mysqli_query($conexion, $consulta)) {
    echo "<script>alert('Usuario actualizado correctamente exitoso');
          location.href='usuarios.php';
          </script>";
} else {
    echo "<script>alert('Error al actualizar al usuario');
          location.href='modificar-usuario.php';
          </script>";
}

?>