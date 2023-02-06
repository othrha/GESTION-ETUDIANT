<?php
    include '../model/etudiant.php';

    if(isset($_POST['submit'])){
        $code = trim($_POST['code']);
        $nom = trim($_POST['nom']);
        $prenom = trim($_POST['prenom']);
        $classe = trim($_POST['classe']);
        $adresse = trim($_POST['adresse']);
        if(!empty($code) && !empty($nom) && !empty($prenom) && !empty($classe) && !empty($adresse)){
            $etudiant = new etudiant($code,$nom,$prenom,$classe,$adresse);
            $verifyCode= $etudiant->check_code_Etud();
            if((empty($verifyCode))){
                $add = $etudiant->addEtudiant();
                echo $add ? "Vous vous ajouter l'etudaint  avec succès" :  "la création a échoué";
            }else{
                echo "cet étudiant existe déjà";
            }
        } else {
            echo "Toutes les informations doivent être saisies";
        }
   }
