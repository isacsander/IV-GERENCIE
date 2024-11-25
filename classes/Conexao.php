<?php
class Conexao{
    private $conexao;
    
    public function connect (){    
        $conexao = new PDO("mysql:host=localhost;dbname=sistema_condominio", "root", "");
        
        return $conexao;
    }

}
?>

