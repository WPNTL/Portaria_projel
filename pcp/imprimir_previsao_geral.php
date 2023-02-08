<?
//DATA
$b = date('d'); $c = date('n'); $d = date('Y'); 
if(strlen($b) == 1){$b = "0".$b;};
if(strlen($c) == 1){$c = "0".$c;}; 
$data_emissao_hoje = $b."/".$c."/".$d; 


//CONFIGURAÇÕES DO BD MYSQL                               
include "config_pcp_imprimir.php"; 
//ENDEREÇO DA BIBLIOTECA FPDF                             
$end_fpdf    =  "";     
//ENDEREÇO ONDE SERÁ GERADO O PDF                         
$end_final   =  "Imprimir Previsão Geral.pdf"; 
//TIPO DO PDF GERADO                                      
//F-> SALVA NO ENDEREÇO ESPECIFICADO NA VAR END_FINAL     
$tipo_pdf    =  "F";                      
//TÍTULO DO RELATÓRIO                                     
$titulo      =  "Imprimir Previsão Geral";

//VARIAVEIS

//NUMERO DE RESULTADOS POR PÁGINA                         
$dados_por_pagina_pdf  =  47; 
//echo "<br>";  echo "dados_por_pagina_pdf_padrao = ".$dados_por_pagina_pdf; echo "<br>";

//FOLHA
$pag_largura = 750;
$pag_altura = 520;

//FONTES
$fonte_cabecalho = 10;
$fonte_titulo = 12;
$fonte_texto = 8;

$fonte_cliente = 7;
$fonte_obs = 6;

//MARGEM
$margem_vertical = 10;
$margem_horizontal = 10;


/************** NÃO MEXER DAQUI PRA BAIXO ***************/
if ( $f_data_emissao <> "") {$f_data_emissao_db = "and data_emissao='$f_data_emissao'";} else {$f_data_emissao_db = "";}
if ( $f_num_os <> "") {$f_num_os_db = "and num_os='$f_num_os'";} else {$f_num_os_db = "";}
if ( $f_num_proposta <> "") {$f_num_proposta_db = "and num_proposta='$f_num_proposta'";} else {$f_num_proposta_db = "";}
if ( $f_nome_cliente <> "" ) {$f_nome_cliente_db = "and nome_cliente='$f_nome_cliente'";} else {$f_nome_cliente_db = "";}
if ( $f_oc_obra <> "" ) {$f_oc_obra_db = "and oc_obra='$f_oc_obra'";} else {$f_oc_obra_db = "";}
if ( $f_mercado <> "" ) {$f_mercado_db = "and mercado='$f_mercado'";} else {$f_mercado_db = "";}
if ( $f_estado <> "" ) {$f_estado_db = "and estado='$f_estado'";} else {$f_estado_db = "";}

if ( $f_data_entrega <> "" ) {$f_data_entrega_db = "and data_entrega='$f_data_entrega'";} else {$f_data_entrega_db = "";}

if ( $f_local_venda <> "" ) {$f_local_venda_db = "and local_venda='$f_local_venda'";} else {$f_local_venda_db = "";}
if ( $f_fornecimento_motor <> "" ) {$f_fornecimento_motor_db = "and fornecimento_motor='$f_fornecimento_motor'";} else {$f_fornecimento_motor_db = "";}

if ( $f_descr_vent <> "" ) {$f_descr_vent_db = "and descr_vent='$f_descr_vent'";} else {$f_descr_vent_db = "";}
if ( $f_modelo <> "" ) {$f_modelo_db = "and modelo='$f_modelo'";} else {$f_modelo_db = "";}
if ( $f_tamanho <> "" ) {$f_tamanho_db = "and tamanho='$f_tamanho'";} else {$f_tamanho_db = "";}
if ( $f_arranjo <> "" ) {$f_arranjo_db = "and arranjo='$f_arranjo'";} else {$f_arranjo_db = "";}
if ( $f_classe <> "" ) {$f_classe_db = "and classe='$f_classe'";} else {$f_classe_db = "";}
if ( $f_rotacao <> "" ) {$f_rotacao_db = "and rotacao='$f_rotacao'";} else {$f_rotacao_db = "";}

if ( $f_gab <> "" ) {$f_gab_db = "and gab='$f_gab'";} else {$f_gab_db = "";}
if ( $f_pintura <> "" ) {$f_pintura_db = "and pintura='$f_pintura'";} else {$f_pintura_db = "";}
if ( $f_construcao <> "" ) {$f_construcao_db = "and construcao='$f_construcao'";} else {$f_construcao_db = "";}

if ( $f_qt <> "" ) {$f_qt_db = "and qt='$f_qt'";} else {$f_qt_db = "";}
if ( $f_valor_uni <> "" ) {$f_valor_uni_db = "and valor_uni='$f_valor_uni'";} else {$f_valor_uni_db = "";}
if ( $f_valor_total <> "" ) {$f_valor_total_db = "and valor_total='$f_valor_total'";} else {$f_valor_total_db = "";}

if ( $f_obs <> "" ) {$f_obs_db = "and obs='$f_obs'";} else {$f_obs_db = "";}

if ( $f_data_motor_recebido <> "" ) {$f_data_motor_recebido_db = "and data_motor_recebido='$f_data_motor_recebido'";} else {$f_data_motor_recebido_db = "";}

if ( $f_reprogramacao <> "" ) {$f_reprogramacao_db = "and reprogramacao='$f_reprogramacao'";} else {$f_reprogramacao_db = "";}

if ( $f_baixa == "TODOS") { $f_baixa_db = "";  } else { $f_baixa_db = "AND baixa='$f_baixa'";  }

if ( $f_data_baixa <> "" ) {$f_data_baixa_db = "and data_baixa='$f_data_baixa'";} else {$f_data_baixa_db = "";}

if ( $f_data_prog_diaria <> "" ) {$f_data_prog_diaria_db = "and data_prog_diaria='$f_data_prog_diaria'";} else {$f_data_prog_diaria_db = "";}

/* DATA PREVISAO*/
if ( $f_data_previsao <> "" ) {$f_data_previsao_db = "and data_previsao='$f_data_previsao'";} else {$f_data_previsao_db = "";}

/* MOTOR - POLIA - CARCAÇA - ROTOR DO MAXSIG */

if ( $f_motor_maxsig <> "" ) {$f_motor_maxsig_db = "and motor_maxsig='$f_motor_maxsig'";} else {$f_motor_maxsig_db = "";}
if ( $f_polia_maxsig <> "" ) {$f_polia_maxsig_db = "and polia_maxsig='$f_polia_maxsig'";} else {$f_polia_maxsig_db = "";}
if ( $f_carcaca_maxsig <> "" ) {$f_carcaca_maxsig_db = "and carcaca_maxsig='$f_carcaca_maxsig'";} else {$f_carcaca_maxsig_db = "";}
if ( $f_rotor_maxsig <> "" ) {$f_rotor_maxsig_db = "and rotor_maxsig='$f_rotor_maxsig'";} else {$f_rotor_maxsig_db = "";}

/* MOTOR - POLIA - CARCAÇA - ROTOR DO MAXSIG */


/*		SETOR PROJETOS		*/

if ( $f_data_book <> "" ) {$f_data_book_db = "and data_book='$f_data_book'";} else {$f_data_book_db = "";}
if ( $f_certif_balanc <> "" ) {$f_certif_balanc_db = "and certif_balanc='$f_certif_balanc'";} else {$f_certif_balanc_db = "";}
if ( $f_certif_materiais <> "" ) {$f_certif_materiais_db = "and certif_materiais='$f_certif_materiais'";} else {$f_certif_materiais_db = "";}
if ( $f_desenho_certif <> "" ) {$f_desenho_certif_db = "and desenho_certif='$f_desenho_certif'";} else {$f_desenho_certif_db = "";}

/*		SETOR PROJETOS		*/


//CONECTA COM O MYSQL
$conn   =   mysql_connect($servidor, $usuario, $senha);
$db     =   mysql_select_db($bd, $conn);    
$sql    =   mysql_query("SELECT * FROM pcp WHERE data_previsao $f_data_emissao_db $f_num_os_db $f_num_proposta_db $f_nome_cliente_db $f_oc_obra_db $f_mercado_db $f_estado_db $f_data_entrega_db $f_local_venda_db $f_fornecimento_motor_db $f_descr_vent_db $f_modelo_db $f_tamanho_db $f_arranjo_db $f_classe_db $f_rotacao_db $f_gab_db $f_pintura_db $f_construcao_db $f_qt_db $f_valor_uni_db $f_valor_total_db $f_obs_db  $f_data_motor_recebido_db $f_reprogramacao_db $f_baixa_db $f_data_baixa_db $f_data_prog_diaria_db $f_data_book_db $f_certif_balanc_db $f_certif_materiais_db $f_desenho_certif_db ORDER BY data_previsao", $conn);
$row    =   mysql_num_rows($sql);           

//	echo "row = ".$row;  echo "<br>";


//VERIFICA SE RETORNOU ALGUMA LINHA
	if(!$row) { echo "Não retornou nenhum registro"; die; }
	

//CALCULA QUANTAS PÁGINAS VÃO SER NECESSÁRIAS
	$num_paginas_pdf   =  ceil($row/$dados_por_pagina_pdf);  
//	echo "<br>";  echo "calc. num_paginas_pdf = ".$num_paginas_pdf;   
	    

//PREPARA PARA GERAR O PDF
	define('FPDF_FONTPATH','./font/');
	require('fpdf.php');        
	$pdf = new FPDF();

//INICIALIZA AS VARIÁVEIS
	$linha_atual_pdf = 0; $linha_inicio_pdf = 0;


//PÁGINAS
	for($x = 1; $x <= $num_paginas_pdf; $x++) {
	  
//	echo "<br><br>";  echo "row = ".$row;  
	
//	echo "<br>";  echo "pag. = ".$x; 
	
	
//VERIFICAR DADOS
   $linha_inicio_pdf = $linha_atual_pdf;   
//   echo "<br>"; echo "linha_inicio_pdf = ".$linha_inicio_pdf;  

//   echo "<br>"; echo "começa linha_fim_pdf = ".$linha_fim_pdf;     
   $linha_fim_pdf = $linha_atual_pdf + $dados_por_pagina_pdf;    
//   echo "<br>"; echo "depois linha_fim_pdf = linha_atual_pdf + dados_por_pagina_pdf =".$linha_fim_pdf;  
   
   
   if($linha_fim_pdf > $row) $linha_fim_pdf = $row; 
//   echo "<br>"; echo "compara linha_fim_pdf > row = ".$linha_fim_pdf;  echo "<br>"; 
  
   $pdf->Open();                    
   $pdf->AddPage($pag_largura,$pag_altura);
                    
//MONTA O CABEÇALHO              
   $pdf->SetFont("Arial", "B", $fonte_cabecalho);
   $pdf->Ln(2);
   $pdf->Cell(40, -15, "Data Impressão $data_emissao_hoje" , 0, 0, 'C');  
   $pdf->Cell(200, -15, "Impressão Previsão Geral" , 0, 0, 'C');    
   $pdf->Cell(40, -15, "Pág. $x de $num_paginas_pdf", 0, 0, 'R'); 
         
   
//QUEBRA DE LINHA
   $pdf->SetFont("Arial", "B", $fonte_texto);
   $pdf->Ln(-5); 
	
   $pdf->Cell(13, 6, "PREV.", 1, 0, 'C');
   $pdf->Cell(13, 6, "ENTR.", 1, 0, 'C'); 
   
//   $pdf->Cell(13, 6, "REPR.", 1, 0, 'C'); 
//   $pdf->Cell(13, 6, "DIARIA", 1, 0, 'C'); 

   $pdf->Cell(13, 6, "O.S", 1, 0, 'C'); 
            
   $pdf->Cell(40, 6, "NOME CLIENTE", 1, 0, 'C'); 
   
   $pdf->Cell(6, 6, "MT", 1, 0, 'C');
   
   $pdf->Cell(15, 6, "DESC.", 1, 0, 'C');
   
   $pdf->Cell(8, 6, "QT", 1, 0, 'C');
   $pdf->Cell(13, 6, "MOD", 1, 0, 'C'); 
   $pdf->Cell(10, 6, "TAM", 1, 0, 'C');
   $pdf->Cell(6, 6, "AR", 1, 0, 'C');
   $pdf->Cell(6, 6, "SG", 1, 0, 'C');
   $pdf->Cell(6, 6, "GB", 1, 0, 'C');
   
   $pdf->Cell(6, 6, "CO", 1, 0, 'C');
      
   $pdf->Cell(12, 6, "PINT", 1, 0, 'C');
      
   $pdf->Cell(6, 6, "MT", 1, 0, 'C');
   $pdf->Cell(6, 6, "BL", 1, 0, 'C');
   $pdf->Cell(6, 6, "CA", 1, 0, 'C');
   $pdf->Cell(6, 6, "RT", 1, 0, 'C');
   
   $pdf->Cell(6, 6, "JG", 1, 0, 'C');
   
   $pdf->Cell(80, 6, "OBS", 1, 1, 'C');
    
     
     
//EXIBE OS REGISTROS      
   for($i = $linha_inicio_pdf; $i < $linha_fim_pdf; $i++) {
    
//   $reprogramacao = mysql_result($sql, $i, "reprogramacao");
//   $dia_reprogramacao = substr($reprogramacao, -2);
//   $mes_reprogramacao = substr($reprogramacao, -5,2);
//   $ano_reprogramacao = substr($reprogramacao, -8,2);
//   $reprogramacao = ($dia_reprogramacao."/".$mes_reprogramacao."/".$ano_reprogramacao); 
//   $pdf->Cell(13, 4, $reprogramacao, 1, 0, 'C');
   
//   $data_prog_diaria = mysql_result($sql, $i, "data_prog_diaria");
//   $dia_data_prog_diaria = substr($data_prog_diaria, -2);
//   $mes_data_prog_diaria = substr($data_prog_diaria, -5,2);
//   $ano_data_prog_diaria = substr($data_prog_diaria, -8,2);
//   $data_prog_diaria = ($dia_data_prog_diaria."/".$mes_data_prog_diaria."/".$ano_data_prog_diaria); 
//   $pdf->Cell(13, 4, $data_prog_diaria, 1, 0, 'C');
  
//   $pdf->Cell(15, 4,mysql_result($sql, $i, "num_os") ."/". mysql_result($sql, $i, "item"), 1, 0, 'C');  
//   $pdf->Cell(40, 4, mysql_result($sql, $i, "nome_cliente"), 1, 0, 'L');  

   $data_previsao = mysql_result($sql, $i, "data_previsao");
   $dia_data_previsao = substr($data_previsao, -2); 
   $mes_data_previsao = substr($data_previsao, -5,2);
   $ano_data_previsao = substr($data_previsao, -8,2);
   $data_previsao = ($dia_data_previsao."/".$mes_data_previsao."/".$ano_data_previsao); 

   $data_entrega = mysql_result($sql, $i, "data_entrega");
   $dia_data_entrega = substr($data_entrega, -2); 
   $mes_data_entrega = substr($data_entrega, -5,2);
   $ano_data_entrega = substr($data_entrega, -8,2);
   $data_entrega = ($dia_data_entrega."/".$mes_data_entrega."/".$ano_data_entrega);
   
   $dt_status_jat_g_fogo = mysql_result($sql, $i, "dt_status_jat_g_fogo");
   
    

	$num_os = mysql_result($sql, $i, "num_os");   	
	$item = mysql_result($sql, $i, "item");  
	$nome_cliente = mysql_result($sql, $i, "nome_cliente"); 
			
    
	if ( $data_previsao == $data_previsao_antiga )
	{ $data_previsao = ""; } 
	
	
	if 	( $data_entrega == $data_entrega_antiga )	
	{ 
		if  ( $num_os == $num_os_antigo  )  
			{  
			if ( $nome_cliente ==  $nome_cliente_antigo )  { $num_os = "          "; $nome_cliente = ""; } { $data_entrega = ""; } 
			} 
	
	
		}
		
	
//DATA ENTREGA E PREVISAO
	$pdf->Cell(13, 4, $data_previsao, 1, 0, 'C');
	$pdf->Cell(13, 4, $data_entrega, 1, 0, 'C');
		
//NUMERO OS E ITEM      
	$pdf->Cell(13, 4, $num_os ."/". $item , 1, 0, 'C');  
//NOME CLIENTE
    $pdf->SetFont("Arial", "B", $fonte_cliente);    
    $pdf->Cell(40, 4, $nome_cliente, 1, 0, 'L'); 
     	
   $data_entrega_antiga = ($dia_data_entrega."/".$mes_data_entrega."/".$ano_data_entrega);
   $data_previsao_antiga = ($dia_data_previsao."/".$mes_data_previsao."/".$ano_data_previsao);
   $num_os_antigo = mysql_result($sql, $i, "num_os");  ; 
   $nome_cliente_antigo = mysql_result($sql, $i, "nome_cliente");  ; 
   
   
   
   
 
   $pdf->SetFont("Arial", "B", $fonte_texto);
   $pdf->Cell(6, 4, mysql_result($sql, $i, "fornecimento_motor"), 1, 0, 'C');
   
   $pdf->Cell(15, 4, mysql_result($sql, $i, "descr_vent"), 1, 0, 'C');     
   $pdf->Cell(8, 4, mysql_result($sql, $i, "qt"), 1, 0, 'C');
   $pdf->Cell(13, 4, mysql_result($sql, $i, "modelo"), 1, 0, 'C');    
   $pdf->Cell(10, 4, mysql_result($sql, $i, "tamanho"), 1, 0, 'C'); 
   $pdf->Cell(6, 4, mysql_result($sql, $i, "arranjo"), 1, 0, 'C');  
   $pdf->Cell(6, 4, mysql_result($sql, $i, "rotacao"), 1, 0, 'C'); 
   $pdf->Cell(6, 4, mysql_result($sql, $i, "gab"), 1, 0, 'C');
   
   $pdf->Cell(6, 4, mysql_result($sql, $i, "construcao"), 1, 0, 'C');

   $pdf->Cell(12, 4, mysql_result($sql, $i, "pintura"), 1, 0, 'C');
   
   $pdf->Cell(6, 4, mysql_result($sql, $i, "motor_maxsig"), 1, 0, 'C');
   $pdf->Cell(6, 4, mysql_result($sql, $i, "status_balanc"), 1, 0, 'C');
   $pdf->Cell(6, 4, mysql_result($sql, $i, "carcaca_maxsig"), 1, 0, 'C');
   $pdf->Cell(6, 4, mysql_result($sql, $i, "rotor_maxsig"), 1, 0, 'C');
   
   $pdf->Cell(6, 4, mysql_result($sql, $i, "status_jat_g_fogo"), 1, 0, 'C');
   
   $pdf->SetFont("Arial", "B", $fonte_obs);      
   $pdf->Cell(80, 4, mysql_result($sql, $i, "obs"), 1, 1, 'L');

   $pdf->SetFont("Arial", "B", $fonte_texto); 
     
   $linha_atual_pdf++; 
   
   }//FECHA FOR(REGISTROS - i)
}//FECHA FOR(PAGINAS - x)   

//SAIDA DO PDF
$pdf->Output("$end_final", "$tipo_pdf");
//$pdf->Output();


?>