<?php

$id = $_GET["id_usuario"];

$conexion = mysqli_connect('127.0.0.1','root','','modanova');
$consulta = "SELECT * FROM usuarios WHERE id_usuario=$id";
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
    <h4 class="text-center alert alert-secondary">Modificar usuario</h4>
    <form class="col-4 p-3 m-auto" action="modificar_usuario.php" method="post">
    <?php 
    while ($datos = mysqli_fetch_assoc($resultado)) {
    ?>

    <div class="form-floating mb-3">
            <input name="id_usuario" type="text" class="form-control" readonly id="floatingInput" placeholder="ID" value="<?= $datos['id_usuario']; ?>">
            <label for="floatingInput">ID</label>
        </div>

        <div class="form-floating mb-3">
            <input name="nombre" type="text" class="form-control" id="floatingInput" placeholder="Nombre" value="<?= $datos['nombre_usuario']; ?>">
            <label for="floatingInput">Nombre</label>
        </div>

        <div class="form-floating mb-3">
            <input name="correo" type="email" class="form-control" id="floatingEmail" placeholder="Correo" value="<?= $datos['correo_usuario']; ?>">
            <label for="floating">Correo</label>
        </div>

        <div class="form-floating mb-3">
            <input name="fecha-nac" type="date" class="form-control" id="floatingEmail" placeholder="Fecha de Nacimiento" value="<?= $datos['fecha_nacimiento_usuario']; ?>">
            <label for="floating">Fecha de Nacimiento</label>
        </div>

        <div class="form-floating mb-3">
    <select name="tipo-doc" class="form-control" type="text" placeholder="Ingrese su tipo de documento" title="Ingrese un tipo de documento válido." required>
        <option value="0">Selecciona tipo de documento</option>
        <option value="1" <?php if  ($datos['id_tipo_documento'] == '1') echo 'selected'; ?>>Cedula de Ciudadanía</option>
        <option value="2" <?php if  ($datos['id_tipo_documento'] == '2') echo 'selected'; ?>>Tarjeta de Identidad</option>
        <option value="3" <?php if  ($datos['id_tipo_documento'] == '3') echo 'selected'; ?>>Cedula de extranjería</option>
    </select>
</div>

        <div class="form-floating mb-3">
            <input name="num-doc" type="text" class="form-control" id="floatingEmail" value="<?= $datos['numero_documento_usuario']; ?>" placeholder="Numero de documento">
            <label for="floating">Numero Documento</label>
        </div>

        <div class="form-floating mb-3">
            <select name="ciudad" class="form-control" required>
                <option value="0">Selecciona ciudad de residencia</option>
                <option value="Bogota" <?php if ($datos['ciudad_usuario'] == 'Bogota') echo 'selected'; ?>>Bogotá</option>
                <option value="Cali" <?php if ($datos['ciudad_usuario'] == 'Cali') echo 'selected'; ?>>Cali</option>
                <option value="Medellin" <?php if ($datos['ciudad_usuario'] == 'Medellin') echo 'selected'; ?>>Medellin</option>
                <option value="Barranquilla" <?php if ($datos['ciudad_usuario'] == 'Barranquilla') echo 'selected'; ?>>Barranquilla</option>
                <option value="Cartagena" <?php if ($datos['ciudad_usuario'] == 'Cartagena') echo 'selected'; ?>>Cartagena</option>
            </select>
        </div>

        <div class="form-floating mb-3">
            <input name="direccion" type="text" class="form-control" id="floatingEmail" placeholder="Direccion" value="<?= $datos['direccion_usuario']; ?>">
            <label for="floating">Direccion</label>
        </div>

        <div class="form-floating mb-3">
            <select name="genero" class="form-control" required>
                <option value="0">Selecciona tu genero</option>
                <option value="1" <?php if ($datos['id_genero'] == '1') echo 'selected'; ?>>Masculino</option>
                <option value="2" <?php if ($datos['id_genero'] == '2') echo 'selected'; ?>>Femenino</option>
                <option value="3" <?php if ($datos['id_genero'] == '3') echo 'selected'; ?>>No identificado</option>
            </select>
        </div>

        <div class="form-floating mb-3">
            <select name="metodo-pago" class="form-control" required>
                <option value="0">Selecciona tu metodo de pago</option>
                <option value="1" <?php if ($datos['id_metodo_pago'] == '1') echo 'selected'; ?>>Nequi</option>
                <option value="2" <?php if ($datos['id_metodo_pago'] == '2') echo 'selected'; ?>>Bancolombia</option>
                <option value="3" <?php if ($datos['id_metodo_pago'] == '3') echo 'selected'; ?>>PSE</option>
            </select>
        </div>

        <div class="form-floating mb-3">
            <input name="telefono" type="text" class="form-control" id="floatingEmail" placeholder="Telefono" value="<?= $datos['telefono_usuario']; ?>">
            <label for="floating">Telefono</label>
        </div>

        <div class="form-floating mb-3">
            <select name="rol" class="form-control" required>
                <option value="0">Selecciona el rol del usuario</option>
                <option value="1" <?php if ($datos['id_rol'] == '1') echo 'selected'; ?>>Administrador</option>
                <option value="2" <?php if ($datos['id_rol'] == '2') echo 'selected'; ?>>Empleado</option>
                <option value="3" <?php if ($datos['id_rol'] == '3') echo 'selected'; ?>>Cliente</option>
            </select>
        </div>

        <div class="form-floating mb-3">
            <input name="contraseña" type="password" class="form-control" id="floatingInput" placeholder="Contraseña del usuario" value="contraseña_usuario">
            <label for="floatingInput">Contraseña del usuario</label>
        </div>

        <button type="submit" class="btn btn-success" name="btn-registrar">Editar usuario</button>
    <?php 
    }
    ?>
    </form>
</div>
  </body>
  </html>