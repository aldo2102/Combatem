    <?php
		@session_start("DueloMusical");
// inclui o arquivo de configura��o do sistema
include_once "Config/config_sistema.php";
	$login=$_GET['login'];
	$page=$_GET['p'];
	$option=$_GET['option'];
	$option2=$_POST['option2'];
//if(  $login<>"visitante")
//echo "<script>alert('$login_usuario 11 $login');</script>";
	   include_once "validar_session2.php";

        include_once "top.php"; 
        ?>
        
        
        <div class="container">
            
            
        <?php
        switch ($page) {
            case '1':
               include_once "duelos/duelos.php";
                break;
            case '2':
                if($option=='1')
                    include_once "cadastro_login/cadastra_usuario.php";
                else
                    include_once "cadastro_login/cadastro.php";
                break;
            case '3':
                if($option2=='2'){
                    include_once "cadastro_login/logar.php";
                    header('Location: index.php');
                }
                    
                if($option=='2')
                {
                    header('Location: index.php');
                    include_once "usuario/logout.php";
                }
                else
                    include_once "cadastro_login/login.php";
                break;
            case '4':
                if(logado()){
                    if($option=='2'){
                        include_once "usuario/deletar_post.php";
                    }
                    else{
                        include_once "usuario/verMural.php";
                    }    
                }
                break;
            case '5':
                    include_once "usuario/perfil.php";
                break;
            case '6':
                include_once "usuario/postarMural.php";
                break;
            case '7':
                include_once "usuario/dados_usuario.php";
                break;
            case '8':
                include_once "racking/rackingGeral.php";
                break;
            case '9':
               include_once "usuario/atualizar_dados.php";
                break;
            case '10':
               include_once "racking/regras.php";
                break;
            case '11':
                if(!isset($_POST['foto']))
                    include_once "usuario/mudar_foto.php";
                else
                    include_once "usuario/processa_upload.php";
                break;
            case '12':
               include_once "historico/historico.php";
               break;
            case '101':
               include_once "duelos/duelos2.php";
               break;
            default:
                include_once "main.php";
                break;
        }
        
        include_once "footer.php"; 
    ?>
    
    
        </div>