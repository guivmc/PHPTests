<?php

require_once './Util/DataSource.php';
require_once './Util/Usuario.php';

class OperacoesBanco {

    private $linkDB;
    
    function __construct() {
        $this->linkDB = new DataSource();
    }
    
    function __destruct() {
        $this->linkDB = NULL;
    }
    
    function inserirUser($obj) {
        $sql = "INSERT INTO user (nome, email, senha, imageURL) VALUES(?, ?, ?, ?)";
        //tratamento do sql injection
        $stm = mysqli_prepare($this->linkDB->con, $sql);
        if (!$stm) {
            die('Falha na construcao SQL');
        }
        $nome = $obj->getNome();
        $email = $obj->getEmail();
        $senha = $obj->getSenha();
        $imagem = $obj->getImagemURL();
        if (!$stm->bind_param("ssss", $nome, $email, $senha, $imagem)) {
            die('Falha na atribuicao de valores');
        }
        if (!$stm->execute()) {
            die('Falha na execucao SQL');
        }
    }
    
    function getUser($id) {
        $resultado = mysqli_prepare($this->linkDB->con, "SELECT * FROM user WHERE id = ?");
        if (!$resultado) {
            die('Falha na construcao SQL');
        }
        if (!$resultado->bind_param("s", $id)) {
            die('Falha na atribuicao de valores');
        }
        if (!$resultado->execute()) {
            die('Falha na execucao SQL');
        }
        $result = $resultado->get_result();
        if ($result->num_rows === 1) {
            $dados = mysqli_fetch_assoc($result);
            $user = Array('email' => $dados['email'], 'imageURL' => $dados['imageURL'], 'nome' => $dados['nome'], 'id' => $dados['id']);
            return $user;
        }
        return null;
    }
    
    function update($id, $campo, $valor) {
        $resultado = mysqli_prepare($this->linkDB->con, "UPDATE user SET ? = ? WHERE id = ?");
        //tratamento do sql injection
        if (!$resultado) {
            die('Falha na construcao SQL');
        }
        if (!$resultado->bind_param("sss", $campo, $valor, $id)) {
            die('Falha na atribuicao de valores');
        }
        if (!$resultado->execute()) {
            die('Falha na execucao SQL');
        }
    }
    
    function login($email, $senha) {
        $resultado = mysqli_prepare($this->linkDB->con, "SELECT * FROM user WHERE email = ? AND senha = ?");
        if (!$resultado) {
            die('Falha na construcao SQL');
        }
        if (!$resultado->bind_param("ss", $email, $senha)) {
            die('Falha na atribuicao de valores');
        }
        if (!$resultado->execute()) {
            die('Falha na execucao SQL');
        }
        $result = $resultado->get_result();
        if ($result->num_rows === 1) {
            $dados = mysqli_fetch_assoc($result);
            $user = Array('email' => $dados['email'], 'imageURL' => $dados['imageURL'], 'nome' => $dados['nome'], 'id' => $dados['id']);
            return $user;
        }
        return null;
    }
    
    function deleteUser($id) {
        $resultado = mysqli_prepare($this->linkDB->con, "DELETE FROM user WHERE id = ? ");
        if (!$resultado) {
            die('Falha na construcao SQL');
        }
        if (!$resultado->bind_param("s", $id)) {
            die('Falha na atribuicao de valores');
        }
        if (!$resultado->execute()) {
            die('Falha na execucao SQL');
        }
        return $resultado;
    }
}
?>
