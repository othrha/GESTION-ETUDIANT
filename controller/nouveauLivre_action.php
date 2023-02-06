<?php
include '../model/livre.php';
//------nouveau Livre--------------


if(isset($_POST['submit'])){
    $code = trim($_POST['code']);
    $titre = trim($_POST['titre']);
    $auteur = trim($_POST['auteur']);
    $date = trim($_POST['date']);
    if(!empty($code) && !empty($titre) && !empty($auteur) && !empty($date)){
        try {
            $livre = new livre($code,$titre,$auteur,$date);
            $res_verify = $livre->check_code_Livre();
            if(empty($res_verify)){
                $add = $livre->addLivre();
                echo $add ? "Vous vous ajouter livre  avec succès" : "la création a échoué";
            }else{
                echo 'cet livre existe déjà';
            }
            
        } catch (PDOException $e) {
            echo 'Erreur:' . $e->getMessage(). $e->getLine();
        } 
    } else {
        echo "Toutes les informations doivent être saisies";
    }
}

