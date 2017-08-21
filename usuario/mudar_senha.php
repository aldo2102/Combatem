<?php

$consulta = mysql_query("select * from dados_usuarios where Login = '$login_usuario'");
?>

<form action="index.php?p=8" method="post" enctype="multipart/form-data" name="form_mudar_senha">
<table width="727" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="37" height="35"></td>
    <td width="27"></td>
    <td width="9"></td>
    <td width="4"></td>
    <td width="495"></td>
    <td width="54"></td>
    <td width="4"></td>
    <td width="97"></td>
  </tr>
  <tr>
    <td height="41"></td>
    <td></td>
    <td></td>
    <td></td>
    <td valign="top"><span class="style1">Alterar senha</span> </td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td height="36"></td>
    <td></td>
    <td></td>
    <td colspan="2"><?php
while($linha = mysql_fetch_object($consulta)) {
}
?></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  
  <tr>
    <td height="43" valign="top">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td ></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="28">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3" valign="top" class="style3"><span class="style2">Aten&ccedil;&atilde;o:</span> Digite a nova senha que voc&ecirc; deseja usar em nosso site! </td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td height="78">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="5" valign="top"><table width="100%" border="2" bordercolor="#FFFFFF" cellpadding="0" cellspacing="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="115" height="24" align="right" valign="middle" bgcolor="#000000"><span class="style4">Senha:</span></td>
          <td colspan="3" valign="middle"  ><label for="textfield"></label>
            <input name="senha" type="password" id="senha" size="20" maxlength="15" /></td>
        </tr>
      <tr>
        <td height="24" align="right" valign="middle" bgcolor="#000000" class="style4">Repetir senha: </td>
          <td colspan="3" valign="middle"  ><label for="label"></label>
            <input name="rep_senha" type="password" id="label" value="" size="20" /></td>
        </tr>
      <tr>
        <td height="25">&nbsp;</td>
          <td width="10">&nbsp;</td>
          <td width="55" valign="top"><label for="Submit"></label>
            <input type="submit" name="alterar" value="Alterar" id="alterar" /></td>
          <td width="158">&nbsp;</td>
        </tr>
      
      
      
      
      
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="102">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
