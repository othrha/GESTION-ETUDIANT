<?php
    include '../model/livre.php';
    //----------------------------------------
    
    if(isset($_POST['supprimer'])){
        if(!(empty($_POST['codeS']))){
            $codeS=trim($_POST['codeS']);
            $supp = new livre($codeS,"","","","");
            try {
                $res = $supp->check_code_Livre();
                if(empty($res)){
                    echo "<h1>Le livre n'existe pas dans la base ou le code saisir incorrecte</h1>";
                }else{
                    try {
                        $supp->suppressionLivre();
                        echo  "<h1>Le livre avec le code:$codeS a été supprimé avec succès</h1>";
                    } catch (PDOException $e) {
                        echo 'Erreur : ' . $e->getMessage();
                    } 
                }
            } catch (PDOException $e) {
                echo 'Erreur : ' . $e->getMessage();
            } 
        }else{
            echo "<h1>Vous devez saisir le code que vous souhaitez supprimer</h1>";
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
