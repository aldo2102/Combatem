<?php
// -------------------------------------------------
// Arquivo integrante do artigo:
//   PHP: Formul�rios e upload de m�ltiplos arquivos
// Autor:
//   Alfred Reinold Baudisch
// E-mail:
//   alfred@auriumsoft.com.br
// Site:
//   www.auriumsoft.com.br
// Data:
//   28/02/2006
// Download do artigo:
//   http://www.auriumsoft.com.br/alfred/artigos/multiplos.zip
// -------------------------------------------------

// Obt�m quantidade enviada. Perceba que verifica se � um n�mero inteiro,
// caso contr�rio, � usada uma quantidade padr�o, 5.
$Quantidade = (isset($_POST['quantidade']) && is_int(intval($_POST['quantidade']))) ? (int)$_POST['quantidade'] : 5;

// Abre formul�rio de upload
echo '<form action="processa_upload.php" method="POST" enctype="multipart/form-data">';
echo '<b>Envio das fotos</b><br />';

// Imprime os campos para upload, de acordo com a quantidade pedida
for($i = 1; $i <= $Quantidade; ++$i)
{
    echo 'Foto #' . $i . ': <input type="file" name="fotos[]" /><br/>';
}

// Fecha formul�rio
echo '<br /><input type="submit" value="OK"/>';
echo '</form>';

?>