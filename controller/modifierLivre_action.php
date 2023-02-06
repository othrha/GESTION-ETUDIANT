<?php
    include '../model/livre.php';
//-------vérification de code:--------------

if(isset($_POST['modifier_1'])){
    if(!(empty($_POST['codeM']))){
        $codeM=$_POST['codeM'];
        $codeModifier = new livre($codeM,"","",""); 
        try{
            $res = $codeModifier->check_code_Livre();
            if(empty($res)){
                echo "Livre introuvable !";
            }else{
                $_SESSION['codeM'] = $res['CodeLivre'];
                $_SESSION['titreM'] = $res['Titre'];
                $_SESSION['auteurM'] = $res['Auteur'];
                $_SESSION['dateEditionM'] = $res['DateEdition'];
                header("location: modifierLivre_Form.php");
            }
        } catch (PDOException $e){
            echo 'Erreur: ' . $e->getMessage();
        }
    }else{
        echo "Vous devez entrer le code de livre";
    }
}

//-----------Autocomplete Ajax--------------------------------
if(!(empty($_POST['auto_code']))){
    $uato_code = $_POST['auto_code'];
    $val = new livre("","","","");
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
        <li onclick="selectcode(<?php echo $res['CodeLivre'];?>)"><?php echo $res["CodeLivre"]; echo " (".$res['Titre'].")"; ?></li>
        <?php } ?>
        </ul>
    <?php } } ?>