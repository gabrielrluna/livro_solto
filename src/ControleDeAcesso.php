<?php

namespace Projeto;

final class ControleDeAcesso{
    public function __construct(){
        if(!isset($_SESSION)){
            session_start();
        }
    }

    
}
