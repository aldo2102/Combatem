<?php
  $ID=$_GET['user'];
  $ID=base64_decode($ID);
  
  $consulta = mysql_query("select * from dados_usuarios where ID = '$ID'");
  
  $ID=base64_encode($ID);
  $num_rows = mysql_num_rows($consulta);

       while($linha = mysql_fetch_object($consulta)) {
         $nomeMural=$linha->Nome;
       }

  if(logado()){
      $userLogado=$_SESSION['login_usuario'];
      $consulta2 = mysql_query("select * from dados_usuarios where Login = '$userLogado'");
      $num_rows = mysql_num_rows($consulta2);
       while($linha = mysql_fetch_object($consulta2)) {
         $idLogado=$linha->ID;
         $login=$linha->Login;
         $email=$linha->Email;
       }
  }
  else{
      $idLogado="";
         $login="";
         $email="";
  }
    
    ?>

<form action="index.php?p=6&user=<?php echo $ID;?>" method="post" name="mural" id="mural">
  <center>
  <?php
  if(isset($_POST['nome'])){
    include_once("usuario/cadastrarmural.php");
  }
  else
	
?>
  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="504" id="AutoNumber1">
    <tr>
      <td><div align="center">
        <table cellspacing="0" cellpadding="2" width="504" style="border-collapse: collapse" bordercolor="#111111">
          <tr>
            <h3><?php echo "Mural de ".$nomeMural; ?></h3>
            <td width="96"><b><font face="verdana" size="1">Seu nome ou nick</font></b><font face="verdana" color="#000000" size="1"><b>*<br />
            </b></font></td>
            <td width="379">
			<input name="id" type="hidden" id="id" value="<?php echo $id;?>" size="3" />
			<input name="nome" type="text" id="label2" value="<?php echo $login;?>" size="40" maxlength="200" />
              <label>
              <span class="style1">
              
              </span></label></td>
          </tr>
          <tr>
            <td><b><font face="verdana" size="1">Coment&aacute;rio</font></b><font face="verdana" color="#000000" size="1"><b>: *</b></font> </td>
            <td><textarea rows="10" name="comentario" id="comentario" cols="35"></textarea></td>
			
          </tr>
          <tr>
            <td><font face="verdana" color="#000000" size="1" value="<?php echo $login;?>"><b>E-Mail: * </b></font> </td>
            <td><input name="email" type="mail" id="email" value="<?php echo $email;?>" size="40" maxlength="200" /></td>
          </tr>
        </table>
        <font face="verdana" color="red" size="1"><b>Obs: Todos campos s&atilde;o obrigat&oacute;rios</b></font><br />
        <input name="submit" type="submit" style="font-family: verdana; font-size: 8 pt; border-style: solid; border-width: 1; background-color: #E2E2E2" value="Comentar" />
      </div></td>
    </tr>
  </table>
  </center>
</form>
