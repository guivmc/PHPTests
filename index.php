<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP</title>
    </head>
    <body>

        <?php
         require_once './BDConect.php';
        ?>

        <ul>
            <li><a>Listar</a></li>
            <li><a>Exibir</a></li>
            <li><a>Apagar</a></li>
        </ul>

        <form method="post" action="Test.php">
            <input placeholder="Nome" name="name"/>
            <input placeholder="Descrição" name="description"/>
            <input type="number" placeholder="Preço" name="value"/>
            <input type="number" placeholder="Quantidade" name="amount"/>
            <input type="submit" value="Salvar" />
        </form>

    </body>
</html>
