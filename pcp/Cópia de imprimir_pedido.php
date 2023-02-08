<?
//DATA
$b = date('d'); $c = date('n'); $d = date('Y'); 
if(strlen($b) == 1){$b = "0".$b;};
if(strlen($c) == 1){$c = "0".$c;}; 
$data_emissao_hoje = $b."/".$c."/".$d; 


//CONFIGURA��ES DO BD MYSQL                               
include "config_pcp_imprimir.php"; 
//ENDERE�O DA BIBLIOTECA FPDF                             
$end_fpdf    =  "";     
//ENDERE�O ONDE SER� GERADO O PDF                         
$end_final   =  "Imprimir Pedido.pdf"; 
//TIPO DO PDF GERADO                                      
//F-> SALVA NO ENDERE�O ESPECIFICADO NA VAR END_FINAL     
$tipo_pdf    =  "F";                      
//T�TULO DO RELAT�RIO                                     
$titulo      =  "Imprimir Pedido";

//VARIAVEIS

//NUMERO DE RESULTADOS POR P�GINA                         
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




//echo "data_selecao = ".$data_selecao;

$dia_selecao = substr($data_selecao, -10,2); 
$mes_selecao = substr($data_selecao, -7,2); 
$ano_selecao = substr($data_selecao, -4);
if ( $dia_selecao == "" and $mes_selecao == "" and $ano_selecao == "" ) 
{ $data_selecao = ($ano_selecao."".$mes_selecao."".$dia_selecao); } 
else
{ $data_selecao = ($ano_selecao."-".$mes_selecao."-".$dia_selecao); }

if ( $data_selecao == "" ) 
{ $sql = ""; } 
else 
{ $sql = "AND data_copia='$data_selecao' OR data_copia_enviado='$data_selecao' OR data_emissao_pedido='$data_selecao' OR data_emissao_pedido_enviado='$data_selecao' OR data_lib_financeiro='$data_selecao' OR data_lib_financeiro_enviado='$data_selecao' OR data_analise_critica='$data_selecao' OR data_analise_critica_enviado='$data_selecao'"; }


if ( $pendencias == "checked" ) { $pendencias = "AND pendencias='OK'" ;} else { $pendencias = "AND pendencias=''" ;}
//echo "pendencias = ".$pendencias; 


//CONECTA COM O MYSQL
$conn   =   mysql_connect($servidor, $usuario, $senha);
$db     =   mysql_select_db($bd, $conn);    
$sql    =   mysql_query("SELECT * FROM pcp_pedido WHERE id>='0' $sql $pendencias ORDER BY data_entrega", $conn);
$row    =   mysql_num_rows($sql);           

//	echo "row = ".$row;  echo "<br>";


//VERIFICA SE RETORNOU ALGUMA LINHA
	if(!$row) { echo "N�o retornou nenhum registro"; die; }
	

//CALCULA QUANTAS P�GINAS V�O SER NECESS�RIAS
	$num_paginas_pdf   =  ceil($row/$dados_por_pagina_pdf);  
//	echo "<br>";  echo "calc. num_paginas_pdf = ".$num_paginas_pdf;   
	    

//PREPARA PARA GERAR O PDF
	define('FPDF_FONTPATH','./font/');
	require('fpdf.php');        
	$pdf = new FPDF();

//INICIALIZA AS VARI�VEIS
	$linha_atual_pdf = 0; $linha_inicio_pdf = 0;


//P�GINAS
	for($x = 1; $x <= $num_paginas_pdf; $x++) {
	  
//	echo "<br><br>";  echo "row = ".$row;  
	
//	echo "<br>";  echo "pag. = ".$x; 
	
	
//VERIFICAR DADOS
   $linha_inicio_pdf = $linha_atual_pdf;   
//   echo "<br>"; echo "linha_inicio_pdf = ".$linha_inicio_pdf;  

//   echo "<br>"; echo "come�a linha_fim_pdf = ".$linha_fim_pdf;     
   $linha_fim_pdf = $linha_atual_pdf + $dados_por_pagina_pdf;    
//   echo "<br>"; echo "depois linha_fim_pdf = linha_atual_pdf + dados_por_pagina_pdf =".$linha_fim_pdf;  
   
   
   if($linha_fim_pdf > $row) $linha_fim_pdf = $row; 
//   echo "<br>"; echo "compara linha_fim_pdf > row = ".$linha_fim_pdf;  echo "<br>"; 
  
   $pdf->Open();                    
   $pdf->AddPage($pag_largura,$pag_altura);
                    
//MONTA O CABE�ALHO              
   $pdf->SetFont("Arial", "B", $fonte_cabecalho);
   $pdf->Ln(2);
   $pdf->Cell(40, -15, "Data Impress�o $data_emissao_hoje" , 0, 0, 'C');  
   $pdf->Cell(200, -15, "Impress�o Pedido" , 0, 0, 'C');    
   $pdf->Cell(40, -15, "P�g. $x de $num_paginas_pdf", 0, 0, 'R'); 
         
   
//QUEBRA DE LINHA
   $pdf->SetFont("Arial", "B", $fonte_texto);
   $pdf->Ln(-5); 
          
   $pdf->Cell(40, 6, "CLIENTE", 1, 0, 'C'); 
   
   $pdf->Cell(30, 6, "OC/REF.", 1, 0, 'C');
   
   $pdf->Cell(20, 6, "C�PIA", 1, 0, 'C');
   $pdf->Cell(20, 6, "C�PIA ENV.", 1, 0, 'C');
   
   $pdf->Cell(20, 6, "EMISS�O", 1, 0, 'C'); 
   $pdf->Cell(25, 6, "EMISS�O ENV.", 1, 0, 'C');
   
   $pdf->Cell(20, 6, "FINAN.", 1, 0, 'C');
   $pdf->Cell(20, 6, "FINAN. ENV.", 1, 0, 'C');
   
   $pdf->Cell(28, 6, "AN�LISE CR�TICA", 1, 0, 'C');
   $pdf->Cell(33, 6, "AN�LISE CR�TICA ENV.", 1, 0, 'C');
      
   $pdf->Cell(20, 6, "PEND�NCIAS", 1, 1, 'C');
       
     
//EXIBE OS REGISTROS      
   for($i = $linha_inicio_pdf; $i < $linha_fim_pdf; $i++) {
    
//NOME CLIENTE
   $nome_cliente = mysql_result($sql, $i, "nome_cliente"); 
   $pdf->SetFont("Arial", "B", $fonte_texto);    
   $pdf->Cell(40, 4, $nome_cliente, 1, 0, 'C');  
     	
   $pdf->SetFont("Arial", "B", $fonte_texto);
   $pdf->Cell(30, 4, mysql_result($sql, $i, "oc_obra"), 1, 0, 'C');
   
   $data_copia = mysql_result($sql, $i, "data_copia");
   $dia_data_copia = substr($data_copia, -2); 
   $mes_data_copia = substr($data_copia, -5,2);
   $ano_data_copia = substr($data_copia, -8,2);
   $data_copia = ($dia_data_copia."/".$mes_data_copia."/".$ano_data_copia);
   
   $data_copia_enviado = mysql_result($sql, $i, "data_copia_enviado");
   $dia_data_copia_enviado = substr($data_copia_enviado, -2); 
   $mes_data_copia_enviado = substr($data_copia_enviado, -5,2);
   $ano_data_copia_enviado = substr($data_copia_enviado, -8,2);
   $data_copia_enviado = ($dia_data_copia_enviado."/".$mes_data_copia_enviado."/".$ano_data_copia_enviado);
   if ( $data_copia_enviado == "//" ) { $data_copia_enviado = "" ;}
   
//   $pdf->Cell(20, 4, mysql_result($sql, $i, "data_copia"), 1, 0, 'C');  
   $pdf->Cell(20, 4, $data_copia, 1, 0, 'C');   
//   $pdf->Cell(20, 4, mysql_result($sql, $i, "data_copia_enviado"), 1, 0, 'C');
   $pdf->Cell(20, 4, $data_copia_enviado, 1, 0, 'C');
   
   
   $data_emissao_pedido = mysql_result($sql, $i, "data_emissao_pedido");
   $dia_data_emissao_pedido = substr($data_emissao_pedido, -2); 
   $mes_data_emissao_pedido = substr($data_emissao_pedido, -5,2);
   $ano_data_emissao_pedido = substr($data_emissao_pedido, -8,2);
   $data_emissao_pedido = ($dia_data_emissao_pedido."/".$mes_data_emissao_pedido."/".$ano_data_emissao_pedido);
   
   $data_emissao_pedido_enviado = mysql_result($sql, $i, "data_emissao_pedido_enviado");
   $dia_data_emissao_pedido_enviado = substr($data_emissao_pedido_enviado, -2); 
   $mes_data_emissao_pedido_enviado = substr($data_emissao_pedido_enviado, -5,2);
   $ano_data_emissao_pedido_enviado = substr($data_emissao_pedido_enviado, -8,2);
   $data_emissao_pedido_enviado = ($dia_data_emissao_pedido_enviado."/".$mes_data_emissao_pedido_enviado."/".$ano_data_emissao_pedido_enviado);
    if ( $data_emissao_pedido_enviado == "//" ) { $data_emissao_pedido_enviado = "" ;}
   
//   $pdf->Cell(20, 4, mysql_result($sql, $i, "data_emissao_pedido"), 1, 0, 'C');    
   $pdf->Cell(20, 4, $data_emissao_pedido, 1, 0, 'C'); 
//   $pdf->Cell(25, 4, mysql_result($sql, $i, "data_emissao_pedido_enviado"), 1, 0, 'C'); 
   $pdf->Cell(25, 4, $data_emissao_pedido_enviado, 1, 0, 'C'); 
   
   
   $data_lib_financeiro = mysql_result($sql, $i, "data_lib_financeiro");
   $dia_data_lib_financeiro = substr($data_lib_financeiro, -2); 
   $mes_data_lib_financeiro = substr($data_lib_financeiro, -5,2);
   $ano_data_lib_financeiro = substr($data_lib_financeiro, -8,2);
   $data_lib_financeiro = ($dia_data_lib_financeiro."/".$mes_data_lib_financeiro."/".$ano_data_lib_financeiro);
   
   $data_lib_financeiro_enviado = mysql_result($sql, $i, "data_lib_financeiro_enviado");
   $dia_data_lib_financeiro_enviado = substr($data_lib_financeiro_enviado, -2); 
   $mes_data_lib_financeiro_enviado = substr($data_lib_financeiro_enviado, -5,2);
   $ano_data_lib_financeiro_enviado = substr($data_lib_financeiro_enviado, -8,2);
   $data_lib_financeiro_enviado = ($dia_data_lib_financeiro_enviado."/".$mes_data_lib_financeiro_enviado."/".$ano_data_lib_financeiro_enviado);
   if ( $data_lib_financeiro_enviado == "//" ) { $data_lib_financeiro_enviado = "" ;}
   
//   $pdf->Cell(20, 4, mysql_result($sql, $i, "data_lib_financeiro"), 1, 0, 'C');  
   $pdf->Cell(20, 4, $data_lib_financeiro, 1, 0, 'C');  
//   $pdf->Cell(20, 4, mysql_result($sql, $i, "data_lib_financeiro_enviado"), 1, 0, 'C'); 
   $pdf->Cell(20, 4, $data_lib_financeiro_enviado, 1, 0, 'C'); 
   
   
   $data_analise_critica = mysql_result($sql, $i, "data_analise_critica");
   $dia_data_analise_critica = substr($data_analise_critica, -2); 
   $mes_data_analise_critica = substr($data_analise_critica, -5,2);
   $ano_data_analise_critica = substr($data_analise_critica, -8,2);
   $data_analise_critica = ($dia_data_analise_critica."/".$mes_data_analise_critica."/".$ano_data_analise_critica);
   
   $data_analise_critica_enviado = mysql_result($sql, $i, "data_analise_critica_enviado");
   $dia_data_analise_critica_enviado = substr($data_analise_critica_enviado, -2); 
   $mes_data_analise_critica_enviado = substr($data_analise_critica_enviado, -5,2);
   $ano_data_analise_critica_enviado = substr($data_analise_critica_enviado, -8,2);
   $data_analise_critica_enviado = ($dia_data_analise_critica_enviado."/".$mes_data_analise_critica_enviado."/".$ano_data_analise_critica_enviado);
   if ( $data_analise_critica_enviado == "//" ) { $data_analise_critica_enviado = "" ;}
   
//   $pdf->Cell(28, 4, mysql_result($sql, $i, "data_analise_critica"), 1, 0, 'C');
   $pdf->Cell(28, 4, $data_analise_critica, 1, 0, 'C');
//   $pdf->Cell(33, 4, mysql_result($sql, $i, "data_analise_critica_enviado"), 1, 0, 'C');
   $pdf->Cell(33, 4, $data_analise_critica_enviado, 1, 0, 'C');

   $pdf->Cell(20, 4, mysql_result($sql, $i, "pendencias"), 1, 1, 'C');


   $pdf->SetFont("Arial", "B", $fonte_texto); 
     
   $linha_atual_pdf++; 
   
   }//FECHA FOR(REGISTROS - i)
}//FECHA FOR(PAGINAS - x)   

//SAIDA DO PDF
$pdf->Output("$end_final", "$tipo_pdf");//$pdf->Output();


?>