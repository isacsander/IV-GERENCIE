<?php
include_once 'Conexao.php';

class Usuario{
    private $pdo;
    public function __construct(){
        $conexao = new Conexao();
        $this->pdo = $conexao->connect();
    }
    public function cadastrar($nome, $email, $senha, $tipo_usuario){
        $stmt = $this->pdo->prepare("INSERT INTO usuarios(nome, email, senha, tipo_usuario) VALUES(:nome, :email,:senha, :tipo_usuario)");
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":senha", password_hash($senha, PASSWORD_DEFAULT));
        $stmt->bindValue(":tipo_usuario", $tipo_usuario);
        return $stmt->execute();
    }

    public function login($email, $senha){
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email"); //Definindo uma consulta sql 
        $stmt-> bindValue(":email", $email); //associa o valor do $email ao placeholder :email
        $stmt-> execute(); //executa a consulta
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC); //vai retornar os valores da consulta  e guardar em $usuario(Vai retornar os valores associado a array do usuario), se nem um registro for encontrado retorna false.

        if($usuario && password_verify($senha, $usuario['senha'])){//$usuario -> verifica se a consulta existe; password_verify -> verifica se a senha fornecida corresponde ao hash no banco de dados.; (password_verify é uma função segura do php para comparar senha com hashes).

            session_start();//inicia uma nova sessão 
            $_SESSION['nome_usuario'] = $usuario['nome'];
            $_SESSION['usuario_id'] = $usuario['id']; // id do usuario para identifica-lo em outras paginas
            $_SESSION['tipo_usuario'] = $usuario['tipo_usuario']; //tipo de usuario que determina permissoes no sistema.
            return true;// true se o login for bem-sucedido 
        }
        return false;//false se o login for mal-sucedido
    }


}