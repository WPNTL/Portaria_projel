<? include "valida_sessao.php" ; include "config_pcp.php"; ?>

<html>
<head>
<title> Consulta Pedido </title>
<link rel="stylesheet" href="style/default.css" type="text/css">
<script language="JavaScript" SRC="funcoes/geral.js"></script>
<script language="JavaScript" SRC="funcoes/overlib.js"></script>
<script language="JavaScript" SRC="funcoes/moeda.js"></script>
<script language="JavaScript" SRC="funcoes/abrir_fechar.js"></script>
<script language="JavaScript" SRC="funcoes/calendario.js"></script>
<script language="JavaScript" SRC="funcoes/letras_maiscula.js"></script>

</head>


<div id="overDiv" style="position:absolute; visibility:hide; z-index:1;; width: 160px; height: 19px"></div>


<form action="" method="post" name="pcp">


<FIELDSET>
<LEGEND> Seleção do Filtro <font color="#FF0000">( Deixar em branco para ver TODAS DT. ) </font>

<? /*  selecao da data */ ?>
<input name=data_selecao value="<?echo $data_selecao?>" size="11"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.pcp.data_selecao);return false;" HIDEFOCUS><img class="PopcalTrigger" align="absmiddle" src="calendario/calbtn.gif" width="34" height="22" border="0" alt=""></a>

<? /*  botao ver todos = selecionado */ ?>
<input class=botao2 type="checkbox" name="pendencias" value="checked" <?echo $pendencias?> 
onMouseOver="drc('','Ver Pendencias = OK'); return true;" onMouseOut="nd(); return true;" >


<? /*  botao atualizar */ ?>
<input class="botao1" name="atualizarfiltro" type="button" value="Atualizar Filtro" onclick="Atualizar_Dados_Pedido();">

<? /*  botao grava dados alterados */ ?>
<input class="botao1" name="alterardados" type="button" value="Alterar Dados" onclick="Alterar_Dados_Pedido_Altera();">

<? /*  botao imprimir selecao pedido	*/ ?>
<input class="botao1" type="button" name=imprimirgeral value="Imprimir Pedido" onClick="javascript:void(open('imprimir_pedido.php?data_selecao=<?echo$data_selecao?>&pendencias=<?echo$pendencias?>','imprimirpedido','scrollbars=yes,fullscreen=no'))">

<? /*  botao fechar janela */ ?>
<a class="botao1" href="javascript:window.close()" target="_top"> Fecha Janela </a>

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



	<TR class=linha_cabecalho>

<? /* nome cliente */ ?>             
<TH align=middle widht="10%"><P class=bordas> Nome Cliente </P></TH>

<? /* oc_obra */ ?>
<TH align=middle widht="10%"><P class=bordas> OC_Obra </P></TH>

<? /* data rec pedido */ ?>              
<TH align=middle widht="10%"><P class=bordas> Dt. Rec. Pedido </P></TH>

<? /* prazo entrega */ ?>              
<TH align=middle widht="10%"><P class=bordas> Prazo Entr. </P></TH>

<? /* data entrega */ ?>              
<TH align=middle widht="10%"><P class=bordas> Dt. Entrega </P></TH>

<? /* data copia */ ?>              
<TH align=middle widht="10%"><P class=bordas> Dt. Cópia </P></TH>

<? /* data copia enviada */ ?>
<TH align=middle widht="10%"><P class=bordas> Dt. Cópia Enviada </P></TH>

<? /* data emissao pedido */ ?>
<TH align=middle widht="10%"><P class=bordas> Dt. Emissão Pedido </P></TH>

<? /* data pedido enviado */ ?>
<TH align=middle widht="10%"><P class=bordas> Dt. Pedido Enviado </P></TH>

<? /* data lib financeiro */ ?>
<TH align=middle widht="10%"><P class=bordas> Dt. Lib. Financeiro </P></TH>

<? /* data lib financeio enviado */ ?>
<TH align=middle widht="10%"><P class=bordas> Dt. Lib. Financeiro Enviado </P></TH>

<? /* data analise critica */ ?>
<TH align=middle widht="10%"><P class=bordas> Dt. Análise Crítica </P></TH>

<? /* data analise critica enviado */ ?>
<TH align=middle widht="10%"><P class=bordas> Dt. Análise Crítica Enviado </P></TH>

<? /* pendenciaas */ ?>
<TH align=middle widht="10%"><P class=bordas> Pendências </P></TH>
	
	</TR> 


              

<? 

/* --------------------  INICIO DA CONSULTA  -----------------------------  */  

$dia_selecao = substr($data_selecao, -10,2); 
$mes_selecao = substr($data_selecao, -7,2); 
$ano_selecao = substr($data_selecao, -4);

if ( $dia_selecao == "" and $mes_selecao == "" and $ano_selecao == "" ) 
{ $data_selecao = ($ano_selecao."".$mes_selecao."".$dia_selecao); } 
else
{ $data_selecao = ($ano_selecao."-".$mes_selecao."-".$dia_selecao); }

//echo "data_selecao = ".$data_selecao; echo "<br>";

if ( $data_selecao == "" ) 
{ $sql = ""; } 
else 
{ $sql = "AND data_copia='$data_selecao' OR data_copia_enviado='$data_selecao' OR data_emissao_pedido='$data_selecao' OR data_emissao_pedido_enviado='$data_selecao' OR data_lib_financeiro='$data_selecao' OR data_lib_financeiro_enviado='$data_selecao' OR data_analise_critica='$data_selecao' OR data_analise_critica_enviado='$data_selecao'"; } 
//echo "sql = ".$sql; echo "<br>";

if ( $pendencias == "checked" ) { $pendencias = "AND pendencias='OK'" ;} else { $pendencias = "AND pendencias!='OK'" ;}
//echo "pendencias = ".$pendencias; echo "<br>";

$x = 0; 
$quant_pedido = 0;

$query = "SELECT * FROM pcp_pedido WHERE id>='0' $sql $pendencias ORDER BY 'id'";

$result = MYSQL_QUERY($query); 
while ($dados = mysql_fetch_array($result)) {
	
$x = $x + 1; 
$quant_pedido = $quant_pedido + 1; 

$id = $dados["id"]; 
$data_emissao = $dados["data_emissao"]; 
$nome_cliente = $dados["nome_cliente"]; 
$oc_obra = $dados["oc_obra"]; 
$data_rec_pedido = $dados["data_rec_pedido"];
$prazo_entrega_dias = $dados["prazo_entrega_dias"];
$data_entrega = $dados["data_entrega"];

$data_copia = $dados["data_copia"];
$data_copia_enviado = $dados["data_copia_enviado"];

$data_emissao_pedido = $dados["data_emissao_pedido"];
$data_emissao_pedido_enviado = $dados["data_emissao_pedido_enviado"];

$data_lib_financeiro = $dados["data_lib_financeiro"];
$data_lib_financeiro_enviado = $dados["data_lib_financeiro_enviado"];

$data_analise_critica = $dados["data_analise_critica"];
$data_analise_critica_enviado = $dados["data_analise_critica_enviado"];

$pendencias = $dados["pendencias"];
$pendencias_db = $dados["pendencias"];

$dia_data_emissao = substr($data_emissao, -2); 
$mes_data_emissao = substr($data_emissao, -5,2);
$ano_data_emissao = substr($data_emissao, -10,4); 
$data_emissao = ($dia_data_emissao."/".$mes_data_emissao."/".$ano_data_emissao); 
$data_emissao_mktime = mktime(0,0,0,$mes_data_emissao,$dia_data_emissao,$ano_data_emissao);


$dia_data_rec_pedido = substr($data_rec_pedido, -2); 
$mes_data_rec_pedido = substr($data_rec_pedido, -5,2);
$ano_data_rec_pedido = substr($data_rec_pedido, -10,4); 
$data_rec_pedido = ($dia_data_rec_pedido."/".$mes_data_rec_pedido."/".$ano_data_rec_pedido);
$data_rec_pedido_mktime = mktime(0,0,0,$mes_data_rec_pedido,$dia_data_rec_pedido,$ano_data_rec_pedido);


$dia_data_entrega = substr($data_entrega, -2); 
$mes_data_entrega = substr($data_entrega, -5,2);
$ano_data_entrega = substr($data_entrega, -10,4); 
$data_entrega = ($dia_data_entrega."/".$mes_data_entrega."/".$ano_data_entrega); 
$data_entrega_mktime = mktime(0,0,0,$mes_data_entrega,$dia_data_entrega,$ano_data_entrega);


/* data_copia */
$dia_data_copia = substr($data_copia, -2); 
$mes_data_copia = substr($data_copia, -5,2);
$ano_data_copia = substr($data_copia, -10,4); 
$data_copia = ($dia_data_copia."/".$mes_data_copia."/".$ano_data_copia);
$data_copia_mktime = mktime(0,0,0,$mes_data_copia,$dia_data_copia,$ano_data_copia);

$dia_data_copia_enviado = substr($data_copia_enviado, -2); 
$mes_data_copia_enviado = substr($data_copia_enviado, -5,2);
$ano_data_copia_enviado = substr($data_copia_enviado, -10,4); 
if ( $data_copia_enviado == "") 
{ $data_copia_enviado = ($dia_data_copia_enviado."".$mes_data_copia_enviado."".$ano_data_copia_enviado); }
else 
{ $data_copia_enviado = ($dia_data_copia_enviado."/".$mes_data_copia_enviado."/".$ano_data_copia_enviado); }
/* data_copia */


/* data_emissao_pedido */
$dia_data_emissao_pedido = substr($data_emissao_pedido, -2); 
$mes_data_emissao_pedido = substr($data_emissao_pedido, -5,2);
$ano_data_emissao_pedido = substr($data_emissao_pedido, -10,4); 
$data_emissao_pedido = ($dia_data_emissao_pedido."/".$mes_data_emissao_pedido."/".$ano_data_emissao_pedido); 
$data_emissao_pedido_mktime = mktime(0,0,0,$mes_data_emissao_pedido,$dia_data_emissao_pedido,$ano_data_emissao_pedido);

$dia_data_emissao_pedido_enviado = substr($data_emissao_pedido_enviado, -2); 
$mes_data_emissao_pedido_enviado = substr($data_emissao_pedido_enviado, -5,2);
$ano_data_emissao_pedido_enviado = substr($data_emissao_pedido_enviado, -10,4); 
if ( $data_emissao_pedido_enviado == "" )
{ $data_emissao_pedido_enviado = ($dia_data_emissao_pedido_enviado."".$mes_data_emissao_pedido_enviado."".$ano_data_emissao_pedido_enviado); }
else
{ $data_emissao_pedido_enviado = ($dia_data_emissao_pedido_enviado."/".$mes_data_emissao_pedido_enviado."/".$ano_data_emissao_pedido_enviado); }
/* data_emissao_pedido */


/* data_lib_financeiro */
$dia_data_lib_financeiro = substr($data_lib_financeiro, -2); 
$mes_data_lib_financeiro = substr($data_lib_financeiro, -5,2);
$ano_data_lib_financeiro = substr($data_lib_financeiro, -10,4); 
$data_lib_financeiro = ($dia_data_lib_financeiro."/".$mes_data_lib_financeiro."/".$ano_data_lib_financeiro); 
$data_lib_financeiro_mktime = mktime(0,0,0,$mes_data_lib_financeiro,$dia_data_lib_financeiro,$ano_data_lib_financeiro);

$dia_data_lib_financeiro_enviado = substr($data_lib_financeiro_enviado, -2); 
$mes_data_lib_financeiro_enviado = substr($data_lib_financeiro_enviado, -5,2);
$ano_data_lib_financeiro_enviado = substr($data_lib_financeiro_enviado, -10,4); 
if ( $data_lib_financeiro_enviado == "" )
{ $data_lib_financeiro_enviado = ($dia_data_lib_financeiro_enviado."".$mes_data_lib_financeiro_enviado."".$ano_data_lib_financeiro_enviado); }
else
{ $data_lib_financeiro_enviado = ($dia_data_lib_financeiro_enviado."/".$mes_data_lib_financeiro_enviado."/".$ano_data_lib_financeiro_enviado); }
/* data_lib_financeiro */


/* data_analise_critica */
$dia_data_analise_critica = substr($data_analise_critica, -2); 
$mes_data_analise_critica = substr($data_analise_critica, -5,2);
$ano_data_analise_critica = substr($data_analise_critica, -10,4); 
$data_analise_critica = ($dia_data_analise_critica."/".$mes_data_analise_critica."/".$ano_data_analise_critica); 
$data_analise_critica_mktime = mktime(0,0,0,$mes_data_analise_critica,$dia_data_analise_critica,$ano_data_analise_critica);

$dia_data_analise_critica_enviado = substr($data_analise_critica_enviado, -2); 
$mes_data_analise_critica_enviado = substr($data_analise_critica_enviado, -5,2);
$ano_data_analise_critica_enviado = substr($data_analise_critica_enviado, -10,4); 
if ( $data_analise_critica_enviado == "" )
{ $data_analise_critica_enviado = ($dia_data_analise_critica_enviado."".$mes_data_analise_critica_enviado."".$ano_data_analise_critica_enviado); }
else
{ $data_analise_critica_enviado = ($dia_data_analise_critica_enviado."/".$mes_data_analise_critica_enviado."/".$ano_data_analise_critica_enviado); }
/* data_analise_critica */

 
/* data atual */ 
	$dia_atual = date('d');  
	$mes_atual = date('n');  
	$ano_atual = date('Y'); 
	
	$data_hoje = $dia_atual."/".$mes_atual."/".$ano_atual;
		
//	echo "dia_atual = ".$dia_atual; echo "<br>";
//  	echo "mes_atual = ".$mes_atual; echo "<br>";
//  	echo "ano_atual = ".$ano_atual; echo "<br>";
	if(strlen($dia_atual) == 1){$dia_atual = "0".$dia_atual;};
  	if(strlen($mes_atual) == 1){$mes_atual = "0".$mes_atual;};
  	$data_atual_mktime = mktime(0,0,0,$mes_atual,$dia_atual,$ano_atual);
/* data atual */


/* data amanha */
	
    $days = ( $data_atual_mktime )/86400;
//echo $days;  echo "<br>";  

	$diasmais = 1; 
//echo "diasmais = ".$diasmais;  echo "<br>";
	
	$dia = $dia_atual;  	$mes = $mes_atual;  	$ano = $ano_atual;

	for($i = 0; $i < $diasmais; $i++) {//for()
if($mes == "01" || $mes == "03" || $mes == "05" || $mes == "07" || $mes == "08" || $mes == "10" || $mes == "12"){ //if geral 1
	if($mes == 12 && $dia == 31){  $mes = 01;   $ano++;   $dia = 00;  }
	if($dia == 31 && $mes != 12){  $mes++;  $dia = 00;   }  }//fecha if geral 1
if($mes == "04" || $mes == "06" || $mes == "09" || $mes == "11"){ //if geral 2
	if($dia == 30){  $dia = 00;   $mes++;   }   }//fecha if geral 2
if($mes == "02"){ //if geral 3
	if($ano % 4 == 0 && $ano % 100 != 0){ //ano bissexto
	if($dia == 29){  $dia = 00;   $mes++;    }    }//fecha ano bissexto
 	 else {
	if($dia == 28){  $dia = 00;  $mes++;   }   }  }//fecha if geral 3
 	 $dia++;
	}//fecha for()
  
  	if(strlen($dia) == 1){$dia = "0".$dia;};
  	if(strlen($mes) == 1){$mes = "0".$mes;};
  
	$data_calculada = $dia."/".$mes."/".$ano;
//echo "data_calculada = ".$data_calculada;  echo "<br>";

  	$data_amanha_mktime = mktime(0,0,0,$mes,$dia,$ano);
  	
/* data amanha */
if ( $pendencias == "OK" ) {$class_pendencias="class=nedita_left"; $readonly_pendencias="readonly"; $disabled_pendencias="disabled";}

?>

		<TR class=linha0 border-style: FEFEEE; border-width: 1; >
			
			
<? /* ------- id  ------- */ ?>
<input class=nedita_left readonly type=hidden name="id[<?echo$x;?>]" value="<?echo $id?>" size="2">	


<?	/* nome_cliente  */   ?>				
<TD align=middle 
			onMouseOver="this.style.background='#99CCEA'; drc('',' <?echo$nome_cliente;?> '); return true; " 
			onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 	
			onClick="javascript:void(open('altera_pedido.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))"><P class=bordas> 
<span style="width:65px;word-wrap:break-word;"> 
<?echo "$nome_cliente";?> 
</span>
</P></TD>	


<?	/* oc_obra  */   ?>	
<TD align=middle 
			onMouseOver="this.style.background='#99CCEA'; drc('',' <?echo$nome_cliente;?> '); return true; " 
			onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 	
			onClick="javascript:void(open('altera_pedido.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))"><P class=bordas>
<span style="width:65px;word-wrap:break-word;"> 
<?echo "$oc_obra";?> 
</span>
</P></TD>


<?	/* data_rec_pedido  */   ?> 
<TD align=middle 
			onMouseOver="this.style.background='#99CCEA'; drc('',' <?echo$nome_cliente;?> '); return true; " 
			onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 	
			onClick="javascript:void(open('altera_pedido.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))"><P class=bordas> 
<span style="width:75px;word-wrap:break-word;"> 
<?echo "$data_rec_pedido";?> 
</span>
</P></TD>


<?	/* prazo_entrega_dias  */   ?> 
<TD align=middle 
			onMouseOver="this.style.background='#99CCEA'; drc('',' <?echo$nome_cliente;?> '); return true; " 
			onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 	
			onClick="javascript:void(open('altera_pedido.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))"><P class=bordas> 
<span style="width:35px;word-wrap:break-word;"> 
<?echo "$prazo_entrega_dias";?> 
</span>
</P></TD>
		
		
<?	/* data_entrega  */   ?> 
<TD align=middle 
			onMouseOver="this.style.background='#99CCEA'; drc('',' <?echo$nome_cliente;?> '); return true; " 
			onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 	
			onClick="javascript:void(open('altera_pedido.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))"><P class=bordas> 
<span style="width:75px;word-wrap:break-word;"> 
<?echo "$data_entrega";?> 
</span>
</P></TD>


<?	/* data_copia  */   ?> 
<TD align=middle 
			onMouseOver="this.style.background='#99CCEA'; drc('',' <?echo$nome_cliente;?> '); return true; " 
			onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 	
			onClick="javascript:void(open('altera_pedido.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))"><P class=bordas> 
<span style="width:75px;word-wrap:break-word;"> 
<? if ( $data_copia_mktime <= $data_atual_mktime ) { ?> 
<font color="#FF0000"> 
<? } ?>
<?echo "$data_copia";?> 
<? if ( $data_copia_mktime <= $data_atual_mktime ) { ?> 
</font>
<? } ?>
</span>
</P></TD>


<?	/* data_copia_enviado  */   ?> 
<TD align=middle><P class=bordas> 
<span style="width:75px;word-wrap:break-word;">
<input type=text name=data_copia_enviado_novo[<?echo$x;?>] value="<?echo $data_copia_enviado;?>" size="11">
</span>
</P></TD>


<?	/* data_emissao_pedido  */   ?> 
<TD align=middle 
			onMouseOver="this.style.background='#99CCEA'; drc('',' <?echo$nome_cliente;?> '); return true; " 
			onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 	
			onClick="javascript:void(open('altera_pedido.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))"><P class=bordas> 
<span style="width:75px;word-wrap:break-word;"> 
<? if ( $data_emissao_pedido_mktime <= $data_amanha_mktime ) { ?> 
<font color="#FF0000"> 
<? } ?>
<?echo "$data_emissao_pedido";?> 
<? if ( $data_emissao_pedido_mktime <= $data_amanha_mktime ) { ?> 
</font>
<? } ?>
</span>
</P></TD>


<?	/* data_emissao_pedido_enviado  */   ?> 
<TD align=middle><P class=bordas> 
<span style="width:75px;word-wrap:break-word;"> 
<input type=text name=data_emissao_pedido_enviado_novo[<?echo$x;?>] value="<?echo $data_emissao_pedido_enviado;?>" size="11">
</span>
</P></TD>


<?	/* data_lib_financeiro  */   ?> 
<TD align=middle 
			onMouseOver="this.style.background='#99CCEA'; drc('',' <?echo$nome_cliente;?> '); return true; " 
			onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 	
			onClick="javascript:void(open('altera_pedido.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))"><P class=bordas> 
<span style="width:75px;word-wrap:break-word;"> 
<? if ( $data_lib_financeiro_mktime <= $data_atual_mktime ) { ?> 
<font color="#FF0000"> 
<? } ?>
<?echo "$data_lib_financeiro";?> 
<? if ( $data_lib_financeiro_mktime <= $data_atual_mktime ) { ?> 
</font>
<? } ?>
</span>
</P></TD>


<?	/* data_lib_financeiro_enviado  */   ?> 
<TD align=middle><P class=bordas> 
<span style="width:75px;word-wrap:break-word;"> 
<input type=text name=data_lib_financeiro_enviado_novo[<?echo$x;?>] value="<?echo $data_lib_financeiro_enviado;?>" size="11">
</span>
</P></TD>


<?	/* data_analise_critica  */   ?> 
<TD align=middle 
			onMouseOver="this.style.background='#99CCEA'; drc('',' <?echo$nome_cliente;?> '); return true; " 
			onMouseOut="this.style.background='#FEFEEE' ; nd(); return true;" 	
			onClick="javascript:void(open('altera_pedido.php?id=<?echo$id?>','nova','scrollbars=yes,width=795,height=550,top=2,left=1'))"><P class=bordas> 
<span style="width:75px;word-wrap:break-word;"> 
<? if ( $data_analise_critica_mktime <= $data_atual_mktime ) { ?> 
<font color="#FF0000"> 
<? } ?>
<?echo "$data_analise_critica";?> 
<? if ( $data_analise_critica_mktime <= $data_atual_mktime ) { ?> 
</font>
<? } ?>
</span>
</P></TD>


<?	/* data_analise_critica_enviado  */   ?> 
<TD align=middle><P class=bordas> 
<span style="width:75px;word-wrap:break-word;"> 
<input type=text name=data_analise_critica_enviado_novo[<?echo$x;?>] value="<?echo $data_analise_critica_enviado;?>" size="11">
</span>
</P></TD>


<?	/* sem_pendencias  */   ?> 
<TD align=middle><P class=bordas>
<span style="width:150px;word-wrap:break-word;"> 
<textarea <?echo $class_pendencias;?> <?echo $readonly_pendencias;?> <?echo $disabled_pendencias;?> name=pendencias_novo[<?echo$x;?>] rows=1 cols=20 onchange="this.value = this.value.toUpperCase();" id="textbox10"><? echo $pendencias; ?></textarea>

<?	/* STATUS ANTIGO DO BANCO  */   ?>
<input readonly type=hidden name=pendencias_velho[<?echo$x;?>] value="<?echo $pendencias_db?>" size="11">
</span>
</P></TD>

		</TR> 
		 

<?  } /* FECHAMENTO DO WHILE */  ?>	
 

<?	/* quant. de pedidos  */   ?>
<input class=nedita_left readonly type=hidden name="quant_pedido" value="<?echo $quant_pedido;?>" >	
		
			     
			             
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


<iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="calendario/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>




</form>
</body>
</html>

