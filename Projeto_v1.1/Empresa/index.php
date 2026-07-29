<?php

$empresaCadastrada = "Tech & Cia";

// Tela: Boas Vindas
while (true) {
    system("clear");
    echo (str_repeat("=", 40) . "\n");
    echo ("Empresa: " . $empresaCadastrada . ".\nSeja Bem Vida.\n");
    printf("[ 1 ] %-30s\n", "Entrar no Sistema");
    printf("[ 2 ] %-30s\n", "Manual de Instruções");
    printf("[ 0 ] %-30s\n", "Cancelar - Sair");
    echo (str_repeat("=", 40) . "\n");

    $opcao = trim(readline("Digite uma Opção: "));
    switch ($opcao) {
        case '0':
            echo ("Saindo do Sistema...");
            sleep(1);
            exit();
        case '1':
            require_once(__DIR__ . '/Sistema/Sistema.php');
            Sistema();
            break;
        case '2':
            echo ("Manual");
            readline("Enter");
            break;
        default:
            echo ("⚠ Opção inválida. Tente novamente");
            sleep(1);
            break;
    }
}
