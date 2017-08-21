<?php

// faz conex�o com o servidor MySQL
$local_serve = "localhost"; 	 // local do servidor
$usuario_serve = "";		 // nome do usuario
//$senha_serve = "";			 	 // senha
$senha_serve = "";			 	 // senha
$banco_de_dados = ""; 	 // nome do banco de dados
$port=3306;

//$conn = mysql_connect($local_serve, $usuario_serve, $senha_serve, $banco_de_dados) or die ("O servidor n�o responde!");
// conecta-se ao banco de dados
$conn = @mysql_connect($local_serve, $usuario_serve, $senha_serve) or die ('MySQL Not found // Could Not Connect.');
@mysql_select_db("$banco_de_dados") or die ("No Database found.");

	
//$mysqli = new mysqli($local_serve, $usuario_serve, $senha_serve, $banco_de_dados);

//$link = mysqli_connect($local_serve, $usuario_serve, $senha_serve, $banco_de_dados);

//if (!$link) {
//    die('Connect Error (' . mysqli_connect_errno() . ') '
 //           . mysqli_connect_error());
//}

//echo 'Success... ' . mysqli_get_host_info($link) . "\n";

	
// dados do administrador s�o de estrema importancia que sem eles
// o adminstrador n�o tera acesso as paginas de administra��o
$login_admin = "";  			// nome do administrador
$senha_admin = "";						// senha administrador
$email_admin = "";  // email do administrador
