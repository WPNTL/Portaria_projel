<?php

$qtd_de_bolas = 10; // Pelo que entendi, o sorteio ser� de 17 bolas, peguei a analogia do bingo

// O 'for' abaixo vai gravar no vetor $numeros_sorteados os n�meros sorteados
// O vetor vai come�ar na posi��o 0 e vai at� a posi��o 16, ou seja, 17 posi��es

for ($contador = 0; $contador < $qtd_de_bolas; $contador ++)
    $numeros_sorteados[$contador] = rand(0,270);

// A exibi��o poderia estar no 'for' acima, mas para fins did�ticos vou colocar outro 'for' para ficar mais
// claro que ficou gravado no vetor

for ($contador = 0; $contador < $qtd_de_bolas; $contador ++)
    print("Crach� ". $contador.": ". $numeros_sorteados[$contador]."<br />");

?>