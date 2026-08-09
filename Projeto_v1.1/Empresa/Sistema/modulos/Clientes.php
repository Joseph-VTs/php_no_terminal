<?php
    function Clientes(){
        while(true){
            system("clear");
            echo(str_repeat("=", 40) . "\n");
            printf("[ 1 ] - %-40s\n", "Cadastrar Cliente");
            printf("[ 2 ] - %-40s\n", "Ver Clientes Cadastrados");
            printf("[ 3 ] - %-40s\n", "Consultar Clientes");
            printf("[ 4 ] - %-40s\n", "Atulizar Cliente");
            printf("[ 0 ] - %-40s\n", "Voltar ao Menu");
            echo(str_repeat("=", 40) . "\n");

            $opcao = trim(readline("Selecione uma Opção: "));
            switch($opcao){
                case '0':
                    echo("Voltando ao Menu...");
                    sleep(1);
                    return;

                case '1':
                    require_once(__DIR__ . '/../CRUD/Create.php');
                    cadastrarNovoCliente();
                    break;

                case '2':
                    require_once(__DIR__ . '/../CRUD/Read.php');
                    listarClientesCadastrados();
                    break;

                case '3':
                    echo("Consulta de Clientes\n");
                    readline("🔹 Pressione Enter para voltar ao Menu: ");
                    break;

                case '4':
                    echo("Atualizar Clientes\n");
                    readline("🔹 Pressione Enter para voltar ao Menu: ");
                    break;

                default:
            }
        }
    }