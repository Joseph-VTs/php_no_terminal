<?php
function listarFuncionariosCadastrados(){
    system("clear");
    $caminhoDoArquivo = __DIR__ . '/../Arquivos-Json/FuncionariosUsuarios.json';

    // 1. Verificar se o Arquivo Existe
    if(!file_exists($caminhoDoArquivo)){
        echo("⚠️ Nenhum arquivo foi encontrado. Comunique o ADM.\n");
        readline("🔹 Pressione Enter para Voltar ao Menu.");
        return;
    }

    // 2. Ler os Dados e também transformar em um array
    $arquivoJsonAtual = file_get_contents($caminhoDoArquivo);
    $osCadastrados = json_decode($arquivoJsonAtual, true);

    // 3. Verificação do Arquivo. Caso esteja vazio
    if(empty($osCadastrados)){
        echo("❗ Não há Funcionários/Usuários Cadastrados.\n");
        readline("🔹 Pressione Enter para Voltar ao Menu.");
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
    echo "\n🧩 Total de Funcionários/Usuários Cadastrados: " . count($osCadastrados) . "\n\n";

    readline("🔹 Pressione Enter para voltar ao menu...");
}

/* Próximas Etapas
    Opção de Editar
    Opção ver Detalhes
    Opção de Deletar
    
*/



    // ***** CLIENTES *****
    function listarClientesCadastrados(){
        system("clear");
        $caminhoDoArquivo = __DIR__ . '/../Arquivos-Json/ClientesCadastrados.json';

        // 1. Verificar se o Arquivo Existe
        if(!file_exists($caminhoDoArquivo)){
            echo("⚠️ Nenhum arquivo foi encontrado. Comunique o ADM.\n");
            readline("🔹 Pressione Enter para Voltar ao Menu.");
            return;
        }

        // 2. Ler os Dados e também transformar em um array
        $arquivoJsonAtual = file_get_contents($caminhoDoArquivo);
        $osCadastrados = json_decode($arquivoJsonAtual, true);

        // 3. Verificação do Arquivo. Caso esteja vazio
        if(empty($osCadastrados)){
            echo("❗ Não há Clientes Cadastrados no momento.\n");
            readline("🔹 Pressione Enter para Voltar ao Menu.");
            return;
        }

        // 4. Agora podemos Montar a Tabela
        $divisoria = "+" . str_repeat("-", 6) . 
                    "+" . str_repeat("-", 17) . 
                    "+" . str_repeat("-", 17) .
                    "+" . str_repeat("-", 7) .
                    "+" . str_repeat("-", 27) .
                    "+" . str_repeat("-", 22) .
                    "+" . str_repeat("-", 22) .
                    "+" . str_repeat("-", 12) .
                    "+\n";

        echo(str_repeat(" ", 29) . "LISTA DE CLIENTES CADASTRADOS\n");
        echo $divisoria;

        // 5. Cabeçalho da Tabela
        printf("| %-4s | %-15s | %-15s | %-5s | %-25s | %-20s | %-20s | %-10s |\n", "ID", "NOME", "SOBRENOME", "IDADE", "E-MAIL", "CIDADE", "BAIRRO", "N° Casa");
        echo $divisoria;

        // 6. Linhas da Tabela
        foreach($osCadastrados as $indice => $clientes){
            $id = $indice + 1;
            $nome = $clientes["Nome"]  ?? 'N/A';
            $sobrenome = $clientes["Sobrenome"] ?? 'N/A';
            $idade = (string)$clientes["Idade"] ?? 'N/A';
            $email = (string)$clientes["E-mail"] ?? 'N/A';
            $bairro = $clientes["Bairro"] ?? 'N/A';
            $cidade = $clientes["Cidade"] ?? 'N/A';
            $numeroDaCasa = (string)$clientes["Numero da Casa"] ?? 'N/A';

            // 6.1. Obs:
            require_once(__DIR__ . '/../Funcoes/Auxiliares.php');
            $nomeFormatado = formatarTextoComAcentos($nome, 15);
            $sobrenomeFormatado = formatarTextoComAcentos($sobrenome, 15);
            $cidadeFormatada = formatarTextoComAcentos($cidade, 20);
            $bairroFormatado = formatarTextoComAcentos($bairro, 20);
            $numeroDaCasaFormatado = formatarTextoComAcentos($numeroDaCasa, 10);
            $emailFormatado = formatarTextoComAcentos($email, 25);

            printf(
                "| %-4s | %-15s | %-15s | %-5s | %-25s | %-20s | %-20s | %-10s |\n",
                $id,
                $nomeFormatado,
                $sobrenomeFormatado,
                $idade,
                $emailFormatado,
                $cidadeFormatada,
                $bairroFormatado,
                $numeroDaCasaFormatado
            );
        }
        echo $divisoria;
        echo "\n🧩 Total de Clientes Cadastrados: " . count($osCadastrados) . "\n\n";

        readline("🔹 Pressione Enter para voltar ao menu...");
    }