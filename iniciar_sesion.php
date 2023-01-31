<?php
      try {

          if(isset($_POST["user"]) && (strlen(trim($_POST["user"])) > 0)) {

            include("conexion.php");

            $sql = "SELECT * FROM USUARIOS WHERE USUARIO = :user";
            $resultado = $BBDD->prepare($sql);

            $usuario = htmlentities(addslashes(trim($_POST["user"])));
            $resultado->bindvalue(":user", $usuario, PDO::PARAM_STR);
            $resultado->execute();

            if($resultado->rowCount() == 1) {  

              $registro = $resultado->fetch(PDO::FETCH_ASSOC);
              $password = htmlentities(addslashes($_POST["password"]));

              if(password_verify($password, $registro["PASSWORD"])) {

                session_start();
                $_SESSION["user"] = $usuario;
                header("location:pagina_usuario.php");

              } else {

                header("location:mensajes/contraseña_incorrecta.php");

              }

            } else {

              header("location:mensajes/usuario_incorrecto.php");
              
            }

          } else {  

           header("location:mensajes/campos_vacios.php");

          }

      } catch (Exception $e) {

        die("Error: " . $e->getMessage());

      }
?>