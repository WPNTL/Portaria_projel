<?
//DATA DA EMISSÃO
$b = date('d'); $c = date('n'); $d = date('Y'); 
if(strlen($b) == 1){$b = "0".$b;};
if(strlen($c) == 1){$c = "0".$c;}; 
$data_emissao_hoje = $b."/".$c."/".$d;


//CONFIGURAÇÕES DO BD MYSQL                               
include "config_pcp_imprimir.php";  
include "config_pcp.php";
include "valida_sessao.php" ; 

//ENDEREÇO DA BIBLIOTECA FPDF                             
$end_fpdf    =  "";     
//ENDEREÇO ONDE SERÁ GERADO O PDF                         
$end_final   =  "Imprimir Etiquetas.pdf"; 
//TIPO DO PDF GERADO                                      
//F-> SALVA NO ENDEREÇO ESPECIFICADO NA VAR END_FINAL     
$tipo_pdf    =  "F";                          
//TÍTULO DO RELATÓRIO                                     
$titulo      =  "Imprimir PCP Etiquetas";


//VARIAVEIS
//NUMERO DE RESULTADOS POR PÁGINA                         
$dados_por_pagina_pdf = 70; 
//echo "<br>";  echo "dados_por_pagina_pdf_padrao = ".$dados_por_pagina_pdf; echo "<br>";

//FOLHA
$pag_largura = 50;
$pag_altura = 65;

//FONTES
$fonte_cabecalho = 10;
$fonte_rodape = 8;
$fonte_titulo = 12;
$fonte_texto = 12;
$fonte_texto2 = 9;
$fonte_erro = 20;

//MARGEM
$margem_vertical = 1;
$margem_horizontal = 1;

$item_inicial = 1;	
$item_prog = $item_prog + 1; 

//PAGINA DO PDF
$linha_atual_pdf = 0; 
$linha_inicio_pdf = 0;

// ORGANIZAR POR NUMERO DE OS
if ( $organizar == "" ) {  $organizar = "num_os";  }

//--------------------------------------------------------------------------------------
//SOMANDO ITENS DA NUMERO OS   
//	for ( $item=$item_inicial; $item<=$item_prog; $item++ )	{
		
// PREPARA PARA GERAR O PDF
	define('FPDF_FONTPATH','./font/');
	require('fpdf_etiqueta.php');        
	$pdf = new FPDF();
	$pdf->SetMargins(4, 4);
	$pdf->SetAutoPageBreak(true,1); // margem inferior	
		

// CRIAR PÁGINA NO PDF   
	$pdf->Open();                    
	$pdf->AddPage('P');
//	$pdf->multicell(0, 69, "", 1, 0);
	$pdf->SetFont("Arial", "B", $fonte_texto);
	
//CONECTA COM O MYSQL
	$conn = mysql_connect($servidor, $usuario, $senha);
	$db = mysql_select_db($bd, $conn);
   	$query = "SELECT * FROM pcp WHERE $tipo_busca<>'' AND $tipo_busca='$valor' AND $tipo_busca2='$valor2' ORDER BY '$organizar'";
	$result = MYSQL_QUERY($query); 

//ABRI WHILE 	
while ($dados = mysql_fetch_array($result)) { 

$id = $dados["id"]; 
$num_os = $dados["num_os"]; 
$item = $dados["item"]; 

$baixa = $dados["baixa"];

$nome_cliente = $dados["nome_cliente"];
$descr_vent = $dados["descr_vent"];
$classe = $dados["classe"]; 
//$tag = $dados["tag"]; 
$vazao = $dados["vazao"]; 
$rotacao = $dados["rotacao"];
$qt = $dados["qt"]; 
$modelo = $dados["modelo"]; 
$tamanho = $dados["tamanho"]; 
$arranjo = $dados["arranjo"]; 
$rotacao_rpm = $dados["rotacao_rpm"]; 
$construcao = $dados["construcao"]; 
$pos_motor = $dados["pos_motor"]; 

$pot_motor_cv = $dados["pot_motor_cv"];
$pot_motor_polos = $dados["pot_motor_polos"];
$p_estatica_op = $dados["p_estatica_op"];
$rotacao_rpm = $dados["rotacao_rpm"];
$int_lub = $dados["int_lub"];
	
	if ($nome_cliente == "FOCKINK") {
		$pdf->Header2();
	} else {
		$pdf->Header();
	}
//   $pdf->Ln(1);	
	
//	$pdf->Image("logo.JPG", 30,8,45,12);
	
//endereco da imagem,posicao X(horizontal),posicao Y(vertical), tamanho altura, tamanho largura
//	$pdf->Image("logo.JPG", 30,8,45,12);
   
   $pdf->cell(100, 15, "", 0, 1, 'C');
   $pdf->cell(100, 2, "", 0, 1, 'C');

//	$pdf->Ln(18);

	//---------------------------------------------------------------------
   
   	//QUANDO BAIXA FOR C 
	if ( $baixa == "C" ) {
   	$pdf->Ln(3);    
   	$pdf->SetFont("Arial", "B", 28);
   	$pdf->Cell(100, 32, "OS CANCELADA", 0, 1, 'C'); 
	}//FECHA IF QUANDO BAIXA FOR C 
	else {
 
   //MONTA O SUB-TITULO 
   $pdf->SetFont("Arial", "B", $fonte_texto);
   
   // ------------- COMEÇA EXIBIR DADOS DO BANCO ---------------
   $pdf->cell(15, 6, "Modelo", 0, 0, 'R'); $pdf->Cell(83, 6, "$modelo ". "$tamanho ". "$arranjo ". "$classe ". "$rotacao "."$pos_motor ", 1, 1, 'L');
   $pdf->Ln(1);	
   
   $tag_novo = $_POST['tag_novo'];
   $pdf->cell(15, 6, "TAG", 0, 0, 'R'); $pdf->Cell(83, 6, "$tag_novo", 1, 1, 'L'); 

   $pdf->Ln(1);
   
   $pdf->Cell(15, 6, "Pedido", 0, 0, 'R'); $pdf->Cell(29, 6, "$num_os /"." $item", 1, 0, 'L');
   $pdf->Cell(23, 6, "", 0, 0, 'C'); $pdf->Cell(8, 6, "Rot.", 0, 0, 'C'); $pdf->Cell(13, 6, $rotacao_rpm, 1, 0, 'C'); $pdf->Cell(9, 6, "rpm", 0, 1, 'C');
   $pdf->Ln(1);
   
   $pdf->Cell(15, 6, "Vazão", 0, 0, 'R'); $pdf->Cell(20, 6, $vazao, 1, 0, 'C'); $pdf->Cell(10, 6, "m³/h", 0, 0, 'C'); 
   $pdf->Cell(12, 6, "", 0, 0, 'R'); $pdf->Cell(13, 6, "P/ Est.", 0, 0, 'C'); $pdf->Cell(13, 6, $p_estatica_op, 1, 0, 'C'); $pdf->Cell(14, 6, "mmCA", 0, 1, 'C');
   $pdf->Ln(2);
   
   $pdf->Cell(15, 6, "Motor", 0, 0, 'R'); $pdf->Cell(12, 6, $pot_motor_cv, 1, 0, 'C'); $pdf->Cell(8, 6, "CV", 0, 0, 'C');
   $pdf->Cell(9, 6, $pot_motor_polos, 1, 0, 'C'); $pdf->Cell(19, 6, "Polos", 0, 0, 'L'); $pdf->Cell(16, 6, "Int.Lub.", 0, 0, 'C'); $pdf->Cell(14, 6, $int_lub, 1, 0, 'C'); $pdf->Cell(4, 6, "h", 0, 1, 'C');
   $pdf->Ln(3);
   
   $pdf->SetFont("Arial", "B", $fonte_texto2);
   $pdf->cell(100, 4, "Matriz - Sapucaia do Sul - RS (51) 3451.5100", 0, 1, 'C');
   $pdf->cell(100, 4, "Filial - São Paulo - SP (11) 5571.6329", 0, 1, 'C');
   $pdf->SetFont("Arial", "B", $fonte_texto2);
   $pdf->cell(100, 4, "www.projelmec.com.br", 0, 1, 'C');
   $pdf->cell(100, 4, "", 0, 1, 'C');


}   
//--------------------------------------------------------------------------------------
}// FECHAR SQL
   
/*QUANDO A DATA PROG. DIARIA FOR EM BRANCO 
if ( $valor1 == "" OR $valor2 == "" ) {
   $pdf->Ln(20);    
   $pdf->SetFont("Arial", "B", $fonte_texto);
   $pdf->Cell(98, 10, "VOCÊ NÃO DIGITOU NENHUMA OS", 1, 1, 'C'); 
}//FECHA IF QUANDO A DATA PROG. DIARIA FOR EM BRANCO 
//SAIDA DO PDF
//$pdf->Output("$end_final", "$tipo_pdf");*/
$pdf->Output();


?>