<?php
// Definição de cores para o terminal
    define('COR_ERRO', "\033[31m");    // Vermelho
    define('COR_SUCESSO', "\033[32m"); // Verde
    define('COR_ATENCION', "\033[33m");    // Amarelo
    define('COR_MENU', "\033[34m");    // Azul
    define('COR_OPCAO', "\033[36m");   // Ciano
    define('COR_Branca', "\033[37m");   // Branco
    define('COR_RESET', "\033[0m");    // Reseta a cor

function limpar_terminal(){
    system(PHP_OS_FAMILY === 'Windows' ? 'cls' : 'clear');
}