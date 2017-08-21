<?php
function gerarDuelo(){
$sql="select *
from dados_usuarios as d1
where d1.vaiDuelar='0' and
(d1.video <> '') and d1.ID NOT IN (
select distinct ID
from dados_usuarios as d1 join  duelos as du on (d1.ID = du.ID2 or d1.ID =du.ID1 ))
order by d1.talento desc";


	$consulta = @mysql_query($sql);
	$ii=0;
	$controle=false;
	while($linhas = mysql_fetch_object($consulta)) {
	    $IDs[$ii]=$linhas->ID;
	    $nomes[$ii]=$linhas->Nome;
	    $email[$ii]=$linhas->Email;
	    $talentos[$ii]=$linhas->talento;
	    $controle=true;
	    $ii++;
	}
		$j=0;
		include_once("vendor/phpmailer/phpmailer/email.php");
		$ii--;
	
	while($j<=count($IDs)-1 && $controle){
		

		while($ii>-1){
			
			$i=mt_rand(0, $ii);
			if($talentos[$i]==$talentos[$j] && $IDs[$i]!=$IDs[$j]){
					
				
					$sql="select ID1,ID2, data,  
from (select h.ID1,h.ID2,(TIME_TO_SEC(TIMEDIFF(CURRENT_TIMESTAMP,h.dataFinal))/60) as h.dataFinal
from historico_duelos as h, duelos as d  
where h.ID1=$IDs[$i] or h.ID2=$IDs[$i] order by h.id desc limit 1) historico 
where ID1=$IDs[$j] or historico.ID2=$IDs[$j]";
					
					$controle2=true;
					$consulta = @mysql_query($sql);
					while($linhas = mysql_fetch_object($consulta)) {
						if(($linhas->ID1==$IDs[$j] || $linhas->ID2==$IDs[$j])){
							
							$controle2=false;
						}
						if(intval($linhas->data)>7200){
							$controle2=true;
						}
						
					}
		
				if($controle2){
					
					$consulta = @mysql_query($sql);
					$insert="INSERT INTO `duelos` ( `ID1`, `votos1`, `ID2`, `votos2`,`data`) VALUES ( '$IDs[$i]', '0', '$IDs[$j]', '0', NOW());";
					@mysql_query($insert);
					
					if(rand(0, 1)==1){
						$ordem="desc";
					}
					else{
						$ordem="ASC";
					}
					$sql="select *
					from duelos as d
					order by d.IDduelos $ordem
					limit 1";
					
					$consulta=@mysql_query($sql);
					while($linhas = mysql_fetch_object($consulta)) {
						$idDuelo=$linhas->IDduelos;
					}
					
					$insert="INSERT INTO historico_duelos (idDuelo, `ID1`, `ID2`,`dataInicio`) VALUES ( $idDuelo, '$IDs[$i]', '$IDs[$j]', NOW());";
					
					email($nomes[$i],$email[$i],$idDuelo);
					email($nomes[$j],$email[$j],$idDuelo);
					
					@mysql_query($insert);
					unset($IDs[$i]);
					unset($talentos[$i]);
					unset($IDs[$j]);
					unset($talentos[$j]);
					//echo "<br> tamanho ".count($IDs). " ".count($talentos);
					
					
				}
			
			
			}
			else{
				$ii--;
			}
			
		}
		
			$ii=count($IDs);
			$j++;
	}
	if($controle2)
	    header("Refresh:0");
}

function apagarDuelo(){
	
	$sqlSelect="select *
			from duelos 
			where (TIME_TO_SEC(TIMEDIFF(CURRENT_TIMESTAMP,data))/60)>4320";
			//echo $sqlSelect;
	$consultaLimite = @mysql_query($sqlSelect) or die('Erro: ' . mysql_error());
	while($linhas = mysql_fetch_object($consultaLimite)){
		$IDDuelo=$linhas->IDduelos;
		$ID1=$linhas->ID1;
		$ID2=$linhas->ID2;
		$votos1=$linhas->votos1;
		$votos2=$linhas->votos2;
		
			if($votos1>$vontos2){
				$ponto1="+1";
				$ponto2="-1";
			}
			if($votos2>$vontos1){
				$ponto2="+1";
				$ponto1="-1";
			}
			if($votos2==$vontos1){
				$ponto2="+1";
				$ponto1="+1";
			}
		$sqlUpdate="UPDATE  dados_usuarios as d SET  d.total_votos =  d.total_votos+$votos1, d.pontos = d.pontos $ponto1 WHERE d.ID =$ID1";
		$consulta = @mysql_query($sqlUpdate);

		$sqlUpdate="UPDATE  dados_usuarios as d SET  d.total_votos =  d.total_votos+$votos2, d.pontos = d.pontos $ponto2  WHERE d.ID =$ID2";
		$consulta = @mysql_query($sqlUpdate);

		$sqlUpdate="UPDATE  historico_duelos as h SET  h.votos1 =  $votos1, h.votos2 =  $votos2, h.dataFinal=NOW()  WHERE h.idDuelo = $IDDuelo";
		//echo $sqlUpdate;
		$consulta = @mysql_query($sqlUpdate);
		
		$sqlDelete="delete from duelos WHERE IDduelos = $IDDuelo"; 
		$consulta = @mysql_query($sqlDelete);
		
	}
			
			//echo $sql;
			
				
}
?>