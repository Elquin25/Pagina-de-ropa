<?php
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$fecha = $_POST['fecha-nac'];
$tipo_doc = $_POST['tipo-doc'];

$conexion = mysqli_connect('127.0.0.1','root','','modanova');
$consulta = "INSERT INTO usuarios (id_usuario, nombre_usuario, correo_usuario, fecha_nacimiento_usuario, numero_documento_usuario, telefono_usuario, contraseña_usuario, ciudad_usuario, direccion_usuario, id_metodo_pago, id_tipo_documento, id_genero, id_rol) VALUES (null, '$nombre', '$correo', '$fecha', '$num_doc', '$telefono', '$contraseña', '$ciudad', '$direccion', '$metodo_pago', '$tipo_doc', '$genero', '$rol')";


    if(mysqli_query($conexion, $consulta)) {
        echo "<script>alert('Registro exitoso');
              location.href='../';
              </script>";
    } else {
        echo "<script>alert('Error al insertar datos');
              location.href='agregar-usuario.html';
              </script>";}
?>