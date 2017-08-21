<?php
include "../validar_session.php";

include "../Config/config_sistema.php";

$duela = mysql_query("SELECT * FROM mural");


$id = $_POST['id'];
$n = $_POST['n'];
$nome = htmlspecialchars($_POST['nome']);
$email = htmlspecialchars($_POST['email']);
$comentario = htmlspecialchars($_POST['comentario']);


if ($nome == "") {
  echo "Digite seu nome!";
	exit;
  }
  
if ($comentario == "") {
  echo "Digite seu comentario!";
	exit;
  }
  
if ($errors == "") {

$sql = "insert mural (idp, nome, comentario, email) values ('$id','$nome','$comentario','$email')";
	$consulta = mysql_query($sql);
}

if($consulta) {
	$msg="Postado com sucesso";
		 header("Location: ../perfil.php?user=$n&msg=$msg");
		exit;
	} else {
	echo "Não foi possivel postar<br>
		  tente mais tarde pode ser um problema no servido!<br>
		  Click <a href=muralp.php>aqui</a> para ir ate a home page do sistema.";
	exit;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Mural</title>
</head>

<body>
</body>
</html>
