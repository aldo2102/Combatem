<?php
// inclui o arquivo de configuração do sistema
include "Config/config_sistema.php";
$estilo = $_GET['estilo'];
if($estilo== "" || $estilo== "Todos")
{
	$consulta = mysql_query("select * from duelos ");
}
else
{
	$consulta = mysql_query("select * from duelos where talento1='$estilo' OR talento2='$estilo'");
}
// faz consulta no banco de dados
?>


<div  >
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
        <div class="body-panel">
            <div class="top-left-corner"></div>
            <div class="top-right-corner"></div>
            <div class="inside">
              <div >
                <p class="style16">Cadastro</p>
                <form action="index.php?p=2&option=1" method="post" enctype="multipart/form-data" name="formcadastro">
                  
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
                  <div id="calling"></div>
                  <div class="form-group">
                      <label for="video">   Endere&ccedil;o de seu Video: </label> 
                      Coloque somente o c&oacute;digo (em vermelho) do v&iacute;deo, como o exemplo abaixo
                      <p>http://www.youtube.com/watch?v=<span style="color:red;">XwNp9sPCsnk</span></p>
                        
                        <input placeholder="XwNp9sPCsnk" name="video" type="text" id="video" size="40" maxlength="200" class="form-control"  aria-describedby="basic-addon3"/>
                  </div>
                  
                  <div class="form-group">
                    <label for="login"> Login:<div id="canal"></div></label> <input required="required" id="login" name="login" type="text" id="login" size="40" maxlength="200"/>
                  </div>
                    <div class="form-group">
                      <label for="Senha"> Senha: </label> <input required="required" name="senha" type="password" id="label" size="20" maxlength="15" />
                    </div>
                    <div class="form-group">
                      <label for="Senha"> Repetir senha: </label> <input required="required" name="rep_senha" type="password" id="label2" size="20" maxlength="15" />
                    </div>
                    <div class="form-group">
                      <label for="Nome"> Nome: </label><input required="required" name="nome" type="text" id="label3" size="40" maxlength="200" />
                    </div>
                    <div class="form-group">
                      <label for="email"> E-mail: </label><input required="required" name="email" type="email" id="label4" size="40" maxlength="200" />
                    </div>
                    <div class="form-group">
                      <label for="Sexo"> 
                        Sexo: </label><input name="sexo" type="radio" value="Masculino" id="radiobutton" /> Masculino
                        <input name="sexo" type="radio" value="Feminino" id="radio" /> Feminino
                    </div>
                    <div class="form-group">
                      <label for="DN"> 
                    Data de nascimento: </label> <input required="required" type="date" name="dn"/>
                     </div>
                  <div class="form-group">
                      <label for="Pais">   País: </label> <select required="required"   name=pais>
<option value="África do Sul">África do Sul</option>
<option value="Albânia">Albânia</option>
<option value="Alemanha">Alemanha</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antigua">Antigua</option>
<option value="Arábia Saudita">Arábia Saudita</option>
<option value="Argentina">Argentina</option>
<option value="Armênia">Armênia</option>
<option value="Aruba">Aruba</option>
<option value="Austrália">Austrália</option>
<option value="Áustria">Áustria</option>
<option value="Azerbaijão">Azerbaijão</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrein">Bahrein</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Bélgica">Bélgica</option>
<option value="Benin">Benin</option>
<option value="Bermudas">Bermudas</option>
<option value="Botsuana">Botsuana</option>
<option value="Brasil" selected>Brasil</option>
<option value="Brunei">Brunei</option>
<option value="Bulgária">Bulgária</option>
<option value="Burkina Fasso">Burkina Fasso</option>
<option value="botão">botão</option>
<option value="Cabo Verde">Cabo Verde</option>
<option value="Camarões">Camarões</option>
<option value="Camboja">Camboja</option>
<option value="Canadá">Canadá</option>
<option value="Cazaquistão">Cazaquistão</option>
<option value="Chade">Chade</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Cidade do Vaticano">Cidade do Vaticano</option>
<option value="Colômbia">Colômbia</option>
<option value="Congo">Congo</option>
<option value="Coréia do Sul">Coréia do Sul</option>
<option value="Costa do Marfim">Costa do Marfim</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Croácia">Croácia</option>
<option value="Dinamarca">Dinamarca</option>
<option value="Djibuti">Djibuti</option>
<option value="Dominica">Dominica</option>
<option value="EUA">EUA</option>
<option value="Egito">Egito</option>
<option value="El Salvador">El Salvador</option>
<option value="Emirados Árabes">Emirados Árabes</option>
<option value="Equador">Equador</option>
<option value="Eritréia">Eritréia</option>
<option value="Escócia">Escócia</option>
<option value="Eslováquia">Eslováquia</option>
<option value="Eslovênia">Eslovênia</option>
<option value="Espanha">Espanha</option>
<option value="Estônia">Estônia</option>
<option value="Etiópia">Etiópia</option>
<option value="Fiji">Fiji</option>
<option value="Filipinas">Filipinas</option>
<option value="Finlândia">Finlândia</option>
<option value="França">França</option>
<option value="Gabão">Gabão</option>
<option value="Gâmbia">Gâmbia</option>
<option value="Gana">Gana</option>
<option value="Geórgia">Geórgia</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Granada">Granada</option>
<option value="Grécia">Grécia</option>
<option value="Guadalupe">Guadalupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guiana">Guiana</option>
<option value="Guiana Francesa">Guiana Francesa</option>
<option value="Guiné-bissau">Guiné-bissau</option>
<option value="Haiti">Haiti</option>
<option value="Holanda">Holanda</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungria">Hungria</option>
<option value="Iêmen">Iêmen</option>
<option value="Ilhas Cayman">Ilhas Cayman</option>
<option value="Ilhas Cook">Ilhas Cook</option>
<option value="Ilhas Curaçao">Ilhas Curaçao</option>
<option value="Ilhas Marshall">Ilhas Marshall</option>
<option value="Ilhas Turks & Caicos">Ilhas Turks & Caicos</option>
<option value="Ilhas Virgens (brit.)">Ilhas Virgens (brit.)</option>
<option value="Ilhas Virgens(amer.)">Ilhas Virgens(amer.)</option>
<option value="Ilhas Wallis e Futuna">Ilhas Wallis e Futuna</option>
<option value="Índia">Índia</option>
<option value="Indonésia">Indonésia</option>
<option value="Inglaterra">Inglaterra</option>
<option value="Irlanda">Irlanda</option>
<option value="Islândia">Islândia</option>
<option value="Israel">Israel</option>
<option value="Itália">Itália</option>
<option value="Jamaica">Jamaica</option>
<option value="Japão">Japão</option>
<option value="Jordânia">Jordânia</option>
<option value="Kuwait">Kuwait</option>
<option value="Latvia">Latvia</option>
<option value="Líbano">Líbano</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lituânia">Lituânia</option>
<option value="Luxemburgo">Luxemburgo</option>
<option value="Macau">Macau</option>
<option value="Macedônia">Macedônia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malásia">Malásia</option>
<option value="Malaui">Malaui</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marrocos">Marrocos</option>
<option value="Martinica">Martinica</option>
<option value="Mauritânia">Mauritânia</option>
<option value="Mauritius">Mauritius</option>
<option value="México">México</option>
<option value="Moldova">Moldova</option>
<option value="Mônaco">Mônaco</option>
<option value="Montserrat">Montserrat</option>
<option value="Nepal">Nepal</option>
<option value="Nicarágua">Nicarágua</option>
<option value="Niger">Niger</option>
<option value="Nigéria">Nigéria</option>
<option value="Noruega">Noruega</option>
<option value="Nova Caledônia">Nova Caledônia</option>
<option value="Nova Zelândia">Nova Zelândia</option>
<option value="Omã">Omã</option>
<option value="Palau">Palau</option>
<option value="Panamá">Panamá</option>
<option value="Papua-nova Guiné">Papua-nova Guiné</option>
<option value="Paquistão">Paquistão</option>
<option value="Peru">Peru</option>
<option value="Polinésia Francesa">Polinésia Francesa</option>
<option value="Polônia">Polônia</option>
<option value="Porto Rico">Porto Rico</option>
<option value="Portugal">Portugal</option>
<option value="Qatar">Qatar</option>
<option value="Quênia">Quênia</option>
<option value="Rep. Dominicana">Rep. Dominicana</option>
<option value="Rep. Tcheca">Rep. Tcheca</option>
<option value="Reunion">Reunion</option>
<option value="Romênia">Romênia</option>
<option value="Ruanda">Ruanda</option>
<option value="Rússia">Rússia</option>
<option value="Saipan">Saipan</option>
<option value="Samoa Americana">Samoa Americana</option>
<option value="Senegal">Senegal</option>
<option value="Serra Leone">Serra Leone</option>
<option value="Seychelles">Seychelles</option>
<option value="Singapura">Singapura</option>
<option value="Síria">Síria</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="St. Kitts & Nevis">St. Kitts & Nevis</option>
<option value="St. Lúcia">St. Lúcia</option>
<option value="St. Vincent">St. Vincent</option>
<option value="Sudão">Sudão</option>
<option value="Suécia">Suécia</option>
<option value="Suiça">Suiça</option>
<option value="Suriname">Suriname</option>
<option value="Tailândia">Tailândia</option>
<option value="Taiwan">Taiwan</option>
<option value="Tanzânia">Tanzânia</option>
<option value="Togo">Togo</option>
<option value="Trinidad & Tobago">Trinidad & Tobago</option>
<option value="Tunísia">Tunísia</option>
<option value="Turquia">Turquia</option>
<option value="Ucrânia">Ucrânia</option>
<option value="Uganda">Uganda</option>
<option value="Uruguai">Uruguai</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnã">Vietnã</option>
<option value="Zaire">Zaire</option>
<option value="Zâmbia">Zâmbia</option>
<option value="Zimbábue">Zimbábue</option>
</select>
                  </div>
                      
                       
                
                <div class="form-group">
                      <label for="video">     
                <p>Somente participará de duelos quando você permitir.</p></label> 
                <p><select name="vaiDuelar" required="required">
                  <option value="0">Quero duelar</option>
                  <option value="1">Não quero duelar agora</option>
                  </select></p>
              </div>
                  
                   <div class="form-group">
                      <label for="duelas">   Deseja duelar: </label> 
                      <select name="talento" size="1" id="talento">
                        <option value="Tocando">Tocando</option>
                        <option value="Cantando">Cantando</option>
                        <option value="Tocando/Cantando" selected="selected">Tocando/Cantando</option>
                        <option value="Dançando">Dan&ccedil;ando</option>
                      </select>
                    </div>
                    No campo da pergunta secreta n&atilde;o coloque o ponto de interga&ccedil;&atilde;o (?).
                     <div class="form-group">
                      <label for="pergunta">   
                      
                    Pergunta secreta: </label>
                      <input name="pergunta" type="text" id="label11" size="40" maxlength="200" required="required"/> ?
                      </div>
                     <div class="form-group">
                        <label for="pergunta">   
                          Resposta secreta: </label>
                          <input name="resposta" type="text" id="label12" size="40" maxlength="200" required="required"/>
                      </div>
                <input type="submit" name="cadastrar" value="Cadastrar" id="cadastrar" />
                <input type="reset" name="limpar" value="Limpar dados" id="label13" />
                <p>&nbsp;</p>
              </div>
                <p align="center" class="FirstBreakBefore">&nbsp;</p>
                <h3>&nbsp;</h3>
          </div>
            <div class="bottom-left-corner"></div>
            <div class="bottom-right-corner"></div>
        </div>
  </div>
  
</div>
</div>
