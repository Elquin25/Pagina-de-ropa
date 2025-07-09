<?php
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$categoria = $_POST['categoria'];
$proveedor = $_POST['proveedor'];

$conexion = mysqli_connect('127.0.0.1','root','','modanova');
$consulta = "INSERT INTO inventario (id_producto, nombre_producto, precio_producto, id_categoria, id_proveedor) VALUES (null, '$nombre', '$precio', '$categoria', $proveedor)";

if ($categoria > 0 && $proveedor > 0) {

    if(mysqli_query($conexion, $consulta)) {
        echo "<script>alert('Registro exitoso');
              location.href='inventario.php';
              </script>";
    } else {
        echo "<script>alert('Error al insertar datos');
              location.href='agregar-inventario.html';
              </script>";
    }
} else {
    echo "<script>alert('Los campos deben ser rellenados correctamente.');
          location.href='agregar-inventario.html';
          </script>";
}
?>