<?php

    try {

        $codigoPagina = ($_GET["ID"]);

        include("conexion.php");

        $sql = "DELETE  FROM paginas WHERE ID = :id";
        $resultado = $BBDD->prepare($sql);

        $resultado->execute(array(":id"=>$codigoPagina));

        header("location:pagina_usuario.php");

    } catch (Exception $e) {

        die("Error: " . $e->getMessage());

    }

?>