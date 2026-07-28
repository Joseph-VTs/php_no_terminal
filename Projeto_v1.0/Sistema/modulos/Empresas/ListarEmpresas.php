<?php

function listarEmpresas() {
    system("clear");

    $caminhoDoArquivo = __DIR__ . '/empresas.json';

    // 1. Verifica se o arquivo existe
    if (!file_exists($caminhoDoArquivo)) {
        echo "Nenhuma empresa cadastrada ainda.\n";
        readline("\nPressione Enter para voltar ao menu...");
        return;
    }

    // 2. Lê os dados e transforma em array
    $jsonAtual = file_get_contents($caminhoDoArquivo);
    $todasAsEmpresas = json_decode($jsonAtual, true);

    // 3. Verifica se a lista está vazia
    if (empty($todasAsEmpresas)) {
        echo "A lista de empresas está vazia.\n";
        readline("\nPressione Enter para voltar ao menu...");
        return;
    }

    // ==========================================
    // MONTAGEM DA TABELA
    // ==========================================
    
    $divisoria = "+" . str_repeat("-", 6) . "+" . str_repeat("-", 27) . "+" . str_repeat("-", 20) . "+" . str_repeat("-", 12) . "+\n";

    echo "               LISTA DE EMPRESAS CADASTRADAS\n";
    echo $divisoria;
    
    // Cabeçalho da Tabela
    // %-Ns indica alinhamento à esquerda com largura fixa de N caracteres
    printf("| %-4s | %-25s | %-18s | %-10s |\n", "ID", "NOME DA EMPRESA", "CNPJ", "CEP");
    echo $divisoria;

    // Linhas da Tabela
    foreach ($todasAsEmpresas as $indice => $empresa) {
        $id   = $indice + 1;
        $nome = $empresa["Nome da Empresa"] ?? 'N/A';
        $cnpj = $empresa["CNPJ"] ?? 'N/A';
        $cep  = $empresa["CEP"] ?? 'N/A';

        // mb_strimwidth evita que nomes gigantes quebrem a estrutura da tabela
        $nomeFormatado = mb_strimwidth($nome, 0, 25, "...");
        $cnpjFormatado = mb_strimwidth($cnpj, 0, 18, "...");
        $cepFormatado  = mb_strimwidth($cep, 0, 10, "...");

        printf(
            "| %-4d | %-25s | %-18s | %-10s |\n",
            $id,
            $nomeFormatado,
            $cnpjFormatado,
            $cepFormatado
        );
    }

    echo $divisoria;
    echo "\nTotal de empresas: " . count($todasAsEmpresas) . "\n\n";

    readline("Pressione Enter para voltar ao menu...");
}