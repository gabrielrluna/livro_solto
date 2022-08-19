<?php

$senha = "123";
$senhacodificada = password_hash($senha, PASSWORD_DEFAULT);


$confirmaSenha = "1234";
// $confirmaSenhaCodificada = password_hash($confirmaSenha, PASSWORD_DEFAULT);


if(password_verify($confirmaSenha, $senhacodificada)){
    echo "iguais";
} else {
    echo "diferentes";
}

?>