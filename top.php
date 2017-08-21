<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CombateM - Duelo Entre Artístas</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src='js/jquery.js'></script>
    
    <link href="css/mycss.css" rel="stylesheet">
    
</head>

<body>
    
    <?php
        session_start("DueloMusical");
        include_once "duelos/geraDuelos.php";
        $user='';
        function logado(){
            if(isset($_SESSION['logado'])){
                $user=$_SESSION['login_usuario'];
                return true;
            }
            else{
                return false;
            }
            
        }
        
        gerarDuelo();
        apagarDuelo();
        
        //include_once("vendor/phpmailer/phpmailer/email.php");
    ?>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CombateM</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                     <li>
                        <a href="index.php?p=1">Duelos</a>
                    </li>
                    <li>
                        <a href="index.php?p=10">Regras</a>
                    </li>
                    <li>
                        <a href="index.php?p=8">Ranking</a>
                    </li>
                    <li>
                        <a href="index.php?p=12">Histórico de Duelos</a>
                    </li>
                </ul>
                <?php 
                    if(logado()){
                         $user=$_SESSION['login_usuario'];
                         $ID=$_GET['user'];

                        ?>
                        <ul class="nav navbar-nav navbar-right">
                          <li><a href="index.php?p=5&user=<?php echo $user; ?>"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
                          <li><a href="index.php?p=4&user=<?php echo $user; ?>"><span class="glyphicon glyphicon-inbox"></span>Mural</a></span></li>
                          <li><a href="index.php?p=3&option=2"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
                        </ul>
                        <?php
                    }
                    else{
                ?>
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="index.php?p=2"><span class="glyphicon glyphicon-user"></span> Cadastre-se</a></li>
                  <li><a href="index.php?p=3"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
                <?php } ?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>