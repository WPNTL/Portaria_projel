<?php
include "valida_sessao.php" ; include "config_orcamento.php"; include "calculo_tempo.php";



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

//		echo "<br>"; echo "<br>"; echo "<br>"; 
		
//		echo "DIFERENÇA TEMPO DATA INICIO E FIM = ".$resposta_final;
		
//		echo "<br>"; echo "<br>"; echo "<br>";
		
//		echo "dias final = ". $diferenca_dia; echo "<br>";
//		echo "horas final = ". $dif_horas; echo "<br>";
	//	echo "minutos final = ". $dif_min; echo "<br>";
//		echo "segundos final = ". $dif_seg; echo "<br>";

//	include "config_orcamento.php"; 
					
			
			// usuário tiver permissão de alteração nas datas da solicitação



?>