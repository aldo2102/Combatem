<?php




$id = $_GET['user'];
$id=base64_decode($id);
if(!is_numeric($id)){
	$duela = mysql_query("SELECT * FROM dados_usuarios where Login ='$id'");
	//echo "SELECT * FROM dados_usuarios where Login =$id";
	while($linhas = mysql_fetch_object($duela)) {
		$id=$linhas->ID;
	}
}
$nome = $_POST['nome'];
$email = $_POST['email'];
$comentario = $_POST['comentario'];



if ($nome == "") {
  echo "Digite seu nome!";
	exit;
  }
  
if ($comentario == "") {
  echo "Digite seu comentario!";
	exit;
  }
  
if($email == "") {
	echo "Digite seu email!";
	exit;
}

if ($errors == "") {


$sql = "insert mural (nome,id, comentario, email) values ('$nome',$id,'$comentario','$email')";
//echo $sql;
	$consulta = mysql_query($sql);
}

if($consulta) {
	echo "<font color=green><b>
		  Postado no Mural!<br>
		  </font></b>";
	exit;
} else {
	echo "Não foi possivel efetuar o seu cadastro<br>
		  tente mais tarde pode ser um problema no servido!<br>
		  Click <a href=muralp.php>aqui</a> para ir ate a home page do sistema.";
	exit;
}
?>
