<?php
function listarFuncionariosCadastrados(){
    system("clear");
    $caminhoDoArquivo = __DIR__ . '/../Arquivos-Json/FuncionariosUsuarios.json';

    // 1. Verificar se o Arquivo Existe
    if(!file_exists($caminhoDoArquivo)){
        echo("⚠ Nenhum arquivo foi encontrado. Comunique o ADM.\n");
        readline("Pressione Enter para Voltar ao Menu.");
        return;
    }

    // 2. Ler os Dados e também transformar em um array
    $arquivoJsonAtual = file_get_contents($caminhoDoArquivo);
    $osCadastrados = json_decode($arquivoJsonAtual, true);

    // 3. Verificação do Arquivo. Caso esteja vazio
    if(empty($osCadastrados)){
        echo("Não há Funcionários/Usuários Cadastrados.\n");
        readline("Pressione Enter para Voltar ao Menu.");
        return;
    }

    // 4. Agora podemos Montar a Tabela
    $divisoria = "+" . str_repeat("-", 6) . 
                "+" . str_repeat("-", 32) . 
                "+" . str_repeat("-", 42) . 
                "+" . str_repeat("-", 7) . 
                "+\n";

    echo(str_repeat(" ", 29) . "LISTA DE FUNCIONÁRIOS/USUÁRIOS CADASTRADOS\n");
    echo $divisoria;

    // 5. Cabeçalho da Tabela
    printf("| %-4s | %-30s | %-40s | %-5s |\n", "ID", "NOME", "SOBRENOME", "IDADE");
    echo $divisoria;

    // 6. Linhas da Tabela
    foreach($osCadastrados as $indice => $funcionario){
        $id = $indice + 1;
        $nome = $funcionario["Nome"]  ?? 'N/A';
        $sobrenome = $funcionario["Sobrenome"] ?? 'N/A';
        $idade = (string)$funcionario["Idade"] ?? 'N/A';

        // 6.1. Obs:
        require_once(__DIR__ . '/../Funcoes/Auxiliares.php');
        $nomeFormatado = formatarTextoComAcentos($nome, 30);
        $sobrenomeFormatado = formatarTextoComAcentos($sobrenome, 40);
        $idadeFormatado = formatarTextoComAcentos($idade, 5);

        printf(
            "| %-4d | %-30s | %-40s | %-5s |\n",
            $id,
            $nomeFormatado,
            $sobrenomeFormatado,
            $idadeFormatado
        );
    }
    echo $divisoria;
    echo "\nTotal de Funcionários/Usuários Cadastrados: " . count($osCadastrados) . "\n\n";

    readline("Pressione Enter para voltar ao menu...");
}

/* Próximas Etapas
    Opção de Editar
    Opção ver Detalhes
    Opção de Deletar
    
*/