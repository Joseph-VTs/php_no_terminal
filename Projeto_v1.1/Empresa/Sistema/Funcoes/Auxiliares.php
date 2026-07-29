<?php
/* 
    O Problema
     - %-Ns do printf conta os bytes, e não os caracteres visuais.
     - O nome na tela (J-o-ã-o), tem 4 letras.
     - Mas ocupa 5 bytes no PHP por causa do ã.

    A Solução = 
     Para resolver isso de forma definitiva.
     Iremos criar uma pequena função auxiliar,
      que iremos calcular o tamanho visual "real" com (mb_strwidth), ele irá adicionar os espaços corretos manualmente.
     O mb_strimwidth evita que nomes gigantes quebrem a estrutura da tabela

*/
function formatarTextoComAcentos(string $texto, int $tamanhoDesejado): string {
    // 1. Trunca o texto se ele for maior que a coluna (usando largura visual)
    $textoFormatado = mb_strimwidth($texto, 0, $tamanhoDesejado, "...");
    
    // 2. Calcula a largura visual REAL do texto na tela
    $larguraVisual = mb_strwidth($textoFormatado);
    
    // 3. Descobre quantos espaços FALTAM para completar a coluna
    $espacosFaltando = max(0, $tamanhoDesejado - $larguraVisual);
    
    // 4. Retorna o texto seguido do número exato de espaços
    return $textoFormatado . str_repeat(" ", $espacosFaltando);
}