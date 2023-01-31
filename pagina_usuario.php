<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="imagenes/sma.jpg">
    <title>Mis páginas</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body style="background-color: #E7E7E7">

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

    <div class="container">
        <div class="row">
            <div class="col-12">
            <a href="crear_paginas.php" class="btn btn-primary me-3 mt-5 mb-3 text-light" tabindex="-1" role="button" aria-disabled="true">Crear páginas</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="table table-success table-striped mt-3">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Título</th>
                    <th scope="col">Contenido</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Ver página</th>
                    <th scope="col">Borrar</th>
                    </tr>
                </thead>
            </div>
        </div>
    </div>

    <form method="post">

        <?php

        try {

            include("conexion.php");

            $sql = "SELECT ID, TITULO, CONTENIDO FROM paginas WHERE USUARIO = :user";
            $resultado = $BBDD->prepare($sql);

            $resultado->execute(array(":user"=>$_SESSION["user"]));

            if ($resultado->rowCount() == 0) {

                echo "Actualmente no tienes páginas creadas";

            } else {

                echo "<i>Páginas actuales: </i><b>" . $resultado->rowCount() . "</b>";

                while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {

                    ?>

                        <tbody>
                            <tr>
                            <th scope="row"><?php echo $registro["ID"]; ?></th>
                            <td><?php echo $registro["TITULO"]; ?></td>
                            <td><?php echo $registro["CONTENIDO"]; ?></td>
                            <td><a href="modificar_Pagina.php?ID=<?php echo $registro["ID"]; ?>"><button type='button' 
                                class='btn btn-primary'><i class='fa-solid fa-pen-to-square'></i></button></a></td>
                                <td><a href="ver_pagina.php?ID=<?php echo $registro["ID"]; ?>"><button type='button' 
                                class='btn btn-success'><i class='fa-solid fa-eye'></i></button></a></td>
                            <td><a href="borrar_pagina.php?ID=<?php echo $registro["ID"]; ?>"><button type='button' 
                                class='btn btn-danger'><i class='fa-solid fa-trash'></i></button></a></td>
                            </tr>
                        </tbody>

                    <?php
                }
            }

        } catch (Exception $e) {

            die("Error: " . $e->getMessage());

        }

        ?>
    </form>
    </table>

    <div class="container" style="margin-top: 150px;">
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