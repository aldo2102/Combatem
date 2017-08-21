<?php


$login=$_SESSION['nomeLogin'];

$consulta = mysql_query("select * from dados_usuarios where Login = '$login'");

while($linhas = mysql_fetch_object($consulta)) 
{
	
	mkdir("usuario/fotos/".$linhas->ID, 0777);
	$de = "usuario/fotos/uni/avatar.jpeg";
  	$para = 'usuario/fotos/'.$linhas->ID.'/'.$linhas->ID.'.jpeg';
  	copy($de, $para);
	

	if($consulta) {
		echo "Lembre-se de atualizar seu avatar";
	}
	 else {
		echo "Lembre-se de atualizar seu avatar";
	}
	break;
}
?>