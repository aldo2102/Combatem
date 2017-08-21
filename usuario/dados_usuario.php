<?php


$msg = $_GET['msg'];

// faz consulta no banco
$consulta = mysql_query("SELECT * 
                            FROM dados_usuarios AS du
                            JOIN duelos AS d ON ( du.ID = d.ID1 || du.ID = d.ID2 ) 
                            WHERE Login = '$login_usuario'");
                            
            $num_rows = mysql_num_rows($consulta);    
            
    if($num_rows<1){
      $consulta = mysql_query("SELECT * 
                            FROM dados_usuarios AS du
                            WHERE Login = '$login_usuario'");
    }        
?>


<form action="index.php?p=9" method="post" enctype="multipart/form-data" name="formatualizar">
  <div style="overflow-x:auto;">

<table>
  <!--DWLayoutTable-->
  
  <tr>
    
    <td colspan="6" valign="top"><span class="style1">Dados do usuario</span> </td>
    
  </tr>
  <tr>

    <td colspan="6"><?php
while($linha = mysql_fetch_object($consulta)) {
	echo "<b>Olá ".$linha->Login."!</b>";

?></td>
  </tr>
  <tr>
    <td colspan="4" style="width:70%"><p><span class="style5"><span class="style4">Aten&ccedil;&atilde;o:</span></span><span class="style3"> Altere apenas os dados que voc&ecirc; deseja modificar! <br />
    </span></p></td>
    <td style="width:30%">Seu Video </td>
  </tr>
  <tr>
    <td colspan="4" valign="top">
	  <table width="100%" border="2" bordercolor="#FFFFFF" cellpadding="0" cellspacing="0">
	    <!--DWLayoutTable-->
	    
	    
	    <tr>
	      <td  colspan="4" ><img src="usuario/fotos/<?php echo $linha->ID;?>/<?php echo $linha->ID;?>.jpeg" width="198" height="185" />
	      <p><a href="index.php?p=11">Alterar Foto</a></p>
	      </td>
	      </tr>
	    <tr>
	      <script type="text/javascript" >

                         $(document).ready(function(){
                            $("#video").focusout(function(){
                              var videoEND = document.getElementById("video").value;
                              if(videoEND!=''){
                                  $.ajax({
                                      cache: false,
                                      type: "POST",
                                      url: "api/apiVideos.php",
                                      data: 'video='+videoEND,
                                      success: function(msg)
                                      {
                                        if(msg!=''){
                                          document.getElementById("carregarVideo").innerHTML="";
                                          document.getElementById("carregarVideo").innerHTML="<iframe class='embed-responsive-item' src='https://www.youtube.com/embed/"+videoEND+"' frameborder='0' allowfullscreen  ></iframe>";
                                          document.getElementById("loginNovo").style.display="block";
                                          document.getElementById("login").value =  msg;
                                          document.getElementById("canal").innerHTML =  "Login será o nome do canal";
                                          document.getElementById("login").readOnly = true;
                                        }
                                      }
                          
                                      }); // Ajax Call
                              }
                            }); //event handler
                        }); //document.ready

                  </script>
	      <td>E-mail:</td>
            <td colspan="3" valign="middle"  ><label for="label2"></label>
            <input name="email" id="email" type="mail" id="label2" value="<?php echo $linha->Email;?>" size="40" maxlength="200" /></td>
          </tr> 
	    <tr>
	      <td > Video  :</td>
            <td colspan="2" valign="middle"  ><label for="label3"></label>
            <?php if($linha->IDduelos==null){ ?>
                <p>Coloque somente o c&oacute;digo do v&iacute;deo como o exemplo abaixo</p>
                <p>http://www.youtube.com/watch?v=<span style="color:red">XwNp9sPCsnk</span></p>
                <p>
                  <input name="video" id="video" id= type="text" id="labe13" value="<?php echo $linha->video;?>" size="40" maxlength="200"/>
                <?php }
                else{ ?>
                  Você está na <a href="index.php?p=1&duelo=<?php echo base64_encode(" and IDduelos=".$linha->IDduelos)?>">Batalha <?php echo $linha->IDduelos ?></a>, não é permitido mudar o 
                  vídeo durante um duelo.
                <?php }
                ?>
              </p>
              <div id="loginNovo" style="display:none">Login: <br \><input readonly="readonly" required="required" id="login" name="login" type="text" value="<?php echo $linha->Login ?>" size="40" maxlength="200"/></div>
              </td>
              <td>
                <p>Somente participará de duelos quando você permitir.</p>
                <p><select name="vaiDuelar">
                  <option value="0">Quero duelar</option>
                  <option value="1">Não quero duelar agora</option>
              </select></p>
              </td>
          </tr>
	    <tr>
	      <td>Seu talento:</td>
            <td colspan="3" valign="middle"  ><label for="label4"></label>
              
              <p>
                <select name="talento" size="1" id="label4" value="<?php echo $linha->talento;?>">
				  <option value="<?php echo $linha->talento;?>" selected="selected"><?php echo $linha->talento;?></option>
                  <option value="Tocando" >Tocando</option>
                  <option value="Cantando">Cantando</option>
                  <option value="Tocando/Cantando">Tocando/Cantando</option>
                  <option value="Dan&ccedil;ando">Dan&ccedil;ando</option>
                                </select>
              </p></td>
          </tr>
	    <tr>
            <td colspan="5"><label for="Submit"></label>
            <input type="submit" name="atualizar" value="Atualizar" id="atualizar" /></td>
      </tr>
      </table></td>
    <td>
      <div class="embed-responsive embed-responsive-16by9" id="carregarVideo">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $linhas->video;?>" frameborder="0" allowfullscreen  ></iframe>
        </div>
    </td>
  </tr>
  <tr>
    <td colspan="5"><?php
}
	echo "<b>".$msg."</b>";
?></td>
  </tr>
</table>
</div>
</form>
