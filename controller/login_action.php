<?php
 include '../model/users.php';
 session_start();
 if(isset($_POST['email']) && isset($_POST['password'])){
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $login = new users("",$email, $password);
    $cone = $login->conexion();
    $count_row = $cone[0];
    $data = $cone[1];
    if($count_row ==1 && !(empty($data))){
        $_SESSION['username'] = $data['username'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['password'] = $data['password'];
        header('location: index.php');
    } else{
    echo "<h1 style='color:red'>Ce compte n'existe pas ou le mot de passe/e-mail est incorrect</h1>";
    }
        
 }