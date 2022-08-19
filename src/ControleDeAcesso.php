<?php

namespace Projeto;
final class ControleDeAcesso{

    public function __construct(){
        if(!isset($_SESSION)){
            session_start();
        }
    }

    public function verificaAcesso():void{
        // Esta função serve para verificar se o usuário está de fato logado.
        // Caso não esteja, ele será redirecionado para a tela de login.
        if(!isset($_SESSION['id']))
        session_destroy();
        header("location:../visualizacoes/login.php?acesso_proibido");
        die();
    }

    public function verificaAcessoAdmin():void {
        if( $_SESSION['tipo'] !== 'admin' ){
            header("location:nao-autorizado.php");
            die();
        }
    }

    public function login(int $id, string $nome, string $email){
        $_SESSION['id'] = $id;
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;
    }

    public function logout():void{
        session_start();
        session_destroy();
        header("location:../visualizacoes/login.php?logout");
        die();
    }
    
}
