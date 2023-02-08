<?php

/**
 * @author wildchered
 * @copyright 2007
 */

// SOMA DOS MESES DAS COMPETENCIAS
// DISCIPLINA
$disciplina_jan = ( $disciplina_jan * 5 ) / 100;
$disciplina_fev = ( $disciplina_fev * 5 ) / 100;
$disciplina_mar = ( $disciplina_mar * 5 ) / 100;
$disciplina_abr = ( $disciplina_abr * 5 ) / 100;
$disciplina_mai = ( $disciplina_mai * 5 ) / 100;
$disciplina_jun = ( $disciplina_jun * 5 ) / 100;
$disciplina_jul = ( $disciplina_jul * 5 ) / 100;
$disciplina_ago = ( $disciplina_ago * 5 ) / 100;
$disciplina_set = ( $disciplina_set * 5 ) / 100;
$disciplina_out = ( $disciplina_out * 5 ) / 100;
$disciplina_nov = ( $disciplina_nov * 5 ) / 100;
$disciplina_dez = ( $disciplina_dez * 5 ) / 100;
// DISCIPLINA
// PRODUTIVIDADE
$produtividade_jan = ( $produtividade_jan * 60 ) / 100;
$produtividade_fev = ( $produtividade_fev * 60 ) / 100;
$produtividade_mar = ( $produtividade_mar * 60 ) / 100;
$produtividade_abr = ( $produtividade_abr * 60 ) / 100;
$produtividade_mai = ( $produtividade_mai * 60 ) / 100;
$produtividade_jun = ( $produtividade_jun * 60 ) / 100;
$produtividade_jul = ( $produtividade_jul * 60 ) / 100;
$produtividade_ago = ( $produtividade_ago * 60 ) / 100;
$produtividade_set = ( $produtividade_set * 60 ) / 100;
$produtividade_out = ( $produtividade_out * 60 ) / 100;
$produtividade_nov = ( $produtividade_nov * 60 ) / 100;
$produtividade_dez = ( $produtividade_dez * 60 ) / 100;
// PRODUTIVIDADE
// ASSIDUIDADE
$assiduidade_jan = ( $assiduidade_jan * 20 ) / 100;
$assiduidade_fev = ( $assiduidade_fev * 20 ) / 100;
$assiduidade_mar = ( $assiduidade_mar * 20 ) / 100;
$assiduidade_abr = ( $assiduidade_abr * 20 ) / 100;
$assiduidade_mai = ( $assiduidade_mai * 20 ) / 100;
$assiduidade_jun = ( $assiduidade_jun * 20 ) / 100;
$assiduidade_jul = ( $assiduidade_jul * 20 ) / 100;
$assiduidade_ago = ( $assiduidade_ago * 20 ) / 100;
$assiduidade_set = ( $assiduidade_set * 20 ) / 100;
$assiduidade_out = ( $assiduidade_out * 20 ) / 100;
$assiduidade_nov = ( $assiduidade_nov * 20 ) / 100;
$assiduidade_dez = ( $assiduidade_dez * 20 ) / 100;
// ASSIDUIDADE
// RESPONSABILIDADE
$responsabilidade_jan = ( $responsabilidade_jan * 10 ) / 100;
$responsabilidade_fev = ( $responsabilidade_fev * 10 ) / 100;
$responsabilidade_mar = ( $responsabilidade_mar * 10 ) / 100;
$responsabilidade_abr = ( $responsabilidade_abr * 10 ) / 100;
$responsabilidade_mai = ( $responsabilidade_mai * 10 ) / 100;
$responsabilidade_jun = ( $responsabilidade_jun * 10 ) / 100;
$responsabilidade_jul = ( $responsabilidade_jul * 10 ) / 100;
$responsabilidade_ago = ( $responsabilidade_ago * 10 ) / 100;
$responsabilidade_set = ( $responsabilidade_set * 10 ) / 100;
$responsabilidade_out = ( $responsabilidade_out * 10 ) / 100;
$responsabilidade_nov = ( $responsabilidade_nov * 10 ) / 100;
$responsabilidade_dez = ( $responsabilidade_dez * 10 ) / 100;
// RESPONSABILIDADE
// RELACIONAMENTO
$relacionamento_jan = ( $relacionamento_jan * 5 ) / 100;
$relacionamento_fev = ( $relacionamento_fev * 5 ) / 100;
$relacionamento_mar = ( $relacionamento_mar * 5 ) / 100;
$relacionamento_abr = ( $relacionamento_abr * 5 ) / 100;
$relacionamento_mai = ( $relacionamento_mai * 5 ) / 100;
$relacionamento_jun = ( $relacionamento_jun * 5 ) / 100;
$relacionamento_jul = ( $relacionamento_jul * 5 ) / 100;
$relacionamento_ago = ( $relacionamento_ago * 5 ) / 100;
$relacionamento_set = ( $relacionamento_set * 5 ) / 100;
$relacionamento_out = ( $relacionamento_out * 5 ) / 100;
$relacionamento_nov = ( $relacionamento_nov * 5 ) / 100;
$relacionamento_dez = ( $relacionamento_dez * 5 ) / 100;
// RELACIONAMENTO

// SOMA POR MES E COM TODAS AS COMPETENCIAS
$total_jan = $disciplina_jan + $produtividade_jan + $assiduidade_jan + $responsabilidade_jan + $relacionamento_jan;
//$media_jan = $total_jan  / 5;
$total_fev = $disciplina_fev + $produtividade_fev + $assiduidade_fev + $responsabilidade_fev + $relacionamento_fev;
//$media_fev = $total_fev  / 5;
$total_mar = $disciplina_mar + $produtividade_mar + $assiduidade_mar + $responsabilidade_mar + $relacionamento_mar;
//$media_mar = $total_mar  / 5;
$total_abr = $disciplina_abr + $produtividade_abr + $assiduidade_abr + $responsabilidade_abr + $relacionamento_abr;
//$media_abr = $total_abr  / 5;
$total_mai = $disciplina_mai + $produtividade_mai + $assiduidade_mai + $responsabilidade_mai + $relacionamento_mai;
//$media_mai = $total_mai  / 5;
$total_jun = $disciplina_jun + $produtividade_jun + $assiduidade_jun + $responsabilidade_jun + $relacionamento_jun;
//$media_jun = $total_jun  / 5;

echo $total_jan;
$media1_final = $total_jan + $total_fev + $total_mar + $total_abr + $total_mai + $total_jun / 6;

/*
$total_jul = $disciplina_jul + $produtividade_jul + $assiduidade_jul + $responsabilidade_jul + $relacionamento_jul;
$media_jul = $total_jul  / 5;
$total_ago = $disciplina_ago + $produtividade_ago + $assiduidade_ago + $responsabilidade_ago + $relacionamento_ago;
$media_ago = $total_ago  / 5;
$total_set = $disciplina_set + $produtividade_set + $assiduidade_set + $responsabilidade_set + $relacionamento_set;
$media_set = $total_set  / 5;
$total_out = $disciplina_out + $produtividade_out + $assiduidade_out + $responsabilidade_out + $relacionamento_out;
$media_out = $total_out  / 5;
$total_nov = $disciplina_nov + $produtividade_nov + $assiduidade_nov + $responsabilidade_nov + $relacionamento_nov;
$media_nov = $total_nov  / 5;
$total_dez = $disciplina_dez + $produtividade_dez + $assiduidade_dez + $responsabilidade_dez + $relacionamento_dez;
$media_dez = $total_dez  / 5;

*/
$media2_final = $total_jul + $total_ago + $total_set + $total_out + $total_nov + $total_dez / 6;
// SOMA POR MES E COM TODAS AS COMPETENCIAS



?>