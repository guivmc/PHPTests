<?php

require_once 'OperacoesBanco.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bd = new OperacoesBanco();
    if ($bd != null)
        FindUser($bd);
    else
        Header('location: index.php');
}

function FindUser($banco) {
    $user = $banco->login($_POST['email'], $_POST['password']);
    if ($user != null) {
        $_SESSION['username'] = $user['email']; // store username
        $_SESSION['id'] = $user['id'];
        $_SESSION['picurl'] = $user['imageURL'];
    }
    
     Header('location: index.php');
}

?>
