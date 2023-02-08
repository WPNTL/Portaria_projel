<? include "config.php"; include "valida_sessao.php"; ?>

<html>
<head>
<title> Dados </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" SRC="funcoes/abrir_fechar.js"></script>
<script language="JavaScript" SRC="funcoes/overlib.js"></script>
</head>
<body>

<div id="overDiv" style="position:absolute; visibility:hide; z-index:1;; width: 160px; height: 19px"></div>

<form action="" method="post" name="avaliacao_desempenho">

<? 
// CONFIGURACOES INICIAL

// INICIA SEMPRE NO CONTROLE
if ( $tipo_competencia == "" ) { $tipo_competencia = "controle"; $tipo_competencia_texto = "Controle Total"; } 
elseif ( $tipo_competencia == "disciplina" ) { $tipo_competencia_texto = "Disciplina"; } 
elseif ( $tipo_competencia == "produtividade" ) { $tipo_competencia_texto = "Produtividade"; }
elseif ( $tipo_competencia == "assiduidade" ) { $tipo_competencia_texto = "Assiduidade"; }
elseif ( $tipo_competencia == "responsabilidade" ) { $tipo_competencia_texto = "Responsabilidade"; }
elseif ( $tipo_competencia == "relacionamento" ) { $tipo_competencia_texto = "Relacionamento"; }
else { $tipo_competencia_texto = "Controle Total"; } 
// INICIA SEMPRE NO CONTROLE


// CONFIGURACAO DO BOTAO DE SELECAO
if ( $f_nome_funcionarios == "" ) { $f_nome_funcionarios_db = ""; } 
else { $f_nome_funcionarios_db = "AND nome_funcionarios='$f_nome_funcionarios'"; }

?>

<table class=titulo_sem_borda width=100% align="center" height="25">
<tr><td><b><font size="5" color="#000000"> <?echo $tipo_competencia_texto;?> </font></b></td></tr></table>

<br>


<FIELDSET>
<LEGEND> Dados </LEGEND>

<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
  <TR>
  
    <TD>
    
      <TABLE class=legenda cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD width="1%">&nbsp;</TD>
          <TD vAlign=top width="90%">
          
            <TABLE height=1 cellSpacing=1 width="100%" border=0>
              <TBODY>
              


<? /* --------------------  INICIO CONTROLE TOTAL -----------------------------  */  ?>
 
<?
// TIPO COMPETENCIA = CONTROLE, MOSTRARA OS DADOS SOBRE O CONTROLE
// TIPO COMPETENCIA <> CONTROLE, MOSTRARA OS DADOS DA SELECAO DA COMPETENCIA (disciplina, produtividade, assiduidade, responsabilidade, relacionamento)
if ( $tipo_competencia == "controle" ) { 
?>

<? /* --------------------  INICIO CABECALHO DOS DADOS  -----------------------------  */  ?>

		<TR class=linha_cabecalho>

<? /* nome funcionario */ ?>
<TH align=middle rowspan="2"><P class=bordas>  Funcionário </P></TH>

<? /* nome setor */ ?>
<TH align=middle rowspan="2"><P class=bordas>  Setor </P></TH>

<? /* nome funcao */ ?>
<TH align=middle rowspan="2"><P class=bordas>  Função </P></TH>
			  
<? /* media */ ?>
<TH align=middle colspan="3"><P class=bordas>  Média </P></TH>

		</TR> 	
		
		
		<TR class=linha_cabecalho>

<TH align=middle><P class=bordas>  1 Semestre </P></TH>
<TH align=middle><P class=bordas>  2 Semestre </P></TH>
<TH align=middle><P class=bordas>  Anual </P></TH>

		</TR>	
		
<? /* --------------------  FINAL CABECALHO DOS DADOS  -----------------------------  */  ?>		


<? /* --------------------  INICIO BUSCA DOS DADOS  -----------------------------  */  ?>
<?

echo "f_pri_semestre = ".$f_pri_semestre; echo "<br>";

// BUSCAR DADOS 1 SEMESTRE
$sql_semestre = "SELECT * FROM avaliacao_desempenho WHERE pri_semestre='$f_pri_semestre' ORDER BY 'pri_semestre'"; 
$resultado_semestre = mysql_query($sql_semestre) or die ("Não foi possível a busca por 1 SEMESTRE");
while ($linha_semestre=mysql_fetch_array($resultado_semestre)) { $f_id_funcionarios = $linha_semestre["id_funcionarios"]; }

echo "f_id_funcionarios = ".$$f_id_funcionarios; echo "<br>";


if ( $f_id_funcionarios == "" ) { $f_pri_semestre_db = ""; } 
else { $f_pri_semestre_db = "AND id='$f_id_funcionarios'"; }

echo "f_pri_semestre_db = ".$f_pri_semestre_db; echo "<br>";

// BUSCAR DADOS SETOR
$sql_setor = "SELECT * FROM setor WHERE nome_setor='$f_nome_setor' ORDER BY 'nome_setor'"; 
$resultado_setor = mysql_query($sql_setor) or die ("Não foi possível a busca por Setor");
while ($linha_setor=mysql_fetch_array($resultado_setor)) { $f_id_setor = $linha_setor["id"]; }
if ( $f_id_setor == "" ) { $f_nome_setor_db = ""; } 
else { $f_nome_setor_db = "AND id_setor='$f_id_setor'"; }
	

	
// BUSCAR DADOS FUNCIONARIOS
$sql_funcionarios = "SELECT * FROM funcionarios WHERE id>='0' $f_nome_funcionarios_db $f_nome_setor_db $f_pri_semestre_db ORDER BY 'nome_funcionarios'"; 
$resultado_funcionarios = mysql_query($sql_funcionarios) or die ("Não foi possível a busca por Funcionário");
while ($linha_funcionarios=mysql_fetch_array($resultado_funcionarios)) { 
$id_funcionarios = $linha_funcionarios["id"]; 
$nome_funcionarios = $linha_funcionarios["nome_funcionarios"]; 
$id_setor = $linha_funcionarios["id_setor"]; 
$id_funcao = $linha_funcionarios["id_funcao"]; 


// BUSCAR DADOS AVALIAÇÃO DESEMPENHO
$sql_avaliacao = "SELECT * FROM avaliacao_desempenho WHERE id_funcionarios='$id_funcionarios' ORDER BY 'id'"; 
$resultado_avaliacao = mysql_query($sql_avaliacao) or die ("Não foi possível a busca por Avaliação Desempenho");
while ($linha_avaliacao=mysql_fetch_array($resultado_avaliacao)) { 

$disciplina_jan = $linha_avaliacao["disciplina_jan"];
$disciplina_fev = $linha_avaliacao["disciplina_fev"];
$disciplina_mar = $linha_avaliacao["disciplina_mar"];
$disciplina_abr = $linha_avaliacao["disciplina_abr"];
$disciplina_mai = $linha_avaliacao["disciplina_mai"];
$disciplina_jun = $linha_avaliacao["disciplina_jun"];
$disciplina_jul = $linha_avaliacao["disciplina_jul"];
$disciplina_ago = $linha_avaliacao["disciplina_ago"];
$disciplina_set = $linha_avaliacao["disciplina_set"];
$disciplina_out = $linha_avaliacao["disciplina_out"];
$disciplina_nov = $linha_avaliacao["disciplina_nov"];
$disciplina_dez = $linha_avaliacao["disciplina_dez"];

$produtividade_jan = $linha_avaliacao["produtividade_jan"];
$produtividade_fev = $linha_avaliacao["produtividade_fev"];
$produtividade_mar = $linha_avaliacao["produtividade_mar"];
$produtividade_abr = $linha_avaliacao["produtividade_abr"];
$produtividade_mai = $linha_avaliacao["produtividade_mai"];
$produtividade_jun = $linha_avaliacao["produtividade_jun"];
$produtividade_jul = $linha_avaliacao["produtividade_jul"];
$produtividade_ago = $linha_avaliacao["produtividade_ago"];
$produtividade_set = $linha_avaliacao["produtividade_set"];
$produtividade_out = $linha_avaliacao["produtividade_out"];
$produtividade_nov = $linha_avaliacao["produtividade_nov"];
$produtividade_dez = $linha_avaliacao["produtividade_dez"];

$assiduidade_jan = $linha_avaliacao["assiduidade_jan"];
$assiduidade_fev = $linha_avaliacao["assiduidade_fev"];
$assiduidade_mar = $linha_avaliacao["assiduidade_mar"];
$assiduidade_abr = $linha_avaliacao["assiduidade_abr"];
$assiduidade_mai = $linha_avaliacao["assiduidade_mai"];
$assiduidade_jun = $linha_avaliacao["assiduidade_jun"];
$assiduidade_jul = $linha_avaliacao["assiduidade_jul"];
$assiduidade_ago = $linha_avaliacao["assiduidade_ago"];
$assiduidade_set = $linha_avaliacao["assiduidade_set"];
$assiduidade_out = $linha_avaliacao["assiduidade_out"];
$assiduidade_nov = $linha_avaliacao["assiduidade_nov"];
$assiduidade_dez = $linha_avaliacao["assiduidade_dez"];

$responsabilidade_jan = $linha_avaliacao["responsabilidade_jan"];
$responsabilidade_fev = $linha_avaliacao["responsabilidade_fev"];
$responsabilidade_mar = $linha_avaliacao["responsabilidade_mar"];
$responsabilidade_abr = $linha_avaliacao["responsabilidade_abr"];
$responsabilidade_mai = $linha_avaliacao["responsabilidade_mai"];
$responsabilidade_jun = $linha_avaliacao["responsabilidade_jun"];
$responsabilidade_jul = $linha_avaliacao["responsabilidade_jul"];
$responsabilidade_ago = $linha_avaliacao["responsabilidade_ago"];
$responsabilidade_set = $linha_avaliacao["responsabilidade_set"];
$responsabilidade_out = $linha_avaliacao["responsabilidade_out"];
$responsabilidade_nov = $linha_avaliacao["responsabilidade_nov"];
$responsabilidade_dez = $linha_avaliacao["responsabilidade_dez"];

$relacionamento_jan = $linha_avaliacao["relacionamento_jan"];
$relacionamento_fev = $linha_avaliacao["relacionamento_fev"];
$relacionamento_mar = $linha_avaliacao["relacionamento_mar"];
$relacionamento_abr = $linha_avaliacao["relacionamento_abr"];
$relacionamento_mai = $linha_avaliacao["relacionamento_mai"];
$relacionamento_jun = $linha_avaliacao["relacionamento_jun"];
$relacionamento_jul = $linha_avaliacao["relacionamento_jul"];
$relacionamento_ago = $linha_avaliacao["relacionamento_ago"];
$relacionamento_set = $linha_avaliacao["relacionamento_set"];
$relacionamento_out = $linha_avaliacao["relacionamento_out"];
$relacionamento_nov = $linha_avaliacao["relacionamento_nov"];
$relacionamento_dez = $linha_avaliacao["relacionamento_dez"];
}

	
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





// 1 SEMESTRE
$total_jan = $disciplina_jan + $produtividade_jan + $assiduidade_jan + $responsabilidade_jan + $relacionamento_jan;
$total_fev = $disciplina_fev + $produtividade_fev + $assiduidade_fev + $responsabilidade_fev + $relacionamento_fev;
$total_mar = $disciplina_mar + $produtividade_mar + $assiduidade_mar + $responsabilidade_mar + $relacionamento_mar;
$total_abr = $disciplina_abr + $produtividade_abr + $assiduidade_abr + $responsabilidade_abr + $relacionamento_abr;
$total_mai = $disciplina_mai + $produtividade_mai + $assiduidade_mai + $responsabilidade_mai + $relacionamento_mai;
$total_jun = $disciplina_jun + $produtividade_jun + $assiduidade_jun + $responsabilidade_jun + $relacionamento_jun;

// VERIFICAR SE O MES TEM DADOS
if ( $total_jan == "" ) { $div_media1_jan = "1" ;} else { $div_media1_jan = "0" ; }
if ( $total_fev == "" ) { $div_media1_fev = "1" ;} else { $div_media1_fev = "0" ; }
if ( $total_mar == "" ) { $div_media1_mar = "1" ;} else { $div_media1_mar = "0" ; }
if ( $total_abr == "" ) { $div_media1_abr = "1" ;} else { $div_media1_abr = "0" ; }
if ( $total_mai == "" ) { $div_media1_mai = "1" ;} else { $div_media1_mai = "0" ; }
if ( $total_jun == "" ) { $div_media1_jun = "1" ;} else { $div_media1_jun = "0" ; }
// VERIFICAR SE O MES TEM DADOS


// FAZER O VALOR DA DIVISAO
$div_media1 = 6 - ( $div_media1_jan + $div_media1_fev + $div_media1_mar + $div_media1_abr + $div_media1_mai + $div_media1_jun );
// FAZER O VALOR DA DIVISAO


//		MEDIA FINAL DO SEMESTRE EM VALOR
$media1semestre_final = ( $total_jan + $total_fev + $total_mar + $total_abr + $total_mai + $total_jun ) / $div_media1 ;
//		MEDIA FINAL DO SEMESTRE EM VALOR

//	TROCAR VALOR MEDIA 1 SEMESTRE POR TEXTO
if ( $media1semestre_final >= "5" ) { $media1semestre_final_texto = "Alto Potencial" ;} 
elseif ( $media1semestre_final >= "3") { $media1semestre_final_texto = "Importante" ;} 
elseif ( $media1semestre_final >= "2") { $media1semestre_final_texto = "Deficiência" ;}
elseif ( $media1semestre_final > "0") { $media1semestre_final_texto = "Comprometimento" ;}
else { $media1semestre_final_texto = "Sem Nota" ;}
//	TROCAR VALOR MEDIA 1 SEMESTRE POR TEXTO

// FINAL 1 SEMESTRE








// INICIO 2 SEMESTRE
$total_jul = $disciplina_jul + $produtividade_jul + $assiduidade_jul + $responsabilidade_jul + $relacionamento_jul;
$total_ago = $disciplina_ago + $produtividade_ago + $assiduidade_ago + $responsabilidade_ago + $relacionamento_ago;
$total_set = $disciplina_set + $produtividade_set + $assiduidade_set + $responsabilidade_set + $relacionamento_set;
$total_out = $disciplina_out + $produtividade_out + $assiduidade_out + $responsabilidade_out + $relacionamento_out;
$total_nov = $disciplina_nov + $produtividade_nov + $assiduidade_nov + $responsabilidade_nov + $relacionamento_nov;
$total_dez = $disciplina_dez + $produtividade_dez + $assiduidade_dez + $responsabilidade_dez + $relacionamento_dez;

//echo "total_jul = ".$total_jul;
//echo "total_ago = ".$total_ago;
//echo "total_set = ".$total_set;
//echo "total_out = ".$total_out;
//echo "total_nove = ".$total_nov;
//echo "total_dez = ".$total_dez;


// VERIFICAR SE O MES TEM DADOS
if ( $total_jul == "" ) { $div_media2_jul = "1" ;} else { $div_media2_jul = "0" ; }
if ( $total_ago == "" ) { $div_media2_ago = "1" ;} else { $div_media2_ago = "0" ; }
if ( $total_set == "" ) { $div_media2_set = "1" ;} else { $div_media2_set = "0" ; }
if ( $total_out == "" ) { $div_media2_out = "1" ;} else { $div_media2_out = "0" ; }
if ( $total_nov == "" ) { $div_media2_nov = "1" ;} else { $div_media2_nov = "0" ; }
if ( $total_dez == "" ) { $div_media2_dez = "1" ;} else { $div_media2_dez = "0" ; }
// VERIFICAR SE O MES TEM DADOS


//echo "div_media2_jul = ".$div_media2_jul;
//echo "div_media2_ago = ".$div_media2_ago;
//echo "div_media2_set = ".$div_media2_set;
//echo "div_media2_out = ".$div_media2_out;
//echo "div_media2_nove = ".$div_media2_nov;
//echo "div_media2_dez = ".$div_media2_dez;


// FAZER O VALOR DA DIVISAO
$div_media2 = 6 - ( $div_media2_jul + $div_media2_ago + $div_media2_set + $div_media2_out + $div_media2_nov + $div_media2_dez );
// FAZER O VALOR DA DIVISAO


//		MEDIA FINAL DO SEMESTRE EM VALOR
$media2semestre_final = ( $total_jul + $total_ago + $total_set + $total_out + $total_nov + $total_dez ) / $div_media2 ;
//		MEDIA FINAL DO SEMESTRE EM VALOR


//	TROCAR VALOR MEDIA 2 SEMESTRE POR TEXTO
if ( $media2semestre_final >= "5" ) { $media2semestre_final_texto = "Alto Potencial" ;} 
elseif ( $media2semestre_final >= "3") { $media2semestre_final_texto = "Importante" ;} 
elseif ( $media2semestre_final >= "2") { $media2semestre_final_texto = "Deficiência" ;}
elseif ( $media2semestre_final > "0") { $media2semestre_final_texto = "Comprometimento" ;}
else { $media2semestre_final_texto = "Sem Nota" ;}
//	TROCAR VALOR MEDIA 2 SEMESTRE POR TEXTO

// FINAL 2 SEMESTRE







// INICIO DADOS ANUAL
// 			VALOR MEDIA ANUAL
if ( $media1semestre_final == "" OR $media2semestre_final == "" ) { $div_media_anual = "1"; } 
else { $div_media_anual = "2"; }
$media_anual = ( $media1semestre_final + $media2semestre_final ) / $div_media_anual;
// 			VALOR MEDIA ANUAL

//	TROCAR VALOR ANUAL POR TEXTO
if ( $media_anual >= "5" ) { $media_anual_texto = "Alto Potencial" ;} 
elseif ( $media_anual >= "3") { $media_anual_texto = "Importante" ;} 
elseif ( $media_anual >= "2") { $media_anual_texto = "Deficiência" ;}
elseif ( $media_anual > "0") { $media_anual_texto = "Comprometimento" ;}
else { $media_anual_texto = "Sem Nota" ;}
//	TROCAR VALOR ANUAL POR TEXTO
// FINAL DADOS ANUAL

// SOMA POR MES E COM TODAS AS COMPETENCIAS








	
// BUSCAR DADOS SETOR
$sql_setor = "SELECT * FROM setor WHERE id='$id_setor' ORDER BY 'nome_setor'"; 
$resultado_setor = mysql_query($sql_setor) or die ("Não foi possível a busca por Setor");
while ($linha_setor=mysql_fetch_array($resultado_setor)) { 
	$nome_setor = $linha_setor["nome_setor"]; }
	

// BUSCAR DADOS FUNCAO
$sql_funcao = "SELECT * FROM funcao WHERE id='$id_funcao' ORDER BY 'nome_funcao'"; 
$resultado_funcao = mysql_query($sql_funcao) or die ("Não foi possível a busca por Função");
while ($linha_funcao=mysql_fetch_array($resultado_funcao)) { 
	$nome_funcao = $linha_funcao["nome_funcao"]; }

	
?>

		<TR class=linha0 border-style: solid; border-width: 1;  
			onMouseOver="this.style.background='#99CCEA'; drc('','Abrir Avaliação do <?echo $nome_funcionarios;?>'); return true; " 
			onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 	
			onClick="javascript:void(open('../avaliacao_desempenho.php?id_funcionarios=<?echo $id_funcionarios;?>&nome_funcionarios=<?echo $nome_funcionarios;?>&tipo_competencia=<?echo $tipo_competencia;?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))">

<? /* nome funcionario */ ?>
<TH align=middle><P class=bordas>  <? echo $nome_funcionarios; ?> </P></TH>

<? /* nome setor */ ?>
<TH align=middle><P class=bordas>  <? echo $nome_setor; ?> </P></TH>

<? /* nome funcao */ ?>
<TH align=middle><P class=bordas>  <? echo $nome_funcao; ?> </P></TH>  

<? /* avaliacao desempenho */ ?>
<TH align=middle><P class=bordas>  <? echo $media1semestre_final_texto;  ?> </P></TH>
<TH align=middle><P class=bordas>  <? echo $media2semestre_final_texto;  ?> </P></TH>
<TH align=middle><P class=bordas>  <? echo $media_anual_texto; ?></P></TH>

		</TR>


<? } // BUSCAR DADOS FUNCIONARIOS ?>
<? /* --------------------  FINAL BUSCA DOS DADOS  -----------------------------  */  ?>

	
<? } else { ?>


<? /* --------------------  FINAL CONTROLE TOTAL -----------------------------  */  ?>







<? /* --------------------  INICIO DAS COMPETENCIAS  -----------------------------  */  ?>
              
<? /* --------------------  INICIO CABECALHO DOS DADOS COMPETENCIAS -----------------------------  */  ?>

		<TR class=linha_cabecalho>

<? /* nome funcionario */ ?>
<TH align=middle rowspan="2"><P class=bordas>  Nome Funcionário </P></TH>

<? /* nome setor */ ?>
<TH align=middle rowspan="2"><P class=bordas>  Nome Setor </P></TH>

<? /* nome funcao */ ?>
<TH align=middle rowspan="2"><P class=bordas>  Nome Função </P></TH>
			  
<? /* avaliacao */ ?>
<TH align=middle colspan="12"><P class=bordas>  Avaliação do Ano = <?echo $ano_avaliacao = date('Y');?> </P></TH>

		</TR> 	
		
		
		<TR class=linha_cabecalho>
  
<TH align=middle><P class=bordas>  Jan </P></TH>
<TH align=middle><P class=bordas>  Fev </P></TH>
<TH align=middle><P class=bordas>  Mar </P></TH>
<TH align=middle><P class=bordas>  Abr </P></TH>
<TH align=middle><P class=bordas>  Mai </P></TH>
<TH align=middle><P class=bordas>  Jun </P></TH>
<TH align=middle><P class=bordas>  Jul </P></TH>
<TH align=middle><P class=bordas>  Ago </P></TH>
<TH align=middle><P class=bordas>  Set </P></TH>
<TH align=middle><P class=bordas>  Out </P></TH>
<TH align=middle><P class=bordas>  Nov </P></TH>
<TH align=middle><P class=bordas>  Dez </P></TH>

		</TR>	
		
<? /* --------------------  FINAL CABECALHO DOS DADOS COMPETENCIAS -----------------------------  */  ?>		


<? /* --------------------  INICIO BUSCA DOS DADOS COMPETENCIAS  -----------------------------  */  ?>

<?
// BUSCAR DADOS SETOR
$sql_setor = "SELECT * FROM setor WHERE nome_setor='$f_nome_setor' ORDER BY 'nome_setor'"; 
$resultado_setor = mysql_query($sql_setor) or die ("Não foi possível a busca por Setor");
while ($linha_setor=mysql_fetch_array($resultado_setor)) { $id_setor = $linha_setor["id"]; }
	
//echo "id_nome_setor atual - ".$id_setor; echo "<br>";

if ( $id_setor == "" ) { $f_nome_setor_db = ""; } 
else { $f_nome_setor_db = "AND id_setor='$id_setor'"; }
	
//echo "id_nome_setor depois - ".$id_setor;	


// BUSCAR DADOS FUNCIONARIOS  POR COMPETENCIA
$sql_funcionarios = "SELECT * FROM funcionarios WHERE id>='0' $f_nome_funcionarios_db $f_nome_setor_db ORDER BY 'nome_funcionarios'"; 
$resultado_funcionarios = mysql_query($sql_funcionarios) or die ("Não foi possível");
while ($linha_funcionarios=mysql_fetch_array($resultado_funcionarios)) { 
$id_funcionarios = $linha_funcionarios["id"]; 
$nome_funcionarios_bd = $linha_funcionarios["nome_funcionarios"]; 
$id_setor_bd = $linha_funcionarios["id_setor"]; 
$id_funcao_bd = $linha_funcionarios["id_funcao"]; 


// BUSCAR DADOS AVALIAÇÃO DESEMPENHO POR COMPETENCIA
$sql = "SELECT * FROM avaliacao_desempenho WHERE id_funcionarios='$id_funcionarios' ORDER BY 'id'"; 
$resultado = mysql_query($sql) or die ("Não foi possível");
while ($linha=mysql_fetch_array($resultado)) { 

$tipo_competencia_jan = $linha[$tipo_competencia."_jan"];
$tipo_competencia_fev = $linha[$tipo_competencia."_fev"];
$tipo_competencia_mar = $linha[$tipo_competencia."_mar"];
$tipo_competencia_abr = $linha[$tipo_competencia."_abr"];
$tipo_competencia_mai = $linha[$tipo_competencia."_mai"];
$tipo_competencia_jun = $linha[$tipo_competencia."_jun"];
$tipo_competencia_jul = $linha[$tipo_competencia."_jul"];
$tipo_competencia_ago = $linha[$tipo_competencia."_ago"];
$tipo_competencia_set = $linha[$tipo_competencia."_set"];
$tipo_competencia_out = $linha[$tipo_competencia."_out"];
$tipo_competencia_nov = $linha[$tipo_competencia."_nov"];
$tipo_competencia_dez = $linha[$tipo_competencia."_dez"];

}


//	TROCAR O VAMOR DO NIVEL 

// JAN
if ( $tipo_competencia_jan == "5" ) { $tipo_competencia_jan_text = "Ótimo" ;} 
elseif ( $tipo_competencia_jan == "4") { $tipo_competencia_jan_text = "Bom" ;} 
elseif ( $tipo_competencia_jan == "3") { $tipo_competencia_jan_text = "Regular" ;}
elseif ( $tipo_competencia_jan == "2") { $tipo_competencia_jan_text = "Sofrível" ;}
elseif ( $tipo_competencia_jan == "1") { $tipo_competencia_jan_text = "Fraco" ;}
else { $tipo_competencia_jan_text = "" ;}
//  FEV
if ( $tipo_competencia_fev == "5" ) { $tipo_competencia_fev_text = "Ótimo" ;} 
elseif ( $tipo_competencia_fev == "4") { $tipo_competencia_fev_text = "Bom" ;} 
elseif ( $tipo_competencia_fev == "3") { $tipo_competencia_fev_text = "Regular" ;}
elseif ( $tipo_competencia_fev == "2") { $tipo_competencia_fev_text = "Sofrível" ;}
elseif ( $tipo_competencia_fev == "1") { $tipo_competencia_fev_text = "Fraco" ;}
else { $tipo_competencia_fev_text = "" ;}
// MARCO
if ( $tipo_competencia_mar == "5" ) { $tipo_competencia_mar_text = "Ótimo" ;} 
elseif ( $tipo_competencia_mar == "4") { $tipo_competencia_mar_text = "Bom" ;} 
elseif ( $tipo_competencia_mar == "3") { $tipo_competencia_mar_text = "Regular" ;}
elseif ( $tipo_competencia_mar == "2") { $tipo_competencia_mar_text = "Sofrível" ;}
elseif ( $tipo_competencia_mar == "1") { $tipo_competencia_mar_text = "Fraco" ;}
else { $tipo_competencia_mar_text = "" ;}
// ABRIR
if ( $tipo_competencia_abr == "5" ) { $tipo_competencia_abr_text = "Ótimo" ;} 
elseif ( $tipo_competencia_abr == "4") { $tipo_competencia_abr_text = "Bom" ;} 
elseif ( $tipo_competencia_abr == "3") { $tipo_competencia_abr_text = "Regular" ;}
elseif ( $tipo_competencia_abr == "2") { $tipo_competencia_abr_text = "Sofrível" ;}
elseif ( $tipo_competencia_abr == "1") { $tipo_competencia_abr_text = "Fraco" ;}
else { $tipo_competencia_abr_text = "" ;}
// MAIO
if ( $tipo_competencia_mai == "5" ) { $tipo_competencia_mai_text = "Ótimo" ;} 
elseif ( $tipo_competencia_mai == "4") { $tipo_competencia_mai_text = "Bom" ;} 
elseif ( $tipo_competencia_mai == "3") { $tipo_competencia_mai_text = "Regular" ;}
elseif ( $tipo_competencia_mai == "2") { $tipo_competencia_mai_text = "Sofrível" ;}
elseif ( $tipo_competencia_mai == "1") { $tipo_competencia_mai_text = "Fraco" ;}
else { $tipo_competencia_mai_text = "" ;}
// JUNHO
if ( $tipo_competencia_jun == "5" ) { $tipo_competencia_jun_text = "Ótimo" ;} 
elseif ( $tipo_competencia_jun == "4") { $tipo_competencia_jun_text = "Bom" ;} 
elseif ( $tipo_competencia_jun == "3") { $tipo_competencia_jun_text = "Regular" ;}
elseif ( $tipo_competencia_jun == "2") { $tipo_competencia_jun_text = "Sofrível" ;}
elseif ( $tipo_competencia_jun == "1") { $tipo_competencia_jun_text = "Fraco" ;}
else { $tipo_competencia_jun_text = "" ;}
// JUL
if ( $tipo_competencia_jul == "5" ) { $tipo_competencia_jul_text = "Ótimo" ;} 
elseif ( $tipo_competencia_jul == "4") { $tipo_competencia_jul_text = "Bom" ;} 
elseif ( $tipo_competencia_jul == "3") { $tipo_competencia_jul_text = "Regular" ;}
elseif ( $tipo_competencia_jul == "2") { $tipo_competencia_jul_text = "Sofrível" ;}
elseif ( $tipo_competencia_jul == "1") { $tipo_competencia_jul_text = "Fraco" ;}
else { $tipo_competencia_jul_text = "" ;}
// AGO
if ( $tipo_competencia_ago == "5" ) { $tipo_competencia_ago_text = "Ótimo" ;} 
elseif ( $tipo_competencia_ago == "4") { $tipo_competencia_ago_text = "Bom" ;} 
elseif ( $tipo_competencia_ago == "3") { $tipo_competencia_ago_text = "Regular" ;}
elseif ( $tipo_competencia_ago == "2") { $tipo_competencia_ago_text = "Sofrível" ;}
elseif ( $tipo_competencia_ago == "1") { $tipo_competencia_ago_text = "Fraco" ;}
else { $tipo_competencia_ago_text = "" ;}
// SET
if ( $tipo_competencia_set == "5" ) { $tipo_competencia_set_text = "Ótimo" ;} 
elseif ( $tipo_competencia_set == "4") { $tipo_competencia_set_text = "Bom" ;} 
elseif ( $tipo_competencia_set == "3") { $tipo_competencia_set_text = "Regular" ;}
elseif ( $tipo_competencia_set == "2") { $tipo_competencia_set_text = "Sofrível" ;}
elseif ( $tipo_competencia_set == "1") { $tipo_competencia_set_text = "Fraco" ;}
else { $tipo_competencia_set_text = "" ;}
// OUT
if ( $tipo_competencia_out == "5" ) { $tipo_competencia_out_text = "Ótimo" ;} 
elseif ( $tipo_competencia_out == "4") { $tipo_competencia_out_text = "Bom" ;} 
elseif ( $tipo_competencia_out == "3") { $tipo_competencia_out_text = "Regular" ;}
elseif ( $tipo_competencia_out == "2") { $tipo_competencia_out_text = "Sofrível" ;}
elseif ( $tipo_competencia_out == "1") { $tipo_competencia_out_text = "Fraco" ;}
else { $tipo_competencia_out_text = "" ;}
// NOV
if ( $tipo_competencia_nov == "5" ) { $tipo_competencia_nov_text = "Ótimo" ;} 
elseif ( $tipo_competencia_nov == "4") { $tipo_competencia_nov_text = "Bom" ;} 
elseif ( $tipo_competencia_nov == "3") { $tipo_competencia_nov_text = "Regular" ;}
elseif ( $tipo_competencia_nov == "2") { $tipo_competencia_nov_text = "Sofrível" ;}
elseif ( $tipo_competencia_nov == "1") { $tipo_competencia_nov_text = "Fraco" ;}
else { $tipo_competencia_nov_text = "" ;}
// DEZ
if ( $tipo_competencia_dez == "5" ) { $tipo_competencia_dez_text = "Ótimo" ;} 
elseif ( $tipo_competencia_dez == "4") { $tipo_competencia_dez_text = "Bom" ;} 
elseif ( $tipo_competencia_dez == "3") { $tipo_competencia_dez_text = "Regular" ;}
elseif ( $tipo_competencia_dez == "2") { $tipo_competencia_dez_text = "Sofrível" ;}
elseif ( $tipo_competencia_dez == "1") { $tipo_competencia_dez_text = "Fraco" ;}
else { $tipo_competencia_dez_text = "" ;}

//	TROCAR O VAMOR DO NIVEL

	
// BUSCAR DADOS SETOR  POR COMPETENCIA
$sql_setor = "SELECT * FROM setor WHERE id='$id_setor_bd' ORDER BY 'nome_setor'"; 
$resultado_setor = mysql_query($sql_setor) or die ("Não foi possível");
while ($linha_setor=mysql_fetch_array($resultado_setor)) { 
	$nome_setor_bd = $linha_setor["nome_setor"]; }

// BUSCAR DADOS FUNCAO  POR COMPETENCIA
$sql_funcao = "SELECT * FROM funcao WHERE id='$id_funcao_bd' ORDER BY 'nome_funcao'"; 
$resultado_funcao = mysql_query($sql_funcao) or die ("Não foi possível");
while ($linha_funcao=mysql_fetch_array($resultado_funcao)) { 
	$nome_funcao_bd = $linha_funcao["nome_funcao"]; }
	
?>

	<TR class=linha0 border-style: solid; border-width: 1; onMouseOver="this.style.background='#99CCEA'; return true;" onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;">

<? /* nome funcionario */ ?>
<TH align=middle><P class=bordas>  <? echo $nome_funcionarios_bd; ?> </P></TH>

<? /* nome setor */ ?>
<TH align=middle><P class=bordas>  <? echo $nome_setor_bd; ?> </P></TH>

<? /* nome funcao */ ?>
<TH align=middle><P class=bordas>  <? echo $nome_funcao_bd; ?> </P></TH>  

<TH align=middle><P class=bordas>  <? echo $tipo_competencia_jan_text; ?> </P></TH>
<TH align=middle><P class=bordas>  <? echo $tipo_competencia_fev_text; ?> </P></TH>
<TH align=middle><P class=bordas>  <? echo $tipo_competencia_mar_text; ?> </P></TH>
<TH align=middle><P class=bordas>  <? echo $tipo_competencia_abr_text; ?> </P></TH>
<TH align=middle><P class=bordas>  <? echo $tipo_competencia_mai_text; ?> </P></TH>
<TH align=middle><P class=bordas>  <? echo $tipo_competencia_jun_text; ?> </P></TH>
<TH align=middle><P class=bordas>  <? echo $tipo_competencia_jul_text; ?> </P></TH>
<TH align=middle><P class=bordas>  <? echo $tipo_competencia_ago_text; ?> </P></TH>
<TH align=middle><P class=bordas>  <? echo $tipo_competencia_set_text; ?> </P></TH>
<TH align=middle><P class=bordas>  <? echo $tipo_competencia_out_text; ?> </P></TH>
<TH align=middle><P class=bordas>  <? echo $tipo_competencia_nov_text; ?> </P></TH>
<TH align=middle><P class=bordas>  <? echo $tipo_competencia_dez_text; ?> </P></TH>



	</TR>
	
<? } // BUSCAR DADOS FUNCIONARIOS  POR COMPETENCIA ?>
<? /* --------------------  FINAL BUSCA DOS DADOS  POR COMPETENCIA -----------------------------  */  ?>

	
<? } 
// TIPO COMPETENCIA = CONTROLE, MOSTRARA OS DADOS DO CONTROLE
// TIPO COMPETENCIA <> CONTROLE, MOSTRARA OS DADOS DA SELECAO DA COMPETENCIA 
?>

			
			
			
			</FIELDSET>
			</TBODY>
			</TABLE>
			</TD>
				  
          <TD width="2%">&nbsp;</TD>
          <TD vAlign=top width="48%">
          
            </TD>
				  
          <TD width="1%">&nbsp;</TD>
		  </TR>
		  </TBODY>
		  </TABLE>
		  
      <DIV class=espaco>&nbsp;</DIV>
	  
	  </TR>
	  </TBODY>
	  </TABLE>
	  
</FIELDSET>
 






</form>
</body>
</html>
