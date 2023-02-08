<? include "valida_sessao.php" ; include"config_pcp.php"; ?>
<html>
<head>
<title> Alterar Dados PCP </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" SRC="funcoes/geral.js"></script>
<script language="JavaScript" SRC="funcoes/overlib.js"></script>
<script language="JavaScript" SRC="funcoes/moeda.js"></script>
<script language="JavaScript" SRC="funcoes/abrir_fechar.js"></script>
</head>
<body>


<form action="" method="post" name="pcp">

<?

/*	------------	CHECK AUTORIZAÇÃO DE ALTERAÇÃO POR CAMPO ------------	*/

$sql = "SELECT * FROM usuarios WHERE username='$nome_usuario'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
while ($linha=mysql_fetch_array($resultado)) {
	
$lib_inserir = $linha["lib_inserir"]; 
$lib_excluir = $linha["lib_excluir"];
$lib_consulta = $linha["lib_consulta"];
$lib_consulta_os = $linha["lib_consulta_os"]; 

/* SETOR VENDAS */
$lib_vendas = $linha["lib_vendas"]; 

/* SETOR PCP */
$lib_pcp = $linha["lib_pcp"]; 

/* SETOR PCP PRODUCAO */
$lib_pcp_producao = $linha["lib_pcp_producao"]; 

/* IMPRESSAO */
$lib_imprimir_geral = $linha["lib_imprimir_geral"]; 
$lib_imprimir_geral_sp = $linha["lib_imprimir_geral_sp"];
$lib_imprimir_diaria_dia = $linha["lib_imprimir_diaria_dia"]; 

$lib_data_emissao = $linha["lib_data_emissao"]; 

$lib_num_os = $linha["lib_num_os"]; 
$lib_item = $linha["lib_item"]; 
$lib_num_proposta = $linha["lib_num_proposta"]; 
$lib_nome_cliente = $linha["lib_nome_cliente"]; 
$lib_oc_obra = $linha["lib_oc_obra"]; 
$lib_mercado = $linha["lib_mercado"]; 
$lib_estado = $linha["lib_estado"]; 
$lib_data_entrega = $linha["lib_data_entrega"]; 

$lib_local_venda = $linha["lib_local_venda"]; 

$lib_fornecimento_motor = $linha["lib_fornecimento_motor"];
$lib_data_motor_recebido = $linha["lib_data_motor_recebido"]; 

$lib_descr_vent = $linha["lib_descr_vent"]; 
$lib_modelo = $linha["lib_modelo"]; 
$lib_tamanho = $linha["lib_tamanho"]; 
$lib_arranjo = $linha["lib_arranjo"]; 
$lib_classe = $linha["lib_classe"]; 
$lib_rotacao = $linha["lib_rotacao"]; 
$lib_gab = $linha["lib_gab"]; 
$lib_pintura = $linha["lib_pintura"]; 
$lib_construcao = $linha["lib_construcao"]; 

$lib_qt = $linha["lib_qt"]; 
$lib_valor_uni = $linha["lib_valor_uni"]; 
$lib_valor_total = $linha["lib_valor_total"]; 
$lib_valor_total_os = $linha["lib_valor_total_os"]; 

$lib_obs = $linha["lib_obs"]; 

$lib_reprogramacao = $linha["lib_reprogramacao"]; 

$lib_baixa = $linha["lib_baixa"]; $lib_baixa_tipo = $linha["lib_baixa_tipo"]; 
$lib_data_baixa = $linha["lib_data_baixa"]; 

$lib_data_prog_diaria = $linha["lib_data_prog_diaria"]; 


/* SETOR PROJETOS */
$lib_proj = $linha["lib_proj"];  

$lib_pos_motor = $linha["lib_pos_motor"];
$lib_pot_motor_cv = $linha["lib_pot_motor_cv"];
$lib_pot_motor_polos = $linha["lib_pot_motor_polos"];
$lib_tensao_motor = $linha["lib_tensao_motor"];
$lib_vazao = $linha["lib_vazao"];
$lib_rotacao_rpm = $linha["lib_rotacao_rpm"];
$lib_p_estatica_op = $linha["lib_p_estatica_op"];
$lib_int_lub = $linha["lib_int_lub"];
$lib_tag = $linha["lib_tag"];

$lib_data_book = $linha["lib_data_book"];
$lib_certif_balanc = $linha["lib_certif_balanc"];
$lib_certif_materiais = $linha["lib_certif_materiais"];
$lib_desenho_certif = $linha["lib_desenho_certif"];
/* SETOR PROJETOS */  

}

/*	------------	CHECK AUTORIZAÇÃO DE ALTERAÇÃO POR CAMPO ------------	*/



/*-----------	SETOR PROJETOS	-----------*/

/*		DATA PROGRAMADA DA OS		*/
if ($lib_proj == "alt") {

/*		STATUS	e DT STATUS	*/
 for ($i = 1; $i <= $quant_os; $i++) { 

 // -----------------------------    DT. HOJE	----------------------------------
	$dia_emissao = date('d');  $mes_emissao = date('n');  $ano_emissao = date('Y'); 
	if(strlen($dia_emissao) == 1){$dia_emissao = "0".$$dia_emissao;}; 
	if(strlen($mes_emissao) == 1){$mes_emissao = "0".$mes_emissao;}; 	
 // -----------------------------    DT. HOJE	----------------------------------
 	
 $id_novo = $id[$i] ;	
 $proj_os_dt_entrada_velho[$i] ; // DT. STATUS ENTRADA ANTIGO
 $proj_os_dt_saida_velho[$i] ; // DT. STATUS SAISA ANTIGO
 
 $proj_os_status_velho[$i] ;  // STATUS ANTIGO
 $proj_os_status_novo_db = $proj_os_status_novo[$i] ;  // STATUS NOVO
 
 $data_book_novo_db = $data_book_novo[$i] ;  // data book novo
 $certif_balanc_novo_db = $certif_balanc_novo[$i] ;  // certif_balanc novo
 $certif_materiais_novo_db = $certif_materiais_novo[$i] ;  // certif materiais novo
 $desenho_certif_novo_db = $desenho_certif_novo[$i] ;  // desenho certif novo
 
 
 
 if ( $proj_os_status_novo[$i] == "P" AND $proj_os_status_velho[$i] <> $proj_os_status_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS ENTRADA  SERÁ IGUAL DT. HOJE 	
	$proj_os_dt_entrada_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$proj_os_dt_entrada_novo_db = $proj_os_dt_entrada_velho[$i]; 
	$dia_proj_os_dt_entrada_novo_db = substr($proj_os_dt_entrada_novo_db, -10,2); 
    $mes_proj_os_dt_entrada_novo_db = substr($proj_os_dt_entrada_novo_db, -7,2);
    $ano_proj_os_dt_entrada_novo_db = substr($proj_os_dt_entrada_novo_db, -4);
 	if ($dia_proj_os_dt_entrada_novo_db == "" AND $mes_proj_os_dt_entrada_novo_db == "" AND $ano_proj_os_dt_entrada_novo_db == "") 
	{$proj_os_dt_entrada_novo_db = ($ano_proj_os_dt_entrada_novo_db."".$mes_proj_os_dt_entrada_novo_db."".$dia_proj_os_dt_entrada_novo_db); } 
else 
	{$proj_os_dt_entrada_novo_db = ($ano_proj_os_dt_entrada_novo_db."/".$mes_proj_os_dt_entrada_novo_db."/".$dia_proj_os_dt_entrada_novo_db); }
	}
	

 if ( $proj_os_status_novo[$i] == "E" AND $proj_os_status_velho[$i] <> $proj_os_status_novo[$i] ) 
 	{ // SE FOI ALTERADO O STATUS, A DT. STASTUS SAIDA SERÁ IGUAL DT. HOJE 	
	$proj_os_dt_saida_novo_db = ($ano_emissao."/".$mes_emissao."/".$dia_emissao); 
	} 
 else 
	{ // SE NÃO FOI ALTERADO O STATUS, A DT. STASTUS SERÁ IGUAL DT. STATUS ANTIGO
	$proj_os_dt_saida_novo_db = $proj_os_dt_saida_velho[$i]; 
	$dia_proj_os_dt_saida_novo_db = substr($proj_os_dt_saida_novo_db, -10,2); 
    $mes_proj_os_dt_saida_novo_db = substr($proj_os_dt_saida_novo_db, -7,2);
    $ano_proj_os_dt_saida_novo_db = substr($proj_os_dt_saida_novo_db, -4);
 	if ($dia_proj_os_dt_saida_novo_db == "" AND $mes_proj_os_dt_saida_novo_db == "" AND $ano_proj_os_dt_saida_novo_db == "") 
	{$proj_os_dt_saida_novo_db = ($ano_proj_os_dt_saida_novo_db."".$mes_proj_os_dt_saida_novo_db."".$dia_proj_os_dt_saida_novo_db); } 
else 
	{$proj_os_dt_saida_novo_db = ($ano_proj_os_dt_saida_novo_db."/".$mes_proj_os_dt_saida_novo_db."/".$dia_proj_os_dt_saida_novo_db); }
	}
 	 
 $sql = "UPDATE pcp SET data_emissao_alt=NOW(), proj_os_status='$proj_os_status_novo_db', data_book='$data_book_novo_db', certif_balanc='$certif_balanc_novo_db', certif_materiais='$certif_materiais_novo_db', desenho_certif='$desenho_certif_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar proj_os_status_novo!!!"); 
 
 $sql = "UPDATE pcp SET data_emissao_alt=NOW(), proj_os_dt_entrada='$proj_os_dt_entrada_novo_db', data_book='$data_book_novo_db', certif_balanc='$certif_balanc_novo_db', certif_materiais='$certif_materiais_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar proj_os_status_novo!!!"); 
  
 $sql = "UPDATE pcp SET data_emissao_alt=NOW(), proj_os_dt_saida='$proj_os_dt_saida_novo_db', data_book='$data_book_novo_db', certif_balanc='$certif_balanc_novo_db', certif_materiais='$certif_materiais_novo_db', usuario_alt='$usuario_alt' WHERE id='$id_novo'"; $resultado = mysql_query($sql) or die ("Não foi possível Alterar proj_os_status_novo!!!"); 
 
 
 }
}
/*-----------	SETOR PROJETOS	-----------*/

?>

<table class=sem_borda width="750" align="center">
<td>

		<table class=sem_borda width=30% align="center">
	<tr>
<td class=titulo height="25" align="center"> Alterada com Sucesso ! </td>
	</tr>
		</table>

<br>

	<? /* -------------	CONFIGURAÇÃO PARA BUSCAR OS NUMEROS DA O.S	------------------- */ ?>

			<table class=sem_borda width=75% align="center">
		<tr>

<?
/* LIBERAR USUARIO PARA VER TUDO OU SOMENTE O Q ESTA SENDO PRODUZIDO */
if ( $lib_baixa_tipo == "alt" OR $lib_baixa_tipo == "todos" ) 
{ $lib_baixa_tipo_busca = ""; $lib_baixa_tipo_busca_dados = ""; $lib_baixa_tipo_texto = "Mostrar todas Baixas."; } 
else 
{ $lib_baixa_tipo_busca = "WHERE baixa='P'"; $lib_baixa_tipo_busca_dados = "AND baixa='P'"; $lib_baixa_tipo_texto = "Mostrar somente o que está sendo Produzido."; }
/* LIBERAR USUARIO PARA VER TUDO OU SOMENTE O Q ESTA SENDO PRODUZIDO */
?>


<td class=right> Nova Busca
<select name="tipo_busca" OnChange="Atualizar_Dados_PCP_Altera();">
<option value='' <? echo ($tipo_busca==''?"SELECTED":""); ?> >  </option>
<option value='num_os' <? echo ($tipo_busca=='num_os'?"SELECTED":""); ?> > Num_OS </option>
<option value='nome_cliente' <? echo ($tipo_busca=='nome_cliente'?"SELECTED":""); ?> > Nome Cliente </option>
<option value='num_proposta' <? echo ($tipo_busca=='num_proposta'?"SELECTED":""); ?> > Num. Prop. </option>
<option value='oc_obra' <? echo ($tipo_busca=='oc_obra'?"SELECTED":""); ?> > OC_Obra </option>
<option value='data_entrega' <? echo ($tipo_busca=='data_entrega'?"SELECTED":""); ?> > Dt. Entrega </option>
<option value='baixa' <? echo ($tipo_busca=='baixa'?"SELECTED":""); ?> > Baixa </option>
<option value='data_baixa' <? echo ($tipo_busca=='data_baixa'?"SELECTED":""); ?> > Dt. Baixa </option>
<option value='local_venda' <? echo ($tipo_busca=='local_venda'?"SELECTED":""); ?> > Local Venda </option>
<option value='descr_vent' <? echo ($tipo_busca=='descr_vent'?"SELECTED":""); ?> > Descr. Vent. </option>
<option value='mercado' <? echo ($tipo_busca=='mercado'?"SELECTED":""); ?> > Mercado </option>
<option value='modelo' <? echo ($tipo_busca=='modelo'?"SELECTED":""); ?> > Modelo </option>
<option value='tamanho' <? echo ($tipo_busca=='tamanho'?"SELECTED":""); ?> > Tamanho </option>
<option value='arranjo' <? echo ($tipo_busca=='arranjo'?"SELECTED":""); ?> > Arranjo </option>
<option value='classe' <? echo ($tipo_busca=='classe'?"SELECTED":""); ?> > Classe </option>
<option value='rotacao' <? echo ($tipo_busca=='rotacao'?"SELECTED":""); ?> > Rotação </option>
<option value='gab' <? echo ($tipo_busca=='gab'?"SELECTED":""); ?> > Gab. </option>
<option value='qt' <? echo ($tipo_busca=='qt'?"SELECTED":""); ?> > Qtde </option>
<option value='fornecimento_motor' <? echo ($tipo_busca=='fornecimento_motor'?"SELECTED":""); ?> > Forn. Motor </option>
</select>
</td>

<? /* CONFIGURAÇÃO PARA BUSCAR CAMPO AUTOMÁTICO */
$busca_valor=mysql_query("select distinct $tipo_busca from pcp $lib_baixa_tipo_busca order by $tipo_busca");
$total_valor=mysql_num_rows($busca_valor);
$count=$total_valor-1;
for($i=0;$i<$total_valor;$i++) {
	$nome_valor=mysql_result($busca_valor,$i,$tipo_busca);
	$palavras_valor.="'$nome_valor'";
if($i<$count) { $palavras_valor.=","; }   }
?>

<? /* DADOS DA BUSCA */ ?>
<td class=left>
<input class=left name=valor maxLength=35 size=36 value="<?echo $valor?>" onKeyUp="checkList(this,arvore_valor)"; id="textbox2" > 

<? /* BOTÃO DE BUSCAR */ ?>
<input class="botao1" name="novabusca" type="button" value="Nova Buscar" 
Onclick="Atualizar_Dados_PCP_Altera();"> 
</td>


		</tr>
			</table>

<? /* -------------	CONFIGURAÇÃO PARA BUSCAR OS NUMEROS DA O.S	------------------- */ ?>

</td>
</table>
</body>
</html>

<script>
var arvorenum_os = new Array(<?= $palavrasnum_os ?>);
var arvore_valor = new Array(<?= $palavras_valor ?>);
document.write('<style type="text/css">'+
	  '#listHolder{position:absolute;border:0;}'+
	  '.list{font-family:verdana;font-size:10;color:#000000;background:;}'+
	 '<\/style>')
	 
function SaltaCampo(campo,prox,teclapres){
    var tecla = teclapres.keyCode ? teclapres.keyCode : teclapres.which ? teclapres.which : teclapres.charCode;
    if (tecla == 13){
  document.pcp[prox].select(); //se não quiser o foco, desabilite!
  document.pcp[prox].focus();
    }
}
</script>