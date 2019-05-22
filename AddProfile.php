<?php

include ("./OperacoesBanco.php");
//include ("./Util/Usuario.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bd = new OperacoesBanco();
    if ($bd != null) {
        InsertUser($bd);
    } else {
        Header('location: index.php');
    }
}

function InsertUser($banco) {
    $user = $banco->login($_POST['email'], $_POST['password']);
    if ($user == null) {
        $obj = new Usuario($_POST['email'], $_POST['password'], $_POST['username'], $_POST['image']);
        $banco->inserirUser($obj);
    }
    Header('location: index.php');
}

?>
