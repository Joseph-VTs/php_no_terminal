<?php 
while (true) { 
    system("clear"); 
    echo (str_repeat("=", 30) . "\n"); 
    echo ("System From Users\n"); 
    printf("🔹 [ 1 ] %-30s\n", "Create"); 
    printf("🔹 [ 2 ] %-30s\n", "Read"); 
    printf("🔹 [ 0 ] %-30s\n", "Exit System"); 
    echo (str_repeat("=", 30) . "\n"); 
    $ops = trim(readline("⭕ Select Option: ")); 
    
    switch ($ops) { 
        case '0': 
            echo ("🔸 Good bye. Exit System\n");
            exit(); 
        case '1': 
            CreateUsers(); 
            break; 
        case '2': 
            ReadUsers(); 
            break; 
        default: 
            echo ("🔸 Try again. Option not exists\n"); 
            readline("Press Enter Continue: "); 
            break; 
    } 
} 

// 1°- Criamos o Usuário 
function CreateUsers(){ 
    system("clear"); 
    /* ---------- Menu ---------- */ 
    echo("🔹 User Registration Form\n");
    echo("🔹 Não pode Conter Acentuação Pois Gera Erro\n");
    echo("🔹 Digite 0 para sair\n"); 
    
    /* 1. ---------- Arquivo ---------- */ 
    $caminhoDoArquivo = __DIR__ . '/../ArquivosJson/jsonSimples.json'; 
    
    // CORREÇÃO 1: Se o arquivo não existir, vamos criá-lo vazio em vez de barrar o usuário
    if (!file_exists($caminhoDoArquivo)) { 
        // Cria a pasta se não existir
        if (!is_dir(dirname($caminhoDoArquivo))) {
            mkdir(dirname($caminhoDoArquivo), 0777, true);
        }
        file_put_contents($caminhoDoArquivo, json_encode([]));
    } 
    
    /* 2. ---------- Formulário ---------- */ 
    $perguntasDoFormulario = ["Nome", "Sobrenome", "Data de Nascimento", "Idade", "Telefone", "Pais", "Estado", "Cidade", "Bairro"]; 
    $respostaDoFormulario = []; 
    
    foreach($perguntasDoFormulario as $pergunta){ 
        $resposta = trim(readline("Digite o seu/sua $pergunta: ")); 
        if($resposta === '0'){ 
            echo("🔸 Cancelando e Voltando...\n"); 
            sleep(1); 
            return; 
        } 
        $respostaDoFormulario[$pergunta] = $resposta; 
    } 
    
    /* 3. ---------- Dados Salvos ---------- */ 
    if(empty($respostaDoFormulario)){ 
        echo("❌ Respostas Não Foram Salvas. Consulte\n"); 
    } else { 
        echo("\n✅ Cadastro Realizado com Sucesso...\n"); 
        print_r($respostaDoFormulario); 
        
        SalvarEmArquivoJson($respostaDoFormulario); 
        readline("🔸 Press Enter Continue: "); 
        return; 
    } 
} 

// 2°- Salvamos o Usuário 
function SalvarEmArquivoJson($SaveForm){ 
    $caminhoDoArquivo = __DIR__ . '/../ArquivosJson/jsonSimples.json'; 
    
    // CORREÇÃO 2: Inicializa a variável antes para evitar que ela resete os dados antigos
    $osCadastrados = []; 
    
    if(file_exists($caminhoDoArquivo)){ 
        $arquivoJsonAtual = file_get_contents($caminhoDoArquivo); 
        $jsonEmArray = json_decode($arquivoJsonAtual, true); 
        
        if(is_array($jsonEmArray)){ 
            $osCadastrados = $jsonEmArray; // Recupera os usuários já salvos
        } 
    } 
    
    // Adiciona o novo usuário no final do array recuperado
    $osCadastrados[] = $SaveForm; 
    
    $arquivoJsonNovo = json_encode($osCadastrados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE); 
    
    if(file_put_contents($caminhoDoArquivo, $arquivoJsonNovo)){ 
        echo("✅ Dados Salvo com Sucesso...\n"); 
    } else { 
        echo("❌ Erro ao Salvar os Dados...\n"); 
    } 
} 

// 3°- Ler Usuários 
function ReadUsers(){ 
    /* 1. ---------- Menu ---------- */ 
    system("clear"); 
    
    /* 2. ---------- Arquivo ---------- */ 
    $caminhoDoArquivo = __DIR__ . '/../ArquivosJson/jsonSimples.json'; 
    
    if(!file_exists($caminhoDoArquivo)){ 
        echo("❌ Arquivo Não Existe\n"); 
        readline(": "); 
        return; 
    } 
    
    $arquivoJsonAtual = file_get_contents($caminhoDoArquivo); 
    $osCadastrados = json_decode($arquivoJsonAtual, true); 
    
    // CORREÇÃO 3: Verifica se o array do JSON está de fato vazio ou inválido antes de ler as chaves
    if(empty($osCadastrados) || !is_array($osCadastrados)){ 
        echo("🔸 Nenhum Cadastrado. Arquivo Vazio...\n"); 
        readline(": "); 
        return; 
    } 
    
    /* 3. ---------- Tabela ---------- */ 
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
    
    // Centralizando o Menu Superior com base na largura da divisória (185 caracteres)
    $larguraTabela = 185;
    echo str_pad("🔸 Table From Users Registration", $larguraTabela, " ", STR_PAD_BOTH) . "\n";
    echo str_pad("TABLE REGISTERED USERS", $larguraTabela, " ", STR_PAD_BOTH) . "\n";
    
    echo $divisoria; 
    
    // 3.3.1. Extrair as Chaves do JSON com segurança apontando para o primeiro item [0]
    $chavesDoJson = array_keys($osCadastrados[0]); 
    $cabecalhoUpperCase = array_map('strtoupper', $chavesDoJson); 
    
    // 3.3.3. Imprimir o Cabeçalho Formatado 
    vprintf("| %-25s | %-25s | %-20s | %-7s | %-16s | %-12s | %-8s | %-18s | %-20s |\n", $cabecalhoUpperCase); 
    echo $divisoria; 
    
    // 3.4. Rows Table 
    foreach($osCadastrados as $indice => $resposta){ 
        vprintf("| %-25s | %-25s | %-20s | %-7s | %-16s | %-12s | %-8s | %-18s | %-20s |\n", array_values($resposta)); 
    } 
    echo $divisoria; 
    
    /* 3.5. Total de Cadastros */ 
    echo("\nTotal de Cadastro: " . count($osCadastrados) . "\n\n"); 
    readline("🔸 Press Enter Continue: "); 
}
