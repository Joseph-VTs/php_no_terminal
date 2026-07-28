<?php
// Importações
require_once __DIR__ . '/modulos/menuEmpresas.php';

// Sistema
while (true) {
    system("clear");
    echo ("Sistema ADM:\n");
    printf(str_repeat("-", 40) . "\n");
    printf("[ 1 ] %-30s\n", "Menu Empresas");
    printf("[ 0 ] %-30s\n", "Sair");
    printf(str_repeat("-", 40) . "\n");

    // Opções
    while (true) {
        $opcao = readline("Digite uma Opção: ");
        switch ($opcao) {
            case '0':
                echo("Saindo do Sistema...");
                sleep(1);
                exit();
            case '1':
                menuEmpresas();
                break;
            default:
                printf("%-30s\n", "Opção inválida. Tente novamente.\n");
                readline("Novamente");
        }
        break;
    }
}
