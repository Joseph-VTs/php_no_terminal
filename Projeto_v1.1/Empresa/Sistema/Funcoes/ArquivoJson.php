<?php
    function salvarFuncionarioUsuarioJson($formularioUsucarios){
        $caminhoDoArquivo = __DIR__ . '/../Arquivos-Json/FuncionariosUsuarios.json';

        // Os que já estão cadastrados e Arquivados
        $osCadastrados = [];

        // Verificar a existencia do Arquivo
        if(file_exists($caminhoDoArquivo)){
            $arquivoJsonAtual = file_get_contents($caminhoDoArquivo);

            // Garantir que volte como Array Associativo
            $dadosLidos = json_decode($arquivoJsonAtual, true);

            // Previnir erros, caso nosso arquivo exista mas esteja vazio
            if(is_array($dadosLidos)){
                $osCadastrados = $dadosLidos;
            }
        }

        // Salvar na última posição
        $osCadastrados[] = $formularioUsucarios;

        $arquivoJsonNovo = json_encode($osCadastrados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        if (file_put_contents($caminhoDoArquivo, $arquivoJsonNovo)) {
            echo "\n✅ Usuário cadastrado. Salvo com sucesso!\n";
        } else {
            echo "\n❌ Erro ao salvar os dados no arquivo.\n";
        }
    }



    // ***** CLIENTES *****
    function salvarClientesJson($formularioClientes){
        $caminhoDoArquivo = __DIR__ . '/../Arquivos-Json/ClientesCadastrados.json';

        // Os que já estão cadastrados e Arquivados
        $osCadastrados = [];

        // Verificar a existencia do Arquivo
        if(file_exists($caminhoDoArquivo)){
            $arquivoJsonAtual = file_get_contents($caminhoDoArquivo);

            // Garantir que volte como Array Associativo
            $dadosLidos = json_decode($arquivoJsonAtual, true);

            // Previnir erros, caso nosso arquivo exista mas esteja vazio
            if(is_array($dadosLidos)){
                $osCadastrados = $dadosLidos;
            }
        }

        // Salvar na última posição
        $osCadastrados[] = $formularioClientes;

        $arquivoJsonNovo = json_encode($osCadastrados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        if (file_put_contents($caminhoDoArquivo, $arquivoJsonNovo)) {
            echo "\n✅ Cliente cadastrado. Salvo com sucesso!\n";
        } else {
            echo "\n❌ Erro ao salvar os dados no arquivo.\n";
        }
    }