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

function data_diff($DataDiffMaior,$DataDiffMenor){
	
	# Arquivo de Conexão com banco de dados
	include "econ.php";
	
	#comando SQL que calcula diferença entra duas datas
	$comando = "SELECT TIMEDIFF( '$DataDiffMaior', '$DataDiffMenor' ) AS datadiff";
	$dtquery = mysql_query($comando,$ICON);
	$_matriz = mysql_fetch_array($dtquery);
	$datadif = $_matriz['datadiff'];

	# Organiza os valores e monta a resposta
	$_separa = explode(":",$datadif);

	$hor_diff = $_separa['0'];
	$min_diff = $_separa['1'];
	$seg_diff = $_separa['2'];
	
	# Atribui a varial $dia_diff 0 número de dias inteiros
	if($hor_diff>='24')
		{
		$hor_rest = $hor_diff % 24;
		$hor_dias = $hor_diff-$hor_rest;
		$dia_diff = $hor_dias/24;
		$hor_diff = $hor_rest;
		}
		
	# Segundos
	$count = 0;
	if($seg_diff=='0')
		{
		$res_diff = '';
		$segundos_set = 'no';
		}
	elseif($seg_diff=='1')
		{
		$count = $count+1;
		$res_diff = '1 segundo';
		$segundos_set = 'yes';
		}
	else
		{
		$count = $count+1;
		$res_diff = "$seg_diff segundos";
		$segundos_set = 'yes';
		}

	# Minutos
	if($min_diff=='0')
		{
		if($res_diff=='')
			{
			$res_diff = '';
			$minutos_set = 'no';
			}
		}
	elseif($min_diff=='1')
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
			$res_diff = "$min_diff minutos";
			$minutos_set = 'yes';
			$count = $count+1;
			}
		else
			{
			$res_diff = "$min_diff minutos e $res_diff";
			$minutos_set = 'yes';
			$count = $count+1;
			}
		}
		
	# Horas
	if($hor_diff=='0')
		{
		if($res_diff=='')
			{
			$res_diff = '';
			$horas_set = 'no';
			}
		}
	elseif($hor_diff=='1')
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
			$res_diff = "$hor_diff horas";
			$horas_set = 'yes';
			$count = $count+1;
			}
		else
			{
			if($count>1)
				{
				$res_diff = "$hor_diff horas, $res_diff";
				$horas_set = 'yes';
				$count = $count+1;
				}
			else
				{
				$res_diff = "$hor_diff horas e $res_diff";
				$horas_set = 'yes';
				}
			}
		}
		
	# Dias
	if($dia_diff=='')
		{
		if($res_diff=='')
			{
			$res_diff = '';
			}
		}
	elseif($dia_diff=='1')
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
			$res_diff = "$dia_diff dias";
			$count = $count+1;
			}
		else
			{
			if($count>1)
				{
				$res_diff = "$dia_diff dias, $res_diff";
				$count = $count+1;
				}
			else
				{
				$res_diff = "$dia_diff dias e $res_diff";
				$count = $count+1;
				}
			}
		}
	return $res_diff;
	}


# sintax data_diff('datamaior','datamenor');
# as datas estão no formato aaaa-mm-dd hh:mm:ss como mostra abaixo

$resultado = data_diff('2008-08-18 15:27:10','2008-08-18 10:30:00'); 
echo "<br>";

echo "Atendimento enviado $resultado atraz";



?>