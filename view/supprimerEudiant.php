<?php
    include_once "../controller/session_start.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/all.css">
    <link rel="stylesheet" href="public/my_css/indexstyle.css"/>
    <link rel="stylesheet" href="public/my_css/supprimerEtudiant.css">
    <title>supprimerEtudiant</title>
    <script src="public/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header>
        <img src="public/images/logo.jpg" alt="logo">
        <a href="index.php" class="a1" id="acceuil"><i class="fa-solid fa-house-user"></i> Acceuil</a>
        <div id="logedin">
            <p id='welcome'>
            <i class="fa-solid fa-user-group"></i> Bienvenue <?php echo $username ?> 
            </p>
        <a href="../controller/session_destroy.php" class="a1" id="deconnexion"><i class="fa-solid fa-right-from-bracket"></i> Déconnexion</a>
        </div>
    </header>
  
   <main>
    <nav>
        <p class="gest">Gestion Etudiant</p>
        <a href="nouveauEtudiant.php" class="liens"><i class="fa-solid fa-circle-plus"></i> Nouveau Etudiant</a><br>
        <a href="supprimerEudiant.php" class="liens"><i class="fa-solid fa-trash-can"></i> Suppression Etudiant</a><br>
        <a href="modifierEud.php" class="liens"><i class="fa-solid fa-pencil"></i> Modification Etudiant</a><br>
        <a href="rechercheEtud.php" class="liens"><i class="fa-solid fa-magnifying-glass"></i> Rechreche Etudiant</a><br>
        <a href="listeEtudiants.php" class="liens"><i class="fa-solid fa-list"></i> Liste Etudiant</a><br>
        <p class="gest">Gestion Livre</p>
        <a href="nouveauLivre.php" class="liens"><i class="fa-solid fa-circle-plus"></i> Nouveau Livre</a><br>
        <a href="supprimerLivre.php" class="liens"><i class="fa-solid fa-trash-can"></i> Suppression Livre</a><br>
        <a href="modifierLivre.php" class="liens"><i class="fa-solid fa-pencil"></i> Modification Livre</a><br>
        <a href="rechercheLivre.php" class="liens"><i class="fa-solid fa-magnifying-glass"></i> Rechreche Livre</a><br>
        <a href="listeLivre.php" class="liens"><i class="fa-solid fa-list"></i> Liste Livre</a><br>
        <p class="gest">Gestion des Emprunts</p>
        <a href="emprunterLivre.php" class="liens"><i class="fa-solid fa-circle-plus"></i> Emprunts un Livre</a><br>
        <a href="" class="liens"><i class="fa-solid fa-book"></i> Retour d'un Livre</a><br>
        <a href="listeEmprunter.php" class="liens"><i class="fa-solid fa-list"></i> Liste des Emprunter</a><br>
    </nav>
    <section>
        <h1 id="titre">Suppression Etudiant</h1>
       <form action="supprimerEudiant.php" method="POST">
           <label for="code" id="test">Code</label>
           <input type="number" name="codeS" id="codeS" placeholder="Saisir Code..">
           <input type="submit" value="Supprimer" name="supprimer">
           <div id="suggesstion-box">
           </div>
       </form>
       <?php
            require_once "../controller/supprimerEtud_action.php";
       ?>
    </section>
    </main>

    <script>
        $(document).ready(function(){
            $("#codeS").keyup(function(){
                $.ajax({
                    method:"POST",
                    url: "../controller/supprimerEtud_action.php",
                    data: {auto_code:$("#codeS").val()},
                    beforeSend: function(){
                        $("#codeS").css("background", "#FFF");
                    },
                    success: function(data){
                        $("#suggesstion-box").html(data);
                        $("#suggesstion-box").show();
                        $("#codeS").css("background", "#FFF");
                        console.log(data);
                    }
                });
            });
            
            
        })
        function selectcode(val){
                $("#codeS").val(val);
                $("#suggesstion-box").hide();
        }; 
    </script>
</body>
</html>