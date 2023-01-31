<?php

    try  {

        $BBDD = new PDO("mysql:host=localhost; dbname=sma", "root", "");   
        $BBDD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $BBDD->exec("SET CHARACTER SET utf8");

    } catch (Exception $e) {

        die("Error: " . $e->getMessage());

    }

?>