<?
###################################################
#                    ELTON                        #
#                                                 #
# Tela:         Função de datas					  #
# Rotina:       Retorna diferença entre duas datas#
# Desenvovedor: Elton Baroncello - elb            #
# e-mail 	  : eltonbaroncello@gmail.com		  #
# Criado:       06/11/2007                        #
# Atualizado:   07/11/2007                        #
#                                                 #
###################################################

function data_diff($datafim,$datainicio){

/**/
	
	# Arquivo de Conexão com banco de dados
	include "econ.php";
	
	#comando SQL que calcula diferença entra duas datas
	$comando = "SELECT TIMEDIFF( '$datafim', '$datainicio' ) AS diferencadatainiciofimf";
	$dtquery = mysql_query($comando,$ICON);
	$_matriz = mysql_fetch_array($dtquery);

echo "total diferenca data inicio e fim = ".	$diferencadatainiciofim = $_matriz['diferencadatainiciofimf']; echo "<br>"; 

	# Organiza os valores e monta a resposta
	$_separa = explode(":",$diferencadatainiciofim);

echo "total direfenca em hora = ". $direfencahora = $_separa['0']; echo "<br>"; 
echo "total direfenca em min = ".	$direfencamin = $_separa['1'];	echo "<br>";
echo "total direfenca em seg = ". $direfencasegf = $_separa['2'];	echo "<br>";	echo "<br>";

echo "sabado e domingo = ". $sabadodomingo = $sabadodomingo;	echo "<br>";
echo "direfencahora - sabado e domingo = ".	$direfencahora = $direfencahora - $sabadodomingo;	echo "<br>";	echo "<br>";


# Atribui a varial $dia_diff 0 número de dias inteiros
	if($direfencahora>='24')
		{
$hora_restante = $direfencahora % 24;
echo "hora_restante = ". $hora_restante; echo "<br>";

$hora_dia_restante = $direfencahora - $hora_restante;
echo "hora_dia_restante = ". $hora_dia_restante; echo "<br>";

$hora_em_dia = ($hora_dia_restante / 24) - $sabadodomingo;
echo "hora_em_dia = ".	$hora_em_dia; echo "<br>";

$direfencahora = $hora_restante; echo "<br>";
echo "direfencahora = ". $direfencahora; echo "<br>";	echo "<br>";
		}
		
		
//VARIAVEIS

//DIAS DO FOR DA DATA PROGR.
$dias_inicial = 0;	
//$dias_prog = 4;
//$dias_prog = $dias_prog - 1;    
$dias_prog = $hora_em_dia;

$sabadodomingo = 0;  
	

// FOR SOMAR DIAS	------------------------------------------------
	for ( $dias=$dias_inicial; $dias<=$dias_prog; $dias++ )	{
  
// DESCOBRI DIA, MES E ANO DA DATA PROGR. DIARIA  ------------------------------------------------
$dia = 14; $mes = "08"; $ano = 2008;


// FOR DESCOBRI DIA DA SEMANA	------------------------------------------------
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
  
// Monta Saída ----------------------------------------------------------------
	$data_programada = $dia."/".$mes."/".$ano; 

//	echo "data_programada = ". $data_programada; echo "<br>"; 

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
        
		echo "dia_semana = ".$dia_semana; echo "<br>"; 
//-----------------------------------------------------------------------------------------


//QUANDO NÃO FOR SABADO OU DOMINGO 
	if ( $dia_semana <> "Sábado" AND $dia_semana <> "Domingo"  ) 
{ 
	echo "nao tem sabado e domingo"; echo "<br>"; echo "<br>"; echo "<br>";
}
//QUANDO NÃO FOR SABADO OU DOMINGO 

else
//QUANDO FOR SABADO OU DOMINGO
{
   echo "tem sabado e domingo"; echo "<br>"; 
   echo "sabadodomingo = ". $sabadodomingo = $sabadodomingo + 1; echo "<br>"; echo "<br>";
   $dias_prog = $dias_prog + 1;   
}
//QUANDO FOR SABADO OU DOMINGO 


}//FECHAR FOR SOMAR DIAS (dias)	


echo "sabado e domingo = ". $sabadodomingo = $sabadodomingo;	echo "<br>";
echo "direfencahora - sabado e domingo = ".	$direfencahora = $direfencahora - $sabadodomingo;	echo "<br>";	echo "<br>";


# Atribui a varial $dia_diff 0 número de dias inteiros
	if($direfencahora>='24')
		{
echo "hora_restante = ". $hora_restante = $direfencahora % 24; echo "<br>";
echo "hora_dia_restante = ". $hora_dia_restante = $direfencahora - $hora_restante; echo "<br>";
echo "hora_em_dia = ".	$hora_em_dia = ($hora_dia_restante / 24) - $sabadodomingo; echo "<br>";
//echo "direfencahora = ". 
$direfencahora = $hora_restante; echo "<br>";	echo "<br>";
		}
		

/*
		
	# Segundos
	$count = 0;
	if($direfencasegf=='0')
		{
		$res_diff = '';
		$segundos_set = 'no';
		}
	elseif($direfencasegf=='1')
		{
		$count = $count+1;
		$res_diff = '1 segundo';
		$segundos_set = 'yes';
		}
	else
		{
		$count = $count+1;
		$res_diff = "$direfencasegf segundos";
		$segundos_set = 'yes';
		}

echo "res_diff = ". $res_diff; echo "<br>";

	# Minutos
	if($direfencamin=='0')
		{
		if($res_diff=='')
			{
			$res_diff = '';
			$minutos_set = 'no';
			}
		}
	elseif($direfencamin=='1')
		{
		if($res_diff=='')
			{
			$res_diff = '1 minuto';
			$minutos_set = 'yes';
			$count = $count+1;
			}
		else
			{
			$res_diff = "1 minuto e $res_diff";
			$minutos_set = 'yes';
			$count = $count+1;
			}
		}
	else
		{
		if($res_diff=='')
			{
			$res_diff = "$direfencamin minutos";
			$minutos_set = 'yes';
			$count = $count+1;
			}
		else
			{
			$res_diff = "$direfencamin minutos e $res_diff";
			$minutos_set = 'yes';
			$count = $count+1;
			}
		}
		
echo "res_diff = ". $res_diff; echo "<br>";


	# Horas
	if($direfencahora=='0')
		{
		if($res_diff=='')
			{
			$res_diff = '';
			$horas_set = 'no';
			}
		}
	elseif($direfencahora=='1')
		{
		if($res_diff=='')
			{
			$res_diff = '1 hora';
			$horas_set = 'yes';
			$count = $count+1;
			}
		else
			{
			if($count>1)
				{
				$res_diff = "1 hora, $res_diff";
				$horas_set = 'yes';
				$count = $count+1;
				}
			else
				{
				$res_diff = "1 hora e $res_diff";
				$horas_set = 'yes';
				$count = $count+1;
				}
			}
		}
	else
		{
		if($res_diff=='')
			{
			$res_diff = "$direfencahora horas";
			$horas_set = 'yes';
			$count = $count+1;
			}
		else
			{
			if($count>1)
				{
				$res_diff = "$direfencahora horas, $res_diff";
				$horas_set = 'yes';
				$count = $count+1;
				}
			else
				{
				$res_diff = "$direfencahora horas e $res_diff";
				$horas_set = 'yes';
				}
			}
		}

echo "res_diff = ". $res_diff; echo "<br>";
		
	# Dias
	if($hora_em_dia=='')
		{
		if($res_diff=='')
			{
			$res_diff = '';
			}
		}
	elseif($hora_em_dia=='1')
		{
		if($res_diff=='')
			{
			$res_diff = '1 dia';
			$count = $count+1;
			}
		else
			{
			if($count>1)
				{
				$res_diff = "1 dia, $res_diff";
				$count = $count+1;
				}
			else
				{
				$res_diff = "1 dia e $res_diff";
				$count = $count+1;
				}
			}
		}
	else
		{
		if($res_diff=='')
			{
			$res_diff = "$hora_em_dia dias";
			$count = $count+1;
			}
		else
			{
			if($count>1)
				{
				$res_diff = "$hora_em_dia dias, $res_diff";
				$count = $count+1;
				}
			else
				{
				$res_diff = "$hora_em_dia dias e $res_diff";
				$count = $count+1;
				}
			}
		}

echo "res_diff = ". $res_diff; echo "<br>"; echo "<br>";

	return $res_diff;
*/


	} // fechamento da função


# sintax data_diff('datamaior','datamenor');
# as datas estão no formato aaaa-mm-dd hh:mm:ss como mostra abaixo

//echo "datainicio = ". 
$datainicio = "2008-08-14"; //echo "<br>"; 
$dia_datainicio = substr($datainicio, -2);   
$mes_datainicio = substr($datainicio, -5,2);  
$ano_datainicio = substr($datainicio, -10,4); 
$datainicio_ver = ($dia_datainicio."/".$mes_datainicio."/".$ano_datainicio); 
//echo "horainicio = ". 
$horainicio = "10:00:00"; //echo "<br>"; 
echo "datahorainicio = ". $datahorainicio = $datainicio_ver." ".$horainicio; echo "<br>";


//echo "datafim = ". 
$datafim = "2008-08-18"; //echo "<br>";
$dia_datafim = substr($datafim, -2);   
$mes_datafim = substr($datafim, -5,2);  
$ano_datafim = substr($datafim, -10,4); 
$datafim_ver = ($dia_datafim."/".$mes_datafim."/".$ano_datafim); 
//echo "horafim = ". 
$horafim = "12:20:40"; //echo "<br>"; 
echo "datahorafim = ". $datahorafim = $datafim_ver." ".$horafim; echo "<br>";

echo $resultado = data_diff('2008-08-18 12:20:40','2008-08-14 10:00:00'); 	echo "<br>"; echo "<br>";
//echo $resultado = data_diff('$datahorafim','$datahorainicio'); 	echo "<br>"; echo "<br>";

echo "Atendimento enviado $resultado atraz";



?>