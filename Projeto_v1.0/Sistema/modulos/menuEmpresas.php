<?php
// Requisições
require_once __DIR__ . '/Empresas/Cadastro.php';
require_once __DIR__ . '/Empresas/ListarEmpresas.php';

function menuEmpresas(){
    while (true) {
        system("clear");
        echo ("Menu Empresa");
        echo("\n");
        printf(str_repeat('=', 40));
        echo("\n");
        printf("[ 1 ] %-30s\n", "Cadastrar");
        printf("[ 2 ] %-30s\n", "Ver Empresas");
        printf("[ 0 ] %-30s\n", "Voltar ao Menu");
        printf(str_repeat('=', 40));
        echo("\n");

        $opcao = readline("Selecione uma Opção: \n");
        switch ($opcao) {
            case '0':
                printf("%-30s", "Voltando ao Menu...");
                // sleep(1);
                return;
            case '1':
                cadastrarEmpresa();
                break;
            case '2':
                listarEmpresas();
                break;
            default:
                printf("%-30s", "Opção Inválida. Tente Novamente...");
                sleep(1);
                break;
        }
    }
}
