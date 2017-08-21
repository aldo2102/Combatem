<?php

// recebe os dados do formulario
$idp = $_GET['idp'];
$id = $_GET['id'];

// deleta o usuario
$sql="delete from mural where idb = '$idp'";
$consulta = mysql_query($sql);

// verifica se foi excluido o usuario
if($consulta) {
	$msg = urlencode("Post excluido com sucesso!");
	header("Location: index.php?p=4&user=$user ");
	exit;
} else {
	$erro = urlencode("Não foi possivel excluir o post!");
	header("Location: index.php?p=4&user=$user&msg=$erro");
	exit;
}
?>