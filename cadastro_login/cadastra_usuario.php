
	<?php
// inclui o arquivo de configura��o do sistema
include "Config/config_sistema.php";

// recebe dados do formulario
$login = htmlspecialchars($_POST['login']);
$email = htmlspecialchars($_POST['email']);
$senha = $_POST['senha'];
$senha = sha1($senha.$login."music"."21"); 
$rep_senha = $_POST['rep_senha'];
$rep_senha = sha1($rep_senha.$login."music"."21"); 
$nome = htmlspecialchars($_POST['nome']);
$sexo = $_POST['sexo'];
$dn = $_POST['dn'];
$pais = $_POST['pais'];
//$estado = $_POST['estado'];
//$cidade = $_POST['cidade'];
//$cep = $_POST['cep'];
$video = $_POST['video'];
$talento = $_POST['talento'];
$pergunta = htmlspecialchars($_POST['pergunta']);
$resposta = htmlspecialchars($_POST['resposta']);

// verifica se o usuario digitou o login
if($login == "") {
	echo "Digite seu login!".$login;
	exit;
} else {
	// se o usuario digitou o login ele verifica
	// se esta disponivel
	$consulta = mysql_query("select * from dados_usuarios where Login = '$login'");
	$linha = mysql_num_rows($consulta);
	if($linha != 0) {
		echo "O nome de usuario que voc�<br>
			  Digitou j� existe tente outro!";
		exit;
	}
}

// verifica se o usuario digitou a senha
if($senha == "") {
	echo "Digite sua senha!";
	exit;
} else {
	// se o usuario digitou a senha
	// vamos comparar com a contra senha
	if($senha != $rep_senha) {
		echo "Senha invalida!";
		exit;
	}
}

// verifica se o usuario digitou o nome
if($nome == "") {
	echo "Digite seu nome!";
	exit;
}

// verifica o email
if($email == "") {
	echo "Digite o seu e-mail!";
	exit;
}

// verifica o sexo
$arr_sexo = array('Masculino','Feminino');
if(!in_array($sexo,$arr_sexo)) {
	echo "Escolha o seu sexo!";
	exit;
}

// verifica a data de nascimento do usuario
// verifica o dia
if($dn == "") {
	echo "Escolha o dia que você nasceu!";
	exit;
}  else {
			$data_nasc=$dn;
}


// verifica o pais
if($pais == "") {
	echo "Digite o país onde você mora!";
	exit;
}


// verifica o cep
//if($cep == "") {
//	echo "Digite o CEP de onde voc� mora!";
//	exit;
//}

// verifica a pergunta secreta
if($pergunta == "") {
	echo "Digite sua pergunta secreta!";
	exit;
}

// verifica a resposta secreta
if($resposta == "") {
	echo "Digite sua resposta secreta!";
	exit;
}

// faz consulta no banco para inserir os dados do usuario
$sql = "insert into dados_usuarios (Login,Senha,Nome,Email,Sexo,DataNasc,Pais,Estado,Cidade,Cep,Video,Talento,Pergunta,Resposta) values ('$login','$senha','$nome','$email','$sexo','$data_nasc','$pais','$estado','$cidade','$cep','$video','$talento','$pergunta','$resposta')";
$consulta = mysql_query($sql);
$_SESSION['nomeLogin']=$login;
include_once("usuario/pasta.php");

// verifica se o usuario foi cadastrado
if($consulta) {
	echo "<font color=green><b>
		  Você foi cadastrado com sucesso!<br>
		  Click <a href=index.php>aqui</a> para efetuar o login.
		  </font></b>";
	exit;
} else {
	echo "Não foi possivel efetuar o seu cadastro<br>
		  tente mais tarde pode ser um problema no servido!<br>
		  Click <a href=index.php>aqui</a> para ir ate a home page do sistema.";
	exit;
}
?>
