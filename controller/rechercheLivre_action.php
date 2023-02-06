<?php
include '../model/livre.php';
   //----------------------------------------------------------
   function checkselect(){
    if(isset($_POST['Critere'])){
        if($_POST['Critere']=="Code"){
            return "code";
        }elseif($_POST['Critere']=="Titre"){
            return "titre";
        }elseif($_POST['Critere']=="Auteur"){
            return "auteur";
        }elseif($_POST['Critere']=="Date"){
            return "date";
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
                    $livre = new livre($vale,"","","");
                    $res = $livre->rechercheLivre($vale);
                    break;
                case "titre":
                    $livre = new livre("",$vale,"","");
                    $res = $livre->rechercheLivre($vale);
                    break;
                case "auteur":
                    $livre = new livre("","",$vale,"");
                    $res = $livre->rechercheLivre($vale);
                    break;
                case "date":
                    $livre = new livre("","","","",$vale);
                    $res = $livre->rechercheLivre($vale);
                    break;
                
                case false:
                    echo "<h1>La Critere doit être spécifiée</h1>";
                }
            
            if((empty($res)) && (checkselect() != false)){
                echo "<h1>Livre cherché n'existe pas dans la base</h1>";
            }elseif(checkselect() != false){
                echo "<h1>Livre cherché existe dans la base</h1>";
            }
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        } 
    }else{
        echo "<h1>rain à saisire dans la bare de recherche</h1>";
    }
}

?>