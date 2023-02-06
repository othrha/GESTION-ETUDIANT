<?php
    require_once '../controller/login_action.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='public/my_css/loginstyle.css'/>
    <title>Connexion</title>
</head>
<body>
    <div id="signup">
    <p id="psign">Connexion</p>
    <form method="POST" action="login.php">
        <div class="zone">
            <input type="email" name="email" placeholder="Email" required>
        </div>
        <div class="zone">
            <input type="password"  name="password" placeholder="Mot de passe" required>
        </div>
        <input type="submit" value="Connexion" id="sub">

        <div id="login">Vous etes nouevau ici? <a href="register.php"> S'inscrire</a></div>
    </form>
</div>
</body>
</html>