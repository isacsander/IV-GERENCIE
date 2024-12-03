<?php
include_once "Conexao.php";

class Areas_lazer{
    private $pdo;
    public function __construct(){
        $conexao = new Conexao();
        $this->pdo = $conexao->connect();
    }

    public function Cadastrar($nome, $descricao, $capacidade){
        $stmt = $this->pdo->prepare("INSERT INTO areas_lazer(nome, descricao, capacidade) VALUES(:nome, :descricao, :capacidade)");
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":descricao", $descricao);
        $stmt->bindValue(":capacidade", $capacidade);
        return $stmt->execute();
    }
    // Função para buscar todas as áreas de lazer
    public function listar() {
        $stmt = $this->pdo->prepare("SELECT * FROM areas_lazer");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function AgendarLazer( $nome_lazer, $data){
        $stmt = $this->pdo->prepare("INSERT INTO lazer_agendamento(nome_lazer, data) VALUES (:nome_lazer, :data)");
        $stmt->bindValue(":nome_lazer", $nome_lazer);
        $stmt->bindValue(":data", $data);
        $stmt->execute();

    }
}