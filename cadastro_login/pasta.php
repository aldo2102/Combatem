<?php

include "../Config/config_sistema.php";

$login=$_GET['login'];

$consulta = mysql_query("select * from dados_usuarios where Login = '$login'");

while($linhas = mysql_fetch_object($consulta)) 
{
	
	mkdir("./fotos/".$linhas->ID, 0777);
	$de = "./fotos/uni/avatar.jpeg";
  	$para = './fotos/'.$linhas->ID.'/'.$linhas->ID.'.jpeg';
  	copy($de, $para);
	

	if($consulta) {
		header("Location: ../index.php");
		exit;
	}
	 else {
		header("Location: ../index.php");
		exit;
	}
	break;
}
?>