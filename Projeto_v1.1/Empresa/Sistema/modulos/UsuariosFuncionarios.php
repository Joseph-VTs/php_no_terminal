<?php
function UsuariosFuncionarios(){
    while(true){
        system("clear");
        echo(str_repeat("=", 40) . "\n");
        printf("[ 1 ] %-40s\n", "Cadastrar Novo Funcionário");
        printf("[ 2 ] %-40s\n", "Ver Funcionários Cadastrados");
        printf("[ 0 ] %-40s\n", "Voltar ao Menu");
        echo(str_repeat("=", 40) . "\n");

        $opcao = trim(readline("Selecione uma Opção: "));
        switch($opcao){
            case '0';
                echo ("Voltando ao Menu...");
                sleep(1);
                return;

            case '1';
                require_once(__DIR__ . '/../CRUD/Create.php');
                cadastrarNovoFuncionario();
                break;

            case '2';
                require_once(__DIR__ . '/../CRUD/Read.php');
                listarFuncionariosCadastrados();
                break;

            default:
                echo ("Opção inválida. Tente novamente UsuariosFuncionarios");
                sleep(1);
                break;
        }
    }
}