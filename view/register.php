<?php
    require_once '../controller/register_action.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/my_css/registerstyle.css">
    <title>Inscription</title>
</head>
<body>
    <div id="signup">
    <p id="psign">S'inscrire maintenant</p>
    <form method="POST" action="register.php">
        <div >
            <input type="text" id="username" name="username" placeholder="Nom d'utilisateur" required>
        </div>
        <div >
            <input type="email" id="email" name="email" placeholder="Email" required>
        </div>
        
        <div>
            <input type="password" name="password" placeholder="Mot de passe" required>
        </div>
        <div>
            <input type="password" id="password_conf" name="password_conf" placeholder="Confirmation Mot de passe" required>
        </div>
        <input type="submit" value="S'inscrire" id="sub" name='submit'>
    </form>
    <div id="login"><strong>Déjà inscrit? </strong><a href="login.php"> Connecter-vous ici</a></div>
</div>
</body>
</html>