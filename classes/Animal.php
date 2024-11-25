<?php

include_once "Conexao.php";

class Animal{
    
    private $pdo;
  

    public function __construct(){
        $conexao =  new Conexao();
        $this->pdo = $conexao->connect();
    }

    public function Cadastrar($nome, $tipo, $raca, $dono){
        $stmt = $this->pdo->prepare("INSERT INTO pets(nome, tipo, raca, dono, morador_id) VALUES(:nome, :tipo,:raca, :dono, :morador_id)");
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":tipo", $tipo);
        $stmt->bindValue(":raca", $raca);
        $stmt->bindValue(":dono", $dono);
        $stmt->bindValue(":morador_id", $_SESSION['usuario_id']);
        return $stmt->execute();
    }

    public function Listar(){ //função buscar no banco de dados
        $sql = "SELECT * FROM pets";
        $result = $this->pdo->query($sql);//executando a consulta de $sql
        $animais = $result->fetchAll(PDO::FETCH_ASSOC); //$animais esta recebendo uma array associativa
        return $animais; //vai retornar uma array associativa

    }

}

