<?php
// Requisições

// Redirecionamentos
function Sistema(){
    echo ("UserAdm - UserCreate - UserRead\n");
    $tipoUser = trim(readline("Qual o Tipo: "));

    if ($tipoUser == 'adm') {
        require_once(__DIR__ . '/userAdm.php');
        userAdm();

    } else if ($tipoUser == 'create') {
        require_once(__DIR__ . '/userCreate.php');
        userCreate();

    } else if ($tipoUser == 'read'){
        require_once(__DIR__ . '/userRead.php');
        userRead();

    } else {
        echo ("Usuário não Cadastrado.");
        sleep(1);
        exit();
    }
}
