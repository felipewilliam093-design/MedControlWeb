<?php

include_once "../configs/database.php";
include_once "usuario.php";

Class UsuarioController{
    private $bd;
    private $usuario;

    public function __construct(){
        $banco = new Database();
        $this->bd = $banco->conectar();
        $this->usuario = new Usuario($this->bd);
    }

    public function index(){
        return $this->usuario->LerTodos();
    }

    public function cadastroUsuario(){
        return $this->usuario->LerTodos();
    }

    public function pesquisaUsuario($id){
        return $this->usuario->PesquisaUsuario($id);
    }

    public function cadastrarUsuario($dados){

        $this->usuario->nome = $dados["nome"];
        $this->usuario->email = $dados["email"];
        $this->usuario->login = $dados["login"];
        $this->usuario->senha = $dados["senha"];

        if($this->usuario->Cadastrar()){
            header("location: index.php");
            exit();
        }
    }

    public function excluirUsuario($id){
        $this->usuario->id = $id;

        if($this->usuario->Excluir()){
            header("location: index.php");
        }
    }

    public function atualizarUsuario($dados){
        $this->usuario->id = $dados["ra"];
        $this->usuario->nome = $dados["nome"];
        $this->usuario->email = $dados["email"];
        $this->usuario->login = $dados["login"];
        $this->usuario->senha = $dados["senha"];

        if($this->usuario->Atualizar()){
            header("location: index.php");
        }
    }

    public function localizarUsuario($id){
        return $this->usuario->buscaAluno($id);

    }

}
