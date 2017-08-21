<?php
  
  $ID=$_GET['user'];
// faz consulta no banco
if(isset($ID)){
  $ID=base64_decode($ID);
  if(is_numeric($ID))
  
   $consulta = mysql_query("SELECT * 
                            FROM dados_usuarios AS du
                            left JOIN duelos AS d ON ( du.ID = d.ID1 || du.ID = d.ID2 ) 
                            WHERE ID = '$ID'");
  else{
    
    $ID=$_GET['user'];
    $consulta = mysql_query("SELECT * 
                            FROM dados_usuarios AS du
                            left JOIN duelos AS d ON ( du.ID = d.ID1 || du.ID = d.ID2 ) 
                            WHERE Login = '$ID'");
  }
}
?>
<div id="mainContent">
        <div class="body-panel">
            <div class="top-left-corner"></div>
            <div class="top-right-corner"></div>
          <div class="inside">
                <p align="right" class="FirstBreakBefore"> <?php
while($linhas = mysql_fetch_object($consulta)) {
  
  if(logado() && $linhas->Login==$user){
?>
<a href='index.php?p=7'>Editar dados do seu Perfil</a>

<?php }

?>
            <table border="2" align="center" cellpadding="0" cellspacing="0"  >
                  <!--DWLayoutTable-->
                  <tr>
                    <td style="width:100%" height="24" colspan="2" align="center" valign="middle"  >
                    <span class="style2"><img src="usuario/fotos/<?php echo $linhas->ID;?>/<?php echo $linhas->ID;?>.jpeg" alt="foto" width="198" height="185" /></span></td>
                  </tr>
                  <tr>
                    <td style="width:13%" height="24" align="center" valign="middle"  ><span class="Black style12">Nome</span></td>
                    <td style="width:87%" align="center" valign="middle"  ><span class="Black Black Black style12"><?php echo $linhas->Nome;?></span></td>
                  </tr>
                  <tr>
                    <td height="24" align="center" valign="middle"  ><span class="style12"><span class="Black">Usu&aacute;rio:</a><a href="#" onClick="window.open('../votos/atualizar_votos.php?login=<?php echo $linhas->Login1;?>&id=<?php echo $linhas->IDduelos?>','janela','width=300, height=200, scrollbars=yes')"></span></td>
                    <td height="24" align="center" valign="middle"  ><span class="Black style12"><?php echo $linhas->Login;?></span></td>
                  </tr>
                  <tr>
                    <td height="23" align="center" valign="middle"  ><span class="Black style12">Esta no duelo: </span></td>
                     <?php if($linhas->IDduelos!=''){?>
                       <td height="23" align="center" valign="middle"  ><span class="Black Black style12"><a href="index.php?p=1&duelo=<?php echo base64_encode(" and IDduelos=".$linhas->IDduelos)?>">Batalha <?php echo $linhas->IDduelos ?></a></span></td>
                       <?php }
                       else { ?>
                       <td>Não está em nenhum duelo</td>
                       <?php } ?>
                  </tr>
                  <tr>
                    <td height="25" align="center" valign="middle"  ><span class="Black style12"> Talento :</span></td>
                    <td height="25" align="center" valign="middle"  ><span class="Black Black style12"><?php echo $linhas->talento;?></span></td>
                  </tr>
                  <tr>
                    <td height="70" align="center" valign="middle"  ><p class="Black Black style12">Video:</p>
                        <p class="Black Black style12">&nbsp;</p></td>
                    <td height="70" align="center" valign="middle"  ><span class="Black Black style12"><strong>
                      
                      <object width="345" height="250">
                          <param name="allowFullScreen" value="true" />
                          <param name="allowscriptaccess" value="always" />
                          <iframe src="https://www.youtube.com/embed/<?php echo $linhas->video;?>" frameborder="0" allowfullscreen  width="245" height="150" ></iframe>
                        </object>
                    </strong></span></td>
                  </tr>
          </table>
          
              <a href='index.php?p=6&user=<?php echo base64_encode($ID);?>'><strong> Deixar recado no mural</strong></a></p>
          </div>
            <div class="bottom-left-corner">
              <?php
}
?>
          </div>
            <div class="bottom-right-corner"></div>
        </div>
  </div>
   