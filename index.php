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
        
            $con = mysqli_connect("localhost", "root", "", "test1");
            
            if($con)
            {
                echo 'foi';
            }
            else
            {
                echo 'n foi';
                die();
            }
            
            $sql = "insert into produto values (4, 'piriquito', 100.50);";
           
            
             if(mysqli_query($con, $sql))
            {
                echo 'foi';
            }
            else
            {
                echo 'n foi';
            }
        ?>
        
        
        <form method="post" action="Test.php">
            <input placeholder="Nome" name="name"/>
            <input placeholder="Descrição" name="description"/>
            <input type="number" placeholder="Preço" name="value"/>
            <input type="number" placeholder="Quantidade" name="amount"/>
            <input type="submit" value="Salvar" />
        </form>
        
    </body>
</html>
