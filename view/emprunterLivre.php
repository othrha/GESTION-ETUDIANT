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
    <link rel="stylesheet" href="public/my_css/emprunterLivre.css">
    <script src="public/jquery-3.6.0.min.js"></script>
    <title>Acceuil</title>
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
        <form method="POST" action="">
                <legend><h2 id="titre">Emprunter Livre</h2></legend>
                <label for="">Etudiant:</label>
                <select name="etudiant" id="selectEtud">
                <option disabled selected value>-- sélectionner un Etudiant --</option>
                </select><br><br>

                <label for="">Livre:</label>
                <select name="livre" id="selectLivre">
                    <option disabled selected value>-- sélectionner un Livre --</option>
                </select><br>
                <input type="submit" value="Emprunter" name="submit">
            </form>

            <h1>
                <?php
                require_once '../controller/emprunterLivre_action.php' ;
                ?>
            </h1>
    </section>
    </main>

    <script>

        $(document).ready(function(){
            $.ajax({
                method:'POST',
                url:'../controller/emprunterLivre_ajax.php',
                data:{etudiant:$('#selectEtud').attr('name')},
                success:function(data){
                    $('#selectEtud').append(data);
                    console.log(data);
                }
            });

            $.ajax({
                method:'POST',
                url:'../controller/emprunterLivre_ajax.php',
                data:{livre:$('#selectLivre').attr('name')},
                success:function(data){
                    $('#selectLivre').append(data);
                    console.log(data);
                }
            });
            $('#selectEtud').change(function(){
                console.log($('#selectEtud').children("option:selected").val());
            })
            
        })
        
    </script>
</body>
</html>