<?php

function userAdm(){
    $user = "Antônio";

    while (true) {
        system("clear");
        echo ("Seja Bem-Vindo(a)," . $user . "!\n");
        echo (str_repeat("=", 40) . "\n");
        printf("[ 1 ] %-30s\n", "Estoque");
        printf("[ 2 ] %-30s\n", "Funcionários");
        printf("[ 3 ] %-30s\n", "Clientes");
        printf("[ 4 ] %-30s\n", "Manual");
        printf("[ 0 ] %-30s\n", "Voltar ao Menu");
        echo (str_repeat("=", 40) . "\n");

        $opcao = trim(readline("Digite uma Opção: "));
        switch ($opcao) {
            case '0';
                echo ("Voltando ao Menu...");
                sleep(1);
                return;

            case '1';
                require_once(__DIR__ . '/modulos/Estoque.php');
                Estoque();
                break;

            case '2';
                require_once(__DIR__ . '/modulos/UsuariosFuncionarios.php');
                UsuariosFuncionarios();
                break;

            case '3';
                echo ("Clientes");
                break;

            case '4';
                echo ("Manual");
                break;
                
            default:
                echo ("Opção inválida. Tente novamente userAdm");
                sleep(1);
                break;
        }
    }
}