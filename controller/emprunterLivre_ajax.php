<?php
    include '../model/etudiant.php';
    include '../model/livre.php';
    //-----------data etudiant--------------------------------
    if($_POST['etudiant']=='etudiant'){
        $etudiants = new etudiant("","","","","");
        $res_tab = $etudiants->selectEtudiant();
        if(!(empty($res_tab))){
                foreach($res_tab as $res){    
            ?>
            <option value="<?php echo $res['CodeEtudiant'] ?>"><?php echo $res["Nom"]." ".$res["Prenom"];?></option>
            <?php } 
        }  
    } elseif($_POST['livre']=='livre'){
        $livre = new livre("","","","");
        $res_tab = $livre->selectLivre();
        if(!(empty($res_tab))){
                foreach($res_tab as $res){    
            ?>
            <option value="<?php echo $res['CodeLivre'] ?>"><?php echo $res["Titre"]?></option>
        <?php } 
        }  
    } 
    ?>


  