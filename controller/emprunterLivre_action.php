<?php

include '../model/emprunter.php';


  

if(isset($_POST['submit'])){
    if(isset($_POST['etudiant']) && isset($_POST['livre'])){
        $CodeEtudSelect = $_POST['etudiant'];
        $livre = $_POST['livre'];
        
        $date = date("Y/m/d");

        $emprunter = new emprunter($CodeEtudSelect,$livre,$date);
        $add = $emprunter->addEmprunter();
        echo $add ? "Vous vous ajouter l'emprunter avec succès" :  "la création a échoué";
    }else{
        echo "doit sélectionner l'étudiant et le livre";
    }

}
