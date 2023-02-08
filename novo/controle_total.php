<? include "valida_sessao.php"; include "config.php"; ?>
<html>
<head>
<title> Dados </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" SRC="funcoes/abrir_fechar_atualizar.js"></script>
<script language="JavaScript" SRC="funcoes/overlib.js"></script>
</head>
<body>

<div id="overDiv" style="position:absolute; visibility:hide; z-index:1;; width: 160px; height: 19px"></div>

<form action="" method="post" name="avaliacao_desempenho">

<? 

// INICIA SEMPRE NO CONTROLE
if ( $tipo_competencia == "" ) { $tipo_competencia = "controle"; $tipo_competencia_texto = "Controle Total"; } 
elseif ( $tipo_competencia == "disciplina" ) { $tipo_competencia_texto = "Disciplina"; } 
elseif ( $tipo_competencia == "produtividade" ) { $tipo_competencia_texto = "Produtividade"; }
elseif ( $tipo_competencia == "assiduidade" ) { $tipo_competencia_texto = "Assiduidade"; }
elseif ( $tipo_competencia == "responsabilidade" ) { $tipo_competencia_texto = "Responsabilidade"; }
elseif ( $tipo_competencia == "relacionamento" ) { $tipo_competencia_texto = "Relacionamento"; }
else { $tipo_competencia_texto = "Controle Total"; } 
// INICIA SEMPRE NO CONTROLE

?>


<table class=titulo_sem_borda width=100% align="center" height="25">
<tr><td><b><font size="5" color="#000000"> <?echo $tipo_competencia_texto;?> </font></b></td></tr></table>


<FIELDSET>
<LEGEND> <font color="#FFFF99"> (AP = Alto Potencial / Imp = Importante / Def = Deficiência / Com = Comprometimento) </font>
</LEGEND>

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
// TIPO COMPETENCIA <> CONTROLE, MOSTRARA OS DADOS DA SELECAO DA COMPETENCIA 
// (disciplina, produtividade, assiduidade, responsabilidade, relacionamento)
if ( $tipo_competencia == "controle" ) { 
	

// INICIA SEMPRE NO CONTROLE
if ( $tipo_competencia == "" ) { $tipo_competencia = "controle"; $tipo_competencia_texto = "Controle Total"; } 
elseif ( $tipo_competencia == "disciplina" ) { $tipo_competencia_texto = "Disciplina"; } 
elseif ( $tipo_competencia == "produtividade" ) { $tipo_competencia_texto = "Produtividade"; }
elseif ( $tipo_competencia == "assiduidade" ) { $tipo_competencia_texto = "Assiduidade"; }
elseif ( $tipo_competencia == "responsabilidade" ) { $tipo_competencia_texto = "Responsabilidade"; }
elseif ( $tipo_competencia == "relacionamento" ) { $tipo_competencia_texto = "Relacionamento"; }
else { $tipo_competencia_texto = "Controle Total"; } 

	
?>

<? /* --------------------  INICIO CABECALHO DO CONTROLE  -----------------------------  */  ?>



		<TR class=linha_cabecalho>
		

<? /* nome funcionario */ ?>
<TH align=middle rowspan="2"><P class=bordas>  Funcionário </P></TH>

<? /* nome setor */ ?>
<TH align=middle rowspan="2"><P class=bordas>  Setor </P></TH>

<? /* nome funcao */ ?>
<TH align=middle rowspan="2"><P class=bordas>  Função </P></TH>
			  
<? /* janeiro */ ?>
<TH align=middle rowspan="2"><P class=bordas>  Jan. </P></TH>

<? /* fevereiro 	*/ ?>
<TH align=middle rowspan="2"><P class=bordas> Fev. </P></TH>

<? /* marco 	*/ ?>
<TH align=middle rowspan="2"><P class=bordas> Mar. </P></TH>

<? /* abrir 	*/ ?>
<TH align=middle rowspan="2"><P class=bordas> Abr. </P></TH>

<? /* maio 	*/ ?>
<TH align=middle rowspan="2"><P class=bordas> Mai. </P></TH>

<? /* junho 	*/ ?>
<TH align=middle rowspan="2"><P class=bordas> Jun. </P></TH>

<? /* julho 	*/ ?>
<TH align=middle rowspan="2"><P class=bordas> Jul. </P></TH>

<? /* agosto 	*/ ?>
<TH align=middle rowspan="2"><P class=bordas> Ago. </P></TH>

<? /* setembro 	*/ ?>
<TH align=middle rowspan="2"><P class=bordas> Set. </P></TH>

<? /* outubro 	*/ ?>
<TH align=middle rowspan="2"><P class=bordas> Out. </P></TH>

<? /* novembro 	*/ ?>
<TH align=middle rowspan="2"><P class=bordas> Nov. </P></TH>

<? /* dezembro 	*/ ?>
<TH align=middle rowspan="2"><P class=bordas> Dez. </P></TH>


<? /* media */ ?>
<TH align=middle colspan="3"><P class=bordas> Média </P></TH>	


		</TR> 	

		
		<TR class=linha_cabecalho>


<TH align=middle><P class=bordas>  1° Sem. </P></TH>
<TH align=middle><P class=bordas>  2° Sem. </P></TH>

<? /* anual */ ?>
<TH align=middle><P class=bordas>  Anual </P></TH>


		</TR>	
		
<? /* --------------------  FINAL CABECALHO DO CONTROLE  -----------------------------  */  ?>		



<? /* --------------------  INICIO BUSCA DOS DADOS  -----------------------------  */  ?>

<?

// dados da selecao do funcionario	 
//echo "selecao id funcionarios = ".$f_id_funcionarios; echo "<br>";
if ( $f_id_funcionarios == "" ) { $f_id_funcionarios_db = ""; } else  { $f_id_funcionarios_db = "AND id_funcionarios='$f_id_funcionarios'"; }

// dados da selecao dos mes 
if ( $f_media_jan == "" ) { $f_media_jan_db = ""; } else  { $f_media_jan_db = "AND media_jan='$f_media_jan'"; }
if ( $f_media_fev == "" ) { $f_media_fev_db = ""; } else  { $f_media_fev_db = "AND media_fev='$f_media_fev'"; }
if ( $f_media_mar == "" ) { $f_media_mar_db = ""; } else  { $f_media_mar_db = "AND media_mar='$f_media_mar'"; }
if ( $f_media_abr == "" ) { $f_media_abr_db = ""; } else  { $f_media_abr_db = "AND media_abr='$f_media_abr'"; }
if ( $f_media_mai == "" ) { $f_media_mai_db = ""; } else  { $f_media_mai_db = "AND media_mai='$f_media_mai'"; }
if ( $f_media_jun == "" ) { $f_media_jun_db = ""; } else  { $f_media_jun_db = "AND media_jun='$f_media_jun'"; }
if ( $f_media_jul == "" ) { $f_media_jul_db = ""; } else  { $f_media_jul_db = "AND media_jul='$f_media_jul'"; }
if ( $f_media_ago == "" ) { $f_media_ago_db = ""; } else  { $f_media_ago_db = "AND media_ago='$f_media_ago'"; }
if ( $f_media_set == "" ) { $f_media_set_db = ""; } else  { $f_media_set_db = "AND media_set='$f_media_set'"; }
if ( $f_media_out == "" ) { $f_media_out_db = ""; } else  { $f_media_out_db = "AND media_out='$f_media_out'"; }
if ( $f_media_nov == "" ) { $f_media_nov_db = ""; } else  { $f_media_nov_db = "AND media_nov='$f_media_nov'"; }
if ( $f_media_dez == "" ) { $f_media_dez_db = ""; } else  { $f_media_dez_db = "AND media_dez='$f_media_dez'"; }


// dados da selecao do pri semestre	 
//echo "selecao f_pri_semestre = ".$f_pri_semestre; echo "<br>";
if ( $f_pri_semestre == "" ) { $f_pri_semestre_db = ""; } else  { $f_pri_semestre_db = "AND pri_semestre='$f_pri_semestre'"; }

// dados da selecao do seg semestre	 
//echo "selecao f_seg_semestre = ".$f_seg_semestre; echo "<br>";
if ( $f_seg_semestre == "" ) { $f_seg_semestre_db = ""; } else  { $f_seg_semestre_db = "AND seg_semestre='$f_seg_semestre'"; }

// dados da selecao do media anual	 
//echo "selecao f_media_anual = ".$f_media_anual; echo "<br>";
if ( $f_media_anual == "" ) { $f_media_anual_db = ""; } else  { $f_media_anual_db = "AND media_anual='$f_media_anual'"; }


// dados da selecao do setor
//echo "selecao f_id_setor = ".$f_id_setor; echo "<br>";
if ( $f_id_setor == "" ) { $f_id_setor_db = ""; } else  { $f_id_setor_db = "AND id_setor='$f_id_setor'"; }
// dados da busca do id funcionarios conforme o id selecao do setor
$sql_func = "SELECT * FROM funcionarios WHERE id>='0' $f_id_setor_db ORDER BY 'nome_funcionarios'"; 
$resultado_func = mysql_query($sql_func) or die ("Não foi possível a busca por Funcionários");
while ($linha_func=mysql_fetch_array($resultado_func)) { $id_func = $linha_func["id"];

// numero da linha do id funcionarios dentro da tabela dos funcionarios
//echo "id_func conforme selecao f_id_setor = ".$id_func; echo "<br>";	 
if ( $id_func == "" ) { $id_func_db = ""; } else  { $id_func_db = "AND id_funcionarios='$id_func'"; }



// BUSCAR DADOS AVALIACAO DESEMPENHO
$sql_avaliacao = "SELECT * FROM avaliacao_desempenho WHERE id>='0' $f_id_funcionarios_db $id_func_db $f_media_jan_db $f_media_fev_db $f_media_mar_db $f_media_abr_db $f_media_mai_db $f_media_jun_db $f_media_jul_db $f_media_ago_db $f_media_set_db $f_media_out_db $f_media_nov_db $f_media_dez_db $f_pri_semestre_db $f_seg_semestre_db $f_media_anual_db ORDER BY 'id'"; 
$resultado_avaliacao = mysql_query($sql_avaliacao) or die ("Não foi possível a busca por Avaliacao");
while ($linha_avaliacao=mysql_fetch_array($resultado_avaliacao)) { 
	$id_funcionarios = $linha_avaliacao["id_funcionarios"]; 
	
	$media_jan = $linha_avaliacao["media_jan"];
	$media_fev = $linha_avaliacao["media_fev"];
	$media_mar = $linha_avaliacao["media_mar"];
	$media_abr = $linha_avaliacao["media_abr"];
	$media_mai = $linha_avaliacao["media_mai"];
	$media_jun = $linha_avaliacao["media_jun"];
	$media_jul = $linha_avaliacao["media_jul"];
	$media_ago = $linha_avaliacao["media_ago"];
	$media_set = $linha_avaliacao["media_set"];
	$media_out = $linha_avaliacao["media_out"];
	$media_nov = $linha_avaliacao["media_nov"];
	$media_dez = $linha_avaliacao["media_dez"];
		
	$pri_semestre = $linha_avaliacao["pri_semestre"];
	$seg_semestre = $linha_avaliacao["seg_semestre"];
	
	$media_anual = $linha_avaliacao["media_anual"];


// BUSCAR DADOS FUNCIONARIOS
$sql_funcionarios = "SELECT * FROM funcionarios WHERE id='$id_funcionarios' ORDER BY 'nome_funcionarios'"; 
$resultado_funcionarios = mysql_query($sql_funcionarios) or die ("Não foi possível a busca por Funcionários");
while ($linha_funcionarios=mysql_fetch_array($resultado_funcionarios)) { 
	 $nome_funcionarios = $linha_funcionarios["nome_funcionarios"];
	 $id_setor = $linha_funcionarios["id_setor"]; 
	 $id_funcao = $linha_funcionarios["id_funcao"]; 
	 }


// BUSCAR DADOS SETOR
$sql_setor = "SELECT * FROM setor WHERE id='$id_setor' ORDER BY 'nome_setor'"; 
$resultado_setor = mysql_query($sql_setor) or die ("Não foi possível a busca por Setor");
while ($linha_setor=mysql_fetch_array($resultado_setor)) { 
	$nome_setor = $linha_setor["nome_setor"]; 
	}
	

// BUSCAR DADOS FUNCAO
$sql_funcao = "SELECT * FROM funcao WHERE id='$id_funcao' ORDER BY 'nome_funcao'"; 
$resultado_funcao = mysql_query($sql_funcao) or die ("Não foi possível a busca por Função");
while ($linha_funcao=mysql_fetch_array($resultado_funcao)) { 
	$nome_funcao = $linha_funcao["nome_funcao"]; 
	}

	
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

<? /* janeiro */ ?>
<TH align=middle><P class=bordas>  <? echo $media_jan;  ?> </P></TH>

<? /* fevereiro 	*/ ?>
<TH align=middle><P class=bordas> <? echo $media_fev;  ?> </P></TH>

<? /* marco 	*/ ?>
<TH align=middle><P class=bordas> <? echo $media_mar;  ?> </P></TH>

<? /* abrir 	*/ ?>
<TH align=middle><P class=bordas> <? echo $media_abr;  ?> </P></TH>

<? /* maio 	*/ ?>
<TH align=middle><P class=bordas> <? echo $media_mai;  ?> </P></TH>

<? /* junho 	*/ ?>
<TH align=middle><P class=bordas> <? echo $media_jun;  ?> </P></TH>

<? /* julho 	*/ ?>
<TH align=middle><P class=bordas> <? echo $media_jul;  ?> </P></TH>

<? /* agosto 	*/ ?>
<TH align=middle><P class=bordas> <? echo $media_ago;  ?> </P></TH>

<? /* setembro 	*/ ?>
<TH align=middle><P class=bordas> <? echo $media_set;  ?> </P></TH>

<? /* outubro 	*/ ?>
<TH align=middle><P class=bordas> <? echo $media_out;  ?> </P></TH>

<? /* novembro 	*/ ?>
<TH align=middle><P class=bordas> <? echo $media_nov;  ?> </P></TH>

<? /* dezembro 	*/ ?>
<TH align=middle><P class=bordas> <? echo $media_dez;  ?> </P></TH>

<? /* pri_semestre 	*/ ?>
<TH align=middle><P class=bordas>  <? echo $pri_semestre;  ?> </P></TH>

<? /* seg_semestre 	*/ ?>
<TH align=middle><P class=bordas>  <? echo $seg_semestre;  ?> </P></TH>

<? /* anual 	*/ ?>
<TH align=middle><P class=bordas>  <? echo $media_anual; ?></P></TH>

		</TR>


<? 
}  // BUSCAR DADOS FUNCIONARIOS 
}  // dados da busca do id funcionarios conforme o id selecao do setor
?>
<? /* --------------------  FINAL BUSCA DOS DADOS  -----------------------------  */  ?>

	
<? } else { ?>


<? /* --------------------  FINAL CONTROLE TOTAL -----------------------------  */  ?>







<? /* --------------------  INICIO DAS COMPETENCIAS  -----------------------------  */  ?>
              
<? /* --------------------  INICIO CABECALHO DOS DADOS COMPETENCIAS -----------------------------  */  ?>

		<TR class=linha_cabecalho>

<? /* nome funcionario */ ?>
<TH align=middle rowspan="2"><P class=bordas>  Funcionário </P></TH>

<? /* nome setor */ ?>
<TH align=middle rowspan="2"><P class=bordas>  Setor </P></TH>

<? /* nome funcao */ ?>
<TH align=middle rowspan="2"><P class=bordas>  Função </P></TH>
			  
<? /* avaliacao */ ?>
<TH align=middle colspan="12"><P class=bordas>  Avaliação do Ano = <?echo $ano_avaliacao = date('Y');?> </P></TH>

		</TR> 	
		
		
		<TR class=linha_cabecalho>
  
<TH align=middle><P class=bordas>  Jan. </P></TH>
<TH align=middle><P class=bordas>  Fev. </P></TH>
<TH align=middle><P class=bordas>  Mar. </P></TH>
<TH align=middle><P class=bordas>  Abr. </P></TH>
<TH align=middle><P class=bordas>  Mai. </P></TH>
<TH align=middle><P class=bordas>  Jun. </P></TH>
<TH align=middle><P class=bordas>  Jul. </P></TH>
<TH align=middle><P class=bordas>  Ago. </P></TH>
<TH align=middle><P class=bordas>  Set. </P></TH>
<TH align=middle><P class=bordas>  Out. </P></TH>
<TH align=middle><P class=bordas>  Nov. </P></TH>
<TH align=middle><P class=bordas>  Dez. </P></TH>

		</TR>	
		
<? /* --------------------  FINAL CABECALHO DOS DADOS COMPETENCIAS -----------------------------  */  ?>		


<? /* --------------------  INICIO BUSCA DOS DADOS COMPETENCIAS  -----------------------------  */  ?>

<?

//echo "tipo_competencia antes = ".$tipo_competencia; echo "<br>";


// dados da selecao do funcionario	 
//echo "selecao id funcionarios = ".$f_id_funcionarios; echo "<br>";
if ( $f_id_funcionarios == "" ) { $f_id_funcionarios_db = ""; } else  { $f_id_funcionarios_db = "AND id_funcionarios='$f_id_funcionarios'"; }


// dados da selecao do setor
//echo "selecao f_id_setor = ".$f_id_setor; echo "<br>";
if ( $f_id_setor == "" ) { $f_id_setor_db = ""; } else  { $f_id_setor_db = "AND id_setor='$f_id_setor'"; }
// dados da busca do id funcionarios conforme o id selecao do setor
$sql_func = "SELECT * FROM funcionarios WHERE id>='0' $f_id_setor_db ORDER BY 'nome_funcionarios'"; 
$resultado_func = mysql_query($sql_func) or die ("Não foi possível a busca por Funcionários");
while ($linha_func=mysql_fetch_array($resultado_func)) { $id_func = $linha_func["id"];

// numero da linha do id funcionarios dentro da tabela dos funcionarios
//echo "id_func conforme selecao f_id_setor = ".$id_func; echo "<br>";	 
if ( $id_func == "" ) { $id_func_db = ""; } else  { $id_func_db = "AND id_funcionarios='$id_func'"; }

//echo "tipo_competencia despois = ".$tipo_competencia."_jan"; echo "<br>";

// BUSCAR DADOS AVALIACAO DESEMPENHO
$sql_avaliacao = "SELECT * FROM avaliacao_desempenho WHERE id>='0' $f_id_funcionarios_db $id_func_db ORDER BY 'id'";
$resultado_avaliacao = mysql_query($sql_avaliacao) or die ("Não foi possível a busca por Avaliacao");
while ($linha_avaliacao=mysql_fetch_array($resultado_avaliacao)) { 
	$id_funcionarios = $linha_avaliacao["id_funcionarios"]; 
	$pri_semestre = $linha_avaliacao["pri_semestre"];
	$seg_semestre = $linha_avaliacao["seg_semestre"];
	$media_anual = $linha_avaliacao["media_anual"];	
	 
	$tipo_competencia_jan = $linha_avaliacao[$tipo_competencia."_jan"];
	$tipo_competencia_fev = $linha_avaliacao[$tipo_competencia."_fev"];
	$tipo_competencia_mar = $linha_avaliacao[$tipo_competencia."_mar"];
	$tipo_competencia_abr = $linha_avaliacao[$tipo_competencia."_abr"];
	$tipo_competencia_mai = $linha_avaliacao[$tipo_competencia."_mai"];
	$tipo_competencia_jun = $linha_avaliacao[$tipo_competencia."_jun"];
	$tipo_competencia_jul = $linha_avaliacao[$tipo_competencia."_jul"];
	$tipo_competencia_ago = $linha_avaliacao[$tipo_competencia."_ago"];
	$tipo_competencia_set = $linha_avaliacao[$tipo_competencia."_set"];
	$tipo_competencia_out = $linha_avaliacao[$tipo_competencia."_out"];
	$tipo_competencia_nov = $linha_avaliacao[$tipo_competencia."_nov"];
	$tipo_competencia_dez = $linha_avaliacao[$tipo_competencia."_dez"];

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


// BUSCAR DADOS FUNCIONARIOS
$sql_funcionarios = "SELECT * FROM funcionarios WHERE id='$id_funcionarios' ORDER BY 'nome_funcionarios'"; 
$resultado_funcionarios = mysql_query($sql_funcionarios) or die ("Não foi possível a busca por Funcionários");
while ($linha_funcionarios=mysql_fetch_array($resultado_funcionarios)) { 
	 $nome_funcionarios = $linha_funcionarios["nome_funcionarios"];
	 $id_setor = $linha_funcionarios["id_setor"]; 
	 $id_funcao = $linha_funcionarios["id_funcao"]; 
	 }


// BUSCAR DADOS SETOR
$sql_setor = "SELECT * FROM setor WHERE id='$id_setor' ORDER BY 'nome_setor'"; 
$resultado_setor = mysql_query($sql_setor) or die ("Não foi possível a busca por Setor");
while ($linha_setor=mysql_fetch_array($resultado_setor)) { 
	$nome_setor = $linha_setor["nome_setor"]; 
	}
	

// BUSCAR DADOS FUNCAO
$sql_funcao = "SELECT * FROM funcao WHERE id='$id_funcao' ORDER BY 'nome_funcao'"; 
$resultado_funcao = mysql_query($sql_funcao) or die ("Não foi possível a busca por Função");
while ($linha_funcao=mysql_fetch_array($resultado_funcao)) { 
	$nome_funcao = $linha_funcao["nome_funcao"]; 
	}
	
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
	
<? 
} // BUSCAR DADOS FUNCIONARIOS  POR COMPETENCIA 
}
?>

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
