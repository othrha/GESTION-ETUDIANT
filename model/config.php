<?php
    try{
    $user = 'root';
    $password = '';
    $dns = 'mysql:host=localhost;dbname=biblio;port=3306;charset=utf8';
    $db = new PDO($dns, $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e){
        echo 'Erreur: ' . $e->getMessage();
    }
?>