<?php

    $varVacia = "";
    $usuario = $_POST["user"];
    $contrasenia = $_POST["password"];

    $pass_cifrado = password_hash($contrasenia, PASSWORD_DEFAULT);

    try {

        include("conexion.php");

        $sql = "SELECT * FROM USUARIOS WHERE USUARIO = :user";
        $resultado = $BBDD->prepare($sql);

        $usuario = htmlentities(addslashes(trim($_POST["user"])));
        $resultado->bindvalue(":user", $usuario, PDO::PARAM_STR);
        $resultado->execute();

        if($resultado->rowCount() == 1) {

            header("location:mensajes/usuario_existe.php");

        } else {

            $sql = "INSERT INTO USUARIOS (USUARIO, PASSWORD) VALUES (:user, :password)";

            $resultado = $BBDD->prepare($sql);
    
    
            $resultado->execute(array(":user"=>$usuario, ":password"=>$pass_cifrado));
    
            header("location:index.html");
    
            $resultado->closeCursor();

        }

    } catch (Exception $e) {

        echo "Línea del error: " . $e->getLine();

    }

?>