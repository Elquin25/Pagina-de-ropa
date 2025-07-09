<?php
$correo = $_POST['email'];
$contraseña = $_POST['password'];

$conexion = mysqli_connect('127.0.0.1','root','','modanova');
$consulta="SELECT id_rol FROM usuarios WHERE correo_usuario ='$correo' AND contraseña_usuario ='$contraseña';";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado);
if($filas > 0) {
    while($filas=$resultado->fetch_array()) {
        $perfil = $filas['id_rol'];
    }
    switch($perfil) {
        case 1:
            echo"<script>alert('Bienvenidos al sistema Administrador');
                  location.href='dashboard.html';
                  </script>";
            break;
        case 2:
            echo"<script>alert('Bienvenido al sistema empleado');
            location.href='index.html';
            </script>";
            break;
        case 3:
            echo"<script>alert('Bienvenido al sistema cliente');
            location.href='index.html';
            </script>";
            break;
        default:
            echo"<script>alert('error de perfil');
            location.href='formato.html';
             </script>";
            break;
    }
} else {
    echo"<script>alert('Nombre de usuario y contraseña incorrectos');
    location.href='iniciosesion.html';
    </script>";
}
?>