<?php

$id = $_GET["id_producto"];

$conexion = mysqli_connect('127.0.0.1','root','','modanova');
$consulta = "SELECT * FROM inventario WHERE id_producto=$id";
$resultado = mysqli_query($conexion, $consulta);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ed9e90747e.js" crossorigin="anonymous"></script>
</head>
<body>

<div class="container-fluid row">
    <h4 class="text-center alert alert-secondary">Modificar inventario</h4>
    <form class="col-4 p-3 m-auto" action="modificar_inventario.php" method="post">
    <?php 
    while ($datos = mysqli_fetch_assoc($resultado)) {
    ?>

        <div class="form-floating mb-3">
            <input name="id_producto" type="text" readonly class="form-control" id="floatingInput" placeholder="ID" value="<?= $datos['id_producto']; ?>">
            <label for="floatingInput">ID</label>
        </div>


        <div class="form-floating mb-3">
            <input name="nombre" type="text" class="form-control" id="floatingInput" placeholder="Nombre" value="<?= $datos['nombre_producto']; ?>">
            <label for="floatingInput">Nombre</label>
        </div>

        <div class="form-floating mb-3">
            <input name="precio" type="text" class="form-control" id="floatingEmail" placeholder="precio" value="<?= $datos['precio_producto']; ?>">
            <label for="floating">Precio</label>
        </div>

        <div class="form-floating mb-3">
            <input name="precio" type="text" class="form-control" id="floatingEmail" placeholder="cantidad" value="<?= $datos['cantidad_stock']; ?>">
            <label for="floating">Cantidad</label>
        </div>


        <div class="form-floating mb-3">
    <select name="categoria" class="form-control" type="text" placeholder="Ingrese categoria" title="Ingrese una categoria valida" required>
        <option value="0">Seleccione categoria</option>
        <option value="1" <?php if  ($datos['id_categoria'] == '1') echo 'selected'; ?>>Masculino</option>
        <option value="2" <?php if  ($datos['id_categoria'] == '2') echo 'selected'; ?>>Femenino</option>
        <option value="3" <?php if  ($datos['id_categoria'] == '3') echo 'selected'; ?>>Infantil</option>
        <option value="4" <?php if  ($datos['id_categoria'] == '4') echo 'selected'; ?>>Accesorios</option>
    </select>
</div>

<div class="form-floating mb-3">
    <select name="proveedor" class="form-control" type="text" placeholder="Ingrese el proveedor" title="Ingrese un proveedor valido" required>
        <option value="0">Selecciona proveedor</option>
        <option value="1" <?php if  ($datos['id_proveedor'] == '1') echo 'selected'; ?>>FRANK S.A.S</option>
        <option value="2" <?php if  ($datos['id_proveedor'] == '2') echo 'selected'; ?>>MAMIAN S.A.S</option>
    </select>
</div>
        <button type="submit" class="btn btn-success" name="btn-registrar">Editar usuario</button>
    <?php 
    }
    ?>
    </form>
</div>
  </body>
  </html>