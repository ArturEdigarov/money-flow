<?php
    $pdo = new PDO('mysql:host=localhost;dbname=money-flow;port=8889', 'root', 'root');

    $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS));
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS));
    $password = trim(filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));

    if (strlen($login) < 2){
        echo "Login must be at least 2 characters long.";
        exit();
    }
    if (strlen($password) < 8){
        echo "Password must be at least 8 characters long.";
        exit();
    }
    if (strlen($email) < 4 && !str_contains($email, '@')){
        echo "Password must be at least 8 characters long.";
        exit();
    }
    // Password hashing
    
    $salt = 'ALkdfoöjacmnjn12367dhasjd';
    $password = md5($salt.$password);

    // DB
    require_once './config.php';
    require_once './db.php';


    $sql = "SELECT COUNT(*) FROM users WHERE login = ? OR email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$login, $email]);
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        echo "This login or email already exists!";
        exit();
    }

    $sql = 'INSERT INTO users(login, email, password) VALUES(?, ?, ?)';
    $query = $pdo->prepare($sql);
    $query->execute([$login, $email, $password]);

    header('Location: /sign-in.php');