<?php
include '../model/etudiant.php';
//-------modification d’unétudiant:-------------



if(isset($_SESSION['codeM'])){
    $codeM = $_SESSION['codeM'];
}else{
    header('location: modifierEud.php');
}

if(isset($_POST['modifier'])){
     if(!(empty($_POST['code'])) && !(empty($_POST['nom'])) && !(empty($_POST['prenom'])) && !(empty($_POST['classe'])) && !(empty($_POST['adresse']))){
            $code=trim($_POST['code']);
            $nom=$_POST['nom'];
            $prenom=$_POST['prenom'];
            $classe=$_POST['classe'];
            $adresse=$_POST['adresse'];
            
            $etudiant = new etudiant($code,$nom,$prenom,$classe,$adresse);
            try{
                
                $res = $etudiant->modifierEtud($codeM);
                if(empty($res)){
                    echo "la modification a échoué";
                }else{
                    echo "Vous vous êtes modifier l'etudiant avec succès";

                    $etud = new etudiant($code,"","","","");
                    $resultat = $etud->check_code_Etud();
                    if(!(empty($resultat))){
                        $_SESSION['codeM'] = $resultat['CodeEtudiant'];
                        $_SESSION['nomM'] = $resultat['Nom'];
                        $_SESSION['prenomM'] = $resultat['Prenom'];
                        $_SESSION['adresseM'] = $resultat['Adresse'];
                        $_SESSION['classeM'] = $resultat['Classe'];
                    }
                }

            } catch (PDOException $e){
                echo 'Erreur: ' . $e->getMessage() . $e->getLine();
            }
        }else{
            echo 'Vous devez remplir tous les champs';
        }
 }
