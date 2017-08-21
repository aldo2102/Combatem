


<?php


// inclui o arquiv o de configura��o do sistema
//include "../Config/config_sistema.php";
// revebe dados do formulario
$login = htmlspecialchars($_POST['login']);
$senha = $_POST['senha'];
$senha = sha1($senha.$login."music"."21"); 
// verifica se o usuario existe
$consulta = mysql_query("select * from dados_usuarios where Login='$login'");
$campos = mysql_num_rows($consulta);
if($campos != 0) {
// se o usuario existi verifica a senha dele
	if($senha != mysql_result($consulta,0,"Senha")) {
		echo "<font color=red><b>
			  Senha incorreta!
			  </font></b>";
		exit;
	} else {
		echo "<a href='logout.php' class='style2'>Logout</a>";
		// estiver tudo certo vamos ver se ele � o administrador
			// se for o login do administrador vamos verificar a senha dele
			// se � igual a do administrado
				// se for o administrador vomos criar a sess�o
				$_SESSION['admin'] = true;
				$_SESSION['login_usuario'] = $login;
				$_SESSION['senha_usuario'] = $senha;
				$_SESSION['logado']=true;
				// redireciona o link para uma outra pagina
				//header("Location: Admin/listar_usuarios.php");
				
		 
	}
} else {
	echo "<font color=red><b>
		  O usuario não existe!
		  </font></b>";
	exit;
}
?>

