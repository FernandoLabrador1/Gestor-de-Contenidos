<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="imagenes/sma.jpg">
    <title>Creár página</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script>
        function negrita() {
            document.getElementById("floatingTextarea").value += "<b> </b>";
        }

        function subrayado() {
            document.getElementById("floatingTextarea").value += "<u> </u>";
        }

        function cursiva() {
            document.getElementById("floatingTextarea").value += "<i> </i>";
        }
    </script>
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

    <form method="post">
        <div class="container my-3">
        <h3 class="mb-5">Crear página</h3>
            <div class="row">

                <div class="col-12">
                    <label class="form-label" for="form3Example3">Título</label>
                    <input type="usuario" id="form3Example3" class="form-control form-control-lg mb-5" placeholder="" name="titulo" />
                    <label for="floatingTextarea" >Contenido</label>
                </div>

                <div class="form-floating my-3">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 150px" name="contenido"></textarea>
                    
                    <center>
                        <button type="button" class="btn btn-dark mt-3" onclick="negrita()">Negrita</button>
                        <button type="button" class="btn btn-light border border-dark mt-3" onclick="subrayado()"><u>Subrayado</u></button>
                        <button type="button" class="btn btn-light border border-dark mt-3" onclick="cursiva()"><i>Cursiva</i></button>
                    </center>

                    <input class="btn btn-primary my-3" type="submit" value="Crear">
                    <a href="pagina_usuario.php" class="btn btn-danger my-3">Cancelar</a>
                </div>
                
            </div>
        </div>
    </form>

    <?php

        try {
            
            if ($_POST) {

                $titulo = $_POST["titulo"];
                $contenido = $_POST["contenido"];
                $user = $_SESSION["user"];

                include("conexion.php");

                $sql = "INSERT INTO paginas (TITULO, CONTENIDO, USUARIO) values(:titulo, :contenido, :user)";
                $resultado = $BBDD->prepare($sql);
                    
                $resultado->execute(array(":titulo"=>$titulo, ":contenido"=>$contenido, ":user"=>$user));

                header("location:pagina_usuario.php");

            }

        } catch (Exception $e) {

            die("Error: " . $e->getMessage());

        }

    ?>

    <div class="container" style="margin-top: 40px;">
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