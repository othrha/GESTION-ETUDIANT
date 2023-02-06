<?php
    include '../model/livre.php';


    //-------modification de livre:-------------



    if(isset($_SESSION['codeM'])){
        $codeM = $_SESSION['codeM'];
    }else{
        header('location: modifierLivre.php');
    }
    if(isset($_POST['modifier'])){
        if(!(empty($_POST['code'])) && !(empty($_POST['titre'])) && !(empty($_POST['auteur'])) && !(empty($_POST['date']))){
            $code=trim($_POST['code']);
            $titre=$_POST['titre'];
            $auteur=$_POST['auteur'];
            $date=$_POST['date'];

            $livre = new livre($code,$titre,$auteur,$date);
            try{
                $res = $livre->modifierLivre($codeM);
                if(empty($res)){
                    echo  "la modification a échoué";
                }else{
                    echo "Vous vous êtes modifier le livre avec succès</h1>";
                    $liv = new livre($code,"","","");
                    $resultat = $liv->check_code_Livre();
                    $_SESSION['codeM'] = $resultat['CodeLivre'];
                    $_SESSION['titreM'] = $resultat['Titre'];
                    $_SESSION['auteurM'] = $resultat['Auteur'];
                    $_SESSION['dateEditionM'] = $resultat['DateEdition'];
                }

            } catch (PDOException $e){
                echo 'Erreur: ' . $e->getMessage();
            }
        }else{
            echo 'Vous devez remplir tous les champs';
        }
    }