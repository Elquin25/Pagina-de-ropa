<?php
$nombre = $_POST['name'];
$correo = $_POST['email'];
$fecha = $_POST['fecha'];
$tipo_doc = $_POST['tipo_doc'];
$num_doc = $_POST['num_doc'];
$ciudad = $_POST['ciudad'];
$direccion = $_POST['direccion'];
$genero = $_POST['genero'];
$metodo_pago = $_POST['metodo_pago'];
$telefono = $_POST['telefono'];
$contraseña = $_POST['password'];

$conexion = mysqli_connect('127.0.0.1','root','','modanova');
$consulta = "INSERT INTO usuarios (id_usuario, nombre_usuario, correo_usuario, fecha_nacimiento_usuario, numero_documento_usuario, telefono_usuario, contraseña_usuario, ciudad_usuario, direccion_usuario, id_metodo_pago, id_tipo_documento, id_genero, id_rol) VALUES (null, '$nombre', '$correo', '$fecha', '$num_doc', '$telefono', '$contraseña', '$ciudad', '$direccion', '$metodo_pago', '$tipo_doc', '$genero', 3)";

if ($num_doc > 0 && $ciudad > 0 && $genero > 0 && $metodo_pago > 0 && $tipo_doc > 0) {

    if(mysqli_query($conexion, $consulta)) {
        echo "<script>alert('Registro exitoso');
              location.href='index.html';
              </script>";
    } else {
        echo "<script>alert('Error al insertar datos');
              location.href='registro.html';
              </script>";
    }
} else {
    echo "<script>alert('Los campos deben ser rellenados correctamente.');
          location.href='registro.html';
          </script>";
}
?>






