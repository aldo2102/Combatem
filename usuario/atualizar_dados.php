<?php

$email = htmlspecialchars($_POST['email']);
$video = $_POST['video'];
$talento = $_POST['talento'];
$vaiDuelar = $_POST['vaiDuelar'];
$login = $_POST['login'];

// verifica o email
if($email == "") {
	echo "Digite seu email!";
	exit;
}

// verifica o video
if($video == "") {
	echo "Digite seu video!";
	exit;
}

// verifica o talento
if($talento == "") {
	echo "Digite seu talento!";
	exit;
}


// faz consulta para atualizar os dados
$sql = "update dados_usuarios set Email = '$email',Video = '$video',Talento = '$talento', vaiDuelar='$vaiDuelar',login='$login' where Login = '$login_usuario'";
$consulta = mysql_query($sql);

// verifica se foi atualizado os dados
if($consulta) {
	$msg = ("Dados atualizados com sucesso!");
	$_SESSION['login_usuario']=$login;
	echo("$msg");
	
} else {
	echo "<font color=red><b>
		  Não foi possivel atualizar os dados!<br>
		  Click <a href=dados_usuarios.php>aqui</a> para retornar!
		  </font></b>";
	exit;
}
?>