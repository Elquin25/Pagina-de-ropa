<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/styles.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ed9e90747e.js" crossorigin="anonymous"></script>

</head>
<body>

<div class="container-fluid">
        <div class="row justify-content-center align-content-center">
            <div class="col-8 barra">
            <img src="imagenes/logo-modaNova.png" class="logo-modaNova" alt="logo-modaNova">
            </div>
            <div class="col-4 text-right barra">
                <ul class="navbar-nav mr-auto">
                    <li>
                        <a href="#" class="px-3 text-light perfil dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle user"></i></a>

                        <div class="dropdown-menu" aria-labelledby="navbar-dropdown">
                            <a class="dropdown-item menuperfil cerrar" href="#"><i class="fas fa-sign-out-alt m-1"></i>Salir
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

<div class="container-fluid">
        <div class="row">
            <div class="barra-lateral col-12 col-sm-auto">
                <nav class="menu d-flex d-sm-block justify-content-center flex-wrap">
                    <a href="dashboard.html"><i class="fas fa-home"></i><span>Inicio</span></a>
                    <a href="usuarios.php"><i class="fa-solid fa-users"></i><span>Usuarios</span></a>
                    <a href="inventario.php"><i class="fa-solid fa-cart-shopping"></i><span>Inventario</span></a>
                </nav>
            </div>
            <main class="main col">
                <div class="row justify-content-center align-content-center text-center">

                <script>
  function eliminar(){
    var respuesta=confirm("Estas seguro de eliminar?");
    return respuesta
  }
</script>

<div class="container mt-5">
<form action="" method="GET" class="r-2">
			<input class="form-control me-2" type="search" placeholder="Buscar usuarios" 
			name="busqueda"> <br>
			<button class="btn btn-outline-info" type="submit" name="enviar"> <b>Buscar </b> </button> 
			</form>

  <?php
$conexion=mysqli_connect("localhost","root","","modaNova"); 
$where="";

if(isset($_GET['enviar'])){
  $busqueda = $_GET['busqueda'];


	if (isset($_GET['busqueda']))
	{
		$where="WHERE nombre_usuario LIKE'%".$busqueda."%' OR correo_usuario LIKE'%".$busqueda."%'
    OR numero_documento_usuario LIKE'%".$busqueda."%'";
	}
  
}

?>
    <h1>Usuarios</h1>
    <br>
    <table class="table table-striped">
        <a href="agregar-usuario.html" class="btn btn-success m-2">Agregar</a>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">CORREO</th>
                <th scope="col">FECHA NAC</th>
                <th scope="col">NUM DOC</th>
                <th scope="col">TELEFONO</th>
                <th scope="col">CIUDAD</th>
                <th scope="col">DIRECCION</th>
                <th scope="col">GENERO</th>
                <th scope="col">METODO PAGO</th>
                <th scope="col">TIPO DOC</th>
                <th scope="col">ROL</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $conexion = mysqli_connect('127.0.0.1','root','','modanova');
            $consulta = "SELECT * FROM usuarios $where";
            $resultado = mysqli_query($conexion, $consulta);
            while ($datos = mysqli_fetch_assoc($resultado)) {
            ?>
            <tr>
                <th scope="row"><?php echo $datos['id_usuario']; ?></th>
                <td><?php echo $datos['nombre_usuario']; ?></td>
                <td><?php echo $datos['correo_usuario']; ?></td>
                <td><?php echo $datos['fecha_nacimiento_usuario']; ?></td>
                <td><?php echo $datos['numero_documento_usuario']; ?></td>
                <td><?php echo $datos['telefono_usuario']; ?></td>
                <td><?php echo $datos['ciudad_usuario']; ?></td>
                <td><?php echo $datos['direccion_usuario']; ?></td>
                <td><?php echo $datos['id_genero']; ?></td>
                <td><?php echo $datos['id_metodo_pago']; ?></td>
                <td><?php echo $datos['id_tipo_documento']; ?></td>
                <td><?php echo $datos['id_rol']; ?></td>
                <td>
                    <a href="modificar-usuario.php?id_usuario=<?php echo $datos['id_usuario']; ?>"
                        class="btn btn-small btn-warning" name="edit-usuario">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </a>
                    <a onclick="return eliminar()" href="eliminar-usuario.php?id_usuario=<?php echo $datos['id_usuario']; ?>" class="btn btn-small btn-danger">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="generar-inf-usuarios.php" class="btn btn-info">Generar informe</a>
</div>
</div>

</body>
