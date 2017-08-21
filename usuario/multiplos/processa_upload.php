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

// Pasta de destino das fotos
$Destino = './fotos/';
// Obt�m dados do upload
$Fotos = $_FILES['fotos'];
// Contagem de fotos enviadas
$Conta = 0;

// Itera sobre as enviadas e processa as valida��es e upload
for($i = 0; $i < sizeof($Fotos); $i++)
{
    // Passa valores da itera��o atual
    $Nome    = $Fotos['name'][$i];
    $Tamanho = $Fotos['size'][$i];
    $Tipo    = $Fotos['type'][$i];
    $Tmpname = $Fotos['tmp_name'][$i];

    // Verifica se tem arquivo enviado
    if($Tamanho > 0 && strlen($Nome) > 1)
    {
        // Verifica se � uma imagem
        if(preg_match('/^image\/(gif|jpeg|jpg|png)$/', $Tipo))
        {
            // Caminho completo de destino da foto
            $Caminho = $Destino . $Nome;

            // Tudo OK! Move o upload!
            if(move_uploaded_file($Tmpname, $Caminho))
            {
				$t=1;
                echo 'Foto #' . ($i+1) . ' enviada.<br/>';
                
                // Faz contagem de enviada com sucesso
                $Conta++;
            }            
            else // Erro no envio
            {
                // $i+1 porque $i come�a em zero
                echo 'N�o foi poss�vel enviar a foto #' . ($i+1) . '<br/>';
            }
        }
    }
}

if($Conta) // Imagens foram enviadas, ok!
{
    echo '<br/>Foi(am) enviada(s) ' . $Conta . ' foto(s).';
}
else // Nenhuma imagem enviada, faz alguma a��o
{
    echo 'Voc� n�o enviou fotos!',$t;
}

?>