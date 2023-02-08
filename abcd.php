<?php

$qtd_de_bolas = 10; // Pelo que entendi, o sorteio será de 17 bolas, peguei a analogia do bingo

// O 'for' abaixo vai gravar no vetor $numeros_sorteados os números sorteados
// O vetor vai começar na posição 0 e vai até a posição 16, ou seja, 17 posições

for ($contador = 0; $contador < $qtd_de_bolas; $contador ++)
    $numeros_sorteados[$contador] = rand(0,270);

// A exibição poderia estar no 'for' acima, mas para fins didáticos vou colocar outro 'for' para ficar mais
// claro que ficou gravado no vetor

for ($contador = 0; $contador < $qtd_de_bolas; $contador ++)
    print("Crachá ". $contador.": ". $numeros_sorteados[$contador]."<br />");

?>