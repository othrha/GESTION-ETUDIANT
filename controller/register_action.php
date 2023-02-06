<?php
    include '../model/users.php';

    function verifyEmail(){
        $email = trim($_POST['email']);
        $regex = "/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/";
        if (!preg_match($regex, $email)){
            echo "<h1>Cette adresse email est invalide</h1>";
            return false;
        }
        return true;
    }
    
    function confirmPassword(){
        $password_conf = ($_POST['password_conf']);
        $password = ($_POST['password']);
        if($password_conf == $password){
            return true;
        }else{
            echo "<h1>La confirmation de mot de passe incorrect</h1>";
            return false;
        }
    }

    
    //-----------------------------------------------------

    if(isset($_POST['submit'])){
        if (verifyemail() && confirmPassword()){
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            if(!empty($username) && !empty($password)){
                try{
                    $user = new users($username,$email,$password);
                    $check = $user->selectEmail();
                    if(empty($check)){
                        $res = $user->addUsers();
                        echo $res ? "<h1>Vous vous êtes inscrit avec succès</h1>" : "<h1>l'inscription a échoué</h1>";
                    }else{
                        echo '<h1>Cet e-mail existe déjà</h1>';
                    }
                    
                    
                } catch (PDOException $e){
                    echo 'Erreur: ' . $e->getMessage();
                }    
            } else {
                echo '<h1>Toutes les informations doivent être saisies</h1>';
            }
        }
    }