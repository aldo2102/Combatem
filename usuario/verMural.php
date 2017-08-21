<?php
$ID=$_GET['user'];
// faz consulta no banco
$consulta = mysql_query("select * 
from mural as m join dados_usuarios as d on d.ID=m.id 
where '$ID'like d.Login
order by m.idb desc");
?>

<div id="mainContent">
        <div class="body-panel">
            <div class="top-left-corner"></div>
            <div class="top-right-corner"></div>
          <div class="inside">
                <p align="right" class="FirstBreakBefore"> 
<?php
$num_rows = mysql_num_rows($consulta);
if($num_rows < 1){
  echo "Sem mensagens no seu mural!";
}
else
while($linhas = mysql_fetch_object($consulta)) {

?>&nbsp;<a href="#" class="style4" onclick="window.open('../Usuario/dados_usuario.php','janela','width=1100, height=500, scrollbars=yes')",></a></p>
                <form action="cadastrarmural.php" method="post" name="mural" id="mural">
  <center>
  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="504" id="AutoNumber1">
    <tr>
      <td><div align="center">
        <table cellspacing="0" cellpadding="2" width="464" style="border-collapse: collapse" bordercolor="#111111">
          <tr>
            <td width="81" height="27"><span class="style12"><b><font face="verdana" size="1">Nome</font></b><font face="verdana" size="1"><b>:<br />
            </b></font></span></td>
            <td width="309"><span class="style12"><?php echo $linhas->nome;?></span></td>
            <td width="60"><a href="index.php?p=4&option=2&idp=<?php echo $linhas->idb;?>&amp;id=<?php echo $ID;?>">Excluir</a></td>
          </tr>
          <tr>
            <td height="27"><span class="style12"><b><font size="1" face="verdana">Email</font></b><font face="verdana" size="1"><b>:<br />
            </b></font></span></td>
            <td colspan="2"><span class="style12"><?php echo $linhas->email;?></span></td>
            </tr>
          <tr>
            <td><strong><font size="1" face="verdana"><span class="style12"><b><font face="verdana" size="1">Coment&aacute;rio</font></b><font face="verdana" size="1"><b>: </b></font></span></font></strong></td>
            <td colspan="2"><span class="style12"><?php echo $linhas->comentario;?></span></td>
            </tr>
        </table>
        <br />
      </div></td>
    </tr>
  </table>
  </center>
  <?php $c=1;
  ?>
            <?php
}
?>
<?php if($c!=1)
		{	
			echo "<font color='#FFFFFF'>Nem uma postagem no seu mural.";
			}
  ?>
          </form></div>
            <div class="bottom-left-corner"></div>
            <div class="bottom-right-corner"></div>
        </div>
  </div>