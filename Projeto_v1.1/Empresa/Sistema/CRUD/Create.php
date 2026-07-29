<?php
function cadastrarNovoFuncionario(){
    system("clear");
    echo (str_repeat("=", 40) . "\n");
    echo("Formulário de Cadastro de Funcionário para usar o Sistema\n");
    echo "Digite 0 em qualquer campo para cancelar.\n";
    echo (str_repeat("=", 40) . "\n");
    
    // Formulário de Cadastro de Funcionários/Usuários
    // Acrescentar Email depois
    $camposDoFormulario = ["Nome", "Sobrenome", "Idade", "Senha"];
    $formularioPreenchido = []; // Guarda as Respostas

    foreach($camposDoFormulario as $campos){
        $entrada = trim(readline("Digite o(a) $campos: "));

        if($entrada === '0'){
            echo("Cancelando e voltando ao menu...");
            sleep(1);
            return;
        }

        // Salvar os dados
        $formularioPreenchido[$campos] = $entrada;
    }
        
    echo("\nCadastro realizado com Sucesso...\n");
    print_r($formularioPreenchido);

    // Próximo passo Salvar em Json
    require_once(__DIR__ . '/../Funcoes/ArquivoJson.php');
    salvarFuncionarioUsuarioJson($formularioPreenchido);

    // ok
    readline("Enter para voltar ao Menu");
}