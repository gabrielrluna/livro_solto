<?php
namespace Projeto;
use PDO, Exception;

final class Usuario{
    private int $id;
    private string $nome;
    private string $email;
    private string $senha;
    private string $livros;
    private string $senac;
    private PDO $conexao;




    public function __construct(){
        $this->conexao = Banco::conecta();
   }
   
    public function cadastrar():void{
        $sql="INSERT INTO usuarios(nome, email, senha, senac) VALUES (:nome, :email, :senha, :senac)";

        try{
            $consulta = $this->conexao->prepare($sql);
            $consulta = bindParam (":nome", $this->nome, PDO::PARAM_STR);
            $consulta = bindParam (":email", $this->email, PDO::PARAM_STR);
            $consulta = bindParam (":senha", $this->senha, PDO::PARAM_STR);
            $consulta = bindParam (":senac", $this->senac, PDO::PARAM_STR);
            $consulta->execute();
        } catch(Exception $erro){
            die ("Erro: ". $erro->getMessage());
        }
   }


   
}
