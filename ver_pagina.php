<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="imagenes/sma.jpg">
    <title>Ver página</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="background-image: #E7E7E7">
    
    <?php
        session_start();

        if(!isset($_SESSION["user"])) {

            header("location:index.html");

        }
    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container">

            <a class="navbar-brand me-2" href="">
            <img
                src="imagenes/sma.jpg"
                height="50"
                alt="SMA logo"
                loading="lazy"
            />
            </a>

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link text-light" href="#" style="font-size: 20px;"><?php echo "<b>Usuario:</b> ". $_SESSION["user"]; ?></a>
                </li>
            </ul>

            <div class="d-flex align-items-center">

                <a href="cerrar_sesion.php" class="btn btn-danger me-3 text-light" tabindex="-1" role="button" aria-disabled="true">Cerrar Sesión</a>

            </div>
        </div>
    </nav>

    <?php

        try {
            
            $codigoPagina = ($_GET["ID"]);

            include("conexion.php");

            $sql = "SELECT TITULO, CONTENIDO FROM paginas WHERE ID = :id AND USUARIO = :user";
            $resultado = $BBDD->prepare($sql);

            $resultado->execute(array(":id"=>$codigoPagina, ":user"=>$_SESSION["user"]));

            if ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {

                $titulo =  $registro["TITULO"];
                $contenido = $registro["CONTENIDO"];

            } else {

                header("location:pagina_usuario.php");

            }

        } catch (Exception $e) {

            die("Error: " . $e->getMessage());

        }

    ?>

    <form method="post">
        <div class="container my-3">
            <div class="row">
                
                <div class="col-12">
                    <?php echo $titulo . "<br>"; ?>
                </div>

                <div class="form-floating my-3">
                    <?php echo $contenido . "<br><br><br><br><br>"; ?>
                    <a href="pagina_usuario.php" class="btn btn-primary my-3 mt-5">Volver atrás</a>
                </div>

            </div>
        </div>
    </form>

    <div class="container" style="margin-top: 80px;">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom border-secondary pb-3 mb-3">
                <li class="nav-item"><a href="crear_paginas.php" class="px-2 text-success">Crear página</a></li>
                <li class="nav-item"><a href="cerrar_sesion.php" class="px-2 text-danger">Cerrar Sesión</a></li>
            </ul>
        <p class="text-center text-dark">© 2023 Fernando Labrador García, Inc</p>
        </footer>
    </div>

</body>
</html>