<?php

$dados_empresa = [
    "Funcionários" => [
        "Nome" => [],
        "Senha" => [],
        "Tipo" => []
    ],
    "Clientes" => [
        "Nome" => [],
        "Idade" => [],
        "Telefone" => [],
    ]
];

$nome_empresa_cad = "Mercado do CESTTO";

while(true){
    system("clear");
    fwrite(STDOUT, str_repeat('-', 52));
    fwrite(STDOUT, "Menu da Empresa: " . $nome_empresa_cad);
    fwrite(STDOUT, str_repeat('-', 52) . "\n");
    printf("[ 1 ] - %-30s\n", "Cadastrar-se no Sistema");
    printf("[ 2 ] - %-30s\n", "Entrar no Sistema");
    printf("[ 0 ] - %-30s\n", "Sair do Sistema.");

    $opcao = trim(readline("Selecione uma Opção: "));

    switch($opcao){
        case '1':
            $funcionario_cad_nome = trim(readline("Nome de Usuário: "));
            if(!in_array($funcionario_cad_nome, $dados_empresa['Funcionários']['Nome'])){
                echo "Funcionário não Cadastrado";
                readline("Aperte ENTER para tentar novamente...");
                continue;
            }
            array_push($dados_empresa['Funcionários']['Nome'], $funcionario_cad_nome);
            $funcionario_cad_senha = trim(readline("Senha do Usuário: "));
            array_push($dados_empresa['Funcionários']['Senha'], $funcionario_cad_senha);
            $funcionario_cad_tipo = trim(readline("Tipo (adm - def): "));
            array_push($dados_empresa['Funcionários']['Tipo'], $funcionario_cad_tipo);
            
            echo "Usuário: " . $funcionario_cad_nome . ", cadastrado com sucesso.";
            sleep(3);
            break;
        case '2':
            while(true){
                system("clear");
                fwrite(STDOUT, str_repeat('-', 52) . "\n");
                fwrite(STDOUT, str_pad("Login", 52, " ", STR_PAD_BOTH) . "\n"); // Centralizar paravra
                fwrite(STDOUT, str_repeat('-', 52) .  "\n");
                fwrite(STDOUT, "Aperte 0, para voltar ao menu.\n");
                $funcionario_nome = trim(readline("Nome de Usuário: "));
                
                if($funcionario_nome == ""){
                    echo "não pode ser vazio.";
                    sleep(2);
                    continue;
                }

                // Voltar ao menu
                if($funcionario_nome === "0"){
                    echo "Voltando ao Menu...";
                    sleep(1);
                    $funcionario_nome = "";
                    break;
                }
                
                if(!in_array($funcionario_nome, $dados_empresa['Funcionários']['Nome'])){
                    echo "Usuário não Cadastrado\n";
                    readline("Aperte ENTER para voltar ao menu: ");
                    $funcionario_nome = "";
                    break;
                }

                
            }
            if($funcionario_nome != ""){
                while(true){
                    system("clear");
                    $funcionario_senha = trim(readline("Senha do Usuário: "));

                    if($funcionario_senha != $dados_empresa['Funcionários']['Senha'][array_search($funcionario_nome, $dados_empresa['Funcionários']['Nome'])]){
                        echo "Senha incorreta\n";
                        sleep(2);
                        continue;
                    }
                    break;
                }

                echo "Login realizado com Sucesso";
                sleep(1);

                if($dados_empresa['Funcionários']['Tipo'][array_search($funcionario_nome, $dados_empresa['Funcionários']['Nome'])] == "adm"){
                    system("clear");
                    while(true){
                        fwrite(STDOUT, str_repeat('-', 52) . "\n");
                        fwrite(STDOUT, str_pad("Seja Bem-Vindo, " . $funcionario_nome, 52, "", STR_PAD_BOTH) . "\n");
                        fwrite(STDOUT, str_repeat('-', 52) . "\n");
                        printf("[ 1 ] %-30s\n", "Cadastrar Clientes");
                        printf("[ 2 ] %-30s\n", "Consultar Clientes");
                        printf("[ 3 ] %-30s\n", "Cadastrar Produto");
                        printf("[ 4 ] %-30s\n", "Consultar Produto");
                        printf("[ 0 ] %-30s\n", "Sair - Deslogar - Logout");

                        $opcao = trim(readline("Selecione uma Opção"));
                        switch($opcao){
                            case '1':
                                // Cadastro de Clientes
                                fwrite(STDOUT, "Formulário de Cadastro de Clientes");
                                $cliente_cad_nome_completo = trim(readline("Nome completo: "));
                                if(in_array($cliente_cad_nome_completo, $dados_empresa['Clientes']['Nome'])){
                                    echo "Cliente já Cadastrado";
                                    sleep(3);
                                    continue;
                                }
                                array_push($dados_empresa['Clientes']['Nome'], $cliente_cad_nome_completo);
                                $cliente_cad_idade = trim(readline("Idade: "));
                                array_push($dados_empresa['Clientes']['Idade'], $cliente_cad_idade);
                                $cliente_cad_telefone = trim(readline("Telefone: "));
                                if(in_array($cliente_cad_telefone, $dados_empresa['Clientes']['Telefone'])){
                                    echo "Telefone já Cadastrado";
                                    sleep(3);
                                    continue;
                                }
                                array_push($dados_empresa['Clientes']['Telefone'], $cliente_cad_telefone);
                            case '2':
                                while(true){
                                    if($dados_empresa['Clientes'] == ""){
                                        echo "Nenhum cliente cadastrado";
                                    }
                                    readline("Pressione enter para voltar");
                                    break;
                                }
                            case '3':
                            case '4':
                            case '0':
                            default:
                        }
                    }

                } elseif($dados_empresa['Funcionários']['Tipo'][array_search($funcionario_nome, $dados_empresa['Funcionários']['Nome'])] == "def"){
                    while(true){
                        system("clear");
                        fwrite(STDOUT, str_repeat('-', 52));
                        fwrite(STDOUT, str_pad("Seja Bem-Vindo, " . $funcionario_nome, 52, "", STR_PAD_BOTH) . "\n");
                        fwrite(STDOUT, str_repeat('-', 52) . "\n");
                        printf("[ 1 ] %-30s\n", "Cadastrar Clientes");
                        printf("[ 2 ] %-30s\n", "Consultar Clientes");
                        printf("[ 3 ] %-30s\n", "Consultar Produto");
                        printf("[ 0 ] %-30s\n", "Sair - Deslogar - Logout");

                        $opcao = trim(readline("Selecione uma Opção"));
                        switch($opcao){
                            case '1':
                            case '2':
                            case '3':
                            case '0':
                            default:
                        }
                    }

                } else{
                    echo "sem permissões";
                    break;
                }
            }
            break;
        case '0':
            echo "Saindo do sistema...";
            sleep(2);
            exit;
        default:
            echo "opção não existe";
            sleep(2);
            break;
    }
}