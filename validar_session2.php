<?php


$urlRedi = "index.php?login=visitante";
// verifica se a variavel existir
//echo $_SESSION['login_usuario'];
if(isset($_SESSION['login_usuario'])) {
	//; se existie as sess�es coloca os valores em uma varivel
	$login_usuario = $_SESSION['login_usuario'];
}
if(isset($_SESSION['senha_usuario'])){
	$senha_usuario = $_SESSION['senha_usuario'];
} 
	$admin = $_SESSION['admin'];
// verifica se as variaveis est�o atribuidas
if(!(empty($login_usuario) or empty($senha_usuario))) {
	// se estiverem atribuidos vamos ver se exist o login
	$consulta = mysql_query("select * from dados_usuarios where Login = '$login_usuario'");
	while($linha = mysql_fetch_object($consulta)) {
		$ID=$linha->ID;
	}
	if(mysql_num_rows($consulta) == 1) {
		// se o usuario exostir vamos verificar a senha
		if($senha_usuario != mysql_result($consulta,0,"Senha")) {
			// se a senha est� correta vamos apagar a
			// sess�o que existia mas erra a errada
			unset($_SESSION['login_usuario']);
			unset($_SESSION['senha_usuario']);
			
			$erro = urlencode("Voc� n�o esta logado!");
		}
	} else {
		unset($_SESSION['login_usuario']);
		unset($_SESSION['senha_usuario']);
		
		$erro = urlencode("Voc� n�o esta logado!");
	}
} else {
	// caso as sess�es estarem vaizias
	$erro = urlencode("Voc� n�o esta logado!");
	
	////header("Location: index.php?login=visitante");
	//exit;
}
//mysql_close($conn);
?>