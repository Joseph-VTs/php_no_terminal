<?php
while (true) {
    system("clear");
    echo (str_repeat("=", 30) . "\n");
    echo ("System From Users\n");
    printf("🔹 [ 1 ] %-30s\n", "Create");
    printf("🔹 [ 2 ] %-30s\n", "Read");
    printf("🔹 [ 0 ] %-30s\n", "Exit Sistem");
    echo (str_repeat("=", 30) . "\n");

    $ops = trim(readline("⭕ Select Option: "));
    switch ($ops) {
        case '0':
            echo ("🔸 Good bay. Exit System");
            exit();

        case '1':
            CreateUsers();
            break;

        case '2':
            ReadUsers();
            break;

        default:
            echo ("🔸 Try again. Option not ecxists\n");
            readline("Press Enter Continue: ");
            break;
    }
}

// 1°- Criamos o Usuário
function CreateUsers(){
    // Limpar Terminal
        system("clear");
    
    /* ---------- Menu ---------- */
    // Apresentação
        echo("🔹 User Registration Form\n");
        echo("🔹 Não pode Conter Acentuação Pois Gera Erro\n");
        echo("🔹 Digite 0 para sair\n");

    /* 1. ---------- Arquivo ---------- */
    // 1.1. Selecionar o Caminho
        $caminhoDoArquivo = __DIR__ . '/../ArquivosJson/jsonSimples.json';

    // 1.2. Verificar se Existe
        if (!file_exists($caminhoDoArquivo)) {
            echo ("❌ Arquivo Não Encontrado");
            readline(": ");
            return;
        }
        // 1.3. Verificar se Está Vazio
        if (empty($caminhoDoArquivo)) {
            echo("🔸 Nenhum Cadastrado. Arquivo Vazio...");
            readline(": ");
            return;
        }

    /* 2. ---------- Formulário ---------- */
    // 2.1. Os Campos / Perguntas
        $perguntasDoFormulario = ["Nome", "Sobrenome", "Data de Nascimento", "Idade", "Telefone", "País", "Estado", "Cidade", "Bairro"];
    // 2.2. Verificação e Validações dos Campos
        // Temos que fazer validações
    // 2.3. Após Preenchido Salvar as Resposta em:
        $respostaDoFormulario = [];
    // 2.4. Formulário
        foreach($perguntasDoFormulario as $pergunta){
            $resposta = trim(readline("Digite o seu/sua $pergunta: "));

            if($resposta === '0'){
                echo("🔸 Cancelando e Voltando...");
                sleep(1);
                return;
            }
            // Salvando os Dados
            $respostaDoFormulario[$pergunta] = $resposta;
        }

    /* 3. ---------- Dados Salvos ---------- */
    // 3.1. Se Não Salvo
    if(empty($respostaDoFormulario)){
        echo("❌ Respostas Não Foram Salvas. Consulte");
    } else{
    // 3.2. Se Sim Salvo
        echo("\n✅ Cadastro Realizado com Sucesso...\n");

        // 3.2.1. Mostrar Dados Salvos
        print_r($respostaDoFormulario);

        // 3.2.2. Salvar os Dados em:
        SalvarEmArquivoJson($respostaDoFormulario);

        // 3.2.3. Ok Poremos Voltar
        readline("🔸 Press Enter Continue: ");
        return;
    }
}

// 2°- Salvamos o Usuário
function SalvarEmArquivoJson($SaveForm){
    // 1. Pegar o Arquivo
        $caminhoDoArquivo = __DIR__ . '/../ArquivosJson/jsonSimples.json';
    // 1.1. Verificação do Arquivo
        if(!file_exists($caminhoDoArquivo)){
            echo("❌ Arquivo Não Existe\n");
            readline(": ");
            return;
        }
        if(file_exists($caminhoDoArquivo)){
            // 1.1.1. Pegando o Conteúdo
                $arquivoJsonAtual = file_get_contents($caminhoDoArquivo);
            // 1.1.2. Garantir que voltem como Array Associativo
                $jsonEmArray = json_decode($arquivoJsonAtual, true);
            // 1.1.3. Prevenção de Erros. Se arquivo exista mas esteja vazio
                if(is_array($jsonEmArray)){
                    $osCadastrados = $jsonEmArray;
                }
        }

    // 2. Pegar os que já Existem
        $osCadastrados = [];

    // 3. Salvar - Última Posição
        $osCadastrados[] = $SaveForm;

    // 4. Tranformar em Json
        $arquivoJsonNovo = json_encode($osCadastrados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        
    // 4.1. Sucesso? Sim : Não
        if(file_put_contents($caminhoDoArquivo, $arquivoJsonNovo)){
            echo("\n✅ Dados Salvo com Sucesso...\n");
        } else{
            echo("\n❌ Erro ao Salvar os Dados...");
        }
}

// 3°- Ler Usuários
function ReadUsers(){
    /* 1. ---------- Menu ---------- */
        system("clear");
        echo("🔸 Table From Users Registration\n");



    /* 2. ---------- Arquivo ---------- */
        $caminhoDoArquivo = __DIR__ . '/../ArquivosJson/jsonSimples.json';

        // 2.1. Se existe
            if(!file_exists($caminhoDoArquivo)){
                echo("❌ Arquivo Não Existe\n");
                readline(": ");
                return;
            }
        // 2.2. Se está Vazio
            if(empty($caminhoDoArquivo)){
                echo("🔸 Nenhum Cadastrado. Arquivo Vazio...");
                readline(": ");
                return;
            }
        // 2.3. Ler os Dados
            $arquivoJsonAtual = file_get_contents($caminhoDoArquivo);
        // 2.4. Transformar em um Array
            $osCadastrados = json_decode($arquivoJsonAtual, true);



    /* 3. ---------- Tabela ---------- */
    // 3.1. Divisória - Linhas
    // | %-25s | %-25s | %-20s | %-7s | %-16s | %-12s | %-8s | %-18s | %-20s |\n
        $divisoria = "+" . str_repeat("-", 27) .
                    "+" . str_repeat("-", 27) .
                    "+" . str_repeat("-", 22) .
                    "+" . str_repeat("-", 9) .
                    "+" . str_repeat("-", 18) .
                    "+" . str_repeat("-", 14) .
                    "+" . str_repeat("-", 10) .
                    "+" . str_repeat("-", 20) .
                    "+" . str_repeat("-", 22) .
                    "+" . "\n";

    // 3.2. Header Title
        echo("TABLE REGISTERED USERS");
        echo $divisoria;

    // 3.3. Header Table
        /* PROBLEMA !!!
            printf("| %-25s | %-25s | %-20s | %-7s | %-16s | %-12s | %-8s | %-18s | %-20s |", 
            "NOME",
            "SOBRENOME",
            "DATA DE NASCIMENTO",
            "IDADE",
            "TELEFONE",
            "PAÍS",
            "ESTADO",
            "CIDADE",
            "BAIRRO"
        );  SOLUÇÂO:*/

        // 3.3.1. Extrair as Chaves do JSON
            $chavesDoJson = array_keys($osCadastrados[0]);

        // 3.3.2. Tranformar as Chaves em Maiúsculas para o Cabeçalho
            $cabecalhoUpperCase = array_map('strtoupper', $chavesDoJson);

        // 3.3.3. Imprimir o Cabeçalho Formatado
            vprintf("| %-25s | %-25s | %-20s | %-7s | %-16s | %-12s | %-8s | %-18s | %-20s |\n", $cabecalhoUpperCase);
        echo $divisoria;

    // 3.4. Rows Table
        foreach($osCadastrados as $indice => $resposta){
            // Exibe a linha usando os valores do array diretamente, sem criar variáveis
            vprintf("| %-25s | %-25s | %-20s | %-7s | %-16s | %-12s | %-8s | %-18s | %-20s |\n", array_values($resposta));
        }
        echo $divisoria;
    
        // 3.5. Total de Cadastros
        echo("\nTotal de Cadastro: " . count($osCadastrados) . "\n\n");

        readline("🔸 Press Enter Continue: ");

}