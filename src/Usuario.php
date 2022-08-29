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
            $consulta->bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $consulta->bindParam(":email", $this->email, PDO::PARAM_STR);
            $consulta->bindParam(":senha", $this->senha, PDO::PARAM_STR);
            $consulta->bindParam(":senac", $this->senac, PDO::PARAM_STR);
            $consulta->execute();
        } catch(Exception $erro){
            die ("Erro: ". $erro->getMessage());
        }
   }

   public function codificaSenha(string $senha):string{
    return password_hash($senha, PASSWORD_DEFAULT);
    }

   public function verificaSenha(
    string $senhaFormulario, string $senhaBanco):string {
        if (password_verify($senhaFormulario, $senhaBanco)){
            //se forem iguais, mantemos a senha existente no banco
            return $senhaBanco;
        }else {
            //se forem diferentes, então codificamos esta nova senha
            return $this->codificaSenha($senhaFormulario);
        }
    }

    public function inserir():void { 
        $sql = "INSERT INTO usuarios(nome, email, senha, senac) VALUES (:nome, :email, :senha, :senac)";
        
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $consulta->bindParam(":email", $this->email, PDO::PARAM_STR);
            $consulta->bindParam(":senha", $this->senha, PDO::PARAM_STR);
            $consulta->bindParam(":senac", $this->senac, PDO::PARAM_STR);
            $consulta->execute();
        } catch (Exception $erro) {
        die ("Erro: ". $erro->getMessage());
    }
      
    }

    public function buscar() {
            $sql = "SELECT * FROM usuarios WHERE email = :email";
            try {
                $consulta = $this->conexao->prepare($sql);
                $consulta->bindParam(":email", $this->email, PDO::PARAM_STR);
                $consulta->execute();
                $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $erro) {
                die("Erro: ". $erro->getMessage());
            }
            return $resultado;
        }
        // public function novaSenha(){
        //     $novaSenha = substr(time(), 0, 6);
        //     $nsCripto = password_hash($novaSenha, PASSWORD_DEFAULT);
        //     $sql = "UPDATE usuario SET senha = '$nsCripto' WHERE email = :email";
        // }
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id)
    {
        $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    }


    public function getNome(): string
    {
        return $this->nome;
    }
    public function setNome(string $nome)
    {
        $this->nome = filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS);
    }


    public function getEmail(): string
    {
        return $this->email;
    }
        public function setEmail(string $email)
    {
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
    }

    public function getSenha(): string
    {
        return $this->senha;
    }
    public function setSenha(string $senha)
    {
        $this->senha = filter_var($senha, FILTER_SANITIZE_SPECIAL_CHARS);
    }

    public function getConfirmaSenha(): string
    {
        return $this->confirmaSenha;
    }
    public function setConfirmaSenha(string $confirmaSenha)
    {
        $this->confirmaSenha = filter_var($confirmaSenha, FILTER_SANITIZE_SPECIAL_CHARS);
    }


    public function getSenac(): string   
    {
        return $this->senac;
    }
    public function setSenac(string $senac)
    {
        $this->senac = filter_var($senac, FILTER_SANITIZE_SPECIAL_CHARS);
    }
}