<?php
function cadastrarNovoFuncionario(){
    system("clear");
    echo (str_repeat("=", 40) . "\n");
    echo("Formulário de Cadastro de Funcionário\n");
    echo "Digite 0 em qualquer campo para cancelar.\n";
    echo (str_repeat("=", 40) . "\n");
    
    // Adicionamos o campo "Tipo" para o controle de acesso (RBAC)
    $camposDoFormulario = ["Nome", "Sobrenome", "Idade", "Tipo", "Senha"];
    $formularioPreenchido = []; 

    foreach($camposDoFormulario as $campos){
        while (true) {
            // Tratamento especial para o campo "Tipo" (Menu de Permissões)
            if ($campos === "Tipo") {
                echo "\nSelecione o Nível de Acesso:\n";
                echo "[ 1 ] ADM (Acesso total ao sistema)\n";
                echo "[ 2 ] Create (Cadastrar e Ler)\n";
                echo "[ 3 ] Read (Apenas Leitura)\n";
                $opcaoTipo = trim(readline("Digite a opção (1, 2 ou 3): "));

                if ($opcaoTipo === '0') {
                    echo "⭕ Cancelando e voltando ao menu...\n";
                    sleep(1);
                    return;
                }

                if ($opcaoTipo === '1') {
                    $entrada = 'adm';
                } elseif ($opcaoTipo === '2') {
                    $entrada = 'create';
                } elseif ($opcaoTipo === '3') {
                    $entrada = 'read';
                } else {
                    echo "⚠️ Opção inválida! Escolha 1, 2 ou 3.\n\n";
                    continue; // Pede a opção de novo
                }
            } else {
                // Leitura normal para os outros campos
                $entrada = trim(readline("Digite o(a) $campos: "));

                if($entrada === '0'){
                    echo("⭕ Cancelando e voltando ao menu...\n");
                    sleep(1);
                    return;
                }
            }

            // Validação de Idade
            if ($campos === "Idade") {
                if (!is_numeric($entrada) || (int)$entrada < 18) {
                    echo "⚠️ O Funcionário deve ser maior de 18 anos. Tente novamente.\n\n";
                    continue; // Repete apenas a pergunta da idade
                }
            }

            // Validação e Hash da Senha
            if ($campos === "Senha") {
                if (mb_strlen($entrada) < 4) {
                    echo "⚠️ A senha deve ter pelo menos 4 caracteres. Tente novamente.\n\n";
                    continue; // Repete apenas a senha
                }
                
                // Transforma a senha em um Hash seguro antes de salvar
                $entrada = password_hash($entrada, PASSWORD_DEFAULT);
            }

            // Dado validado: salva no array e avança para o próximo campo do foreach
            $formularioPreenchido[$campos] = $entrada;
            break; 
        }
    }
        
    echo("\n✅ Cadastro realizado com Sucesso...\n");
    
    // Exibição amigável (ocultando o hash gigante da senha no print_r)
    $preview = $formularioPreenchido;
    $preview['Senha'] = '******** (Hash Seguro Gerado)';
    print_r($preview);

    // Salvar em Json
    require_once(__DIR__ . '/../Funcoes/ArquivoJson.php');
    salvarFuncionarioUsuarioJson($formularioPreenchido);

    readline("🔹 Pressione Enter para voltar ao Menu: ");
}





/****** CLIENTES ******/
function cadastrarNovoCliente(){
    system("clear");
    echo (str_repeat("=", 40) . "\n");
    echo("Formulário de Cadastro de Clientes\n");
    echo "Digite 0 em qualquer campo para cancelar.\n";
    echo (str_repeat("=", 40) . "\n");
    
    $camposDoFormulario = ["Nome", "Sobrenome", "Idade", "CPF", "E-mail", "Cidade", "Bairro", "Rua", "Numero da Casa"];
    $formularioPreenchido = []; // Guarda as Respostas

    foreach($camposDoFormulario as $campos){
        // Laço interno: mantém o usuário no MESMO campo até ele digitar um valor válido
        while (true) {
            $entrada = trim(readline("Digite o(a) $campos: "));

            // 1. Condição de Cancelamento
            if($entrada === '0'){
                echo("⭕ Cancelando e voltando ao menu...\n");
                sleep(1);
                return;
            }

            // 2. Validação de Idade
            if ($campos === "Idade") {
                if (!is_numeric($entrada) || (int)$entrada < 18) {
                    echo "⚠️ O cliente deve ser maior de 18 anos. Tente novamente.\n\n";
                    continue; // Volta para o início do while para pedir a idade de novo
                }
            }

            // 3. Validação de CPF
            if ($campos === "CPF") {
                $cpfFormatado = formatarCPF($entrada);
                if ($cpfFormatado === null) {
                    echo "⚠️ CPF inválido! Digite os 11 números (ex: 12345678901).\n\n";
                    continue; // Volta para o início do while para pedir o CPF de novo
                }
                $entrada = $cpfFormatado; // Substitui pelo CPF limpo e com máscara
            }

            // 4. Validação de E-mail
            if ($campos === "E-mail") {
                if (!filter_var($entrada, FILTER_VALIDATE_EMAIL)) {
                    echo "⚠️ E-mail inválido! Certifique-se de incluir o '@' e um domínio válido.\n\n";
                    continue; // Volta para o início do while para pedir o e-mail de novo
                }
            }

            // 5. Se passou por todas as validações
            $formularioPreenchido[$campos] = $entrada;
            break; // Sai apenas do 'while' interno e avança para o próximo campo do foreach
        }
    }
        
    echo("\n✅ Cadastro realizado com Sucesso...\n");
    print_r($formularioPreenchido);

    // Salvar em Json
    require_once(__DIR__ . '/../Funcoes/ArquivoJson.php');
    salvarClientesJson($formularioPreenchido);

    readline("🔹 Pressione Enter para voltar ao Menu: ");
}