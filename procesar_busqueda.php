<?php
$conn = mysqli_connect('127.0.0.1', 'root', '', 'modanova');

// procesar_busqueda.php
$palabraClave = $_GET['palabra_clave'];

// Realizar validaciones y limpieza de datos
// Construir consulta SQL base
$sql = "SELECT * FROM tabla WHERE 1=1";

// Agregar filtros según los datos recibidos
if (!empty($palabraClave)) {
    $sql .= " AND columna_palabra_clave LIKE '%$palabraClave%'";
}

// Ejecutar consulta SQL y mostrar resultados
$resultado = mysqli_query($conn, $sql);

while ($fila = mysqli_fetch_assoc($resultado)) {
    // Mostrar resultados en el formato deseado
    echo $fila['columna_nombre'] . '<br>';
}

mysqli_close($conn);
?>