<?php
include_once "Conexao.php";
class Avisos{
    private $pdo;
    public function __construct(){
        $conexao = new Conexao();
        $this->pdo = $conexao->connect();
    }
    public function Registrar_Avisos($titulo, $descricao){
        $stmt = $this->pdo->prepare("INSERT INTO avisos(titulo, descricao, criado_por) VALUES(:titulo, :descricao, :criado_por)");
        $stmt->bindValue(":titulo", $titulo);
        $stmt->bindValue(":descricao", $descricao);
        $stmt->bindValue(":criado_por", $_SESSION['usuario_id']);
        return $stmt->execute();
    }   

    public function Listar(){ //função buscar no banco de dados
        $sql = "SELECT avisos.*, usuarios.nome AS criado_por_nome FROM avisos JOIN usuarios ON avisos.criado_por = usuarios.id ORDER BY data_criacao DESC";
        $stmt = $this->pdo->query($sql);//executando a consulta de $sql
        $avisos = $stmt->fetchAll(PDO::FETCH_ASSOC); //$animais esta recebendo uma array associativa
        return $avisos; //vai retornar uma array associativa

    }

}