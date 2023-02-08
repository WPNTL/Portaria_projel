<? include "valida_sessao.php"; include "config.php"; ?>
<html>
<head>
<title> Cabeçalho Menu </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" SRC="funcoes/abrir_fechar_atualizar.js"></script>
<script language="JavaScript" SRC="funcoes/overlib.js"></script>
</head>
<body>


<div id="overDiv" style="position:absolute; visibility:hide; z-index:1;; width: 160px; height: 19px"></div>

<form action="" method="post" name="avaliacao_desempenho">



<?//DATA HOJE
$b = date('d'); $c = date('n'); $d = date('Y'); 
if(strlen($b) == 1){$b = "0".$b;};
if(strlen($c) == 1){$c = "0".$c;}; 
$data_hoje = $b."/".$c."/".$d; 
?>



<table class=titulo width=100% align="center" height="25">
<tr>



<?
$sql = "SELECT * FROM setor WHERE nome_setor='$nome_setor'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
while ($linha=mysql_fetch_array($resultado)) {

$nome_setor = $linha['nome_setor'];
}?>

<td class=center > Usuário  <? echo "$nome_setor" ?><br>Hoje <? echo "$data_hoje"?> </td>

</tr>
</table>


<table class=titulo_sem_borda width=100% align="center" height="25">
<tr><td><b><font size="5" color="#000000"> Controle Total Avaliação de Desempenho </font></b></td></tr></table>


<FIELDSET>
<LEGEND> Menu
<? /* botao atualizar filtros */ ?>
<input class="botao1" name="Atualizar Filtros" type="button" value="Atualizar Filtros" onClick="Atualizar_Filtros();">
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
              
              
              
<? /* --------------------  INICIO DOS BOTOES SELECAO DE COMPETENCIA  -----------------------------  */  ?>

		<TR class=linha_cabecalho>

<? // INICIA SEMPRE NO CONTROLE
if ( $tipo_competencia == "" ) { $checkedcontrole = "checked"; $tipo_competencia = "controle"; } 
?>

<? /* controle total */ ?>
<TH align=middle><P class=bordas> 
<? if ( $tipo_competencia == "controle" ) { $checkedcontrole = "checked"; } ?>
<input class=botao4 type="radio" <?echo $checkedcontrole; ?> name="tipo_competencia" value="controle" onclick="Atualizar_Filtros();"> Controle Total </P></TH>

<? /* disciplina */ ?>
<TH align=middle><P class=bordas> 
<? if ( $tipo_competencia == "disciplina" ) { $checkeddisciplina = "checked"; } ?>
<input class=botao4 type="radio" <?echo $checkeddisciplina; ?> name="tipo_competencia" value="disciplina" onclick="Atualizar_Filtros();"> Disciplina </P></TH>

<? /* produtividade */ ?>
<TH align=middle><P class=bordas> 
<? if ( $tipo_competencia == "produtividade" ) { $checkedprodutividade = "checked"; } ?>
<input class=botao4 type="radio" <?echo $checkedprodutividade; ?> name="tipo_competencia" value="produtividade" onclick="Atualizar_Filtros();"> Produtividade </P></TH>

<? /* assinuidade 	*/ ?>
<TH align=middle><P class=bordas>
<? if ( $tipo_competencia == "assiduidade" ) { $checkedassiduidade = "checked"; } ?> 
<input class=botao4 type="radio" <?echo $checkedassiduidade; ?> name="tipo_competencia" value="assiduidade" onclick="Atualizar_Filtros();"> Assiduidade </P></TH>

<? /* responsabilidade 	*/ ?>
<TH align=middle><P class=bordas> 
<? if ( $tipo_competencia == "responsabilidade" ) { $checkedresponsabilidade = "checked"; } ?>
<input class=botao4 type="radio" <?echo $checkedresponsabilidade; ?> name="tipo_competencia" value="responsabilidade" onclick="Atualizar_Filtros();"> Responsabilidade </P></TH>

<? /* relacionamento 	*/ ?>
<TH align=middle><P class=bordas> 
<? if ( $tipo_competencia == "relacionamento" ) { $checkedrelacionamento = "checked"; } ?>
<input class=botao4 type="radio" <?echo $checkedrelacionamento; ?> name="tipo_competencia" value="relacionamento" onclick="Atualizar_Filtros();"> Relacionamento </P></TH>

<? /* 			----------------------		funcionarios		------------------------- 	*/ ?>
<? /* 	cadastro funcionarios 	*/ ?>
<TH align=middle><P class=bordas> 
<? if ( $tipo_competencia == "cadastrofuncionarios" ) { $checkedcontrole = "controle"; $tipo_competencia = "controle"; } ?>
<input class=botao4 type="radio" name="tipo_competencia" value="cadastrofuncionarios" onclick="Abrir_Cadastro_Funcionarios();"> Cadastro Funcionários </P></TH>

<? /* 	alterar funcionarios 	*/ ?>
<TH align=middle><P class=bordas> 
<? if ( $tipo_competencia == "alterarfuncionarios" ) { $checkedcontrole = "controle"; $tipo_competencia = "controle"; } ?>
<input class=botao4 type="radio" name="tipo_competencia" value="alterarfuncionarios" onclick="Abrir_Alterar_Funcionarios();"> Alterar Funcionários </P></TH>
<? /* 			----------------------		funcionarios		------------------------- 	*/ ?>

<? /* 			----------------------		setor		------------------------- 	*/ ?>
<? /* 	cadastro setor 	*/ ?>
<TH align=middle><P class=bordas> 
<? if ( $tipo_competencia == "cadastrosetor" ) { $checkedcontrole = "controle"; $tipo_competencia = "controle"; } ?>
<input class=botao4 type="radio" name="tipo_competencia" value="cadastrosetor" onclick="Abrir_Cadastro_Setor();"> Cadastro Setor </P></TH>

<? /* 	alterar setor 	
<TH align=middle><P class=bordas> 
<? if ( $tipo_competencia == "alterarsetor" ) { $checkedcontrole = "controle"; $tipo_competencia = "controle"; } ?>
<input class=botao4 type="radio" name="tipo_competencia" value="alterarsetor" onclick="Abrir_Alterar_Setor();"> Alterar Setor </P></TH>*/ ?>
<? /* 			----------------------		setor		------------------------- 	*/ ?>

<? /* 			----------------------		funcao		------------------------- 	*/ ?>
<? /* 	cadastro funcao 	*/ ?>
<TH align=middle><P class=bordas> 
<? if ( $tipo_competencia == "cadastrofuncao" ) { $checkedcontrole = "controle"; $tipo_competencia = "controle"; } ?>
<input class=botao4 type="radio" name="tipo_competencia" value="cadastrofuncao" onclick="Abrir_Cadastro_Funcao();"> Cadastro Função </P></TH>

<? /* 	alterar funcao 	*/ ?>
<TH align=middle><P class=bordas> 
<? if ( $tipo_competencia == "alterarfuncao" ) { $checkedcontrole = "controle"; $tipo_competencia = "controle"; } ?>
<input class=botao4 type="radio" name="tipo_competencia" value="alterarfuncao" onclick="Abrir_Alterar_Funcao();"> Alterar Função </P></TH>
<? /* 			----------------------		funcao		------------------------- 	*/ ?>

			  
		</TR> 		

		
<? /* --------------------  FIM DOS BOTOES SELECAO DE COMPETENCIA  -----------------------------  */  ?>	



<? /* --------------------  INICIO DOS BOTOES ORGANIZACAO  -----------------------------  */  ?>

		<TR class=linha_cabecalho>

<? /* nome setor */ ?>
<TH align=middle><P class=bordas> Setor </P></TH>

<? /* nome funcionario */ ?>
<TH align=middle><P class=bordas> Funcionários </P></TH>

<? if ( $tipo_competencia == "controle" ) { ?>

<? /* janeiro 	*/ ?>
<TH align=middle><P class=bordas> Jan. </P></TH>

<? /* fevereiro 	*/ ?>
<TH align=middle><P class=bordas> Fev. </P></TH>

<? /* marco 	*/ ?>
<TH align=middle><P class=bordas> Mar. </P></TH>

<? /* abrir 	*/ ?>
<TH align=middle><P class=bordas> Abr. </P></TH>

<? /* maio 	*/ ?>
<TH align=middle><P class=bordas> Mai. </P></TH>

<? /* junho 	*/ ?>
<TH align=middle><P class=bordas> Jun. </P></TH>

<? /* julho 	*/ ?>
<TH align=middle><P class=bordas> Jul. </P></TH>

<? /* agosto 	*/ ?>
<TH align=middle><P class=bordas> Ago. </P></TH>

<? /* setembro 	*/ ?>
<TH align=middle><P class=bordas> Set. </P></TH>

<? /* outubro 	*/ ?>
<TH align=middle><P class=bordas> Out. </P></TH>

<? /* novembro 	*/ ?>
<TH align=middle><P class=bordas> Nov. </P></TH>

<? /* dezembro 	*/ ?>
<TH align=middle><P class=bordas> Dez. </P></TH>

<? /* Média 1 Semestre 	*/ ?>
<TH align=middle><P class=bordas> Média 1° Sem. </P></TH>

<? /* Média 2 Semestre 	*/ ?>
<TH align=middle><P class=bordas> Média 2° Sem. </P></TH>

<? /* Média Anual 	*/ ?>
<TH align=middle><P class=bordas> Média Anual </P></TH>

<? } ?>
			  
		</TR> 		

		
<? /* --------------------  FIM DOS BOTOES ORGANIZACAO  -----------------------------  */  ?>		
 




<? /* --------------------  INICIO DOS BOTOES SELECAO  -----------------------------  */  ?>


		<TR class=linha_cabecalho>



<?  /*     nome setor   	*/  ?>	         
<TH align=middle widht="15%" ><P class=bordas>
<? if ($f_id_setor == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select size="1" <?echo $botao;?> name="f_id_setor"  style='width:195px'>
<?
   $query = "SELECT * FROM setor ORDER BY 'nome_setor'";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect> TODOS </option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->id==$f_id_setor)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->id' $sSelect> $sRow->nome_setor</option>");   }  ?>
</select>
</P></TH>

<?  /* nome funcionarios */  ?>           
<TH align=middle widht="15%" ><P class=bordas>
<? if ($f_id_funcionarios == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select size="1" <?echo $botao;?> name="f_id_funcionarios" style='width:195px'>
<?
  $query = "SELECT * FROM funcionarios ORDER BY 'nome_funcionarios'";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect> TODOS </option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->id==$f_id_funcionarios)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->id' $sSelect> $sRow->nome_funcionarios</option>");   }  ?>
</select>

</P></TH>



<? if ( $tipo_competencia == "controle" ) { ?>

<? /* soma janeiro 	*/ ?>          
<TH align=middle widht="10%" ><P class=bordas>
<? if ($f_media_jan == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select size="1" <?echo $botao;?> name="f_media_jan">
<?
  $query = "SELECT DISTINCT media_jan FROM avaliacao_desempenho ORDER BY 'media_jan'";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect> TODOS </option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->media_jan==$f_media_jan)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->media_jan' $sSelect> $sRow->media_jan</option>");   }  ?>
</select>
</P></TH>

<? /* soma fevereiro 	*/ ?>          
<TH align=middle widht="10%" ><P class=bordas>
<? if ($f_media_fev == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select size="1" <?echo $botao;?> name="f_media_fev">
<?
  $query = "SELECT DISTINCT media_fev FROM avaliacao_desempenho ORDER BY 'media_fev'";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect> TODOS </option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->media_fev==$f_media_fev)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->media_fev' $sSelect> $sRow->media_fev</option>");   }  ?>
</select>
</P></TH>

<? /* soma marco 	*/ ?>          
<TH align=middle widht="10%" ><P class=bordas>
<? if ($f_media_mar == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select size="1" <?echo $botao;?> name="f_media_mar">
<?
  $query = "SELECT DISTINCT media_mar FROM avaliacao_desempenho ORDER BY 'media_mar'";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect> TODOS </option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->media_mar==$f_media_mar)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->media_mar' $sSelect> $sRow->media_mar</option>");   }  ?>
</select>
</P></TH>

<? /* soma abril 	*/ ?>          
<TH align=middle widht="10%" ><P class=bordas>
<? if ($f_media_abr == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select size="1" <?echo $botao;?> name="f_media_abr">
<?
  $query = "SELECT DISTINCT media_abr FROM avaliacao_desempenho ORDER BY 'media_abr'";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect> TODOS </option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->media_abr==$f_media_abr)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->media_abr' $sSelect> $sRow->media_abr</option>");   }  ?>
</select>
</P></TH>

<? /* soma maio 	*/ ?>          
<TH align=middle widht="10%" ><P class=bordas>
<? if ($f_media_mai == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select size="1" <?echo $botao;?> name="f_media_mai">
<?
  $query = "SELECT DISTINCT media_mai FROM avaliacao_desempenho ORDER BY 'media_mai'";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect> TODOS </option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->media_mai==$f_media_mai)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->media_mai' $sSelect> $sRow->media_mai</option>");   }  ?>
</select>
</P></TH>

<? /* soma junho 	*/ ?>          
<TH align=middle widht="10%" ><P class=bordas>
<? if ($f_media_jun == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select size="1" <?echo $botao;?> name="f_media_jun">
<?
  $query = "SELECT DISTINCT media_jun FROM avaliacao_desempenho ORDER BY 'media_jun'";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect> TODOS </option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->media_jun==$f_media_jun)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->media_jun' $sSelect> $sRow->media_jun</option>");   }  ?>
</select>
</P></TH>




<? /* soma julho 	*/ ?>          
<TH align=middle widht="10%" ><P class=bordas>
<? if ($f_media_jul == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select size="1" <?echo $botao;?> name="f_media_jul">
<?
  $query = "SELECT DISTINCT media_jul FROM avaliacao_desempenho ORDER BY 'media_jul'";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect> TODOS </option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->media_jul==$f_media_jul)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->media_jul' $sSelect> $sRow->media_jul</option>");   }  ?>
</select>
</P></TH>

<? /* soma agosto 	*/ ?>          
<TH align=middle widht="10%" ><P class=bordas>
<? if ($f_media_ago == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select size="1" <?echo $botao;?> name="f_media_ago">
<?
  $query = "SELECT DISTINCT media_ago FROM avaliacao_desempenho ORDER BY 'media_ago'";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect> TODOS </option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->media_ago==$f_media_ago)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->media_ago' $sSelect> $sRow->media_ago</option>");   }  ?>
</select>
</P></TH>

<? /* soma setembro 	*/ ?>          
<TH align=middle widht="10%" ><P class=bordas>
<? if ($f_media_set == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select size="1" <?echo $botao;?> name="f_media_set">
<?
  $query = "SELECT DISTINCT media_set FROM avaliacao_desempenho ORDER BY 'media_set'";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect> TODOS </option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->media_set==$f_media_set)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->media_set' $sSelect> $sRow->media_set</option>");   }  ?>
</select>
</P></TH>

<? /* soma outubro 	*/ ?>          
<TH align=middle widht="10%" ><P class=bordas>
<? if ($f_media_out == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select size="1" <?echo $botao;?> name="f_media_out">
<?
  $query = "SELECT DISTINCT media_out FROM avaliacao_desempenho ORDER BY 'media_out'";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect> TODOS </option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->media_out==$f_media_out)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->media_out' $sSelect> $sRow->media_out</option>");   }  ?>
</select>
</P></TH>

<? /* soma novembro 	*/ ?>          
<TH align=middle widht="10%" ><P class=bordas>
<? if ($f_media_nov == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select size="1" <?echo $botao;?> name="f_media_nov">
<?
  $query = "SELECT DISTINCT media_nov FROM avaliacao_desempenho ORDER BY 'media_nov'";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect> TODOS </option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->media_nov==$f_media_nov)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->media_nov' $sSelect> $sRow->media_nov</option>");   }  ?>
</select>
</P></TH>

<? /* soma dezembro 	*/ ?>          
<TH align=middle widht="10%" ><P class=bordas>
<? if ($f_media_dez == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select size="1" <?echo $botao;?> name="f_media_dez">
<?
  $query = "SELECT DISTINCT media_dez FROM avaliacao_desempenho ORDER BY 'media_dez'";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect> TODOS </option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->media_dez==$f_media_dez)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->media_dez' $sSelect> $sRow->media_dez</option>");   }  ?>
</select>
</P></TH>

<?  /* 	media 1 semestre  */  ?>           
<TH align=middle widht="15%" ><P class=bordas>
<? if ($f_pri_semestre == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select size="1" <?echo $botao;?> name="f_pri_semestre">
<?
  $query = "SELECT DISTINCT pri_semestre FROM avaliacao_desempenho ORDER BY 'pri_semestre'";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect> TODOS </option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->pri_semestre==$f_pri_semestre)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->pri_semestre' $sSelect> $sRow->pri_semestre</option>");   }  ?>
</select>
</P></TH>


<?  /* 	media 2 semestre  */  ?>           
<TH align=middle widht="15%" ><P class=bordas>
<? if ($f_seg_semestre == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select size="1" <?echo $botao;?> name="f_seg_semestre">
<?
  $query = "SELECT DISTINCT seg_semestre FROM avaliacao_desempenho ORDER BY 'seg_semestre'";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect> TODOS </option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->seg_semestre==$f_seg_semestre)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->seg_semestre' $sSelect> $sRow->seg_semestre</option>");   }  ?>
</select>
</P></TH>




<?  /* 	media anual  */  ?>           
<TH align=middle widht="15%" ><P class=bordas>
<? if ($f_media_anual == "") {$botao = "";} else {$botao = "class=select_filtrado";} ?>
<select size="1" <?echo $botao;?> name="f_media_anual">
<?
  $query = "SELECT DISTINCT media_anual FROM avaliacao_desempenho ORDER BY 'media_anual'";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect> TODOS </option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->media_anual==$f_media_anual)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->media_anual' $sSelect> $sRow->media_anual</option>");   }  ?>
</select>
</P></TH>

<? } ?>
				  
			</TR>  

<? /* --------------------  FIM DOS BOTOES SELECAO  -----------------------------  */  ?>



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
