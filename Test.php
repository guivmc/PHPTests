<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Post</title>
    </head>
    <body>
        <pre>
            <?php
            require_once './BDConect.php';
            
            class Prod {

                private $name;
                private $description;
                private $value;
                private $amount;

                public function __construct($name, $description, $value, $amount) {
                    $this->name = $name;
                    $this->description = $description;
                    $this->value = $value;
                    $this->amount = $amount;
                }

                function getName() {
                    return $this->name;
                }

                function setName($name) {
                    $this->name = $name;
                }

                function getDesc() {
                    return $this->description;
                }

                function setDesc($desc) {
                    $this->description = $desc;
                }

                function getValue() {
                    return $this->value;
                }

                function setValue($value) {
                    $this->value = $value;
                }

                function getAmt() {
                    return $this->amount;
                }

                function setAmt($amount) {
                    $this->amount = $amount;
                }

            }
            
            $obj = new Prod($_POST["name"], $_POST["description"], $_POST["value"], $_POST["amount"]);
            
            echo "Nome: " . $obj->getName() . "</br>";
            echo "Descr.: " . $obj->getDesc() . "</br>";
            echo "Preço: " . $obj->getValue() . "</br>";
            echo "Quantia: " . $obj->getAmt() . "</br>";
            
            $sql = "insert into produto values". "(" . $_POST["amount"] . ", '". $_POST["name"] . "' , " . $_POST["value"] . ");";
           
            
             if(mysqli_query($con, $sql))
            {
                echo 'foi';
            }
            else
            {
                echo 'n foi';
            }
           
            mysqli_close($con);
            
            ?>
        </pre>
    </body>
</html>
