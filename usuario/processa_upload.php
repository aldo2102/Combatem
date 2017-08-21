<?php
$consulta = mysql_query("select * from dados_usuarios where Login='$login_usuario'");
		
		$num_rows = mysql_num_rows($consulta);

        
		while($linha = mysql_fetch_object($consulta)) {
			$d= $linha->ID;
		}
// -------------------------------------------------

// Pasta de destino das fotos
// apaga a foto anterior
$a="usuario/fotos/".$d."/".$d.".jpeg";
chmod($a,0777);
unlink($a);
//criar pasta
mkdir("usuario/fotos/".$d, 0777);

$Destino = 'usuario/fotos/'.$d.'/';
// Obt�m dados do upload
$Fotos = $_FILES['fotos'];

// Contagem de fotos enviadas
$Conta = 0;
$i=0;
// Itera sobre as enviadas e processa as valida��es e upload
    // Passa valores da itera��o atual
    $Nome    = $Fotos['name'];
    $Tamanho = $Fotos['size'];
    $Tipo    = $Fotos['type'];
    $Tmpname = $Fotos['tmp_name'];

	$t = substr($Nome, -4);
	if($t[0] == '.')
	{
      	$t = substr($t, -3);
	}
	
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
				
                $msg='Foto enviada.';
				$nomeAntigo ="usuario/fotos/".$d."/".$Nome;
				$novoNome = "usuario/fotos/".$d."/".$d.".".$t;
				rename($nomeAntigo,$novoNome);
				if($t=="jpg")
				{
					  	$msg='Foto enviada.';
						$nomeAntigo ="usuario/fotos/".$d."/".$d.".jpg";
						$novoNome = "usuario/fotos/".$d."/".$d.".jpeg";
						rename($nomeAntigo,$novoNome);
				}
				
				else if($t=="gif")
				{
					$imagem_entrada = "usuario/fotos/".$d."/".$d.".".$t;
					$imagem_saida='usuario/fotos/'.$d.'/'.$d.'.jpeg';

					$img = imagecreatefromgif($imagem_entrada);
					$w = imagesx($img);
					$h = imagesy($img);
					$trans = imagecolortransparent($img);
					if($trans >= 0) {
						$rgb = imagecolorsforindex($img, $trans);
						$oldimg = $img;
						$img = imagecreatetruecolor($w,$h);
						$color = imagecolorallocate($img,$rgb['red'],$rgb['green'],$rgb['blue']);
						imagefilledrectangle($img,0,0,$w,$h,$color);
						imagecopy($img,$oldimg,0,0,0,0,$w,$h);
					}
					imagejpeg($img,$imagem_saida);
					unlink("usuario/fotos/".$d."/".$d.".".$t);
				}
				
				else if($t=="png"||$t=="PNG")
				{
					$imagem_entrada = "usuario/fotos/".$d."/".$d.".".$t;
					$imagem_saida='usuario/fotos/'.$d.'/'.$d.'.jpeg';

					$img = imagecreatefrompng($imagem_entrada);
					$w = imagesx($img);
					$h = imagesy($img);
					$trans = imagecolortransparent($img);
					
					if($trans >= 0) {
						$rgb = imagecolorsforindex($img, $trans);
						$oldimg = $img;
						$img = imagecreatetruecolor($w,$h);
						$color = imagecolorallocate($img,$rgb['red'],$rgb['green'],$rgb['blue']);
						imagefilledrectangle($img,0,0,$w,$h,$color);
						imagecopy($img,$oldimg,0,0,0,0,$w,$h);
					}
					imagejpeg($img,$imagem_saida);
					
					unlink("usuario/fotos/".$d."/".$d.".".$t);
				}
				unlink("usuario/fotos/".$d."/".$d.".".$t);
				chmod($a,0644);
                header("Location: index.php?msg=$msg&p=11");
				exit;
                // Faz contagem de enviada com sucesso
                $Conta++;
            }            
            else // Erro no envio
            {
                // $i+1 porque $i come�a em zero
                echo 'Não foi possível enviar a foto';
            }
        }
    }

if($Conta) // Imagens foram enviadas, ok!
{
    $msg='<br/>Foi(am) enviada(s) ' . $Conta . ' foto(s).';
	header("Location: index.php?msg=$msg&p=11");
	exit;
}
else // Nenhuma imagem enviada, faz alguma a��o
{
    $msg='Você não enviou fotos!'.$Destino;
	//header("Location: index.php?msg=$msg&p=11");
	exit;
}

?>