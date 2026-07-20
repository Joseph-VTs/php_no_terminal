<?php
require_once('Dados.php');

while (true) {
    system("clear");
    printf("%-30s\n", "Sistema da Empresa: $empresa_nome_salvo");

    $funcionario_nome = trim(readline("Usuário: "));
    if ($funcionario_nome != $funcionario_nome_salvo) {
        printf("%-30s\n", "Usuário não Cadastrado");
        sleep(1);
        continue;
    }

    $funcionario_senha = trim(readline("Senha: "));
    if ($funcionario_senha != $funcionario_senha_salvo) {
        printf("%-30s\n", "Senha Incorreta");
        sleep(1);
        continue;
    }

    // ADM
    if ($funcionario_tipo_salvo === "Admin") {
        echo "ADM";
        sleep(3);
        continue;
    }

    // Normal
    if ($funcionario_tipo_salvo === "Normal") {

        while (true) {
            system("clear");
            printf("%-30s\n", "Seja Bem-Vindo ao Sistema, $funcionario_nome!");
            printf("[ 1 ] - %-30s\n", "Estoque da Loja");
            printf("[ 2 ] - %-30s\n", "Clientes da Loja");
            printf("[ 0 ] - %-30s\n", "Voltar ao Login.");

            $opcao = trim(readline("Selecione uma Opção: "));
            switch ($opcao) {
                case '1':
                    while (true) {
                        system("clear");
                        printf("%-30s\n", "Estoque da Empresa, $empresa_nome_salvo.");
                        printf("[ 1 ] - %-30s\n", "Cadastrar Produto");
                        printf("[ 2 ] - %-30s\n", "Ver Produtos Cadastrados");
                        printf("[ 3 ] - %-30s\n", "Consultar Produtos"); // Aqui podemos ter a opção de editar
                        printf("[ 0 ] - %-30s\n", "Voltar ao Menu");

                        $opcao_estoque = trim(readline("Selecione uma Opção: "));
                        switch ($opcao_estoque) {
                            case '1':
                                while (true) {
                                    system("clear");
                                    printf("%-30s\n", "Digite 0 para Voltar ao Menu");

                                    $produto_nome = trim(readline("Nome do Produto: "));
                                    if ($produto_nome === "0") {
                                        break;
                                    }
                                    $produto_peso = trim(readline("Peso do Produto: "));
                                    $produto_preco = trim(readline("Preço do Produto: "));
                                    $produto_quantidade = trim(readline("Quantidade: "));


                                    system("clear");
                                    echo "\nInformações do Produto Cadastrado:";
                                    echo "\nNome: " . $produto_nome;
                                    echo "\nPeso: " . $produto_peso;
                                    echo "\nPreço: " . $produto_preco;
                                    echo "\nQuantidade: " . $produto_quantidade;
                                    echo "\nTotal: " . ((float)$produto_preco * (int)$produto_quantidade);

                                    readline("\nPressione ENTER para continuar."); 
                                    continue;
                                }
                                break;
                            case '2':
                                break;
                            case '3':
                                break;
                            case '0':
                                printf("%-30s\n", "Aviso: Voltando ao Menu.");
                                sleep(1);
                                break 2;
                            default:
                                printf("%-30s\n", "Atenção: Selecione uma Opção Válida.");
                                sleep(1);
                                break;
                        }
                        break;
                    }
                    break;
                case '2':
                    echo "Cliente, $empresa_nome_salvo";
                    sleep(3);
                    break;
                case '0':
                    printf("%-30s\n", "Aviso: Saindo do Sistema.");
                    sleep(1);
                    break 2;
                default:
                    printf("%-30s\n", "Atenção: Selecione uma Opção Válida.");
                    sleep(1);
                    break;
            }
        }
    }
}
