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
                
          function Update()
         {
             $sql = "update produto set nome=". $_POST["name"] . "set preco=". $_POST["value"] . "where codigo = ".  $_POST["amount"] .";";
            
             if(mysqli_query($con, $sql))
            {
                echo 'foi';
            }
            else
            {
                echo 'n foi';
            }
           
            mysqli_close($con);
         }
         
          if($_SERVER['REQUEST_METHOD']=='POST')
           {
               Delete();
           } 
        ?>

        <form method="post" action="Test.php">
            <input placeholder="Nome" name="name"/>
            <input type="number" placeholder="Preço" name="value"/>
            <input type="number" placeholder="Quantidade" name="amount"/>
            <input type="submit" value="Salvar" />
        </form>

    </body>
</html>


