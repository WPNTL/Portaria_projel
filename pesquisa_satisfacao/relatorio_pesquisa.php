<? include "config_pesquisa.php"; ?> 
<html>
<head>
<title> Relatório Pesquisa Satisfação de Cliente </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" src="funcoes/geral.js"></script>
</head>
<body>

<? $valor_2_radion = 3; $valor_3_radion = 4; ?>

<table class=sem_borda width="1200" align="center">
<tr><td>

<table class=titulo width=100% align="center" height="25">
<tr><td><b><font size="5" color="#000000"> Relatório Pesquisa Satisfação de Cliente </font></b></td></tr></table>
<br>

<FORM NAME="pesquisa" method="post">

<?
$sql = "SELECT * FROM pesos_por_graus order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
while ($linha=mysql_fetch_array($resultado)) {
$graus_importancia = $linha["graus_importancia"]; $graus_satisfacao = $linha["graus_satisfacao"]; $graus_concorrencia = $linha["graus_concorrencia"];  
   
$graus_importancia_baixo = $linha["graus_importancia_baixo"]; 
$graus_importancia_medio = $linha["graus_importancia_medio"]; 
$graus_importancia_alto = $linha["graus_importancia_alto"];

$graus_satisfacao_baixo = $linha["graus_satisfacao_baixo"]; 
$graus_satisfacao_medio = $linha["graus_satisfacao_medio"]; 
$graus_satisfacao_alto = $linha["graus_satisfacao_alto"];

$graus_concorrencia_melhor = $linha["graus_concorrencia_melhor"]; 
$graus_concorrencia_igual = $linha["graus_concorrencia_igual"]; 
$graus_concorrencia_deles = $linha["graus_concorrencia_deles"];
}

/* IMPORTANCIA */
$peso_imp_atend_dep_comercial = "2"; 
$peso_imp_atend_rep = "1";
$peso_imp_atend_dep_projeto = "1";
$peso_imp_atend_pcp = "1";
$peso_imp_atend_dep_exp = "1";
$peso_imp_assis_tec = "1";
$peso_imp_catalagos_tec = "1";
$peso_imp_cond_de_pag = "2";
$peso_imp_embalagem = "1";
$peso_imp_prazo_ent = "2";
$peso_imp_preco_prod = "2";
$peso_imp_prog_selecao = "1";
$peso_imp_qualidade_prod = "5";
$peso_imp_seg_prod = "1";
$peso_imp_variedade_prod = "1";
$peso_imp_conduta_equipe_tec = "1";
$peso_imp_cumpr_prazo = "1";
$peso_imp_equipe_confiabilidade_qualificacao = "1";
$peso_imp_equipes_disponiveis_atend = "1";
$peso_imp_facilidade_solicitacoes = "1";
$peso_imp_qualidade_servicos = "1";
$peso_imp_rapido_atend_telefone = "1";
$soma_pesos_imp = $peso_imp_atend_dep_comercial + $peso_imp_atend_rep + $peso_imp_atend_dep_projeto + $peso_imp_atend_pcp + $peso_imp_atend_dep_exp + $peso_imp_assis_tec + $peso_imp_catalagos_tec + $peso_imp_cond_de_pag + $peso_imp_embalagem + $peso_imp_prazo_ent + $peso_imp_preco_prod + $peso_imp_prog_selecao + $peso_imp_qualidade_prod + $peso_imp_seg_prod + $peso_imp_variedade_prod + $peso_imp_conduta_equipe_tec + $peso_imp_cumpr_prazo + $peso_imp_equipe_confiabilidade_qualificacao + $peso_imp_equipes_disponiveis_atend + $peso_imp_facilidade_solicitacoes + $peso_imp_qualidade_servicos + $peso_imp_rapido_atend_telefone;

/* SATISFAÇÃO */
$peso_sat_atend_dep_comercial = "2"; 
$peso_sat_atend_rep = "1";
$peso_sat_atend_dep_projeto = "1";
$peso_sat_atend_pcp = "1";
$peso_sat_atend_dep_exp = "1";
$peso_sat_assis_tec = "1";
$peso_sat_catalagos_tec = "1";
$peso_sat_cond_de_pag = "2";
$peso_sat_embalagem = "1";
$peso_sat_prazo_ent = "2";
$peso_sat_preco_prod = "2";
$peso_sat_prog_selecao = "1";
$peso_sat_qualidade_prod = "5";
$peso_sat_seg_prod = "1";
$peso_sat_variedade_prod = "1";
$peso_sat_conduta_equipe_tec = "1";
$peso_sat_cumpr_prazo = "1";
$peso_sat_equipe_confiabilidade_qualificacao = "1";
$peso_sat_equipes_disponiveis_atend = "1";
$peso_sat_facilidade_solicitacoes = "1";
$peso_sat_qualidade_servicos = "1";
$peso_sat_rapido_atend_telefone = "1";
$soma_pesos_sat = $peso_sat_atend_dep_comercial + $peso_sat_atend_rep + $peso_sat_atend_dep_projeto + $peso_sat_atend_pcp + $peso_sat_atend_dep_exp + $peso_sat_assis_tec + $peso_sat_catalagos_tec + $peso_sat_cond_de_pag + $peso_sat_embalagem + $peso_sat_prazo_ent + $peso_sat_preco_prod + $peso_sat_prog_selecao + $peso_sat_qualidade_prod + $peso_sat_seg_prod + $peso_sat_variedade_prod + $peso_sat_conduta_equipe_tec + $peso_sat_cumpr_prazo + $peso_sat_equipe_confiabilidade_qualificacao + $peso_sat_equipes_disponiveis_atend + $peso_sat_facilidade_solicitacoes + $peso_sat_qualidade_servicos + $peso_sat_rapido_atend_telefone;

/* CONCORRENCIA */
$peso_conc_atend_dep_comercial = "2"; 
$peso_conc_atend_rep = "1";
$peso_conc_atend_dep_projeto = "1";
$peso_conc_atend_pcp = "1";
$peso_conc_atend_dep_exp = "1";
$peso_conc_assis_tec = "1";
$peso_conc_catalagos_tec = "1";
$peso_conc_cond_de_pag = "2";
$peso_conc_embalagem = "1";
$peso_conc_prazo_ent = "2";
$peso_conc_preco_prod = "2";
$peso_conc_prog_selecao = "1";
$peso_conc_qualidade_prod = "5";
$peso_conc_seg_prod = "1";
$peso_conc_variedade_prod = "1";
$peso_conc_conduta_equipe_tec = "1";
$peso_conc_cumpr_prazo = "1";
$peso_conc_equipe_confiabilidade_qualificacao = "1";
$peso_conc_equipes_disponiveis_atend = "1";
$peso_conc_facilidade_solicitacoes = "1";
$peso_conc_qualidade_servicos = "1";
$peso_conc_rapido_atend_telefone = "1";
$soma_pesos_conc = $peso_conc_atend_dep_comercial + $peso_conc_atend_rep + $peso_conc_atend_dep_projeto + $peso_conc_atend_pcp + $peso_conc_atend_dep_exp + $peso_conc_assis_tec + $peso_conc_catalagos_tec + $peso_conc_cond_de_pag + $peso_conc_embalagem + $peso_conc_prazo_ent + $peso_conc_preco_prod + $peso_conc_prog_selecao + $peso_conc_qualidade_prod + $peso_conc_seg_prod + $peso_conc_variedade_prod + $peso_conc_conduta_equipe_tec + $peso_conc_cumpr_prazo + $peso_conc_equipe_confiabilidade_qualificacao + $peso_conc_equipes_disponiveis_atend + $peso_conc_facilidade_solicitacoes + $peso_conc_qualidade_servicos + $peso_conc_rapido_atend_telefone;
 
?>

<table class=sem_borda width=100% align="center">
<td>

<tr>
<td class=borda rowspan="3"><b><font size="3" color="#FF0000"> Itens Gerais </font></b></td>
<td class=borda rowspan="3"><b><font size="1" color="#FF0000"> Dim Qual </font></b></td>
<td class=borda colspan="6"><b><font size="3" color="#FF0000"> Grau de Importância </font></b></td>
<td class=sem_borda > &nbsp; </td>
<td class=borda colspan="6"><b><font size="3" color="#FF0000"> Grau de Satisfação </font></b></td>
<td class=sem_borda > &nbsp; </td>
<td class=borda colspan="6"><b><font size="3" color="#FF0000"> Nossa Empresa em relação a Concorrência </font></b></td>
</tr>

<tr>
<?/* IMPORTÂNCIA  */ ?>
<td class=borda > &nbsp; <BR></td>
<td class=borda > Baixo <BR></td>
<td class=borda > Médio <BR></td>
<td class=borda > Alto <BR></td>
<td class=borda > % <BR></td>
<td class=borda > &nbsp; <BR></td>
<td class=sem_borda > &nbsp; <BR></td>
<?/*  SATISFAÇÃO  */ ?>
<td class=borda > &nbsp; <BR></td>
<td class=borda > Baixo <BR></td>
<td class=borda > Médio <BR></td>
<td class=borda > Alto <BR></td>
<td class=borda > % <BR></td>
<td class=borda > &nbsp; <BR></td>
<td class=sem_borda > &nbsp; <BR></td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=borda > &nbsp; <BR></td>
<td class=borda width=5%> Projelmec é Melhor <BR></td>
<td class=borda width=5%> Projelmec é Igual <BR></td>
<td class=borda width=4%> Deles é Melhor <BR></td>
<td class=borda > % <BR></td>
<td class=borda > &nbsp; <BR></td>
</tr>

<tr>
<?/* IMPORTÂNCIA  */ ?>
<td class=borda > Peso Item <BR></td>
<td class=borda > <? echo $graus_importancia_baixo ?> <BR></td>
<td class=borda > <? echo $graus_importancia_medio ?> <BR></td>
<td class=borda > <? echo $graus_importancia_alto ?> <BR></td>
<td class=borda > <? echo $graus_importancia ?> <BR></td>
<td class=borda > Comp. <BR></td>
<td class=sem_borda > &nbsp; <BR></td>
<?/*  SATISFAÇÃO  */ ?>
<td class=borda > Peso Item <BR></td>
<td class=borda > <? echo $graus_satisfacao_baixo ?> <BR></td>
<td class=borda > <? echo $graus_satisfacao_medio ?> <BR></td>
<td class=borda > <? echo $graus_satisfacao_alto ?> <BR></td>
<td class=borda > <? echo $graus_satisfacao ?> <BR></td>
<td class=borda > Comp. <BR></td>
<td class=sem_borda > &nbsp; <BR></td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=borda > Peso Item <BR></td>
<td class=borda > <? echo $graus_concorrencia_melhor ?> <BR></td>
<td class=borda > <? echo $graus_concorrencia_igual ?> <BR></td>
<td class=borda > <? echo $graus_concorrencia_deles ?> <BR></td>
<td class=borda > <? echo $graus_concorrencia ?> <BR></td>
<td class=borda > Comp. <BR></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda > 1) Atendimento do Dep. Comercial &nbsp;</td>
<?
for ($i=1; $i<$valor_3_radion; $i++) { 
$sql = "SELECT * FROM pesquisa_satisfacao WHERE atendimento_dep_comercial_importancia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$atendimento_dep_comercial_importancia[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE atendimento_dep_comercial_satisfacao='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$atendimento_dep_comercial_satisfacao[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE atendimento_dep_comercial_concorrencia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$atendimento_dep_comercial_concorrencia[$i] = mysql_num_rows($resultado);
}

$num_pesq = $atendimento_dep_comercial_importancia[1] + $atendimento_dep_comercial_importancia[2] + $atendimento_dep_comercial_importancia[3];

?>
<td class=sem_borda > E <BR></td>

<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_imp_atend_dep_comercial?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_dep_comercial_importancia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_dep_comercial_importancia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_dep_comercial_importancia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_imp_1 = ($graus_importancia_baixo * $atendimento_dep_comercial_importancia[1] + $graus_importancia_medio*$atendimento_dep_comercial_importancia[2] + $graus_importancia_alto * $atendimento_dep_comercial_importancia[3])*100/($num_pesq * $graus_importancia),2,',',''); ?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_imp_1 = $perc_imp_1 * $peso_imp_atend_dep_comercial / $soma_pesos_imp,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_sat_atend_dep_comercial?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_dep_comercial_satisfacao[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_dep_comercial_satisfacao[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_dep_comercial_satisfacao[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_sat_1 = ($graus_satisfacao_baixo * $atendimento_dep_comercial_satisfacao[1] + $graus_satisfacao_medio*$atendimento_dep_comercial_satisfacao[2] + $graus_satisfacao_alto*$atendimento_dep_comercial_satisfacao[3])*100/($num_pesq * $graus_satisfacao),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_sat_1 = $perc_sat_1 * $peso_sat_atend_dep_comercial / $soma_pesos_sat,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_conc_atend_dep_comercial?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_dep_comercial_concorrencia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_dep_comercial_concorrencia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_dep_comercial_concorrencia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_conc_1 = ($graus_concorrencia_melhor * $atendimento_dep_comercial_concorrencia[1] + $graus_concorrencia_igual*$atendimento_dep_comercial_concorrencia[2] + $graus_concorrencia_deles*$atendimento_dep_comercial_concorrencia[3])*100/($num_pesq * $graus_concorrencia),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_conc_1 = $perc_conc_1 * $peso_conc_atend_dep_comercial / $soma_pesos_conc,2,',','');?> ></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 2) Atendimento Representante &nbsp;</td>
<?
for ($i=1; $i<$valor_3_radion; $i++) { 
$sql = "SELECT * FROM pesquisa_satisfacao WHERE atendimento_representante_importancia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$atendimento_representante_importancia[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE atendimento_representante_satisfacao='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$atendimento_representante_satisfacao[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE atendimento_representante_concorrencia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$atendimento_representante_concorrencia[$i] = mysql_num_rows($resultado);
}
?>
<td class=sem_borda > E <BR></td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_imp_atend_rep?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_representante_importancia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_representante_importancia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_representante_importancia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_imp_2 = ($graus_importancia_baixo * $atendimento_representante_importancia[1] + $graus_importancia_medio*$atendimento_representante_importancia[2] + $graus_importancia_alto*$atendimento_representante_importancia[3])*100/($num_pesq * $graus_importancia),2,',',''); ?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_imp_2 = $perc_imp_2 * $peso_imp_atend_rep / $soma_pesos_imp,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_sat_atend_rep?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_representante_satisfacao[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_representante_satisfacao[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_representante_satisfacao[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_sat_2 = ($graus_satisfacao_baixo * $atendimento_representante_satisfacao[1] + $graus_satisfacao_medio*$atendimento_representante_satisfacao[2] + $graus_satisfacao_alto*$atendimento_representante_satisfacao[3])*100/($num_pesq * $graus_satisfacao),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_sat_2 = $perc_sat_2 * $peso_sat_atend_rep / $soma_pesos_sat,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_conc_atend_rep?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_representante_concorrencia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_representante_concorrencia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_representante_concorrencia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_conc_2 = ($graus_concorrencia_melhor * $atendimento_representante_concorrencia[1] + $graus_concorrencia_igual*$atendimento_representante_concorrencia[2] + $graus_concorrencia_deles*$atendimento_representante_concorrencia[3])*100/($num_pesq * $graus_concorrencia),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_conc_2 = $perc_conc_2 * $peso_conc_atend_rep / $soma_pesos_conc,2,',','');?> ></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 3) Atendimento Dep. Projeto &nbsp;</td>
<?
for ($i=1; $i<$valor_3_radion; $i++) { 
$sql = "SELECT * FROM pesquisa_satisfacao WHERE atendimento_dep_projeto_importancia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$atendimento_dep_projeto_importancia[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE atendimento_dep_projeto_satisfacao='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$atendimento_dep_projeto_satisfacao[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE atendimento_dep_projeto_concorrencia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$atendimento_dep_projeto_concorrencia[$i] = mysql_num_rows($resultado);
}
?>
<td class=sem_borda > E <BR></td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_imp_atend_dep_projeto?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_dep_projeto_importancia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_dep_projeto_importancia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_dep_projeto_importancia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_imp_3 = ($graus_importancia_baixo * $atendimento_dep_projeto_importancia[1] + $graus_importancia_medio*$atendimento_dep_projeto_importancia[2] + $graus_importancia_alto*$atendimento_dep_projeto_importancia[3])*100/($num_pesq * $graus_importancia),2,',',''); ?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_imp_3 = $perc_imp_3 * $peso_imp_atend_dep_projeto / $soma_pesos_imp,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_sat_atend_dep_projeto?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_dep_projeto_satisfacao[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_dep_projeto_satisfacao[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_dep_projeto_satisfacao[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_sat_3 = ($graus_satisfacao_baixo * $atendimento_dep_projeto_satisfacao[1] + $graus_satisfacao_medio*$atendimento_dep_projeto_satisfacao[2] + $graus_satisfacao_alto*$atendimento_dep_projeto_satisfacao[3])*100/($num_pesq * $graus_satisfacao),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_sat_3 = $perc_sat_3 * $peso_sat_atend_dep_projeto / $soma_pesos_sat,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_conc_atend_dep_projeto?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_dep_projeto_concorrencia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_dep_projeto_concorrencia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_dep_projeto_concorrencia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_conc_3 = ($graus_concorrencia_melhor * $atendimento_dep_projeto_concorrencia[1] + $graus_concorrencia_igual*$atendimento_dep_projeto_concorrencia[2] + $graus_concorrencia_deles*$atendimento_dep_projeto_concorrencia[3])*100/($num_pesq * $graus_concorrencia),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_conc_3 = $perc_conc_3 * $peso_conc_atend_dep_projeto / $soma_pesos_conc,2,',','');?> ></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 4) Atendimento PCP &nbsp;</td>
<?
for ($i=1; $i<$valor_3_radion; $i++) { 
$sql = "SELECT * FROM pesquisa_satisfacao WHERE atendimento_pcp_importancia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$atendimento_pcp_importancia[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE atendimento_pcp_satisfacao='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$atendimento_pcp_satisfacao[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE atendimento_pcp_concorrencia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$atendimento_pcp_concorrencia[$i] = mysql_num_rows($resultado);
}
?>
<td class=sem_borda > E <BR></td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_imp_atend_pcp?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_pcp_importancia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_pcp_importancia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_pcp_importancia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_imp_4 = ($graus_importancia_baixo * $atendimento_pcp_importancia[1] + $graus_importancia_medio*$atendimento_pcp_importancia[2] + $graus_importancia_alto*$atendimento_pcp_importancia[3])*100/($num_pesq * $graus_importancia),2,',',''); ?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_imp_4 = $perc_imp_4 * $peso_imp_atend_pcp / $soma_pesos_imp,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_sat_atend_pcp?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_pcp_satisfacao[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_pcp_satisfacao[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_pcp_satisfacao[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_sat_4 = ($graus_satisfacao_baixo * $atendimento_pcp_satisfacao[1] + $graus_satisfacao_medio*$atendimento_pcp_satisfacao[2] + $graus_satisfacao_alto*$atendimento_pcp_satisfacao[3])*100/($num_pesq * $graus_satisfacao),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_sat_4 = $perc_sat_4 * $peso_sat_atend_pcp / $soma_pesos_sat,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_conc_atend_pcp?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_pcp_concorrencia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_pcp_concorrencia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_pcp_concorrencia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_conc_4 = ($graus_concorrencia_melhor * $atendimento_pcp_concorrencia[1] + $graus_concorrencia_igual*$atendimento_pcp_concorrencia[2] + $graus_concorrencia_deles*$atendimento_pcp_concorrencia[3])*100/($num_pesq * $graus_concorrencia),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_conc_4 = $perc_conc_4 * $peso_conc_atend_pcp / $soma_pesos_conc,2,',','');?> ></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 5) Atendimento Dep. Expedição &nbsp;</td>
<?
for ($i=1; $i<$valor_3_radion; $i++) {
$sql = "SELECT * FROM pesquisa_satisfacao WHERE atendimento_dep_expedicao_importancia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$atendimento_dep_expedicao_importancia[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE atendimento_dep_expedicao_satisfacao='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$atendimento_dep_expedicao_satisfacao[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE atendimento_dep_expedicao_concorrencia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$atendimento_dep_expedicao_concorrencia[$i] = mysql_num_rows($resultado);
}
?>
<td class=sem_borda > E <BR></td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_imp_atend_dep_exp?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_dep_expedicao_importancia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_dep_expedicao_importancia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_dep_expedicao_importancia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_imp_5 = ($graus_importancia_baixo * $atendimento_dep_expedicao_importancia[1] + $graus_importancia_medio*$atendimento_dep_expedicao_importancia[2] + $graus_importancia_alto*$atendimento_dep_expedicao_importancia[3])*100/($num_pesq * $graus_importancia),2,',',''); ?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_imp_5 = $perc_imp_5 * $peso_imp_atend_dep_exp / $soma_pesos_imp,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_sat_atend_dep_exp?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_dep_expedicao_satisfacao[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_dep_expedicao_satisfacao[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_dep_expedicao_satisfacao[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_sat_5 = ($graus_satisfacao_baixo * $atendimento_dep_expedicao_satisfacao[1] + $graus_satisfacao_medio*$atendimento_dep_expedicao_satisfacao[2] + $graus_satisfacao_alto*$atendimento_dep_expedicao_satisfacao[3])*100/($num_pesq * $graus_satisfacao),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_sat_5 = $perc_sat_5 * $peso_sat_atend_dep_exp / $soma_pesos_sat,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_conc_atend_dep_exp?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_dep_expedicao_concorrencia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_dep_expedicao_concorrencia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $atendimento_dep_expedicao_concorrencia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_conc_5 = ($graus_concorrencia_melhor * $atendimento_dep_expedicao_concorrencia[1] + $graus_concorrencia_igual*$atendimento_dep_expedicao_concorrencia[2] + $graus_concorrencia_deles*$atendimento_dep_expedicao_concorrencia[3])*100/($num_pesq * $graus_concorrencia),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_conc_5 = $perc_conc_5 * $peso_conc_atend_dep_exp / $soma_pesos_conc,2,',','');?> ></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 6) Assistência Técnica &nbsp;</td>
<?
for ($i=1; $i<$valor_3_radion; $i++) {
$sql = "SELECT * FROM pesquisa_satisfacao WHERE assistencia_tecnica_importancia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$assistencia_tecnica_importancia[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE assistencia_tecnica_satisfacao='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$assistencia_tecnica_satisfacao[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE assistencia_tecnica_concorrencia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$assistencia_tecnica_concorrencia[$i] = mysql_num_rows($resultado);
}
?>
<td class=sem_borda > Q <BR></td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_imp_assis_tec?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $assistencia_tecnica_importancia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $assistencia_tecnica_importancia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $assistencia_tecnica_importancia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_imp_6 = ($graus_importancia_baixo * $assistencia_tecnica_importancia[1] + $graus_importancia_medio*$assistencia_tecnica_importancia[2] + $graus_importancia_alto*$assistencia_tecnica_importancia[3])*100/($num_pesq * $graus_importancia),2,',',''); ?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_imp_6 = $perc_imp_6 * $peso_imp_assis_tec / $soma_pesos_imp,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_sat_assis_tec?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $assistencia_tecnica_satisfacao[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $assistencia_tecnica_satisfacao[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $assistencia_tecnica_satisfacao[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_sat_6 = ($graus_satisfacao_baixo * $assistencia_tecnica_satisfacao[1] + $graus_satisfacao_medio*$assistencia_tecnica_satisfacao[2] + $graus_satisfacao_alto*$assistencia_tecnica_satisfacao[3])*100/($num_pesq * $graus_satisfacao),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_sat_6 = $perc_sat_6 * $peso_sat_assis_tec / $soma_pesos_sat,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_conc_assis_tec?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $assistencia_tecnica_concorrencia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $assistencia_tecnica_concorrencia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $assistencia_tecnica_concorrencia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_conc_6 = ($graus_concorrencia_melhor * $assistencia_tecnica_concorrencia[1] + $graus_concorrencia_igual*$assistencia_tecnica_concorrencia[2] + $graus_concorrencia_deles*$assistencia_tecnica_concorrencia[3])*100/($num_pesq * $graus_concorrencia),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_conc_6 = $perc_conc_6 * $peso_conc_assis_tec / $soma_pesos_conc,2,',','');?> ></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 7) Catálogos Técnicos &nbsp;</td>
<?
for ($i=1; $i<$valor_3_radion; $i++) {
$sql = "SELECT * FROM pesquisa_satisfacao WHERE catalagos_tecnicos_importancia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$catalagos_tecnicos_importancia[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE catalagos_tecnicos_satisfacao='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$catalagos_tecnicos_satisfacao[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE catalagos_tecnicos_concorrencia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$catalagos_tecnicos_concorrencia[$i] = mysql_num_rows($resultado);
}
?>
<td class=sem_borda > Q <BR></td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_imp_catalagos_tec?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $catalagos_tecnicos_importancia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $catalagos_tecnicos_importancia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $catalagos_tecnicos_importancia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_imp_7 = ($graus_importancia_baixo * $catalagos_tecnicos_importancia[1] + $graus_importancia_medio * $catalagos_tecnicos_importancia[2] + $graus_importancia_alto * $catalagos_tecnicos_importancia[3])*100/($num_pesq * $graus_importancia),2,',',''); ?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_imp_7 = $perc_imp_7 * $peso_imp_catalagos_tec / $soma_pesos_imp,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_sat_catalagos_tec?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $catalagos_tecnicos_satisfacao[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $catalagos_tecnicos_satisfacao[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $catalagos_tecnicos_satisfacao[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_sat_7 = ($graus_satisfacao_baixo * $catalagos_tecnicos_satisfacao[1] + $graus_satisfacao_medio * $catalagos_tecnicos_satisfacao[2] + $graus_satisfacao_alto * $catalagos_tecnicos_satisfacao[3])*100/($num_pesq * $graus_satisfacao),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_sat_7 = $perc_sat_7 * $peso_sat_catalagos_tec / $soma_pesos_sat,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_conc_catalagos_tec?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $catalagos_tecnicos_concorrencia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $catalagos_tecnicos_concorrencia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $catalagos_tecnicos_concorrencia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_conc_7 = ($graus_concorrencia_melhor * $catalagos_tecnicos_concorrencia[1] + $graus_concorrencia_igual * $catalagos_tecnicos_concorrencia[2] + $graus_concorrencia_deles*$catalagos_tecnicos_concorrencia[3])*100/($num_pesq * $graus_concorrencia),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_conc_7 = $perc_conc_7 * $peso_conc_catalagos_tec / $soma_pesos_conc,2,',','');?> ></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 8) Condição de Pagamento &nbsp;</td>
<?
for ($i=1; $i<$valor_3_radion; $i++) {
$sql = "SELECT * FROM pesquisa_satisfacao WHERE condicao_de_pagamento_importancia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$condicao_de_pagamento_importancia[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE condicao_de_pagamento_satisfacao='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$condicao_de_pagamento_satisfacao[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE condicao_de_pagamento_concorrencia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$condicao_de_pagamento_concorrencia[$i] = mysql_num_rows($resultado);
}
?>
<td class=sem_borda > C <BR></td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_imp_cond_de_pag?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $condicao_de_pagamento_importancia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $condicao_de_pagamento_importancia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $condicao_de_pagamento_importancia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_imp_8 = ($graus_importancia_baixo * $condicao_de_pagamento_importancia[1] + $graus_importancia_medio * $condicao_de_pagamento_importancia[2] + $graus_importancia_alto * $condicao_de_pagamento_importancia[3])*100/($num_pesq * $graus_importancia),2,',',''); ?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_imp_8 = $perc_imp_8 * $peso_imp_cond_de_pag / $soma_pesos_imp,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_sat_cond_de_pag?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $condicao_de_pagamento_satisfacao[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $condicao_de_pagamento_satisfacao[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $condicao_de_pagamento_satisfacao[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_sat_8 = ($graus_satisfacao_baixo * $condicao_de_pagamento_satisfacao[1] + $graus_satisfacao_medio * $condicao_de_pagamento_satisfacao[2] + $graus_satisfacao_alto * $condicao_de_pagamento_satisfacao[3])*100/($num_pesq * $graus_satisfacao),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_sat_8 = $perc_sat_8 * $peso_sat_cond_de_pag / $soma_pesos_sat,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_conc_cond_de_pag?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $condicao_de_pagamento_concorrencia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $condicao_de_pagamento_concorrencia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $condicao_de_pagamento_concorrencia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_conc_8 = ($graus_concorrencia_melhor * $condicao_de_pagamento_concorrencia[1] + $graus_concorrencia_igual * $condicao_de_pagamento_concorrencia[2] + $graus_concorrencia_deles * $condicao_de_pagamento_concorrencia[3])*100/($num_pesq * $graus_concorrencia),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_conc_8 = $perc_conc_8 * $peso_conc_cond_de_pag / $soma_pesos_conc,2,',','');?> ></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 9) Embalagem &nbsp;</td>
<?
for ($i=1; $i<$valor_3_radion; $i++) {
$sql = "SELECT * FROM pesquisa_satisfacao WHERE embalagem_importancia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$embalagem_importancia[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE embalagem_satisfacao='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$embalagem_satisfacao[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE embalagem_concorrencia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$embalagem_concorrencia[$i] = mysql_num_rows($resultado);
}
?>
<td class=sem_borda > Q <BR></td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_imp_embalagem?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $embalagem_importancia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $embalagem_importancia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $embalagem_importancia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_imp_9 = ($graus_importancia_baixo * $embalagem_importancia[1] + $graus_importancia_medio * $embalagem_importancia[2] + $graus_importancia_alto * $embalagem_importancia[3])*100/($num_pesq * $graus_importancia),2,',',''); ?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_imp_9 = $perc_imp_9 * $peso_imp_embalagem / $soma_pesos_imp,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_sat_embalagem?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $embalagem_satisfacao[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $embalagem_satisfacao[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $embalagem_satisfacao[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_sat_9 = ($graus_satisfacao_baixo * $embalagem_satisfacao[1] + $graus_satisfacao_medio * $embalagem_satisfacao[2] + $graus_satisfacao_alto * $embalagem_satisfacao[3])*100/($num_pesq * $graus_satisfacao),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_sat_9 = $perc_sat_9 * $peso_sat_embalagem / $soma_pesos_sat,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_conc_embalagem?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $embalagem_concorrencia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $embalagem_concorrencia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $embalagem_concorrencia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_conc_9 = ($graus_concorrencia_melhor * $embalagem_concorrencia[1] + $graus_concorrencia_igual * $embalagem_concorrencia[2] + $graus_concorrencia_deles * $embalagem_concorrencia[3])*100/($num_pesq * $graus_concorrencia),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_conc_9 = $perc_conc_9 * $peso_conc_embalagem / $soma_pesos_conc,2,',','');?> ></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 10) Prazo de Entrega &nbsp;</td>
<?
for ($i=1; $i<$valor_3_radion; $i++) {
$sql = "SELECT * FROM pesquisa_satisfacao WHERE prazo_de_entrega_importancia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$prazo_de_entrega_importancia[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE prazo_de_entrega_satisfacao='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$prazo_de_entrega_satisfacao[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE prazo_de_entrega_concorrencia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$prazo_de_entrega_concorrencia[$i] = mysql_num_rows($resultado);
}
?>
<td class=sem_borda > E <BR></td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_imp_prazo_ent?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $prazo_de_entrega_importancia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $prazo_de_entrega_importancia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $prazo_de_entrega_importancia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_imp_10 = ($graus_importancia_baixo * $prazo_de_entrega_importancia[1] + $graus_importancia_medio * $prazo_de_entrega_importancia[2] + $graus_importancia_alto * $prazo_de_entrega_importancia[3])*100/($num_pesq * $graus_importancia),2,',',''); ?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_imp_10 = $perc_imp_10 * $peso_imp_prazo_ent / $soma_pesos_imp,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_sat_prazo_ent?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $prazo_de_entrega_satisfacao[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $prazo_de_entrega_satisfacao[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $prazo_de_entrega_satisfacao[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_sat_10 = ($graus_satisfacao_baixo * $prazo_de_entrega_satisfacao[1] + $graus_satisfacao_medio * $prazo_de_entrega_satisfacao[2] + $graus_satisfacao_alto * $prazo_de_entrega_satisfacao[3])*100/($num_pesq * $graus_satisfacao),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_sat_10 = $perc_sat_10 * $peso_sat_prazo_ent / $soma_pesos_sat,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_conc_prazo_ent?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $prazo_de_entrega_concorrencia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $prazo_de_entrega_concorrencia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $prazo_de_entrega_concorrencia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_conc_10 = ($graus_concorrencia_melhor * $prazo_de_entrega_concorrencia[1] + $graus_concorrencia_igual * $prazo_de_entrega_concorrencia[2] + $graus_concorrencia_deles * $prazo_de_entrega_concorrencia[3])*100/($num_pesq * $graus_concorrencia),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_conc_10 = $perc_conc_10 * $peso_conc_prazo_ent / $soma_pesos_conc,2,',','');?> ></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 11) Preço dos Produtos &nbsp;</td>
<?
for ($i=1; $i<$valor_3_radion; $i++) {
$sql = "SELECT * FROM pesquisa_satisfacao WHERE preco_dos_produtos_importancia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$preco_dos_produtos_importancia[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE preco_dos_produtos_satisfacao='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$preco_dos_produtos_satisfacao[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE preco_dos_produtos_concorrencia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$preco_dos_produtos_concorrencia[$i] = mysql_num_rows($resultado);
}
?>
<td class=sem_borda > C <BR></td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_imp_preco_prod?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $preco_dos_produtos_importancia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $preco_dos_produtos_importancia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $preco_dos_produtos_importancia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_imp_11 = ($graus_importancia_baixo * $preco_dos_produtos_importancia[1] + $graus_importancia_medio * $preco_dos_produtos_importancia[2] + $graus_importancia_alto * $preco_dos_produtos_importancia[3])*100/($num_pesq * $graus_importancia),2,',',''); ?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_imp_11 = $perc_imp_11 * $peso_imp_preco_prod / $soma_pesos_imp,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_sat_preco_prod?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $preco_dos_produtos_satisfacao[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $preco_dos_produtos_satisfacao[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $preco_dos_produtos_satisfacao[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_sat_11 = ($graus_satisfacao_baixo * $preco_dos_produtos_satisfacao[1] + $graus_satisfacao_medio * $preco_dos_produtos_satisfacao[2] + $graus_satisfacao_alto * $preco_dos_produtos_satisfacao[3])*100/($num_pesq * $graus_satisfacao),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_sat_11 = $perc_sat_11 * $peso_sat_preco_prod / $soma_pesos_sat,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_conc_preco_prod?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $preco_dos_produtos_concorrencia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $preco_dos_produtos_concorrencia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $preco_dos_produtos_concorrencia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_conc_11 = ($graus_concorrencia_melhor * $preco_dos_produtos_concorrencia[1] + $graus_concorrencia_igual * $preco_dos_produtos_concorrencia[2] + $graus_concorrencia_deles * $preco_dos_produtos_concorrencia[3])*100/($num_pesq * $graus_concorrencia),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_conc_11 = $perc_conc_11 * $peso_conc_preco_prod / $soma_pesos_conc,2,',','');?> ></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 12) Programa de Seleção &nbsp;</td>
<?
for ($i=1; $i<$valor_3_radion; $i++) {
$sql = "SELECT * FROM pesquisa_satisfacao WHERE programa_de_selecao_importancia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$programa_de_selecao_importancia[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE programa_de_selecao_satisfacao='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$programa_de_selecao_satisfacao[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE programa_de_selecao_concorrencia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$programa_de_selecao_concorrencia[$i] = mysql_num_rows($resultado);
}
?>
<td class=sem_borda > Q <BR></td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_imp_prog_selecao?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $programa_de_selecao_importancia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $programa_de_selecao_importancia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $programa_de_selecao_importancia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_imp_12 = ($graus_importancia_baixo * $programa_de_selecao_importancia[1] + $graus_importancia_medio * $programa_de_selecao_importancia[2] + $graus_importancia_alto * $programa_de_selecao_importancia[3])*100/($num_pesq * $graus_importancia),2,',',''); ?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_imp_12 = $perc_imp_12 * $peso_imp_prog_selecao / $soma_pesos_imp,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_sat_prog_selecao?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $programa_de_selecao_satisfacao[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $programa_de_selecao_satisfacao[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $programa_de_selecao_satisfacao[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_sat_12 = ($graus_satisfacao_baixo * $programa_de_selecao_satisfacao[1] + $graus_satisfacao_medio * $programa_de_selecao_satisfacao[2] + $graus_satisfacao_alto * $programa_de_selecao_satisfacao[3])*100/($num_pesq * $graus_satisfacao),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_sat_12 = $perc_sat_12 * $peso_sat_prog_selecao / $soma_pesos_sat,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_conc_prog_selecao?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $programa_de_selecao_concorrencia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $programa_de_selecao_concorrencia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $programa_de_selecao_concorrencia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_conc_12 = ($graus_concorrencia_melhor * $programa_de_selecao_concorrencia[1] + $graus_concorrencia_igual * $programa_de_selecao_concorrencia[2] + $graus_concorrencia_deles * $programa_de_selecao_concorrencia[3])*100/($num_pesq * $graus_concorrencia),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_conc_12 = $perc_conc_12 * $peso_conc_prog_selecao / $soma_pesos_conc,2,',','');?> ></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 13) Qualidade dos Produtos &nbsp;</td>
<?
for ($i=1; $i<$valor_3_radion; $i++) {
$sql = "SELECT * FROM pesquisa_satisfacao WHERE qualidade_dos_produtos_importancia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$qualidade_dos_produtos_importancia[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE qualidade_dos_produtos_satisfacao='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$qualidade_dos_produtos_satisfacao[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE qualidade_dos_produtos_concorrencia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$qualidade_dos_produtos_concorrencia[$i] = mysql_num_rows($resultado);
}
?>
<td class=sem_borda > Q <BR></td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_imp_qualidade_prod?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $qualidade_dos_produtos_importancia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $qualidade_dos_produtos_importancia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $qualidade_dos_produtos_importancia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_imp_13 = ($graus_importancia_baixo * $qualidade_dos_produtos_importancia[1] + $graus_importancia_medio * $qualidade_dos_produtos_importancia[2] + $graus_importancia_alto * $qualidade_dos_produtos_importancia[3])*100/($num_pesq * $graus_importancia),2,',',''); ?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_imp_13 = $perc_imp_13 * $peso_imp_qualidade_prod / $soma_pesos_imp,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_sat_qualidade_prod?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $qualidade_dos_produtos_satisfacao[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $qualidade_dos_produtos_satisfacao[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $qualidade_dos_produtos_satisfacao[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_sat_13 = ($graus_satisfacao_baixo * $qualidade_dos_produtos_satisfacao[1] + $graus_satisfacao_medio * $qualidade_dos_produtos_satisfacao[2] + $graus_satisfacao_alto * $qualidade_dos_produtos_satisfacao[3])*100/($num_pesq * $graus_satisfacao),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_sat_13 = $perc_sat_13 * $peso_sat_qualidade_prod / $soma_pesos_sat,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_conc_qualidade_prod?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $qualidade_dos_produtos_concorrencia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $qualidade_dos_produtos_concorrencia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $qualidade_dos_produtos_concorrencia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_conc_13 = ($graus_concorrencia_melhor * $qualidade_dos_produtos_concorrencia[1] + $graus_concorrencia_igual * $qualidade_dos_produtos_concorrencia[2] + $graus_concorrencia_deles * $qualidade_dos_produtos_concorrencia[3])*100/($num_pesq * $graus_concorrencia),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_conc_13 = $perc_conc_13 * $peso_conc_qualidade_prod / $soma_pesos_conc,2,',','');?> ></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 14) Segurança do Produto &nbsp;</td>
<?
for ($i=1; $i<$valor_3_radion; $i++) {
$sql = "SELECT * FROM pesquisa_satisfacao WHERE seguranca_do_produto_importancia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$seguranca_do_produto_importancia[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE seguranca_do_produto_satisfacao='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$seguranca_do_produto_satisfacao[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE seguranca_do_produto_concorrencia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$seguranca_do_produto_concorrencia[$i] = mysql_num_rows($resultado);
}
?>
<td class=sem_borda > S <BR></td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_imp_seg_prod?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $seguranca_do_produto_importancia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $seguranca_do_produto_importancia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $seguranca_do_produto_importancia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_imp_14 = ($graus_importancia_baixo * $seguranca_do_produto_importancia[1] + $graus_importancia_medio * $seguranca_do_produto_importancia[2] + $graus_importancia_alto * $seguranca_do_produto_importancia[3])*100/($num_pesq * $graus_importancia),2,',',''); ?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_imp_14 = $perc_imp_14 * $peso_imp_seg_prod / $soma_pesos_imp,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_sat_seg_prod?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $seguranca_do_produto_satisfacao[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $seguranca_do_produto_satisfacao[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $seguranca_do_produto_satisfacao[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_sat_14 = ($graus_satisfacao_baixo * $seguranca_do_produto_satisfacao[1] + $graus_satisfacao_medio * $seguranca_do_produto_satisfacao[2] + $graus_satisfacao_alto * $seguranca_do_produto_satisfacao[3])*100/($num_pesq * $graus_satisfacao),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_sat_14 = $perc_sat_14 * $peso_sat_seg_prod / $soma_pesos_sat,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_conc_seg_prod?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $seguranca_do_produto_concorrencia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $seguranca_do_produto_concorrencia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $seguranca_do_produto_concorrencia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_conc_14 = ($graus_concorrencia_melhor * $seguranca_do_produto_concorrencia[1] + $graus_concorrencia_igual * $seguranca_do_produto_concorrencia[2] + $graus_concorrencia_deles * $seguranca_do_produto_concorrencia[3])*100/($num_pesq * $graus_concorrencia),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_conc_14 = $perc_conc_14 * $peso_conc_seg_prod / $soma_pesos_conc,2,',','');?> ></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 15) Variedade dos Produtos &nbsp;</td>
<?
for ($i=1; $i<$valor_3_radion; $i++) {
$sql = "SELECT * FROM pesquisa_satisfacao WHERE variedade_dos_produtos_importancia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$variedade_dos_produtos_importancia[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE variedade_dos_produtos_satisfacao='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$variedade_dos_produtos_satisfacao[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE variedade_dos_produtos_concorrencia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$variedade_dos_produtos_concorrencia[$i] = mysql_num_rows($resultado);
}
?>
<td class=sem_borda > Q <BR></td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_imp_variedade_prod?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $variedade_dos_produtos_importancia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $variedade_dos_produtos_importancia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $variedade_dos_produtos_importancia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_imp_15 = ($graus_importancia_baixo * $variedade_dos_produtos_importancia[1] + $graus_importancia_medio * $variedade_dos_produtos_importancia[2] + $graus_importancia_alto * $variedade_dos_produtos_importancia[3])*100/($num_pesq * $graus_importancia),2,',',''); ?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_imp_15 = $perc_imp_15 * $peso_imp_variedade_prod / $soma_pesos_imp,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_sat_variedade_prod?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $variedade_dos_produtos_satisfacao[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $variedade_dos_produtos_satisfacao[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $variedade_dos_produtos_satisfacao[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_sat_15 = ($graus_satisfacao_baixo * $variedade_dos_produtos_satisfacao[1] + $graus_satisfacao_medio * $variedade_dos_produtos_satisfacao[2] + $graus_satisfacao_alto * $variedade_dos_produtos_satisfacao[3])*100/($num_pesq * $graus_satisfacao),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_sat_15 = $perc_sat_15 * $peso_sat_variedade_prod / $soma_pesos_sat,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_conc_variedade_prod?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $variedade_dos_produtos_concorrencia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $variedade_dos_produtos_concorrencia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $variedade_dos_produtos_concorrencia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_conc_15 = ($graus_concorrencia_melhor * $variedade_dos_produtos_concorrencia[1] + $graus_concorrencia_igual * $variedade_dos_produtos_concorrencia[2] + $graus_concorrencia_deles * $variedade_dos_produtos_concorrencia[3])*100/($num_pesq * $graus_concorrencia),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_conc_15 = $perc_conc_15 * $peso_conc_variedade_prod / $soma_pesos_conc,2,',','');?> ></td>
</tr>

<tr> <td>&nbsp; </td></tr>


<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 16) Conduta da Equipe Técnica &nbsp;</td>
<?
for ($i=1; $i<$valor_3_radion; $i++) {
$sql = "SELECT * FROM pesquisa_satisfacao WHERE conduta_da_equipe_tecnica_importancia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$conduta_da_equipe_tecnica_importancia[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE conduta_da_equipe_tecnica_satisfacao='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$conduta_da_equipe_tecnica_satisfacao[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE conduta_da_equipe_tecnica_concorrencia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$conduta_da_equipe_tecnica_concorrencia[$i] = mysql_num_rows($resultado);
}
?>
<td class=sem_borda > Q <BR></td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_imp_conduta_equipe_tec?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $conduta_da_equipe_tecnica_importancia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $conduta_da_equipe_tecnica_importancia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $conduta_da_equipe_tecnica_importancia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_imp_16 = ($graus_importancia_baixo * $conduta_da_equipe_tecnica_importancia[1] + $graus_importancia_medio * $conduta_da_equipe_tecnica_importancia[2] + $graus_importancia_alto * $conduta_da_equipe_tecnica_importancia[3])*100/($num_pesq * $graus_importancia),2,',',''); ?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_imp_16 = $perc_imp_16 * $peso_imp_conduta_equipe_tec / $soma_pesos_imp,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_sat_conduta_equipe_tec?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $conduta_da_equipe_tecnica_satisfacao[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $conduta_da_equipe_tecnica_satisfacao[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $conduta_da_equipe_tecnica_satisfacao[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_sat_16 = ($graus_satisfacao_baixo * $conduta_da_equipe_tecnica_satisfacao[1] + $graus_satisfacao_medio * $conduta_da_equipe_tecnica_satisfacao[2] + $graus_satisfacao_alto * $conduta_da_equipe_tecnica_satisfacao[3])*100/($num_pesq * $graus_satisfacao),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_sat_16 = $perc_sat_16 * $peso_sat_conduta_equipe_tec / $soma_pesos_sat,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_conc_conduta_equipe_tec?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $conduta_da_equipe_tecnica_concorrencia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $conduta_da_equipe_tecnica_concorrencia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $conduta_da_equipe_tecnica_concorrencia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_conc_16 = ($graus_concorrencia_melhor * $conduta_da_equipe_tecnica_concorrencia[1] + $graus_concorrencia_igual * $conduta_da_equipe_tecnica_concorrencia[2] + $graus_concorrencia_deles * $conduta_da_equipe_tecnica_concorrencia[3])*100/($num_pesq * $graus_concorrencia),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_conc_16 = $perc_conc_16 * $peso_conc_conduta_equipe_tec / $soma_pesos_conc,2,',','');?> ></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 17) Cumprimento do Prazo &nbsp;</td>
<?
for ($i=1; $i<$valor_3_radion; $i++) {
$sql = "SELECT * FROM pesquisa_satisfacao WHERE cumprimento_do_prazo_importancia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$cumprimento_do_prazo_importancia[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE cumprimento_do_prazo_satisfacao='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$cumprimento_do_prazo_satisfacao[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE cumprimento_do_prazo_concorrencia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$cumprimento_do_prazo_concorrencia[$i] = mysql_num_rows($resultado);
}
?>
<td class=sem_borda > E <BR></td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_imp_cumpr_prazo?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $cumprimento_do_prazo_importancia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $cumprimento_do_prazo_importancia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $cumprimento_do_prazo_importancia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_imp_17 = ($graus_importancia_baixo * $cumprimento_do_prazo_importancia[1] + $graus_importancia_medio * $cumprimento_do_prazo_importancia[2] + $graus_importancia_alto * $cumprimento_do_prazo_importancia[3])*100/($num_pesq * $graus_importancia),2,',',''); ?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_imp_17 = $perc_imp_17 * $peso_imp_cumpr_prazo / $soma_pesos_imp,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_sat_cumpr_prazo?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $cumprimento_do_prazo_satisfacao[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $cumprimento_do_prazo_satisfacao[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $cumprimento_do_prazo_satisfacao[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_sat_17 = ($graus_satisfacao_baixo * $cumprimento_do_prazo_satisfacao[1] + $graus_satisfacao_medio * $cumprimento_do_prazo_satisfacao[2] + $graus_satisfacao_alto * $cumprimento_do_prazo_satisfacao[3])*100/($num_pesq * $graus_satisfacao),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_sat_17 = $perc_sat_17 * $peso_sat_cumpr_prazo / $soma_pesos_sat,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_conc_cumpr_prazo?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $cumprimento_do_prazo_concorrencia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $cumprimento_do_prazo_concorrencia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $cumprimento_do_prazo_concorrencia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_conc_17 = ($graus_concorrencia_melhor * $cumprimento_do_prazo_concorrencia[1] + $graus_concorrencia_igual * $cumprimento_do_prazo_concorrencia[2] + $graus_concorrencia_deles * $cumprimento_do_prazo_concorrencia[3])*100/($num_pesq * $graus_concorrencia),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_conc_17 = $perc_conc_17 * $peso_conc_cumpr_prazo / $soma_pesos_conc,2,',','');?> ></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 18) Equipe com Confiabilidade e Qualificação &nbsp;</td>
<?
for ($i=1; $i<$valor_3_radion; $i++) {
$sql = "SELECT * FROM pesquisa_satisfacao WHERE equipe_com_confiabilidade_e_qualificacao_importancia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$equipe_com_confiabilidade_e_qualificacao_importancia[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE equipe_com_confiabilidade_e_qualificacao_satisfacao='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$equipe_com_confiabilidade_e_qualificacao_satisfacao[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE equipe_com_confiabilidade_e_qualificacao_concorrencia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$equipe_com_confiabilidade_e_qualificacao_concorrencia[$i] = mysql_num_rows($resultado);
}
?>
<td class=sem_borda > Q <BR></td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_imp_equipe_confiabilidade_qualificacao?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $equipe_com_confiabilidade_e_qualificacao_importancia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $equipe_com_confiabilidade_e_qualificacao_importancia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $equipe_com_confiabilidade_e_qualificacao_importancia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_imp_18 = ($graus_importancia_baixo * $equipe_com_confiabilidade_e_qualificacao_importancia[1] + $graus_importancia_medio * $equipe_com_confiabilidade_e_qualificacao_importancia[2] + $graus_importancia_alto * $equipe_com_confiabilidade_e_qualificacao_importancia[3])*100/($num_pesq * $graus_importancia),2,',',''); ?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_imp_18 = $perc_imp_18 * $peso_imp_equipe_confiabilidade_qualificacao / $soma_pesos_imp,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_sat_equipe_confiabilidade_qualificacao?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $equipe_com_confiabilidade_e_qualificacao_satisfacao[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $equipe_com_confiabilidade_e_qualificacao_satisfacao[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $equipe_com_confiabilidade_e_qualificacao_satisfacao[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_sat_18 = ($graus_satisfacao_baixo * $equipe_com_confiabilidade_e_qualificacao_satisfacao[1] + $graus_satisfacao_medio * $equipe_com_confiabilidade_e_qualificacao_satisfacao[2] + $graus_satisfacao_alto * $equipe_com_confiabilidade_e_qualificacao_satisfacao[3])*100/($num_pesq * $graus_satisfacao),2,',',''); ?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_sat_18 = $perc_sat_18 * $peso_sat_equipe_confiabilidade_qualificacao / $soma_pesos_sat,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_conc_equipe_confiabilidade_qualificacao?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $equipe_com_confiabilidade_e_qualificacao_concorrencia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $equipe_com_confiabilidade_e_qualificacao_concorrencia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $equipe_com_confiabilidade_e_qualificacao_concorrencia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_conc_18 = ($graus_concorrencia_melhor * $equipe_com_confiabilidade_e_qualificacao_concorrencia[1] + $graus_concorrencia_igual * $equipe_com_confiabilidade_e_qualificacao_concorrencia[2] + $graus_concorrencia_deles * $equipe_com_confiabilidade_e_qualificacao_concorrencia[3])*100/($num_pesq * $graus_concorrencia),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_conc_18 = $perc_conc_18 * $peso_conc_equipe_confiabilidade_qualificacao / $soma_pesos_conc,2,',','');?> ></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 19) Equipes Disponíveis para Atendimento &nbsp;</td>
<?
for ($i=1; $i<$valor_3_radion; $i++) {
$sql = "SELECT * FROM pesquisa_satisfacao WHERE equipes_disponiveis_para_atendimento_importancia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$equipes_disponiveis_para_atendimento_importancia[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE equipes_disponiveis_para_atendimento_satisfacao='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$equipes_disponiveis_para_atendimento_satisfacao[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE equipes_disponiveis_para_atendimento_concorrencia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$equipes_disponiveis_para_atendimento_concorrencia[$i] = mysql_num_rows($resultado);
}
?>
<td class=sem_borda > E <BR></td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_imp_equipes_disponiveis_atend?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $equipes_disponiveis_para_atendimento_importancia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $equipes_disponiveis_para_atendimento_importancia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $equipes_disponiveis_para_atendimento_importancia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_imp_19 = ($graus_importancia_baixo * $equipes_disponiveis_para_atendimento_importancia[1] + $graus_importancia_medio * $equipes_disponiveis_para_atendimento_importancia[2] + $graus_importancia_alto * $equipes_disponiveis_para_atendimento_importancia[3])*100/($num_pesq * $graus_importancia),2,',',''); ?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_imp_19 = $perc_imp_19 * $peso_imp_equipes_disponiveis_atend / $soma_pesos_imp,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_sat_equipes_disponiveis_atend?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $equipes_disponiveis_para_atendimento_satisfacao[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $equipes_disponiveis_para_atendimento_satisfacao[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $equipes_disponiveis_para_atendimento_satisfacao[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_sat_19 = ($graus_satisfacao_baixo * $equipes_disponiveis_para_atendimento_satisfacao[1] + $graus_satisfacao_medio * $equipes_disponiveis_para_atendimento_satisfacao[2] + $graus_satisfacao_alto * $equipes_disponiveis_para_atendimento_satisfacao[3])*100/($num_pesq * $graus_satisfacao),2,',',''); ?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_sat_19 = $perc_sat_19 * $peso_sat_equipes_disponiveis_atend / $soma_pesos_sat,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_conc_equipes_disponiveis_atend?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $equipes_disponiveis_para_atendimento_concorrencia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $equipes_disponiveis_para_atendimento_concorrencia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $equipes_disponiveis_para_atendimento_concorrencia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_conc_19 = ($graus_concorrencia_melhor * $equipes_disponiveis_para_atendimento_concorrencia[1] + $graus_concorrencia_igual * $equipes_disponiveis_para_atendimento_concorrencia[2] + $graus_concorrencia_deles * $equipes_disponiveis_para_atendimento_concorrencia[3])*100/($num_pesq * $graus_concorrencia),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_conc_19 = $perc_conc_19 * $peso_conc_equipes_disponiveis_atend / $soma_pesos_conc,2,',','');?> ></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 20) Facilidade nas Solicitações &nbsp;</td>
<?
for ($i=1; $i<$valor_3_radion; $i++) {
$sql = "SELECT * FROM pesquisa_satisfacao WHERE facilidade_nas_solicitacoes_importancia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$facilidade_nas_solicitacoes_importancia[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE facilidade_nas_solicitacoes_satisfacao='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$facilidade_nas_solicitacoes_satisfacao[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE facilidade_nas_solicitacoes_concorrencia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$facilidade_nas_solicitacoes_concorrencia[$i] = mysql_num_rows($resultado);
}
?>
<td class=sem_borda > E <BR></td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_imp_facilidade_solicitacoes?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $facilidade_nas_solicitacoes_importancia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $facilidade_nas_solicitacoes_importancia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $facilidade_nas_solicitacoes_importancia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_imp_20 = ($graus_importancia_baixo * $facilidade_nas_solicitacoes_importancia[1] + $graus_importancia_medio * $facilidade_nas_solicitacoes_importancia[2] + $graus_importancia_alto * $facilidade_nas_solicitacoes_importancia[3])*100/($num_pesq * $graus_importancia),2,',',''); ?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_imp_20 = $perc_imp_20 * $peso_imp_facilidade_solicitacoes / $soma_pesos_imp,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_sat_facilidade_solicitacoes?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $facilidade_nas_solicitacoes_satisfacao[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $facilidade_nas_solicitacoes_satisfacao[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $facilidade_nas_solicitacoes_satisfacao[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_sat_20 = ($graus_satisfacao_baixo * $facilidade_nas_solicitacoes_satisfacao[1] + $graus_satisfacao_medio * $facilidade_nas_solicitacoes_satisfacao[2] + $graus_satisfacao_alto * $facilidade_nas_solicitacoes_satisfacao[3])*100/($num_pesq * $graus_satisfacao),2,',',''); ?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_sat_20 = $perc_sat_20 * $peso_sat_facilidade_solicitacoes / $soma_pesos_sat,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_conc_facilidade_solicitacoes?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $facilidade_nas_solicitacoes_concorrencia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $facilidade_nas_solicitacoes_concorrencia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $facilidade_nas_solicitacoes_concorrencia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_conc_20 = ($graus_concorrencia_melhor * $facilidade_nas_solicitacoes_concorrencia[1] + $graus_concorrencia_igual * $facilidade_nas_solicitacoes_concorrencia[2] + $graus_concorrencia_deles * $facilidade_nas_solicitacoes_concorrencia[3])*100/($num_pesq * $graus_concorrencia),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_conc_20 = $perc_conc_20 * $peso_conc_facilidade_solicitacoes / $soma_pesos_conc,2,',','');?> ></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 21) Qualidade dos Serviços &nbsp;</td>
<?
for ($i=1; $i<$valor_3_radion; $i++) {
$sql = "SELECT * FROM pesquisa_satisfacao WHERE qualidade_dos_servicos_importancia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$qualidade_dos_servicos_importancia[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE qualidade_dos_servicos_satisfacao='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$qualidade_dos_servicos_satisfacao[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE qualidade_dos_servicos_concorrencia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$qualidade_dos_servicos_concorrencia[$i] = mysql_num_rows($resultado);
}
?>
<td class=sem_borda > Q <BR></td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_imp_qualidade_servicos?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $qualidade_dos_servicos_importancia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $qualidade_dos_servicos_importancia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $qualidade_dos_servicos_importancia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_imp_21 = ($graus_importancia_baixo * $qualidade_dos_servicos_importancia[1] + $graus_importancia_medio * $qualidade_dos_servicos_importancia[2] + $graus_importancia_alto * $qualidade_dos_servicos_importancia[3])*100/($num_pesq * $graus_importancia),2,',',''); ?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_imp_21 = $perc_imp_21 * $peso_imp_qualidade_servicos / $soma_pesos_imp,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_sat_qualidade_servicos?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $qualidade_dos_servicos_satisfacao[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $qualidade_dos_servicos_satisfacao[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $qualidade_dos_servicos_satisfacao[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_sat_21 = ($graus_satisfacao_baixo * $qualidade_dos_servicos_satisfacao[1] + $graus_satisfacao_medio * $qualidade_dos_servicos_satisfacao[2] + $graus_satisfacao_alto * $qualidade_dos_servicos_satisfacao[3])*100/($num_pesq * $graus_satisfacao),2,',',''); ?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_sat_21 = $perc_sat_21 * $peso_sat_qualidade_servicos / $soma_pesos_sat,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_conc_qualidade_servicos?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $qualidade_dos_servicos_concorrencia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $qualidade_dos_servicos_concorrencia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $qualidade_dos_servicos_concorrencia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_conc_21 = ($graus_concorrencia_melhor * $qualidade_dos_servicos_concorrencia[1] + $graus_concorrencia_igual * $qualidade_dos_servicos_concorrencia[2] + $graus_concorrencia_deles * $qualidade_dos_servicos_concorrencia[3])*100/($num_pesq * $graus_concorrencia),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_conc_21 = $perc_conc_21 * $peso_conc_qualidade_servicos / $soma_pesos_conc,2,',','');?> ></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 22) Rápido Atendimento ao Telefone &nbsp;</td>
<?
for ($i=1; $i<$valor_3_radion; $i++) {
$sql = "SELECT * FROM pesquisa_satisfacao WHERE rapido_atendimento_ao_telefone_importancia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$rapido_atendimento_ao_telefone_importancia[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE rapido_atendimento_ao_telefone_satisfacao='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$rapido_atendimento_ao_telefone_satisfacao[$i] = mysql_num_rows($resultado);
$sql = "SELECT * FROM pesquisa_satisfacao WHERE rapido_atendimento_ao_telefone_concorrencia='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$rapido_atendimento_ao_telefone_concorrencia[$i] = mysql_num_rows($resultado);
}
?>
<td class=sem_borda > E <BR></td>
<?/* IMPORTÂNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_imp_rapido_atend_telefone?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $rapido_atendimento_ao_telefone_importancia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $rapido_atendimento_ao_telefone_importancia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $rapido_atendimento_ao_telefone_importancia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_imp_22 = ($graus_importancia_baixo * $rapido_atendimento_ao_telefone_importancia[1] + $graus_importancia_medio * $rapido_atendimento_ao_telefone_importancia[2] + $graus_importancia_alto * $rapido_atendimento_ao_telefone_importancia[3])*100/($num_pesq * $graus_importancia),2,',',''); ?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_imp_22 = $perc_imp_22 * $peso_imp_rapido_atend_telefone / $soma_pesos_imp,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  SATISFAÇÃO  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_sat_rapido_atend_telefone?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $rapido_atendimento_ao_telefone_satisfacao[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $rapido_atendimento_ao_telefone_satisfacao[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $rapido_atendimento_ao_telefone_satisfacao[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_sat_22 = ($graus_satisfacao_baixo * $rapido_atendimento_ao_telefone_satisfacao[1] + $graus_satisfacao_medio * $rapido_atendimento_ao_telefone_satisfacao[2] + $graus_satisfacao_alto * $rapido_atendimento_ao_telefone_satisfacao[3])*100/($num_pesq * $graus_satisfacao),2,',',''); ?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_sat_22 = $perc_sat_22 * $peso_sat_rapido_atend_telefone / $soma_pesos_sat,2,',','');?> ></td>
<td class=sem_borda > &nbsp; </td>
<?/*  CONCORRÊNCIA  */ ?>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $peso_conc_rapido_atend_telefone?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $rapido_atendimento_ao_telefone_concorrencia[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $rapido_atendimento_ao_telefone_concorrencia[2]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo $rapido_atendimento_ao_telefone_concorrencia[3]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($perc_conc_22 = ($graus_concorrencia_melhor * $rapido_atendimento_ao_telefone_concorrencia[1] + $graus_concorrencia_igual * $rapido_atendimento_ao_telefone_concorrencia[2] + $graus_concorrencia_deles * $rapido_atendimento_ao_telefone_concorrencia[3])*100/($num_pesq * $graus_concorrencia),2,',','');?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($comp_conc_22 = $perc_conc_22 * $peso_conc_rapido_atend_telefone / $soma_pesos_conc,2,',','');?> ></td>
</tr>

<tr>
<? /*  IMPORTANCIA   */?>
<td class=right_sem_borda>  &nbsp; </td>
<td class=right_sem_borda>  &nbsp; </td>
<td class=right_sem_borda>  &nbsp; </td>
<td class=right_sem_borda>  &nbsp; </td>
<td class=right_sem_borda>  &nbsp; </td>
<td class=right_sem_borda>  &nbsp; </td>
<td class=right_sem_borda>  Total </td>
<td class=right_sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($dim_qual_imp = $comp_imp_1 + $comp_imp_2 + $comp_imp_3 + $comp_imp_4 + $comp_imp_5 + $comp_imp_6 + $comp_imp_7 + $comp_imp_8 + $comp_imp_9 + $comp_imp_10 + $comp_imp_11 + $comp_imp_12 + $comp_imp_13 + $comp_imp_14 + $comp_imp_15 + $comp_imp_16 + $comp_imp_17 + $comp_imp_18 + $comp_imp_19 + $comp_imp_20 + $comp_imp_21 + $comp_imp_22,2,',',''); ?> > </td>
<? /*  SATISFAÇÃO   */?>
<td class=right_sem_borda>  &nbsp; </td>
<td class=right_sem_borda>  &nbsp; </td>
<td class=right_sem_borda>  &nbsp; </td>
<td class=right_sem_borda>  &nbsp; </td>
<td class=right_sem_borda>  &nbsp; </td>
<td class=right_sem_borda>  Total </td>
<td class=right_sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($dim_qual_sat = $comp_sat_1 + $comp_sat_2 + $comp_sat_3 + $comp_sat_4 + $comp_sat_5 + $comp_sat_6 + $comp_sat_7 + $comp_sat_8 + $comp_sat_9 + $comp_sat_10 + $comp_sat_11 + $comp_sat_12 + $comp_sat_13 + $comp_sat_14 + $comp_sat_15 + $comp_sat_16 + $comp_sat_17 + $comp_sat_18 + $comp_sat_19 + $comp_sat_20 + $comp_sat_21 + $comp_sat_22,2,',',''); ?> > </td>
<? /*  CONCORRENCIA   */?>
<td class=right_sem_borda>  &nbsp; </td>
<td class=right_sem_borda>  &nbsp; </td>
<td class=right_sem_borda>  &nbsp; </td>
<td class=right_sem_borda>  &nbsp; </td>
<td class=right_sem_borda>  &nbsp; </td>
<td class=right_sem_borda>  Total </td>
<td class=right_sem_borda><INPUT class=center TYPE="text" readonly size="5" VALUE=<?echo number_format($dim_qual_conc = $comp_conc_1 + $comp_conc_2 + $comp_conc_3 + $comp_conc_4 + $comp_conc_5 + $comp_conc_6 + $comp_conc_7 + $comp_conc_8 + $comp_conc_9 + $comp_conc_10 + $comp_conc_11 + $comp_conc_12 + $comp_conc_13 + $comp_conc_14 + $comp_conc_15 + $comp_conc_16 + $comp_conc_17 + $comp_conc_18 + $comp_conc_19 + $comp_conc_20 + $comp_conc_21 + $comp_conc_22,2,',',''); ?> > </td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<? /*  IMPORTANCIA   */?>
<td class=right_sem_borda> Dim. Qualidade &nbsp; </td>
<td class=sem_borda> &nbsp; </td>
<td class=sem_borda> Q </td>
<td class=sem_borda> E </td>
<td class=sem_borda> C </td>
<td class=sem_borda> M </td>
<td class=sem_borda> S </td>
<? /*  SATISFAÇÃO   */?>
<td class=sem_borda> &nbsp; </td>
<td class=sem_borda> &nbsp; </td>
<td class=sem_borda> Q </td>
<td class=sem_borda> E </td>
<td class=sem_borda> C </td>
<td class=sem_borda> M </td>
<td class=sem_borda> S </td>
<? /*  CONCORRENCIA   */?>
<td class=sem_borda> &nbsp; </td>
<td class=sem_borda> &nbsp; </td>
<td class=sem_borda> Q </td>
<td class=sem_borda> E </td>
<td class=sem_borda> C </td>
<td class=sem_borda> M </td>
<td class=sem_borda> S </td>
</tr>

<? /* SOMA POR LETRAS */?>
<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> Soma por Letra &nbsp; </td>
<td class=right_sem_borda> &nbsp; </td>
<? /*  IMPORTANCIA   */?>
<td class=sem_borda> <?/* Q */?>
<INPUT class=center TYPE="text" readonly size="5" VALUE=<? echo number_format($Q_imp = $comp_imp_6 / $peso_imp_assis_tec + $comp_imp_7 / $peso_imp_catalagos_tec + $comp_imp_9 / $peso_imp_embalagem + $comp_imp_12 / $peso_imp_prog_selecao + $comp_imp_13 / $peso_imp_qualidade_prod + $comp_imp_15 / $peso_imp_variedade_prod + $comp_imp_16 / $peso_imp_conduta_equipe_tec + $comp_imp_18 / $peso_imp_equipe_confiabilidade_qualificacao + $comp_imp_21 / $peso_imp_qualidade_servicos,2,',',''); ?> > </td>
<td class=sem_borda> <?/* E */?>
<INPUT class=center TYPE="text" readonly size="5" VALUE=<? echo number_format($E_imp = $comp_imp_1 / $peso_imp_atend_dep_comercial + $comp_imp_2 / $peso_imp_atend_rep + $comp_imp_3 / $peso_imp_atend_dep_projeto + $comp_imp_4 / $peso_imp_atend_pcp + $comp_imp_5 / $peso_imp_atend_dep_exp + $comp_imp_10 / $peso_imp_prazo_ent + $comp_imp_17 / $peso_imp_cumpr_prazo + $comp_imp_19 / $peso_imp_equipes_disponiveis_atend + $comp_imp_20 / $peso_imp_facilidade_solicitacoes + $comp_imp_22 /$peso_imp_rapido_atend_telefone,2,',',''); ?> > </td>
<td class=sem_borda> <?/* C */?>
<INPUT class=center TYPE="text" readonly size="5" VALUE=<? echo number_format($C_imp = $comp_imp_8 / $peso_imp_cond_de_pag + $comp_imp_11 / $peso_imp_preco_prod,2,',',''); ?> > </td>
<td class=sem_borda> <?/* M */?> 
<INPUT class=center TYPE="text" readonly size="5" VALUE="" > </td>
<td class=sem_borda> <?/* S */?>
<INPUT class=center TYPE="text" readonly size="5" VALUE=<? echo number_format($S_imp = $comp_imp_14 / $peso_imp_seg_prod,2,',',''); ?> > </td>
<? /*  SATISFAÇÃO   */?>
<td class=sem_borda> &nbsp; </td>
<td class=sem_borda> &nbsp; </td>
<td class=sem_borda> <?/* Q */?>
<INPUT class=center TYPE="text" readonly size="5" VALUE=<? echo number_format($Q_sat = $comp_sat_6 / $peso_sat_assis_tec + $comp_sat_7 / $peso_sat_catalagos_tec + $comp_sat_9 / $peso_sat_embalagem + $comp_sat_12 / $peso_sat_prog_selecao + $comp_sat_13 / $peso_sat_qualidade_prod + $comp_sat_15 / $peso_sat_variedade_prod + $comp_sat_16 / $peso_sat_conduta_equipe_tec + $comp_sat_18 / $peso_sat_equipe_confiabilidade_qualificacao + $comp_sat_21 / $peso_sat_qualidade_servicos,2,',',''); ?> > </td>
<td class=sem_borda> <?/* E */?>
<INPUT class=center TYPE="text" readonly size="5" VALUE=<? echo number_format($E_sat = $comp_sat_1 / $peso_sat_atend_dep_comercial + $comp_sat_2 / $peso_sat_atend_rep + $comp_sat_3 / $peso_sat_atend_dep_projeto + $comp_sat_4 / $peso_sat_atend_pcp + $comp_sat_5 / $peso_sat_atend_dep_exp + $comp_sat_10 / $peso_sat_prazo_ent + $comp_sat_17 / $peso_sat_cumpr_prazo + $comp_sat_19 / $peso_sat_equipes_disponiveis_atend + $comp_sat_20 / $peso_sat_facilidade_solicitacoes + $comp_sat_22 /$peso_sat_rapido_atend_telefone,2,',',''); ?> > </td>
<td class=sem_borda> <?/* C */?>
<INPUT class=center TYPE="text" readonly size="5" VALUE=<? echo number_format($C_sat = $comp_sat_8 / $peso_sat_cond_de_pag + $comp_sat_11 / $peso_sat_preco_prod,2,',',''); ?> > </td>
<td class=sem_borda> <?/* M */?> 
<INPUT class=center TYPE="text" readonly size="5" VALUE="" > </td>
<td class=sem_borda> <?/* S */?>
<INPUT class=center TYPE="text" readonly size="5" VALUE=<? echo number_format($S_sat = $comp_sat_14 / $peso_sat_seg_prod,2,',',''); ?> > </td>
<? /*  CONCORRENCIA   */?>
<td class=sem_borda> &nbsp; </td>
<td class=sem_borda> &nbsp; </td>
<td class=sem_borda> <?/* Q */?>
<INPUT class=center TYPE="text" readonly size="5" VALUE=<? echo number_format($Q_conc = $comp_conc_6 / $peso_conc_assis_tec + $comp_conc_7 / $peso_conc_catalagos_tec + $comp_conc_9 / $peso_conc_embalagem + $comp_conc_12 / $peso_conc_prog_selecao + $comp_conc_13 / $peso_conc_qualidade_prod + $comp_conc_15 / $peso_conc_variedade_prod + $comp_conc_16 / $peso_conc_conduta_equipe_tec + $comp_conc_18 / $peso_conc_equipe_confiabilidade_qualificacao + $comp_conc_21 / $peso_conc_qualidade_servicos,2,',',''); ?> > </td>
<td class=sem_borda> <?/* E */?>
<INPUT class=center TYPE="text" readonly size="5" VALUE=<? echo number_format($E_conc = $comp_conc_1 / $peso_conc_atend_dep_comercial + $comp_conc_2 / $peso_conc_atend_rep + $comp_conc_3 / $peso_conc_atend_dep_projeto + $comp_conc_4 / $peso_conc_atend_pcp + $comp_conc_5 / $peso_conc_atend_dep_exp + $comp_conc_10 / $peso_conc_prazo_ent + $comp_conc_17 / $peso_conc_cumpr_prazo + $comp_conc_19 / $peso_conc_equipes_disponiveis_atend + $comp_conc_20 / $peso_conc_facilidade_solicitacoes + $comp_conc_22 /$peso_conc_rapido_atend_telefone,2,',',''); ?> > </td>
<td class=sem_borda> <?/* C */?>
<INPUT class=center TYPE="text" readonly size="5" VALUE=<? echo number_format($C_conc = $comp_conc_8 / $peso_conc_cond_de_pag + $comp_conc_11 / $peso_conc_preco_prod,2,',',''); ?> > </td>
<td class=sem_borda> <?/* M */?> 
<INPUT class=center TYPE="text" readonly size="5" VALUE="" > </td>
<td class=sem_borda> <?/* S */?>
<INPUT class=center TYPE="text" readonly size="5" VALUE=<? echo number_format($S_conc = $comp_conc_14 / $peso_conc_seg_prod,2,',',''); ?> > </td>
</tr>

<? /* CALCULO DIM QUALIDADE */?>
<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> Calculo Dim Qual &nbsp; </td>
<td class=right_sem_borda> &nbsp; </td>
<? /*  IMPORTANCIA   */?>
<td class=sem_borda> <?/* Q */?>
<INPUT class=center TYPE="text" readonly size="5" VALUE=<? echo number_format($Q_imp = (($comp_imp_6 / $peso_imp_assis_tec + $comp_imp_7 / $peso_imp_catalagos_tec + $comp_imp_9 / $peso_imp_embalagem + $comp_imp_12 / $peso_imp_prog_selecao + $comp_imp_13 / $peso_imp_qualidade_prod + $comp_imp_15 / $peso_imp_variedade_prod + $comp_imp_16 / $peso_imp_conduta_equipe_tec + $comp_imp_18 / $peso_imp_equipe_confiabilidade_qualificacao + $comp_imp_21 / $peso_imp_qualidade_servicos) / 9 ) * $soma_pesos_imp,2,',',''); ?> > </td>
<td class=sem_borda> <?/* E */?>
<INPUT class=center TYPE="text" readonly size="5" VALUE=<? echo number_format($E_imp = (($comp_imp_1 / $peso_imp_atend_dep_comercial + $comp_imp_2 / $peso_imp_atend_rep + $comp_imp_3 / $peso_imp_atend_dep_projeto + $comp_imp_4 / $peso_imp_atend_pcp + $comp_imp_5 / $peso_imp_atend_dep_exp + $comp_imp_10 / $peso_imp_prazo_ent + $comp_imp_17 / $peso_imp_cumpr_prazo + $comp_imp_19 / $peso_imp_equipes_disponiveis_atend + $comp_imp_20 / $peso_imp_facilidade_solicitacoes + $comp_imp_22 /$peso_imp_rapido_atend_telefone) / 10 ) * $soma_pesos_imp,2,',',''); ?> > </td>
<td class=sem_borda> <?/* C */?>
<INPUT class=center TYPE="text" readonly size="5" VALUE=<? echo number_format($C_imp = (($comp_imp_8 / $peso_imp_cond_de_pag + $comp_imp_11 / $peso_imp_preco_prod) / 2) * $soma_pesos_imp,2,',',''); ?> > </td>
<td class=sem_borda> <?/* M */?> 
<INPUT class=center TYPE="text" readonly size="5" VALUE="" > </td>
<td class=sem_borda> <?/* S */?>
<INPUT class=center TYPE="text" readonly size="5" VALUE=<? echo number_format($S_imp = (($comp_imp_14 / $peso_imp_seg_prod) / 1 ) * $soma_pesos_imp,2,',',''); ?> > </td>
<? /*  SATISFAÇÃO   */?>
<td class=sem_borda> &nbsp; </td>
<td class=sem_borda> &nbsp; </td>
<td class=sem_borda> <?/* Q */?>
<INPUT class=center TYPE="text" readonly size="5" VALUE=<? echo number_format($Q_sat = (($comp_sat_6 / $peso_sat_assis_tec + $comp_sat_7 / $peso_sat_catalagos_tec + $comp_sat_9 / $peso_sat_embalagem + $comp_sat_12 / $peso_sat_prog_selecao + $comp_sat_13 / $peso_sat_qualidade_prod + $comp_sat_15 / $peso_sat_variedade_prod + $comp_sat_16 / $peso_sat_conduta_equipe_tec + $comp_sat_18 / $peso_sat_equipe_confiabilidade_qualificacao + $comp_sat_21 / $peso_sat_qualidade_servicos) / 9 ) * $soma_pesos_sat,2,',',''); ?> > </td>
<td class=sem_borda> <?/* E */?>
<INPUT class=center TYPE="text" readonly size="5" VALUE=<? echo number_format($E_sat = (($comp_sat_1 / $peso_sat_atend_dep_comercial + $comp_sat_2 / $peso_sat_atend_rep + $comp_sat_3 / $peso_sat_atend_dep_projeto + $comp_sat_4 / $peso_sat_atend_pcp + $comp_sat_5 / $peso_sat_atend_dep_exp + $comp_sat_10 / $peso_sat_prazo_ent + $comp_sat_17 / $peso_sat_cumpr_prazo + $comp_sat_19 / $peso_sat_equipes_disponiveis_atend + $comp_sat_20 / $peso_sat_facilidade_solicitacoes + $comp_sat_22 /$peso_sat_rapido_atend_telefone) / 10 ) * $soma_pesos_sat,2,',',''); ?> > </td>
<td class=sem_borda> <?/* C */?>
<INPUT class=center TYPE="text" readonly size="5" VALUE=<? echo number_format($C_sat = (($comp_sat_8 / $peso_sat_cond_de_pag + $comp_sat_11 / $peso_sat_preco_prod) / 2) * $soma_pesos_sat,2,',',''); ?> > </td>
<td class=sem_borda> <?/* M */?> 
<INPUT class=center TYPE="text" readonly size="5" VALUE="" > </td>
<td class=sem_borda> <?/* S */?>
<INPUT class=center TYPE="text" readonly size="5" VALUE=<? echo number_format($S_sat = (($comp_sat_14 / $peso_sat_seg_prod) / 1 ) * $soma_pesos_sat,2,',',''); ?> > </td>
<? /*  CONCORRENCIA   */?>
<td class=sem_borda> &nbsp; </td>
<td class=sem_borda> &nbsp; </td>
<td class=sem_borda> <?/* Q */?>
<INPUT class=center TYPE="text" readonly size="5" VALUE=<? echo number_format($Q_conc = (($comp_conc_6 / $peso_conc_assis_tec + $comp_conc_7 / $peso_conc_catalagos_tec + $comp_conc_9 / $peso_conc_embalagem + $comp_conc_12 / $peso_conc_prog_selecao + $comp_conc_13 / $peso_conc_qualidade_prod + $comp_conc_15 / $peso_conc_variedade_prod + $comp_conc_16 / $peso_conc_conduta_equipe_tec + $comp_conc_18 / $peso_conc_equipe_confiabilidade_qualificacao + $comp_conc_21 / $peso_conc_qualidade_servicos) / 9 ) * $soma_pesos_conc,2,',',''); ?> > </td>
<td class=sem_borda> <?/* E */?>
<INPUT class=center TYPE="text" readonly size="5" VALUE=<? echo number_format($E_conc = (($comp_conc_1 / $peso_conc_atend_dep_comercial + $comp_conc_2 / $peso_conc_atend_rep + $comp_conc_3 / $peso_conc_atend_dep_projeto + $comp_conc_4 / $peso_conc_atend_pcp + $comp_conc_5 / $peso_conc_atend_dep_exp + $comp_conc_10 / $peso_conc_prazo_ent + $comp_conc_17 / $peso_conc_cumpr_prazo + $comp_conc_19 / $peso_conc_equipes_disponiveis_atend + $comp_conc_20 / $peso_conc_facilidade_solicitacoes + $comp_conc_22 /$peso_conc_rapido_atend_telefone) / 10 ) * $soma_pesos_conc,2,',',''); ?> > </td>
<td class=sem_borda> <?/* C */?>
<INPUT class=center TYPE="text" readonly size="5" VALUE=<? echo number_format($C_conc = (($comp_conc_8 / $peso_conc_cond_de_pag + $comp_conc_11 / $peso_conc_preco_prod) / 2) * $soma_pesos_conc,2,',',''); ?> > </td>
<td class=sem_borda> <?/* M */?> 
<INPUT class=center TYPE="text" readonly size="5" VALUE="" > </td>
<td class=sem_borda> <?/* S */?>
<INPUT class=center TYPE="text" readonly size="5" VALUE=<? echo number_format($S_conc = (($comp_conc_14 / $peso_conc_seg_prod) / 1 ) * $soma_pesos_conc,2,',',''); ?> > </td>
</tr>

<tr><td class=right_sem_borda>  &nbsp; </td></tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 23) Fique a vontade para fazer suas críticas ou sugestões no &nbsp; espaço ao lado &nbsp;</td>
<td class=sem_borda> &nbsp; </td>
<td class=left_sem_borda colspan="3">
<INPUT class="botao1" TYPE="button" VALUE="Link p/ Ver" OnClick="javascript:void(open('relatorio_pesquisa_item23.php','nova','scrollbars=yes,fullscreen=yes'))"></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 24) Você compraria novamente da Projelmec? &nbsp;</td>
<?
for ($i=1; $i<$valor_2_radion; $i++) {
$sql = "SELECT * FROM pesquisa_satisfacao WHERE compraria_novamente_projelmec='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$compraria_novamente_projelmec[$i] = mysql_num_rows($resultado);
}
?>
<td class=sem_borda > &nbsp; <BR></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="3" VALUE=<?echo $compraria_novamente_projelmec[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="3" VALUE=<?echo $compraria_novamente_projelmec[2]?> ></td>
</tr>

<tr style="border-color:#000000; border-style: solid; border-width: 1; background-color: #ffffff; color: #000000" onMouseOver="this.style.background='#99CCEA'; this.style.color='#000000'" 
onMouseOut="this.style.background='#ffffff'; this.style.color='#000000'">
<td class=right_sem_borda> 25) Você recomendaria a Projelmec para outras empresas? &nbsp;</td>
<?
for ($i=1; $i<$valor_2_radion; $i++) {
$sql = "SELECT * FROM pesquisa_satisfacao WHERE recomendaria_projelmec='$i' order by 'id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
$recomendaria_projelmec[$i] = mysql_num_rows($resultado);
}
?>
<td class=sem_borda> &nbsp; <BR></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="3" VALUE=<?echo $recomendaria_projelmec[1]?> ></td>
<td class=sem_borda><INPUT class=center TYPE="text" readonly size="3" VALUE=<?echo $recomendaria_projelmec[2]?> ></td>
</tr>

<tr>
<td class=right_sem_borda> &nbsp; </td>
<td class=sem_borda> &nbsp; <BR></td>
<td class=sem_borda> Sim </td>
<td class=sem_borda> Não </td>
</tr>

</td></table>

<BR>
<INPUT class="botao1" TYPE="button" NAME="fechar" VALUE="Fechar Janela" OnClick="javascript:window.close()">
</FORM>
<BR>
</td></tr></table>
</body>
</html>
