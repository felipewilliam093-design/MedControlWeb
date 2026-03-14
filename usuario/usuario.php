<?php

Class Usuario{
    public $id;
    public $nome;
    public $email;
    public $senha;
    public $login;
    public $bd;

    public function __construct($bd){
        $this->bd = $bd;
    }

    public function LerTodos(){
        $sql = "SELECT * FROM usuario";
        $resultado = $this->bd->query($sql);
        $resultado->execute();

        return $resultado->fetchAll(PDO::FETCH_OBJ);
    }

    public function pesquisaUsuario($id){
        $sql = "SELECT * FROM usuario WHERE ID = :id";
        $resultado = $this->bd->prepare($sql);
        $resultado->bindParam(":id", $id);
        $resultado->execute();

        return $resultado->fetch(PDO::FETCH_OBJ);
    }

    public function cadastrar(){
        $sql = "INSERT INTO usuario(nome, email, senha, login) VALUES(:nome, :email, :senha, :login)";

        $senha_hash = password_hash($this->senha, PASSWORD_DEFAULT);

        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam(":login", $this->login, PDO::PARAM_STR);
        $stmt->bindParam(":senha", $senha_hash, PDO::PARAM_STR);

        if($stmt->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function excluir(){
        $sql = "DELETE FROM usuario WHERE id = :ID";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(":ID", $this->id, PDO::PARAM_INT);

        if($stmt->execute()){
            return true;
        }else {
            return false;
        }
    }

    public function atualizar(){
        $senha_hash = password_hash($this->senha, PASSWORD_DEFAULT);
        $sql = "UPDATE usuario SET nome = :nome, email = :email, senha = :senha, login = :login WHERE id = :ID";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam(":senha", $senha_hash, PDO::PARAM_STR);
        $stmt->bindParam(":login", $this->login, PDO::PARAM_STR);
        $stmt->bindParam(":ID", $this->id, PDO::PARAM_INT);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function buscaAluno($id){
        $sql = "SELECT * FROM usuario WHERE ID = :ID";
        $resultado = $this->bd->prepare($sql);
        $resultado->bindParam(":ID", $id);
        $resultado->execute();

        return $resultado->fetch(PDO::FETCH_OBJ);
    }

}
