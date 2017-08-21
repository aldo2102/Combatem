<?
include "../Config/config_sistema.php";
?>

<HTML>
<HEAD>
   <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
   <META NAME="Author" CONTENT="f">
   <META NAME="GENERATOR" CONTENT="Mozilla/4.03 [pt] (WinNT; I) [Netscape]">
   <TITLE>Duelo Musical</TITLE>
</HEAD>
<BODY TEXT="#000000" BGCOLOR="#FFFFFF" LINK="#000000" VLINK="#000000" ALINK="#000000">
<center><TABLE cellSpacing=0 cellPadding=0 width="504" border=0 style="border-collapse: collapse" bordercolor="#111111">
<TR>
<TD bgColor=#D7D7D7 height=1></TD></TR>
<TR>
<TD height=25 bgcolor="#ECECEC">
<img border="0" src="smilies/mural.bmp"></TD></TR>
<TR>
<TD bgColor=#D7D7D7 height=1></TD></TR>
</TABLE></center>
<center><TABLE cellSpacing=0 cellPadding=0 width="504" border=0 style=border-collapse: collapse bordercolor=#111111><TBODY><tr><td align=center>
<?php
include "config.php";
$conn = mysql_connect("$host","$login_db","$senha_db");
$banco = mysql_select_db("$database");
$busca = "SELECT * FROM mural ORDER BY id DESC";

if (!$pag) {
$pc = "1";
} else {
$pc = $pag;
}
$inicio = $pc - 1;
$inicio = $inicio * $total_reg;
$limite = mysql_query("$busca LIMIT $inicio,$total_reg");
$todos = mysql_query("$busca");

$tr = mysql_num_rows($todos); // verifica o número total de registros
$tp = $tr / $total_reg; // verifica o número total de páginas


$total_por_pagina = $pag * $total_reg;
echo"<TABLE cellSpacing=0 cellPadding=0 width=504 border=0 style=border-collapse: collapse bordercolor=#111111><TBODY><Tr><td>";
echo"<font face=Tahoma size=1>  São <b>$tr</b> comentários.
</font>


<font face=Tahoma size=1><a href='adicionarmural.php'><b>Adicionar comentários</b></font></a> | <font face=Tahoma size=1><a href='login.php'><b>Logar</b></font></a>

";

$entrar = $HTTP_COOKIE_VARS["login_administrador"];
if ($entrar == "$login_administrador") { 
echo "
<font size=1 face=tahoma color=RED><b> VOCÊ ESTÁ LOGADO </b></font><br><br>
";
}



$i = 0;
while ($dados = mysql_fetch_array($limite)) {
$id = $dados["id"];
$nome = $dados["nome"];
$email = $dados["email"];
$color = ( $i % 2 == 0 ) ? '#F5F5F5' : '#FFFFFF';
echo"<tr bgcolor='$color'>";
echo"<TD  align=center><br>";
echo"<font face=Tahoma size=1><b>Adicionado por:</b> $nome</font><br>";
echo"<font face=Tahoma size=1><b>Comentário:</b> $comentario</font><br>";
$mensagem= $dados["comentario"];
$mensagem=str_replace("<", "[",$mensagem);
$mensagem=str_replace(">", "]",$mensagem);
$mensagem=str_replace(":anj:", "<IMG src=smilies/001.gif >",$mensagem);
$mensagem=str_replace(":ner:", "<IMG src=smilies/002.gif >",$mensagem);
$mensagem=str_replace(":olh:", "<IMG src=smilies/003.gif >",$mensagem);
$mensagem=str_replace(":lov:", "<IMG src=smilies/004.gif >",$mensagem);
$mensagem=str_replace(":bol:", "<IMG src=smilies/005.gif >",$mensagem);
$mensagem=str_replace(":enj:", "<IMG src=smilies/006.gif >",$mensagem);
$mensagem=str_replace(":cho:", "<IMG src=smilies/007.gif >",$mensagem);
$mensagem=str_replace(":tim:", "<IMG src=smilies/008.gif >",$mensagem);
$mensagem=str_replace(":cor:", "<IMG src=smilies/009.gif >",$mensagem);
$mensagem=str_replace(":bej:", "<IMG src=smilies/010.gif >",$mensagem);
$mensagem=str_replace(":lua:", "<IMG src=smilies/011.gif >",$mensagem);
$mensagem=str_replace(":msn:", "<IMG src=smilies/012.gif >",$mensagem);
$mensagem=str_replace(":mid:", "<IMG src=smilies/013.gif >",$mensagem);
$mensagem=str_replace(":esp:", "<IMG src=smilies/014.gif >",$mensagem);
$mensagem=str_replace(":tel:", "<IMG src=smilies/015.gif >",$mensagem);
$mensagem=str_replace(":pre:", "<IMG src=smilies/016.gif >",$mensagem);
$mensagem=str_replace(":ale:", "<IMG src=smilies/017.gif >",$mensagem);
$mensagem=str_replace(":flo:", "<IMG src=smilies/018.gif >",$mensagem);
$mensagem=str_replace(":tri:", "<IMG src=smilies/019.gif >",$mensagem);
$mensagem=str_replace(":ocu:", "<IMG src=smilies/020.gif >",$mensagem);
$mensagem=str_replace(":est:", "<IMG src=smilies/021.gif >",$mensagem);
$mensagem=str_replace(":sor:", "<IMG src=smilies/022.gif >",$mensagem);
$mensagem=str_replace(":lin:", "<IMG src=smilies/023.gif >",$mensagem);
$mensagem=str_replace("[br /]", "<br>",$mensagem);
echo('<pre><font face=Tahoma size=1>'. $mensagem .'</font></pre>');
echo"<font face=Tahoma size=1><b>E-mail:</b> $email</font><br><br>";
$entrar = $HTTP_COOKIE_VARS["login_administrador"];
if ($entrar == "$login_administrador") { 
echo "
<form method=post action=apagarcomentario.php>
      <input type=hidden name=apagar value=$id>

<input type=\"submit\" value=\"Apagar Comentário\" style=\"font-family: verdana; font-size: 8 pt; border-style: solid; border-width: 1; background-color: #E2E2E2\">
</form>
";
}

echo"</TD></tr>";
$i++;
}
echo"</td></tr><tr><td height=25 align=center bgcolor=#ECECEC>";

$anterior = $pc -1;
$proximo = $pc +1;
if ($pc > 1) {
echo "<a href='mural.php?pag=$anterior'><font face=Tahoma size=1><b>anterior</b></font></a>";
}
if ($pc < $tp) {
echo "<font face=Tahoma size=1>  |  <a href='mural.php?pag=$proximo'><b>próxima</b></font></a>";
}
echo"</td></tr></TBODY></TABLE>";
?>
</td></tr></TBODY></TABLE></center>
</BODY>
</HTML>
