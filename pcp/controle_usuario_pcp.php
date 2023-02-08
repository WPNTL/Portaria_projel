<? include "config_pcp.php";
$b = date('d'); $c = date('n'); $d = date('Y'); if(strlen($b) == 1){$b = "0".$b;};
if(strlen($c) == 1){$c = "0".$c;}; $datafinal = $b."/".$c."/".$d; $dataperiodo = $c."/".$d; ?>

<html>
<head>
<title> Controle de Usuário </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" src="funcoes/geral.js"></script>
<script language="JavaScript" SRC="funcoes/overlib.js"></script>
<script language="JavaScript" SRC="funcoes/moeda.js"></script>
<script language="JavaScript" SRC="funcoes/abrir_fechar.js"></script>
</head>
<body>


<div id="overDiv" style="position:absolute; visibility:hide; z-index:1;; width: 160px; height: 19px"></div>


	<form action="" method="post" name="pcp">



<? /* ------------------------------------- INICIO SELEÇÃO DE USUARIO ---------------------------------------- */ ?>              
<select size="1" name="sel_nome_usuario" onChange="Atualizar_Controle_Usuario();">
<?
$query = "select distinct username from usuarios order by username";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->username==$sel_nome_usuario)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->username' $sSelect> $sRow->username</option>");   }  ?>
</select>

<?
$sql = "SELECT * FROM usuarios WHERE username='$sel_nome_usuario'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
while ($linha=mysql_fetch_array($resultado)) {
$lib_busca_os = $linha["lib_busca_os"]; 
$lib_inserir = $linha["lib_inserir"]; 
$lib_excluir = $linha["lib_excluir"]; 
$lib_alterar_pcp = $linha["lib_alterar_pcp"]; 
$lib_alterar_vendas = $linha["lib_alterar_vendas"]; 
$lib_alterar_pcp_producao = $linha["lib_alterar_pcp_producao"];
$lib_imprimir_geral = $linha["lib_imprimir_geral"]; 
$lib_imprimir_geral_sp = $linha["lib_imprimir_geral_sp"];
$lib_imprimir_diaria_dia = $linha["lib_imprimir_diaria_dia"];

$lib_data_emissao = $linha["lib_data_emissao"]; $lib_num_os = $linha["lib_num_os"]; $lib_num_proposta = $linha["lib_num_proposta"]; $lib_nome_cliente = $linha["lib_nome_cliente"]; $lib_oc_obra = $linha["lib_oc_obra"]; $lib_mercado = $linha["lib_mercado"]; $lib_estado = $linha["lib_estado"];
$lib_data_entrega = $linha["lib_data_entrega"]; 

$lib_local_venda = $linha["lib_local_venda"]; $lib_fornecimento_motor = $dados["lib_fornecimento_motor"]; 

$lib_descr_vent = $linha["lib_descr_vent"]; $lib_modelo = $linha["lib_modelo"]; $lib_tamanho = $linha["lib_tamanho"]; $lib_arranjo = $linha["lib_arranjo"]; 
$lib_classe = $linha["lib_classe"]; $lib_rotacao = $linha["lib_rotacao"]; $lib_gab = $linha["lib_gab"]; $lib_pintura = $linha["lib_pintura"]; 
$lib_construcao = $linha["lib_construcao"]; $lib_qt = $linha["lib_qt"]; $lib_valor_uni = $linha["lib_valor_uni"]; $lib_valor_total = $linha["lib_valor_total"]; 
$lib_obs = $linha["lib_obs"]; 

$lib_data_motor_recebido = $linha["lib_data_motor_recebido"]; $lib_reprogramacao = $linha["lib_reprogramacao"]; 
$lib_baixa = $linha["lib_baixa"]; $lib_data_baixa = $linha["lib_data_baixa"]; $lib_data_prog_diaria = $linha["lib_data_prog_diaria"]; 

$lib_data_emissao_campo = $linha["lib_data_emissao_campo"]; 
$lib_num_os_campo = $linha["lib_num_os_campo"]; 
$lib_item_campo = $linha["lib_item_campo"]; 
$lib_num_proposta_campo = $linha["lib_num_proposta_campo"]; 
$lib_nome_cliente_campo = $linha["lib_nome_cliente_campo"]; 
$lib_oc_obra_campo = $linha["lib_oc_obra_campo"]; 
$lib_mercado_campo = $linha["lib_mercado_campo"]; 
$lib_estado_campo = $linha["lib_estado_campo"]; 
$lib_data_entrega_campo = $linha["lib_data_entrega_campo"]; 
$lib_local_venda_campo = $linha["lib_local_venda_campo"]; 

$lib_fornecimento_motor_campo = $linha["lib_fornecimento_motor_campo"]; 

$lib_descr_vent_campo = $linha["lib_descr_vent_campo"]; 
$lib_modelo_campo = $linha["lib_modelo_campo"]; 
$lib_tamanho_campo = $linha["lib_tamanho_campo"]; 
$lib_arranjo_campo = $linha["lib_arranjo_campo"]; 
$lib_classe_campo = $linha["lib_classe_campo"]; 
$lib_rotacao_campo = $linha["lib_rotacao_campo"]; 
$lib_gab_campo = $linha["lib_gab_campo"]; 
$lib_pintura_campo = $linha["lib_pintura_campo"]; 
$lib_construcao_campo = $linha["lib_construcao_campo"]; 

$lib_qt_campo = $linha["lib_qt_campo"]; 
$lib_valor_uni_campo = $linha["lib_valor_uni_campo"]; 
$lib_valor_total_campo = $linha["lib_valor_total_campo"]; 

$lib_obs_campo = $linha["lib_obs_campo"]; 
$lib_data_motor_recebido_campo = $linha["lib_data_motor_recebido_campo"]; 
$lib_reprogramacao_campo = $linha["lib_reprogramacao_campo"]; 
$lib_baixa_campo = $linha["lib_baixa_campo"]; 
$lib_data_baixa_campo = $linha["lib_data_baixa_campo"]; 
$lib_data_prog_diaria_campo = $linha["lib_data_prog_diaria_campo"]; 
}

?>
<? /* ------------------------------------- FIM SELEÇÃO DE USUARIO ---------------------------------------- */ ?>



<FIELDSET>
<LEGEND> Menu do PCP </LEGEND>

<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
  <TR>
  
    <TD>
    
      <TABLE class=legenda cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD width="1%">&nbsp;</TD>
          <TD vAlign=top width="48%">
          
            <TABLE height=1 cellSpacing=1 width="100%" border=0>
              <TBODY>
 

<? /* ------------------------------------- LIBERACAO DOS BOTOES ---------------------------------------- */ ?>

		<TR class=linha_cabecalho>
		
<TH align=middle widht="8%"><P class=bordas><? /* NOMES DOS CAMPOS */ ?>  </P></TH>		
<TH align=middle widht="8%"><P class=bordas><? /* LIB_BUSCAR POR OS */ ?> Buscar_OS </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* LIB_INSERIR */ ?> Inserir </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* LIB_EXCLUIR */ ?> Excluir </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* LIB_ALTERAR_PCP */ ?> Alterar_Pcp </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* LIB_ALTERAR_PRODUCAO */ ?> Alterar_Pcp_Producao </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* LIB_ALTERAR_VENDAS */ ?> Alterar_Vendas </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* LIB_IMPRIMIR_GERAL */ ?> Imprimir_Geral </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* LIB_IMPRIMIR_GERAL_SP */ ?> Imprimir_Geral_SP </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* LIB_IMPRIMIR_DIARIA_DIA */ ?> Imprimir_Diaria_Dia </P></TH>
           			  
</TR>

		<TR class=linha_cabecalho1>
              
<TH align=middle widht="8%"><P class=bordas><? /* LIBERADO */ ?> LIBERADO </P></TH>

<TH align=middle widht="15%"><P class=bordas><?  /* LIB_BUSCAR POR OS */  ?>
<select size="1" name="f_lib_busca_os" style='width:50px'>
<?
  $query = "select distinct lib_busca_os from usuarios order by lib_busca_os";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_busca_os==$lib_busca_os)   { $sSelect = "SELECTED"; }  else  { $sSelect = "";  }  
  print("<option value='$sRow->lib_busca_os' $sSelect> $sRow->lib_busca_os</option>");   }  
?>
</select>
</P></TH>
<TH align=middle widht="15%"><P class=bordas><?  /* LIB_INSERIR */  ?>
<select size="1" name="f_lib_inserir" style='width:50px'>
<?
  $query = "select distinct lib_inserir from usuarios order by lib_inserir";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_inserir==$lib_inserir)   { $sSelect = "SELECTED"; }  else  { $sSelect = "";  }  
  print("<option value='$sRow->lib_inserir' $sSelect> $sRow->lib_inserir</option>");   }  
?>
</select>
</P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* LIB_EXCLUIR */ ?> 
<select size="1" name="f_lib_excluir" style='width:50px'>
<?
  $query = "select distinct lib_excluir from usuarios order by lib_excluir";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_excluir==$lib_excluir)   { $sSelect = "SELECTED"; }  else  { $sSelect = "";  }  
  print("<option value='$sRow->lib_excluir' $sSelect> $sRow->lib_excluir</option>");   }  
?>
</select>
</P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* LIB_ALTERAR_PCP */ ?> 
<select size="1" name="f_lib_alterar_pcp" style='width:50px'>
<?
  $query = "select distinct lib_alterar_pcp from usuarios order by lib_alterar_pcp";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_alterar_pcp==$lib_alterar_pcp)   { $sSelect = "SELECTED"; }  else  { $sSelect = "";  }  
  print("<option value='$sRow->lib_alterar_pcp' $sSelect> $sRow->lib_alterar_pcp</option>");   }  
?>
</select>
</P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* LIB_ALTERAR_PCP_PRODUCAO */ ?> 
<select size="1" name="f_lib_alterar_pcp_producao" style='width:50px'>
<?
  $query = "select distinct lib_alterar_pcp_producao from usuarios order by lib_alterar_pcp_producao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_alterar_pcp_producao==$lib_alterar_pcp_producao)   { $sSelect = "SELECTED"; }  else  { $sSelect = "";  }  
  print("<option value='$sRow->lib_alterar_pcp_producao' $sSelect> $sRow->lib_alterar_pcp_producao</option>");   }  
?>
</select>
</P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* LIB_ALTERAR_VENDAS */ ?> 
<select size="1" name="f_lib_alterar_vendas" style='width:50px'>
<?
  $query = "select distinct lib_alterar_vendas from usuarios order by lib_alterar_vendas";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_alterar_vendas==$lib_alterar_vendas)   { $sSelect = "SELECTED"; }  else  { $sSelect = "";  }  
  print("<option value='$sRow->lib_alterar_vendas' $sSelect> $sRow->lib_alterar_vendas</option>");   }  
?>
</select>
</P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* LIB_IMPRIMIR_GERAL */ ?> 
<select size="1" name="f_lib_imprimir_geral" style='width:50px'>
<?
  $query = "select distinct lib_imprimir_geral from usuarios order by lib_imprimir_geral";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_imprimir_geral==$lib_imprimir_geral)   { $sSelect = "SELECTED"; }  else  { $sSelect = "";  }  
  print("<option value='$sRow->lib_imprimir_geral' $sSelect> $sRow->lib_imprimir_geral</option>");   }  
?>
</select>
</P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* LIB_IMPRIMIR_GERAL_SP */ ?> 
<select size="1" name="f_lib_imprimir_geral_sp" style='width:50px'>
<?
  $query = "select distinct lib_imprimir_geral_sp from usuarios order by lib_imprimir_geral_sp";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_imprimir_geral_sp==$lib_imprimir_geral_sp)   { $sSelect = "SELECTED"; }  else  { $sSelect = "";  }  
  print("<option value='$sRow->lib_imprimir_geral_sp' $sSelect> $sRow->lib_imprimir_geral_sp</option>");   }  
?>
</select>
</P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* LIB_IMPRIMIR_DIARIA_DIA */ ?> 
<select size="1" name="f_lib_imprimir_diaria_dia" style='width:50px'>
<?
  $query = "select distinct lib_imprimir_diaria_dia from usuarios order by lib_imprimir_diaria_dia";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_imprimir_diaria_dia==$lib_imprimir_diaria_dia)   { $sSelect = "SELECTED"; }  else  { $sSelect = "";  }  
  print("<option value='$sRow->lib_imprimir_diaria_dia' $sSelect> $sRow->lib_imprimir_diaria_dia</option>");   }  
?>
</select>
</P></TH>



</TR> 

</FIELDSET></TBODY></TABLE>
</TD>				  
          <TD width="2%">&nbsp;</TD>
          <TD vAlign=top width="48%">
          
</TD>				  
          <TD width="1%">&nbsp;</TD>
          
</TR></TBODY></TABLE>		  
      <DIV class=espaco>&nbsp;</DIV>	  
</TR></TBODY></TABLE>
</FIELDSET>
	  
<? /* ------------------------------------- LIBERACAO DOS BOTOES ---------------------------------------- */ ?>


<? /* ------------------------------------- MOSTRAR COLUNAS ---------------------------------------- */ ?>


<FIELDSET>
<LEGEND> Menu do PCP </LEGEND>

<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
  <TR>
  
    <TD>
    
      <TABLE class=legenda cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD width="1%">&nbsp;</TD>
          <TD vAlign=top width="48%">
          
            <TABLE height=1 cellSpacing=1 width="100%" border=0>
              <TBODY>
 

		<TR class=linha_cabecalho>
		
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR COLUNAS */ ?>  </P></TH>           
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR DATA EMISSÃO */ ?> Dt. Emissão </P></TH>           
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR NUM_OS */ ?> N° O.S </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR NUM_PROPOSTA */ ?> N° Proposta </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR NOME CLIENTE */ ?> Nome Cliente </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR OC / OBRA */ ?> OC / Obra </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR MERCADO */ ?> Merc. </P></TH>                   
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR ESTADO */ ?> Estado </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR DATA DA ENTREGA */ ?> Dt. Entrega </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR REPROGRAMACAO */ ?> Reprog. </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR BAIXA */ ?> Baixa </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR DATA PROG. DIÁRIA */ ?> Dt. Prog. Diária </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR LOCAL VENDA */ ?> Local Venda </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR FORNECIMENTO MOTOR */ ?> Forn. Motor </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR DATA MOTOR RECEBIDO */ ?> Dt. Motor Recebido </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR DESCRICAO VENT */ ?> Descr. Vent. </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR QT */ ?> QT </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR MODELO */ ?> Mod. </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR TAMANHO */ ?> Tam. </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR ARRANJO */ ?> Arr. </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR CLASSE */ ?> Cl. </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR ROTACAO */ ?> Rot. </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR GABINETE */ ?> Gab. </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR PINTURA */ ?> Pint. </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR CONSTRUÇÃO */ ?> Constr. </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR VALOR UNITARIO */ ?> Valor Un. </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR VALOR TOTAL O.S */ ?> Sub-Total </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR OBS */ ?> OBS </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR DATA BAIXA */ ?> Data da Baixa </P></TH>
				  
</TR>


		<TR class=linha_cabecalho>
              
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR */ ?> MOSTRAR </P></TH>


<TH align=middle widht="15%"><P class=bordas><?  /* MOSTRAR DATA EMISSÃO */  ?>
<select size="1" name="f_lib_data_emissao1" style='width:70px'>
<?
  $query = "select distinct lib_data_emissao1 from usuarios order by lib_data_emissao1";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_data_emissao1==$lib_data_emissao1)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->lib_data_emissao1' $sSelect> $sRow->lib_data_emissao1</option>");   }  ?>
</select>
</P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR NUM_OS */ ?> 
<select size="1" name="f_lib_num_os1" style='width:70px'>
<?
  $query = "select distinct lib_num_os1 from usuarios order by lib_num_os1";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_num_os1==$lib_num_os1)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->lib_num_os1' $sSelect> $sRow->lib_num_os1</option>");   }  ?>
</select>
</P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR NUM_PROPOSTA */ ?> 
<select size="1" name="f_lib_item1" style='width:70px'>
<?
  $query = "select distinct lib_item1 from usuarios order by lib_item1";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_item1==$lib_item1)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->lib_item1' $sSelect> $sRow->lib_item1</option>");   }  ?>
</select>
 </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR NOME CLIENTE */ ?> 
<select size="1" name="f_lib_num_proposta1" style='width:70px'>
<?
  $query = "select distinct lib_num_proposta1 from usuarios order by lib_num_proposta1";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_num_proposta1==$lib_num_proposta1)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->lib_num_proposta1' $sSelect> $sRow->lib_num_proposta1</option>");   }  ?>
</select>
 </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR OC / OBRA */ ?> 
<select size="1" name="f_lib_nome_cliente1" style='width:70px'>
<?
  $query = "select distinct lib_nome_cliente1 from usuarios order by lib_nome_cliente1";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_nome_cliente1==$lib_nome_cliente1)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->lib_nome_cliente1' $sSelect> $sRow->lib_nome_cliente1</option>");   }  ?>
</select>
 </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR MERCADO */ ?> 
<select size="1" name="f_lib_num_os_campo" style='width:70px'>
<?
  $query = "select distinct lib_data_emissao from usuarios order by lib_data_emissao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_num_os_campo==$lib_num_os_campo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->lib_num_os_campo' $sSelect> $sRow->lib_num_os_campo</option>");   }  ?>
</select>
 </P></TH>                   
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR ESTADO */ ?> 
<select size="1" name="f_lib_num_os_campo" style='width:70px'>
<?
  $query = "select distinct lib_data_emissao from usuarios order by lib_data_emissao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_num_os_campo==$lib_num_os_campo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->lib_num_os_campo' $sSelect> $sRow->lib_num_os_campo</option>");   }  ?>
</select>
</P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR DATA DA ENTREGA */ ?> 
<select size="1" name="f_lib_num_os_campo" style='width:70px'>
<?
  $query = "select distinct lib_data_emissao from usuarios order by lib_data_emissao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_num_os_campo==$lib_num_os_campo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->lib_num_os_campo' $sSelect> $sRow->lib_num_os_campo</option>");   }  ?>
</select>
 </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR REPROGRAMACAO */ ?> 
<select size="1" name="f_lib_num_os_campo" style='width:70px'>
<?
  $query = "select distinct lib_data_emissao from usuarios order by lib_data_emissao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_num_os_campo==$lib_num_os_campo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->lib_num_os_campo' $sSelect> $sRow->lib_num_os_campo</option>");   }  ?>
</select>
 </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR BAIXA */ ?>
<select size="1" name="f_lib_num_os_campo" style='width:70px'>
<?
  $query = "select distinct lib_data_emissao from usuarios order by lib_data_emissao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_num_os_campo==$lib_num_os_campo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->lib_num_os_campo' $sSelect> $sRow->lib_num_os_campo</option>");   }  ?>
</select>
</P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR DATA PROG. DIÁRIA */ ?> 
<select size="1" name="f_lib_num_os_campo" style='width:70px'>
<?
  $query = "select distinct lib_data_emissao from usuarios order by lib_data_emissao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_num_os_campo==$lib_num_os_campo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->lib_num_os_campo' $sSelect> $sRow->lib_num_os_campo</option>");   }  ?>
</select>
 </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR LOCAL VENDA */ ?> 
<select size="1" name="f_lib_num_os_campo" style='width:70px'>
<?
  $query = "select distinct lib_data_emissao from usuarios order by lib_data_emissao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_num_os_campo==$lib_num_os_campo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->lib_num_os_campo' $sSelect> $sRow->lib_num_os_campo</option>");   }  ?>
</select>
 </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR FORNECIMENTO MOTOR */ ?> 
<select size="1" name="f_lib_num_os_campo" style='width:70px'>
<?
  $query = "select distinct lib_data_emissao from usuarios order by lib_data_emissao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_num_os_campo==$lib_num_os_campo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->lib_num_os_campo' $sSelect> $sRow->lib_num_os_campo</option>");   }  ?>
</select>
 </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR DATA MOTOR RECEBIDO */ ?> 
<select size="1" name="f_lib_num_os_campo" style='width:70px'>
<?
  $query = "select distinct lib_data_emissao from usuarios order by lib_data_emissao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_num_os_campo==$lib_num_os_campo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->lib_num_os_campo' $sSelect> $sRow->lib_num_os_campo</option>");   }  ?>
</select>
 </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR DESCRICAO VENT */ ?> 
<select size="1" name="f_lib_num_os_campo" style='width:70px'>
<?
  $query = "select distinct lib_data_emissao from usuarios order by lib_data_emissao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_num_os_campo==$lib_num_os_campo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->lib_num_os_campo' $sSelect> $sRow->lib_num_os_campo</option>");   }  ?>
</select>
 </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR QT */ ?> 
<select size="1" name="f_lib_num_os_campo" style='width:70px'>
<?
  $query = "select distinct lib_data_emissao from usuarios order by lib_data_emissao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_num_os_campo==$lib_num_os_campo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->lib_num_os_campo' $sSelect> $sRow->lib_num_os_campo</option>");   }  ?>
</select>
 </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR MODELO */ ?> 
<select size="1" name="f_lib_num_os_campo" style='width:70px'>
<?
  $query = "select distinct lib_data_emissao from usuarios order by lib_data_emissao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_num_os_campo==$lib_num_os_campo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->lib_num_os_campo' $sSelect> $sRow->lib_num_os_campo</option>");   }  ?>
</select>
 </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR TAMANHO */ ?> 
<select size="1" name="f_lib_num_os_campo" style='width:70px'>
<?
  $query = "select distinct lib_data_emissao from usuarios order by lib_data_emissao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_num_os_campo==$lib_num_os_campo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->lib_num_os_campo' $sSelect> $sRow->lib_num_os_campo</option>");   }  ?>
</select>
 </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR ARRANJO */ ?> 
<select size="1" name="f_lib_num_os_campo" style='width:70px'>
<?
  $query = "select distinct lib_data_emissao from usuarios order by lib_data_emissao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_num_os_campo==$lib_num_os_campo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->lib_num_os_campo' $sSelect> $sRow->lib_num_os_campo</option>");   }  ?>
</select>
 </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR CLASSE */ ?> 
<select size="1" name="f_lib_num_os_campo" style='width:70px'>
<?
  $query = "select distinct lib_data_emissao from usuarios order by lib_data_emissao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_num_os_campo==$lib_num_os_campo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->lib_num_os_campo' $sSelect> $sRow->lib_num_os_campo</option>");   }  ?>
</select>
 </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR ROTACAO */ ?> 
<select size="1" name="f_lib_num_os_campo" style='width:70px'>
<?
  $query = "select distinct lib_data_emissao from usuarios order by lib_data_emissao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_num_os_campo==$lib_num_os_campo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->lib_num_os_campo' $sSelect> $sRow->lib_num_os_campo</option>");   }  ?>
</select>
 </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR GABINETE */ ?> 
<select size="1" name="f_lib_num_os_campo" style='width:70px'>
<?
  $query = "select distinct lib_data_emissao from usuarios order by lib_data_emissao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_num_os_campo==$lib_num_os_campo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->lib_num_os_campo' $sSelect> $sRow->lib_num_os_campo</option>");   }  ?>
</select>
 </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR PINTURA */ ?> 
<select size="1" name="f_lib_num_os_campo" style='width:70px'>
<?
  $query = "select distinct lib_data_emissao from usuarios order by lib_data_emissao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_num_os_campo==$lib_num_os_campo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->lib_num_os_campo' $sSelect> $sRow->lib_num_os_campo</option>");   }  ?>
</select>
 </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR CONSTRUÇÃO */ ?>
<select size="1" name="f_lib_num_os_campo" style='width:70px'>
<?
  $query = "select distinct lib_data_emissao from usuarios order by lib_data_emissao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_num_os_campo==$lib_num_os_campo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->lib_num_os_campo' $sSelect> $sRow->lib_num_os_campo</option>");   }  ?>
</select>
 </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR VALOR UNITARIO */ ?> 
<select size="1" name="f_lib_num_os_campo" style='width:70px'>
<?
  $query = "select distinct lib_data_emissao from usuarios order by lib_data_emissao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_num_os_campo==$lib_num_os_campo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->lib_num_os_campo' $sSelect> $sRow->lib_num_os_campo</option>");   }  ?>
</select>
 </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR VALOR TOTAL O.S */ ?> 
<select size="1" name="f_lib_num_os_campo" style='width:70px'>
<?
  $query = "select distinct lib_data_emissao from usuarios order by lib_data_emissao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_num_os_campo==$lib_num_os_campo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->lib_num_os_campo' $sSelect> $sRow->lib_num_os_campo</option>");   }  ?>
</select>
 </P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR OBS */ ?> 
<select size="1" name="f_lib_num_os_campo" style='width:70px'>
<?
  $query = "select distinct lib_data_emissao from usuarios order by lib_data_emissao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_num_os_campo==$lib_num_os_campo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->lib_num_os_campo' $sSelect> $sRow->lib_num_os_campo</option>");   }  ?>
</select>
</P></TH>
<TH align=middle widht="8%"><P class=bordas><? /* MOSTRAR DATA BAIXA */ ?>
<select size="1" name="f_lib_num_os_campo" style='width:70px'>
<?
  $query = "select distinct lib_data_emissao from usuarios order by lib_data_emissao";
  $result = MYSQL_QUERY($query);
  print("<option value='' $sSelect></option>");
  while ($sRow = mysql_fetch_object($result)) {
  if ($sRow->lib_num_os_campo==$lib_num_os_campo)   {
  $sSelect = "SELECTED";
  }  else  {
  $sSelect = "";
  }  print("<option value='$sRow->lib_num_os_campo' $sSelect> $sRow->lib_num_os_campo</option>");   }  ?>
</select>
 </P></TH>

</TR> 

</FIELDSET></TBODY></TABLE>
</TD>				  
          <TD width="2%">&nbsp;</TD>
          <TD vAlign=top width="48%">          
</TD>				  
          <TD width="1%">&nbsp;</TD>          
</TR></TBODY></TABLE>		  
      <DIV class=espaco>&nbsp;</DIV>	  
</TR></TBODY></TABLE>
</FIELDSET>

<? /* ------------------------------------- MOSTRAR COLUNAS ---------------------------------------- */ ?>

</form>
</body>
</html>
