<body onunload="window.opener.location.reload()">
	
	

<?php
if($_POST['user']) {
	
include "../Config/config_sistema.php";
header( "Content-type: text/html; charset=utf-8" ); 

$login = $_POST['user'];
//$login = base64_decode($login);
$id= $_POST['duelo'];
$ip= $_SERVER['REMOTE_ADDR'];  

//echo $login+" ";
$consulta = mysql_query("select votos1, votos2,ID1,ID2,
d1.Login as Login1, 
d1.video as video1,
d1.talento as talento1,
d2.Login as Login2, 
d2.video as video2,
d2.talento as talento2
from duelos as du , dados_usuarios as d1 , dados_usuarios as d2
where 
d1.ID = du.ID1 and  d2.ID = du.ID2 and
du.IDduelos=$id");

$control = true;

$ipnovo = mysql_query("select * from votacao where  idDuelos=$id");



while($linhas = mysql_fetch_object($ipnovo)) {
	$control = false;
	break;
}

if($control){
		$sql = "INSERT INTO votacao (`idDuelos`, `IP`) VALUES ('$id', '$ip');";
		
		// faz consulta para atualizar os dados
		$consulta1 = mysql_query($sql);
}


while($linhas = mysql_fetch_object($consulta)) {

	if($login==$linhas->ID1)
	{
		$voto=$linhas->votos1;
		$voto=$voto+1;
		$usuario = $linhas->Login1;
		$sql = "update duelos, votacao set votos1 = $voto , votacao.IP = '$ip' where duelos.IDduelos=votacao.idDuelos  and duelos.idDuelos=$id";

		// faz consulta para atualizar os dados
		$consulta1 = mysql_query($sql);
		
	}
	if($login==$linhas->ID2)
	{
		$voto=$linhas->votos2;
		$voto=$voto+1;
		
		$usuario = $linhas->Login2;
		$sql = "update duelos, votacao set duelos.votos2 = $voto, votacao.IP = '$ip' where votacao.idDuelos=duelos.IDduelos AND votacao.idDuelos=$id";

		// faz consulta para atualizar os dados
		$consulta1 = mysql_query($sql);
		
	}
	
}

}
if($consulta1) {
			echo "<font color=green>
		  	Voto em <b>$usuario</b> computado com sucesso! <br>
		  	</font>";
			
		} 
		else 
		{
			echo $teste." ".$sql."<font color=red><b>
		  	Erro na votação! POR FAVOR TENTE NOVAMENTE <br>
		  	</font></b>";
		}
?>

<script language="javascript" type="text/javascript"> 
    //window.setTimeout("window.close()", 3000); 
</script>

	
</body>