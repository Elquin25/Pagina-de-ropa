<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
			<input class="form-control me-2" type="search" placeholder="Buscar productos" 
			name="busqueda"> <br>
			<button class="btn btn-outline-info" type="submit" name="enviar">Buscar</button> 
			</form>

            <?php
$conexion=mysqli_connect("localhost","root","","modaNova"); 
$where="";

if(isset($_GET['enviar'])){
  $busqueda = $_GET['busqueda'];


	if (isset($_GET['busqueda']))
	{
		$where="WHERE nombre_producto LIKE'%".$busqueda."%'";
	}
  
}

?>
                            
                            <h1>Inventario</h1>
                            <br>
                            <a href="agregar-inventario.html" class="btn btn-success m-2 mb-2">Agregar</a>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">NOMBRE</th>
                                        <th scope="col">PRECIO</th>
                                        <th scope="col">CANTIDAD</th>
                                        <th scope="col">CATEGORIA</th>
                                        <th scope="col">PROVEEDOR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $conexion = mysqli_connect('127.0.0.1','root','','modanova');
                                    $consulta = "SELECT * FROM inventario $where";
                                    $resultado = mysqli_query($conexion, $consulta);
                                    while ($datos = mysqli_fetch_assoc($resultado)) {
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $datos['id_producto']; ?></th>
                                        <td><?php echo $datos['nombre_producto']; ?></td>
                                        <td><?php echo $datos['precio_producto']; ?></td>
                                        <td><?php echo $datos['cantidad_stock']; ?></td>
                                        <td><?php echo $datos['id_categoria']; ?></td>
                                        <td><?php echo $datos['id_proveedor']; ?></td>
                                        <td>
                                            <a href="modificar-inventario.php?id_producto=<?php echo $datos['id_producto']; ?>"
                                                class="btn btn-small btn-warning" name="edit-usuario">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                            <a onclick="return eliminar()" href="eliminar-inventario.php?id_producto=<?php echo $datos['id_producto']; ?>" class="btn btn-small btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <a href="generar-inf-inventario.php" class="btn btn-info">Generar informe</a>

                </div>
            </main>
        </div>
    </div>





    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/646c794df3.js"></script>
</body>

</html>