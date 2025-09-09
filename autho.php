<?php
$pdo = new PDO('mysql:host=localhost;dbname=money-flow;port=8889', 'root', 'root');
require_once './config.php';
$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS));
$password = trim(filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));

if (strlen($login) < 2) {
    echo "Login must be at least 2 characters long.";
    exit();
}
if (strlen($password) < 8) {
    echo "Password must be at least 8 characters long.";
    exit();
}
$salt = 'ALkdfoöjacmnjn12367dhasjd';
$password = md5($salt.$password);
// DB
require './db.php';

// Auth user
$sql = 'SELECT id FROM users WHERE login = ? AND password = ?';
$query = $pdo->prepare($sql);
$query->execute([$login, $password]);

if ($query->rowCount() == 0) {
    echo "Invalid login or password.";
    exit();
}  else {
    echo "Authorization successful.";
    setcookie('login', $login, time() + 3600 * 24 * 30, '/');
    header('Location: /index.php');
    exit();
}