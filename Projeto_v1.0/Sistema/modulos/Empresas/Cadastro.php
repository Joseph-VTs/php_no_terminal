<?php
function cadastrarEmpresa(){
    system("clear");
    echo (str_repeat("=", 40) . "\n");
    echo "Digite 0 em qualquer campo para cancelar.\n";
    echo (str_repeat("=", 40) . "\n");

    $opcoes = ["Nome da Empresa", "CNPJ", "CEP"];
    $dadosDaEmpresa = []; // Guarda as Resposta

    foreach($opcoes as $campo){
        $resposta = readline("Digite o(a) $campo: ");

        // if = 0 Cancelar e voltar ao menu
        if($resposta === '0'){
            echo "Cadastro cancelado. Voltando...\n";
            sleep(1);
            return;
        }

        // Salvar os dados
        $dadosDaEmpresa[$campo] = $resposta;
    }

    echo "\nCadastro finalizado com sucesso!\n";
    print_r($dadosDaEmpresa);
    salvarEmJson($dadosDaEmpresa);
    readline("Enter para Votar ao Menu.");
}

function salvarEmJson($SalvarEmpresa){
    $caminhoDoArquivo = __DIR__ . '/empresas.json';
    $todasAsEmpresas = [];

    // Verificação da Existência do Arquivo
    if(file_exists($caminhoDoArquivo)){
        $jsonAtual = file_get_contents($caminhoDoArquivo);
        // O true garante que volte como array associativo
        $dadosLidos = json_decode($jsonAtual, true); 
        
        // Previne erro caso o arquivo exista mas esteja vazio
        if (is_array($dadosLidos)) {
            $todasAsEmpresas = $dadosLidos;
        }
    }

    // Os colchetes indicam que estamos ADICIONANDO um item ao final do array
    $todasAsEmpresas[] = $SalvarEmpresa;

    $novoJson = json_encode($todasAsEmpresas, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    if (file_put_contents($caminhoDoArquivo, $novoJson)) {
        echo "\n✅ Empresa cadastrada e salva com sucesso!\n";
    } else {
        echo "\n❌ Erro ao salvar os dados no arquivo.\n";
    }
}