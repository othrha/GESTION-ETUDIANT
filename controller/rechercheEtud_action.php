<?php
    include '../model/etudiant.php';

    //----------------------------------------------------------
    function checkselect(){
        if(isset($_POST['Critere'])){
            if($_POST['Critere']=="Code"){
                return "code";
            }elseif($_POST['Critere']=="Nom"){
                return "nom";
            }elseif($_POST['Critere']=="Prenom"){
                return "prenom";
            }elseif($_POST['Critere']=="Adresse"){
                return "adresse";
            }elseif($_POST['Critere']=="Classe"){
                return "classe";
            }
        }else{
            return false;
        }
    }
    //---------------------------------------------------------
    if(isset($_POST['rechercher'])){
        if(!(empty($_POST['valeur']))){
            $vale=trim($_POST['valeur']);
            try {
                switch(checkselect()){
                    case "code":
                        $etudrech = new etudiant($vale,"","","","");
                        $res = $etudrech->rechercheEtudiant($vale);
                        break;
                    case "nom":
                        $etudrech = new etudiant("",$vale,"","","");
                        $res = $etudrech->rechercheEtudiant($vale);
                        break;
                    case "prenom":
                        $etudrech = new etudiant("","",$vale,"","");
                        $res = $etudrech->rechercheEtudiant($vale);
                        break;

                    case "adresse":
                        $etudrech = new etudiant("","","","",$vale);
                        $res = $etudrech->rechercheEtudiant($vale);
                        break;
                    case "classe":
                        $etudrech = new etudiant("","","",$vale,"");
                        $res = $etudrech->rechercheEtudiant($vale);
                        break;
                    case false:
                        echo "<h1>La Critere doit être spécifiée</h1>";
                    }
                
                if((empty($res)) && (checkselect() != false)){
                    echo "<h1>L'etudiant cherché n'existe pas dans la base</h1>";
                }elseif(checkselect() != false){
                    echo "<h1>L'etudiant cherché existe dans la base</h1>";
                }
            } catch (PDOException $e) {
                echo 'Erreur : ' . $e->getMessage();
            } 
        }else{
            echo "<h1>rain à saisire dans la bare de recherche</h1>";
        }
    }
?>