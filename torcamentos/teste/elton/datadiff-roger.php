<?
//data inicio
$datainicio = "2008-08-01";  
$dia_datainicio = substr($datainicio, -2);   
$mes_datainicio = substr($datainicio, -5,2);  
$ano_datainicio = substr($datainicio, -10,4); 
echo "datainicio = ". $datainiciover = $dia_datainicio."/".$mes_datainicio."/".$ano_datainicio; echo "<br>"; 
//echo "datainicio = ". $datainicio; echo "<br>"; 
//hora inicio
$horainicio = "14:00:00"; 
echo "horainicio = ". $horainicio; echo "<br>"; 


echo "<br>";


//data fim
$datafim = "2008-08-21";  
$dia_datafim = substr($datafim, -2);   
$mes_datafim = substr($datafim, -5,2);  
$ano_datafim = substr($datafim, -10,4); 
echo "datafim = ". $datafimver = $dia_datafim."/".$mes_datafim."/".$ano_datafim; echo "<br>"; 
//echo "datafim = ". $datafim; echo "<br>";
//hora fim
$horafim = "10:53:02"; 
echo "horafim = ". $horafim; echo "<br>"; 


echo "<br>"; 


//datahora inicio junto
$datahorainicio = $datainicio." ".$horainicio;
//echo "datahorainicio = ". $datahorainicio; echo "<br>"; 
//datahora fim junto
$datahorafim = $datafim." ".$horafim;
//echo "datahorafim = ". $datahorafim; echo "<br>"; 

echo "<br>"; 


//começa a funçao


	# Arquivo de Conexão com banco de dados
	include "econ.php";
	
	#comando SQL que calcula diferença entra duas datas
	$comando = "SELECT TIMEDIFF( '$datahorafim', '$datahorainicio' ) AS datadiff";
	$dtquery = mysql_query($comando,$ICON);
	$_matriz = mysql_fetch_array($dtquery);
	$datadif = $_matriz['datadiff'];

	# Organiza os valores e monta a resposta
	$_separa = explode(":",$datadif);

	$dif_horas = $_separa['0'];       
	echo "diferença entre horas data inicio e fim = ". $dif_horas; echo "<br>"; 
	
	$dif_min = $_separa['1'];		  
	echo "diferença entre minutos data inicio e fim = ". $dif_min; echo "<br>"; 
	
	$dif_seg = $_separa['2'];         
	echo "diferença entre segundos data inicio e fim = ". $dif_seg; echo "<br>"; 
	
echo "<br>"; 


	
	# Atribui a varial $diferenca_dia 0 número de dias inteiros
	if($dif_horas>='24')
		{
		//horas restantes
		$hora_restante = $dif_horas % 24; 			  
		echo "hora_restante = ". $hora_restante; echo "<br>"; 
		
		//deixas horas en dias valor inteiro
		$dias_em_horas = $dif_horas - $hora_restante;  
		echo "dias em horas = ". $dias_em_horas; echo "<br>"; 
		
		//diferença em dia ( horas em dias / 24 )
		$diferenca_dia = ( $dias_em_horas / 24 ) - $sabadodomingo; 			  
		echo "total de dias = ". $diferenca_dia; echo "<br>"; 
				
		$diferenca_horas = $hora_restante; 			      
		echo "dif_horas = ". $diferenca_horas; echo "<br>"; 

//VARIAVEIS                 
//DIAS DO FOR DA DATA PROGR.
$dias_inicial = 0;	
$dias_prog = $diferenca_dia;
$dias_prog = $dias_prog - 1;               	
                    	
// FOR SOMAR DIAS
	for ( $dias=$dias_inicial; $dias<=$dias_prog; $dias++ )	{
  

// DESCOBRI DIA, MES E ANO DA DATA PROGR. DIARIA
$dia = $dia_datainicio; $mes = $mes_datainicio; $ano = $mes_datainicio;


// FOR DESCOBRI DIA DA SEMANA
	for($semana = 0; $semana<$dias; $semana++) {
    
  	if($mes == "01" || $mes == "03" || $mes == "05" || $mes == "07" || $mes == "08" || $mes == "10" || $mes == "12"){
  	if($mes == 12 && $dia == 31){  $mes = 01;   $ano++;   $dia = 00;  }
  	if($dia == 31 && $mes != 12){  $mes++;  $dia = 00;   }  }//fecha if geral
  
  	if($mes == "04" || $mes == "06" || $mes == "09" || $mes == "11"){
  	if($dia == 30){  $dia = 00;   $mes++;   }   }//fecha if geral
  
  	if($mes == "02"){
  	if($ano % 4 == 0 && $ano % 100 != 0){ //ano bissexto
  	if($dia == 29){  $dia = 00;   $mes++;    }    }
  else {
  	if($dia == 28){  $dia = 00;  $mes++;   }   }  }//FECHA IF DO MÊS 2
  
  $dia++;   
  
}//FECHAR FOR DESCOBRI DIA DA SEMANA (semana)	------------------------------------------------
  
  
// Confirma Saída de 2 dígitos   ------------------------------------------------
	if(strlen($dia) == 1){$dia = "0".$dia;};
	if(strlen($mes) == 1){$mes = "0".$mes;};

	$mes_x = $mes;  
	if ($mes == 1) { $mes_x = 13; $ano = $ano-1;}
	if ($mes == 2) { $mes_x = 14; $ano = $ano-1;}
	
	$val4 = (($mes_x+1)*3)/5;
		$val4_int=number_format($val4,0,'.','');
		if ($val4 < $val4_int) {$val4 = $val4_int - 1;} else {$val4 = $val4_int;}
	$val5 = $ano/4;
   		$val5_int=number_format($val5,0,'.','');
		if ($val5 < $val5_int) {$val5 = $val5_int - 1;} else {$val5 = $val5_int;}
	$val6 = $ano/100;
   		$val6_int=number_format($val6,0,'.','');
		if ($val6 < $val6_int) {$val6 = $val6_int - 1;} else {$val6 = $val6_int;}
	$val7 = $ano/400;
   		$val7_int=number_format($val7,0,'.','');
		if ($val7 < $val7_int) {$val7 = $val7_int - 1;} else {$val7 = $val7_int;}
	$val8 = $dia+($mes_x*2)+$val4+$ano+$val5-$val6+$val7+2;
	$val9 = $val8/7;
		$val9_int=number_format($val9,0,'.','');
		if ($val9 < $val9_int) {$val9 = $val9_int - 1;} else {$val9 = $val9_int;}
	$val0 = $val8-($val9*7); 
   
		if($val0 == "0")  {$dia_semana = "Sábado";}
        if($val0 == "1")  {$dia_semana = "Domingo";}
        if($val0 == "2")  {$dia_semana = "Segunda-feira";}
		if($val0 == "3")  {$dia_semana = "Terça-feira";}
        if($val0 == "4")  {$dia_semana = "Quarta-feira";}
        if($val0 == "5")  {$dia_semana = "Quinta-feira";}
        if($val0 == "6")  {$dia_semana = "Sexta-feira";}
        
//	echo "<br>";  echo "dia_semana = ".$dia_semana;  	echo "<br>";

//-----------------------------------------------------------------------------------------


//QUANDO NÃO FOR SABADO OU DOMINGO 
if ( $dia_semana <> "Sábado" AND $dia_semana <> "Domingo"  ) 
{ 
//	echo "NÃO"; echo "<br>";
}
//QUANDO NÃO FOR SABADO OU DOMINGO 

else
//QUANDO FOR SABADO OU DOMINGO
{
//  	echo "SABADO E DOMINGO"; echo "<br>"; 	
	$sabadodomingo = $sabadodomingo + 1;
   //$dias_prog = $dias_prog + 1; 
}
//QUANDO FOR SABADO OU DOMINGO 


}//FECHAR FOR SOMAR DIAS (dias)	
echo "<br>";
echo "quantidade de sabado e domingo = " .$sabadodomingo;  echo "<br>"; 

$horas_sabadodomingo = $sabadodomingo * 24;
echo "quantidade horas de sabado e domingo = " .$horas_sabadodomingo; echo "<br>"; echo "<br>";

		}	# Atribui a varial $diferenca_dia 0 número de dias inteiros
		
		
		
	# Atribui a varial $diferenca_dia 0 número de dias inteiros
	if($dif_horas>='24')
		{
		//horas restantes
		$hora_restante = $dif_horas % 24; 			  
//		echo "hora_restante = ". $hora_restante; echo "<br>"; 
		
		//deixa horas em dias valor inteiro
		$dias_em_horas = $dif_horas - $hora_restante;  
		echo "dias em horas total = ". $dias_em_horas; echo "<br>"; 
		
		//diferença em dia ( horas em dias / 24 )
		$diferenca_dia_total = ( $dias_em_horas / 24 ); 			  
		echo "dias totais mais sábado e domingo = ". $diferenca_dia_total; echo "<br>"; echo "<br>"; 
		
		
// valores finais 

		//deixa horas dos dias certos em valor inteiro		
		$dias_em_horas_certos = $dias_em_horas - $horas_sabadodomingo;
		echo "dias em horas menos sábado e domingo = ". $dias_em_horas_certos; echo "<br>"; 
		
		//diferença em dia ( horas em dias / 24 ) - sabadodomingo
		$diferenca_dia = ( $dias_em_horas / 24 ) - $sabadodomingo; 			  
		echo "dias menos sábado e domingo = ". $diferenca_dia; echo "<br>"; 
						
		$dif_horas = $hora_restante; 			      
		echo "diferença em horas = ". $dif_horas; echo "<br>"; 
		
		echo "diferença entre minutos = ". $dif_min; echo "<br>"; 

		echo "diferença entre segundos  = ". $dif_seg; echo "<br>"; 

// valores finais 		
		
		}
	# Atribui a varial $diferenca_dia 0 número de dias inteiros

	# Segundos
	$count = 0;
	if($dif_seg=='0')
		{
		$resposta_final = '';
		$segundos_set = 'no';
		}
	elseif($dif_seg=='1')
		{
		$count = $count+1;
		$resposta_final = '1 segundo';
		$segundos_set = 'yes';
		}
	else
		{
		$count = $count+1;
		$resposta_final = "$dif_seg segundos";
		$segundos_set = 'yes';
		}

	# Minutos
	if($dif_min=='0')
		{
		if($resposta_final=='')
			{
			$resposta_final = '';
			$minutos_set = 'no';
			}
		}
	elseif($dif_min=='1')
		{
		if($resposta_final=='')
			{
			$resposta_final = '1 minuto';
			$minutos_set = 'yes';
			$count = $count+1;
			}
		else
			{
			$resposta_final = "1 minuto e $resposta_final";
			$minutos_set = 'yes';
			$count = $count+1;
			}
		}
	else
		{
		if($resposta_final=='')
			{
			$resposta_final = "$dif_min minutos";
			$minutos_set = 'yes';
			$count = $count+1;
			}
		else
			{
			$resposta_final = "$dif_min minutos e $resposta_final";
			$minutos_set = 'yes';
			$count = $count+1;
			}
		}
		
	# Horas
	if($dif_horas=='0')
		{
		if($resposta_final=='')
			{
			$resposta_final = '';
			$horas_set = 'no';
			}
		}
	elseif($dif_horas=='1')
		{
		if($resposta_final=='')
			{
			$resposta_final = '1 hora';
			$horas_set = 'yes';
			$count = $count+1;
			}
		else
			{
			if($count>1)
				{
				$resposta_final = "1 hora, $resposta_final";
				$horas_set = 'yes';
				$count = $count+1;
				}
			else
				{
				$resposta_final = "1 hora e $resposta_final";
				$horas_set = 'yes';
				$count = $count+1;
				}
			}
		}
	else
		{
		if($resposta_final=='')
			{
			$resposta_final = "$dif_horas horas";
			$horas_set = 'yes';
			$count = $count+1;
			}
		else
			{
			if($count>1)
				{
				$resposta_final = "$dif_horas horas, $resposta_final";
				$horas_set = 'yes';
				$count = $count+1;
				}
			else
				{
				$resposta_final = "$dif_horas horas e $resposta_final";
				$horas_set = 'yes';
				}
			}
		}
		
	# Dias
	if($diferenca_dia=='')
		{
		if($resposta_final=='')
			{
			$resposta_final = '';
			}
		}
	elseif($diferenca_dia=='1')
		{
		if($resposta_final=='')
			{
			$resposta_final = '1 dia';
			$count = $count+1;
			}
		else
			{
			if($count>1)
				{
				$resposta_final = "1 dia, $resposta_final";
				$count = $count+1;
				}
			else
				{
				$resposta_final = "1 dia e $resposta_final";
				$count = $count+1;
				}
			}
		}
	else
		{
		if($resposta_final=='')
			{
			$resposta_final = "$diferenca_dia dias";
			$count = $count+1;
			}
		else
			{
			if($count>1)
				{
				$resposta_final = "$diferenca_dia dias, $resposta_final";
				$count = $count+1;
				}
			else
				{
				$resposta_final = "$diferenca_dia dias e $resposta_final";
				$count = $count+1;
				}
			}
	  }

	
// terminou a funçao

		echo "<br>"; echo "<br>"; echo "<br>"; 
		
		echo "DIFERENÇA TEMPO DATA INICIO E FIM = ".$resposta_final;

?>
