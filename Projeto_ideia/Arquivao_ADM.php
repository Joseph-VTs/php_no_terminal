<?php
require_once('Dados.php'); // Acessos Salvos

while (true) {
    system("clear");
    printf("%-30s\n", "Entrada para o Sistema");
    printf("[ 1 ] %-30s\n", "Entrar");
    printf("[ 0 ] %-30s\n", "Sair");

    $opcao = trim(readline("Selecione uma Opção: "));
    switch ($opcao) {
        case '1':

            while (true) {
                system("clear");
                printf("%-30s\n", "--- TELA DE LOGIN (Digite 0 para voltar) ---");

                $usuario = trim(readline("Usuário: "));
                if ($usuario === "0") {
                    break;
                }
                if ($usuario != $usuario_salvo) {
                    printf("%-30s\n", "Atenção: Usuário não cadastrado.");
                    readline("Pressione ENTER para tentar novamente...");
                    continue;
                }

                $senha = trim(readline("Senha: "));
                if ($senha === "0") {
                    break;
                }
                if ($senha != $senha_salva) {
                    printf("%-30s\n", "Atenção: Senha incorreta.");
                    readline("Pressione ENTER para tentar novamente...");
                    continue;
                }

                // Sistema
                while (true) {
                    system("clear");
                    printf("%-30s\n", "Sistema Principal");
                    printf("[ 1 ] %-30s\n", "Cadastrar Empresa");
                    printf("[ 2 ] %-30s\n", "Cadastrar Funcionários");
                    printf("[ 0 ] %-30s\n", "Voltar");

                    $opcao = trim(readline("Selecione uma Opção: "));
                    switch ($opcao) {
                        case '1':

                            while (true) {
                                system("clear");
                                printf("%-30s\n", "Cadastro de Empresas");
                                printf("%-30s\n", "--- Digite 0 para voltar ---");
                                $empresa_nome = trim(readline("Nome da Empresa: "));

                                if ($empresa_nome === "0") {
                                    break;
                                }
                                if ($empresa_nome == $empresa_nome_salvo) {
                                    printf("%-30s\n", "Atenção: Empresa já Cadastrada.");
                                    sleep(1);
                                    continue;
                                }

                                printf("%-30s\n", "Sucesso: Empresa Cadastrada.");
                                readline("Pressione ENTER para Voltar...");
                                break;
                            }
                            break;

                        case '2':
                            while (true) {

                                system("clear");
                                printf("%-30s\n", "Cadastro de Funcionários");
                                printf("%-30s\n", "--- Digite 0 para voltar ---");
                                $funcionario_nome = trim(readline("Nome do Funcionário: "));

                                if ($funcionario_nome === "0") {
                                    break;
                                }
                                if ($funcionario_nome == $funcionario_nome_salvo) {
                                    printf("%-30s\n", "Atenção: Funcionário já Cadastrado no Sistema.");
                                    readline("Pressione ENTER para tentar novamente...");
                                    continue;
                                }
                                $funcionario_senha = trim(readline("Senha de Acesso: "));

                                printf("%-30s\n", "Admin - Normal - Sistema");
                                $funcionario_tipo = trim(readline("Acesso do Usuário: "));

                                printf("%-30s\n", "Sucesso: Funcionário Cadastrado.");
                                readline("Pressione ENTER para Voltar...");
                                break;
                            }
                            break;

                        case '0':
                            printf("%-30s\n", "Aviso: Voltando...");
                            sleep(1);
                            break;

                        default:
                            printf("%-30s\n", "Atenção: Selecione uma Opção.");
                            sleep(1);
                            break;
                    }
                }
            }
            break; // Case = 1
        case '0':
            printf("%-30s\n", "Aviso: Saindo...");
            sleep(1);
            exit;

        default:
            printf("%-30s\n", "Atenção: Selecione uma Opção.");
            sleep(1);
            break;
    }
}
