<? include "valida_sessao.php" ; include "config_pcp.php"; ?>

<html>
<head>
<title> Consulta PCP </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" SRC="funcoes/geral.js"></script>
<script language="JavaScript" SRC="funcoes/overlib.js"></script>
<script language="JavaScript" SRC="funcoes/moeda.js"></script>
<script language="JavaScript" SRC="funcoes/abrir_fechar.js"></script>
<script language="JavaScript" SRC="funcoes/calendario.js"></script>
<script language="JavaScript" SRC="funcoes/letras_maiscula.js"></script>
<script language="JavaScript" SRC="funcoes/mascara_data.js"></script>
</head>
<body class=body>

<script>
<!--
// coloque o tempo em segundos ou minutos
var limit="10:00"

if (document.images){
var parselimit=limit.split(":")
parselimit=parselimit[0]*60+parselimit[1]*1
}
function beginrefresh(){
if (!document.images)
return
if (parselimit==1)
window.location.reload()
else{ 
parselimit-=1
curmin=Math.floor(parselimit/60)
cursec=parselimit%60
if (curmin!=0)
curtime=curmin+" minutos e "+cursec+" segundos para atualizar essa página!"
else
curtime=cursec+" segundos para atualizar essa página!"
window.status=curtime
setTimeout("beginrefresh()",1000)
}
}

window.onload=beginrefresh
//-->
</script>

<div id="overDiv" style="position:absolute; visibility:hide; z-index:1;; width: 160px; height: 19px"></div> 

<? /*  ----------------	BUSCAR DADOS DE LIBERAÇÃO ------------------	*/
$sql = "SELECT * FROM usuarios WHERE username='$nome_usuario'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");
while ($linha=mysql_fetch_array($resultado)) {

$usuario = $linha["username"];

$lib_inserir = $linha["lib_inserir"]; 
$lib_excluir = $linha["lib_excluir"];

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

/* IMPRESSAO DATA PREVISAO */
$lib_imprimir_previsao_dia = $linha["lib_imprimir_previsao_dia"]; 
$lib_imprimir_previsao_geral = $linha["lib_imprimir_previsao_geral"];

/* IMPRESSAO DATA PROG MONTAGEM */
$lib_imprimir_prog_montagem_dia =$linha["lib_imprimir_prog_montagem_dia"];

$lib_data_emissao = $linha["lib_data_emissao"]; 

$lib_num_os = $linha["lib_num_os"]; 
$lib_item = $linha["lib_item"]; 
$lib_num_proposta = $linha["lib_num_proposta"]; 
$lib_nome_cliente = $linha["lib_nome_cliente"]; 
$lib_oc_obra = $linha["lib_oc_obra"]; 
$lib_mercado = $linha["lib_mercado"];
$lib_representante = $linha["lib_representante"]; 
$lib_estado = $linha["lib_estado"]; 
$lib_data_entrega = $linha["lib_data_entrega"]; 
$lib_falta_montagem = $linha["lib_falta_montagem"] ; 

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

$lib_baixa = $linha["lib_baixa"]; 
$lib_data_baixa = $linha["lib_data_baixa"]; 

$lib_data_prog_diaria = $linha["lib_data_prog_diaria"]; 

/* DATA PROG. MONTAGEM */
$lib_dt_prog_montagem = $linha["lib_dt_prog_montagem"];

/* DATA PREVISAO */
$lib_data_previsao = $linha["lib_data_previsao"];

/* NUMERO CONSULTA CLIENTE */
$lib_n_cons_cliente = $linha["lib_n_cons_cliente"];

/* JATEAMENTO / GALV. FOGO */
$lib_jat_g_fogo = $linha["lib_jat_g_fogo"];

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

/* MOTOR - POLIA - CARCAÇA - ROTOR DO MAXSIG */
$lib_materiais = $linha["lib_materiais"];
$lib_mat1 = $linha["lib_mat1"];
$lib_mat2 = $linha["lib_mat2"];
$lib_mat3 = $linha["lib_mat3"];
$lib_outros = $linha["lib_outros"];
}

?>

<form action="" method="post" name="pcp">

<FIELDSET>
<LEGEND> MONTAGEM 
</LEGEND>

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
 
 
<? 
/* 
VER = VER COLUNA E CAMPO E NÃO ALTERA
ALT = VER COLUNA E CAMPO E ALTERA
N_VER = NÃO VE COLUNA E CAMPO E NÃO ALTERA
*/ 
?>            

		<TR class=linha_cabecalho >


<? /* NUM_OS */ ?>             
<? if ( $lib_num_os == "ver" OR $lib_num_os == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_num_os == "" ) { ?> N° O.S 
<? } } ?>
</P></TH>

<? /* DESCRICAO VENT */ ?>

<? if ( $lib_descr_vent == "ver" OR $lib_descr_vent == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2">
<span style="widht:20px;"> <P class=bordas>
<?	if ( $check_descr_vent == "") { ?> Descr. Vent. 
<? } } ?>
</P></TH>

<? /* QT */ ?>
<? if ( $lib_qt == "ver" OR $lib_qt == "alt" ) { ?>
<TH align=middle widht="5%" rowspan="2"><P class=bordas>
<?	if ( $check_qt == "") { ?>  QT 
<? } } ?>
</P></TH>

<? /* MODELO */ ?>
<? if ( $lib_modelo == "ver" OR $lib_modelo == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_modelo == "") { ?>  Mod. 
<? } } ?>
</P></TH>

<? /* TAMANHO */ ?>
<? if ( $lib_tamanho == "ver" OR $lib_tamanho == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_tamanho == "") { ?>  Tam. 
<? } } ?>
</P></TH>

<? /* ARRANJO */ ?>
<? if ( $lib_arranjo == "ver" OR $lib_arranjo == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_arranjo == "") { ?>  Arr. 
<? } } ?>
</P></TH>

<? /* CLASSE */ ?>
<? if ( $lib_classe == "ver" OR $lib_classe == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ($check_classe == "") { ?>  Cl. 
<? } } ?>
</P></TH>

<? /* ROTACAO */ ?>
<? if ( $lib_rotacao == "ver" OR $lib_rotacao == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_rotacao == "" ) { ?> Rot.
<? } } ?>
</P></TH>

<? /* GABINETE */ ?>
<? if ( $lib_gab == "ver" OR $lib_gab == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_gab == "" ) { ?>  Gab.
<? } } ?>
</P></TH>

<? /* PINTURA */ ?>
<? if ( $lib_pintura == "ver" OR $lib_pintura == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_pintura == "") { ?>  Pintura
<? } } ?>
</P></TH>

<? /* CONSTRUÇÃO */ ?>
<? if ( $lib_construcao == "ver" OR $lib_construcao == "alt" ) {?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_construcao == "" ) { ?>  Const.
<? } } ?>
</P></TH>


<? /* Mat1*/ ?>
<? if ( $lib_mat1 == "ver" OR $lib_mat1 == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_mat1 == "" ) { ?>  Mat1
<? } } ?>
</P></TH>

<? /* Mat2*/ ?>
<? if ( $lib_mat2 == "ver" OR $lib_mat2 == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_mat2 == "" ) { ?>  Mat2
<? } } ?>
</P></TH>

<? /* Mat3*/ ?>
<? if ( $lib_mat3 == "ver" OR $lib_mat3 == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_mat3 == "" ) { ?>  Mat3
<? } } ?>
</P></TH>

	<? /* falta_montagem */ ?>             
<? if ( $lib_falta_montagem == "ver" OR $lib_falta_montagem  == "alt" ) { ?>
<TH align=middle widht="10%" rowspan="2"><P class=bordas>
<?	if ( $check_falta_montagem  == "" ) { ?>  Falta  
<? } } ?>
</P></TH>



	</TR>         
<TR class=linha_cabecalho>
	</TR>  
	
	

		<? /* FIM EXIBICAO DE PEÇAS POR SETORES */ ?>    
              

<? /* --------------------  INICIO DA CONSULTA  -----------------------------  */ 
//DATA HOJE
$dia = date('d'); $mes = date('n'); $ano = date('Y'); 
if(strlen($dia) == 1){$dia = "0".$dia;};
if(strlen($mes) == 1){$mes = "0".$mes;}; 
$data_hoje = $ano."/".$mes."/".$dia;
 ?>

<? 
//echo " data book - ".$f_data_book_db;
$quant_os = 0;
//AND dt_prog_montagem='$data_hoje'
$query = "SELECT * FROM pcp WHERE baixa='P'   $f_num_os_db $f_nome_cliente_db $f_data_entrega_mes_db $f_data_entrega_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_construcao_db $f_qt_db $f_obs_db $f_baixa_db $f_data_baixa_mes_db $f_data_baixa_db $baixa_organizar $f_status_almox_db $f_status_corte_db $f_status_balanc_db $f_status_cald1_db  $f_status_cald2_db $f_status_pintura_db $f_status_rotor_ll_db $f_status_rotor_sir_db  $f_status_usinagem_eixo_db $f_status_montagem_db $f_status_usinagem_nuc_cubo_db $f_status_usinagem_pol_mot_db $f_status_usinagem_pol_vent_db $f_status_usinagem_gaxeta_db $f_status_pintura_db $f_status_gabinete_db $f_status_expedicao_db $f_status_funilaria_db ORDER BY '$id'";
$result = MYSQL_QUERY($query); $x=0;
while ($dados = mysql_fetch_array($result)) {

$id = $dados["id"]; 

$data_emissao = $dados["data_emissao"]; 

$num_os = $dados["num_os"]; 
$item = $dados["item"]; 

$descr_vent = $dados["descr_vent"]; 
$modelo = $dados["modelo"]; 
$tamanho = $dados["tamanho"]; 
$arranjo = $dados["arranjo"];
$classe = $dados["classe"]; 
$rotacao = $dados["rotacao"]; 
$gab = $dados["gab"]; 
$pintura = $dados["pintura"]; 
$construcao = $dados["construcao"]; 
$qt = $dados["qt"]; 

$obs = $dados["obs"]; 

$reprogramacao = $dados["reprogramacao"]; 
$baixa = $dados["baixa"]; 
$data_baixa = $dados["data_baixa"]; 

/* DATA PROG MONTAGEM */
$dt_prog_montagem = $dados["dt_prog_montagem"];

/*FALTA MONTAGEM */
$falta_montagem = $dados["falta_montagem"];

/* MATERIAIS */
$mat1 = $dados["mat1"];
$mat2 = $dados["mat2"];
$mat3 = $dados["mat3"];
$outros = $dados["outros"];


/* ----------------------- CONVERTER DATAS	------------------------------------*/

$dia_data_emissao = substr($data_emissao, -2); 
$mes_data_emissao = substr($data_emissao, -5,2);
$ano_data_emissao = substr($data_emissao, -10,4); 
$data_emissao = ($dia_data_emissao."/".$mes_data_emissao."/".$ano_data_emissao); 


/* DATA PROG MONTAGEM */
$dia_dt_prog_montagem = substr($dt_prog_montagem, -2); 
$mes_dt_prog_montagem = substr($dt_prog_montagem, -5,2);
$ano_dt_prog_montagem = substr($dt_prog_montagem, -10,4); 
if ($dia_dt_prog_montagem == "" AND $mes_dt_prog_montagem == "" AND $ano_dt_prog_montagem == "") 
{$dt_prog_montagem = ($dia_dt_prog_montagem."".$mes_dt_prog_montagem."".$ano_dt_prog_montagem);  } 
else {$dt_prog_montagem = ($dia_dt_prog_montagem."/".$mes_dt_prog_montagem."/".$ano_dt_prog_montagem);  }

/* ----------------------- FIM CONVERTER DATAS	------------------------------------*/

?>

			<TR class=linha0 border-style: solid; border-width: 1;  
			onMouseOver="this.style.background='#99CCEA'; drc('','N° O.S.  <?echo$num_os ."/". $item?> '); return true; " onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;">	
	


<?	/* MOSTRAR NUMERO O.S  */   ?>
<? if ( $lib_num_os == "ver" OR $lib_num_os == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_num_os == "" ) { ?>
<span style="width:60px;word-wrap:break-word;"> 
<?echo $num_os."/".$item;?> 
</span>
<? } } ?>
</P></TD>

	
<?	/* MOSTRAR DESCRICÃO DO VENTILADOR  */   ?>
<? if ( $lib_descr_vent == "ver" OR $lib_descr_vent == "alt" ) { ?>
<TD align=middle><P class=bordas>
<?	if ( $check_descr_vent == "" ) { ?>
<span style="width:70px;word-wrap:break-word;"> 
<?echo "$descr_vent";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR QT  */   ?>
<? if ( $lib_qt == "ver" OR $lib_qt == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_qt == "" ) { ?>
<span style="width:20px;word-wrap:break-word;"> 
<?echo "$qt";?> 
</span>
<? } } ?>
</P></TD>
	
<?	/* MOSTRAR MODELO  */   ?>
<? if ( $lib_modelo == "ver" OR $lib_modelo == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_modelo == "" ) { ?>
<span style="width:55px;word-wrap:break-word;">
<?echo "$modelo";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR TAMANHO  */   ?>
<? if ( $lib_tamanho == "ver" OR $lib_tamanho == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_tamanho == "" ) { ?>
<span style="width:55px;word-wrap:break-word;"> 
<?echo "$tamanho";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR ARRANJO  */   ?>
<? if ( $lib_arranjo == "ver" OR $lib_arranjo == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_arranjo == "" ) { ?>
<span style="width:35px;word-wrap:break-word;"> 
<?echo "$arranjo";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR CLASSE  */   ?>
<? if ( $lib_classe == "ver" OR $lib_classe == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_classe == "" ) { ?>
<span style="width:35px;word-wrap:break-word;">
<?echo "$classe";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR ROTAÇÃO  */   ?>
<? if ( $lib_rotacao == "ver" OR $lib_rotacao == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_rotacao == "" ) { ?>
<span style="width:30px;word-wrap:break-word;"> 
<?echo "$rotacao";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR GAB  */   ?>
<? if ( $lib_gab == "ver" OR $lib_gab == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_gab == "" ) { ?>
<span style="width:20px;word-wrap:break-word;"> 
<?echo "$gab";?>
</span>
<? } } ?>
</P></TD>
	
<?	/* MOSTRAR PINTURA  */   ?>
<? if ( $lib_pintura == "ver" OR $lib_pintura == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_pintura == "" ) { ?>
<span style="width:65px;word-wrap:break-word;"> 
<?echo "$pintura";?> 
</span>
<? } } ?>
</P></TD>
	
<?	/* MOSTRAR CONSTRUÇÃO  */   ?>
<? if ( $lib_construcao == "ver" OR $lib_construcao == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_construcao == "" ) { ?>
<span style="width:40px;word-wrap:break-word;"> 
<?echo "$construcao";?> 
</span>
<? } } ?>
</P></TD>


<?	/* MOSTRAR MAT1 */   ?>
<? if ( $lib_mat1 == "ver" OR $lib_mat1 == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_mat1 == "" ) { ?>
<span style="width:30px;word-wrap:break-word;">
<?echo "$mat1";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR MAT2  */   ?>
<? if ( $lib_mat2 == "ver" OR $lib_mat2 == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_mat2 == "" ) { ?>
<span style="width:30px;word-wrap:break-word;">
<?echo "$mat2";?> 
</span>
<? } } ?>
</P></TD>

<?	/* MOSTRAR MAT3  */   ?>
<? if ( $lib_mat3 == "ver" OR $lib_mat3 == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_mat3 == "" ) { ?>
<span style="width:30px;word-wrap:break-word;">
<?echo "$mat3";?> 
</span>
<? } } ?>
</P></TD>


<?	/* MOSTRAR Falta montagem  */   ?>
<? if ( $lib_falta_montagem== "ver" OR $lib_falta_montagem == "alt" ) { ?>
<TD align=middle><P class=bordas> 
<?	if ( $check_falta_montagem == "" ) { ?>
<span style="width:150px;word-wrap:break-word;">
<?echo "$falta_montagem";?> 
</span>
<? } } ?>
</P></TD>

		</TR> 


<?   /* FECHAMENTO DO WHILE */  ?>	
 

		

 
<? 
$valor_total_os = $valor_total_os + $valor_total; 
$quant_os = $quant_os + 1;  
$qt_total = $qt_total + $qt; 
$data_total_dias_os = $data_total_dias_os + $data_total_dias;
$resultado_dias_proj_os = $resultado_dias_proj_os + $resultado_dias_proj;
$porcentagem_total_os = $porcentagem_total_os + $porcentagem_total;


if ($data_hoje_mktime > $data_entrega_mktime) {
	$quant_os_atrasada = $quant_os_atrasada + 1;
}

$reprogramacao_mktime = mktime(0,0,0,$mes_reprogramacao,$dia_reprogramacao,$ano_reprogramacao);

if ($reprogramacao == "") {
if ($data_hoje_mktime > $data_entrega_mktime) {
	$quant_os_reprogramacao = $quant_os_reprogramacao + 1; }
} else { if ($data_hoje_mktime > $reprogramacao_mktime) {
	$quant_os_reprogramacao = $quant_os_reprogramacao + 1;}
}

?>		
<? } ?>	

<? /*------------INFORMAÇÕES DO FINAL DA TABELA DO PCP---------------*/ ?>		
		<TR class=sem_borda>
              
    
<? if ( $lib_num_os == "ver" OR $lib_num_os == "alt" ) { ?>
<TD align=middle><P class=borda>
<?	if ( $check_num_os == "" ) { ?>
<span style="width:65px;word-wrap:break-word;"> O.S </span>
<? 
$dias_atraso_total = $soma_dias_atraso / $quant_os;
$pontualidade = $soma_pont_item * 100/ $quant_os;

//formula atraso e pontualidade indice da qualidade
$dias_atraso_total_qual = $soma_dias_atraso_qual / $quant_os;
$pontualidade_qual = $soma_pont_item_qual * 100/ $quant_os;

//FORMULA ATRASO E PONTUALIDADE DA FABRICA
$dias_atraso_total_fab = $soma_dias_atraso_fab / $quant_os;
$pontualidade_fab = $soma_pont_item_fab * 100/ $quant_os;

//FORMULA MEDIA - DIAS ENGENHARIA / PROJETOS
$data_total_dias_media = ($data_total_dias_os / $quant_os);
$resultado_dias_proj_media = ($resultado_dias_proj_os / $quant_os);
$porcentagem_total_media = ($porcentagem_total_os / $quant_os);
//$pontualidade_fab = $soma_pont_item_fab * 100/ $quant_os;

if ( $lib_num_os == "ver" OR $lib_num_os == "alt" ) {
	if ( $check_num_os == "" ) {
?>
<span style="width:65px;word-wrap:break-word;"> 	
<input class=nedita_center readonly type=hidden name="quant_os" value="<?echo $quant_os; ?>" size="2">  
<?echo $quant_os; ?> 
</span>
<? } } ?>
</P></TD>

<? } } ?>


	<? if ( $lib_descr_vent == "ver" OR $lib_descr_vent == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_descr_vent == "" ) { ?>          
	<? } } ?>

<? if ( $lib_qt == "ver" OR $lib_qt == "alt" ) { ?>
<TD align=middle><P class=borda> 
<?	if ( $check_qt == "" ) {?>
<span style="width:35px;word-wrap:break-word;"> QT <br>
<?echo $qt_total; ?>
</span>
</P></TD>

<? } } ?>

	<? if ( $lib_modelo == "ver" OR $lib_modelo == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_modelo == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_tamanho == "ver" OR $lib_tamanho == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_tamanho == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_arranjo == "ver" OR $lib_arranjo == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_arranjo == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_classe == "ver" OR $lib_classe == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_classe == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_rotacao == "ver" OR $lib_rotacao == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_rotacao == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_gab == "ver" OR $lib_gab == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_gab == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_pintura == "ver" OR $lib_pintura == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_pintura == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_construcao == "ver" OR $lib_construcao == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_construcao == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_mat1 == "ver" OR $lib_mat1 == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_mat1 == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_mat2 == "ver" OR $lib_mat2 == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_mat2 == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_mat3 == "ver" OR $lib_mat3 == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_mat3 == "" ) { ?>          
	<? } } ?>
	
		<? if ( $lib_falta_montagem== "ver" OR $lib_falta_montagem == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_falta_montagem == "" ) { ?>          
	<? } } ?>
	
		</TR>
		
		
		<TR class=sem_borda>
              

	<? if ( $lib_num_os == "ver" OR $lib_num_os == "alt" ) { ?>
	<TD align=middle><P class=borda> 
	<?	if ( $check_num_os == "" ) { ?>
	<span style="width:65px;word-wrap:break-word;"> 

	</span>
	</P></TD>
	<? } } ?>
	
		
	<? if ( $lib_descr_vent == "ver" OR $lib_descr_vent == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_descr_vent == "" ) { ?>          
	<? } } ?>

	<? if ( $lib_qt == "ver" OR $lib_qt == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<? if ( $check_qt == "" ) {?>
	<? } } ?>

	<? if ( $lib_modelo == "ver" OR $lib_modelo == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>	
	<?	if ( $check_modelo == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_tamanho == "ver" OR $lib_tamanho == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_tamanho == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_arranjo == "ver" OR $lib_arranjo == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_arranjo == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_classe == "ver" OR $lib_classe == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_classe == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_rotacao == "ver" OR $lib_rotacao == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_rotacao == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_gab == "ver" OR $lib_gab == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_gab == "" ) { ?>
	<? } } ?>
	
	<? if ( $lib_pintura == "ver" OR $lib_pintura == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_pintura == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_construcao == "ver" OR $lib_construcao == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_construcao == "" ) { ?>          
	<? } } ?>
	
		<? if ( $lib_mat1 == "ver" OR $lib_mat1 == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_mat1 == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_mat2 == "ver" OR $lib_mat2 == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_mat2 == "" ) { ?>          
	<? } } ?>
	
	<? if ( $lib_mat3 == "ver" OR $lib_mat3 == "alt" ) { ?>
	<TD align=middle><P class=bordas> </P></TD>
	<?	if ( $check_mat3 == "" ) { ?>          
	<? } } ?>
	
				
		</TR>
<? /*------------INFORMAÇÕES DO FINAL DA TABELA DO PCP---------------*/ ?>
   
			             
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