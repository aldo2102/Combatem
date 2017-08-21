<?php

$msg=$_GET['msg'];

// faz consulta no banco
$consulta = mysql_query("select * from dados_usuarios where Login = '$login_usuario'");
?>



<form action="index.php?p=11" method="POST" enctype="multipart/form-data">
<table width="727" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  
  <tr>
    <td valign="top"><span class="style1">Alterar fotos</span> </td>
  </tr>
  <tr>
    <td colspan="2"><?php
while($linha = mysql_fetch_object($consulta)) {
?></td>
  </tr>
  
 
  <tr>
    <td colspan="3" valign="top" class="style3"><span class="style2">Aten&ccedil;&atilde;o:</span> Digite a nova senha que voc&ecirc; dezeja usar em nosso site! </td>

  </tr>
  <tr>
    <td colspan="5" align="center" valign="top"><blockquote>
      <p><b>Envio das fotos</b><br />
        <input type="file" name="fotos" />
        <input name="foto" type="hidden" id="foto" value="<?php echo $linha->ID;?>" size="3" />
        <br/>
        <input type="submit" value="OK"/>
      </p>
      <p><?php echo $msg;?></p>
    </blockquote></td>
  </tr>
  
  <?PHP 
     };
  ?>
</table>
</form>