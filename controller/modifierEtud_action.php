<?php
include '../model/etudiant.php';

//-------vérification de code:--------------



if(isset($_POST['modifier_1'])){
    if(!(empty($_POST['codeM']))){
        $codeM=$_POST['codeM'];
        $codeModifier = new etudiant($codeM,"","","",""); 
        try{
            $res = $codeModifier->check_code_Etud();
            if(empty($res)){
                echo "Etudiant introuvable !";
            }else{
                $_SESSION['codeM'] = $res['CodeEtudiant'];
                $_SESSION['nomM'] = $res['Nom'];
                $_SESSION['prenomM'] = $res['Prenom'];
                $_SESSION['adresseM'] = $res['Adresse'];
                $_SESSION['classeM'] = $res['Classe'];
                header("location: modifierEtudiant_Form.php");
            }
        } catch (PDOException $e){
            echo 'Erreur: ' . $e->getMessage();
        }
    }else{
        echo "Vous devez entrer le code d'étudiant";
    }
}




//-----------Autocomplete Ajax--------------------------------
     if(!(empty($_POST['auto_code']))){
        $uato_code = $_POST['auto_code'];
        $val = new etudiant("","","","","");
        try{
            $res_tab = $val->autocomplete_ajax($uato_code);
        }catch(PDOException $e){
            echo 'Erreur : ' . $e->getMessage();
        }

        if(!(empty($res_tab))){
            ?>
            <ul id="code-list">
            <?php
                foreach($res_tab as $res){    
            ?>
            <li onclick="selectcode(<?php echo $res['CodeEtudiant'];?>)"><?php echo $res["CodeEtudiant"]; echo " (".$res['Nom']. " ". $res['Prenom'].")"; ?></li>
            <?php } ?>
            </ul>
        <?php } } ?>