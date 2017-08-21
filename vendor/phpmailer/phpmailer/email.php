<meta charset="utf-8">
<?php
/* apenas dispara o envio do formulário caso exista $_POST['enviarFormulario']*/

function email($nome,$email,$duelo){
         
        /*** INÍCIO - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/
         
        $enviaFormularioParaNome = "$nome";
        $enviaFormularioParaEmail = "$email";
         
        $caixaPostalServidorNome = 'Seu vídeo está em um novo Duelo - Avise seus amigos';
        $caixaPostalServidorEmail = 'contato@combatem.com.br';
        $caixaPostalServidorSenha = '@Aldo007henrique';
         
        /*** FIM - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/ 
         
         
        /* abaixo as veriaveis principais, que devem conter em seu formulario*/
         
        //$remetenteNome  = $_POST['remetenteNome'];
        //$remetenteEmail = $_POST['remetenteEmail'];
        //$assunto  = $_POST['assunto'];
        //$mensagem = $_POST['mensagem'];
        $dueloLink=base64_encode(" and IDduelos=".$duelo);
        $mensagemConcatenada = "$nome você está em uma nova Batalha"."<br/>"; 
        $mensagemConcatenada .= '-------------------------------<br/><br/>'; 
        $mensagemConcatenada .= "Seu vídeo está na <a href='http://combatem.com.br/index.php?p=1&duelo=$dueloLink'>Batalha $duelo</a> <br/>"; 
       
        $mensagemConcatenada .= '-------------------------------<br/><br/>'; 
        $mensagemConcatenada .= "Compartilhe o link: <b>http://combatem.com.br/index.php?p=1&duelo=$dueloLink</b> com seus amigos e ganhe muitos votos <br/>";
         
         
        /*********************************** A PARTIR DAQUI NAO ALTERAR ************************************/ 
         
        require_once('PHPMailerAutoload.php');
         
        $mail = new PHPMailer();
         
        $mail->IsSMTP();
        $mail->SMTPAuth  = true;
        //$mail->Charset   = 'utf8_decode()';
        $mail->Host  = 'smtp.'.substr(strstr($caixaPostalServidorEmail, '@'), 1);
        $mail->Port  = '587';
        $mail->Username  = $caixaPostalServidorEmail;
        $mail->Password  = $caixaPostalServidorSenha;
        $mail->From  = $caixaPostalServidorEmail;
        $mail->FromName  = utf8_decode($caixaPostalServidorNome);
        $mail->IsHTML(true);
        $mail->Subject  = utf8_decode($assunto);
        $mail->Body  = utf8_decode($mensagemConcatenada);
         
         
        $mail->AddAddress($enviaFormularioParaEmail,utf8_decode($enviaFormularioParaNome));
        $mail->Charset   = 'utf8_decode()';
        $mail->CharSet = 'UTF-8'; 
        if(!$mail->Send()){
        $mensagemRetorno = 'Erro ao enviar formulário: '. print($mail->ErrorInfo);
        }else{
        $mensagemRetorno = 'Formulário enviado com sucesso!';
        }       
            
} 

?>
 