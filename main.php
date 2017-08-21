<!-- Page Content -->
    

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <h2 style="font-size: 60ew;">Seja Bem Vindo ao <nowrap><b style="color:#cc0000;">CombateM</b> <img src="img/Logo5.PNG" width=100/></nowrap></h2>
            <p>O CombateM surgiu em 2017 como alternativa de divulgação para os artistas independentes em forma de duelos.</p>

            <p>A ideia aqui é ajudar artistas a alcançarem públicos ainda não atingidos, além de possibilitar o ganho de views em seus vídeos.</p>
            <p>Uma forma diferente de divulgar seus vídeos do <b>YouTube</b> participando de duelos com outros músicos.</p>
            <p><a class="btn btn-primary btn-large" href="index.php?p=1">Duelos!</a>
            </p>
        </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Últimos Duelos</h3>
            </div>
        </div>
        <!-- /.row -->
        
        <!-- Page Features -->
        <div class="row text-center">
<?php
    $sql =" from duelos as du , dados_usuarios as d1 , dados_usuarios as d2
where 
d1.ID = du.ID1 and  d2.ID = du.ID2 
order by IDduelos desc
Limit 4";

$consulta = mysql_query("select distinct TIME_TO_SEC(TIMEDIFF(CURRENT_TIMESTAMP,data))/60 as data, IDduelos, votos1, votos2,ID1,ID2,
d1.Login as Login1, 
d1.video as video1,
d1.talento as talento1,
d2.Login as Login2, 
d2.video as video2,
d2.talento as talento2
 ".$sql);
    
include_once("api/apiVideos.php");

while($linhas = mysql_fetch_object($consulta)) {

$image1 = getVideo($linhas->video1);
$image2 = getVideo($linhas->video2);
$image1 = $image1->thumbnail_url;
$image2 = $image2->thumbnail_url;

	
?>


            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <div class="centralizadoMain">
                        <img src="<?php echo $image1 ?>" alt="" width=80 >
                        <img src="<?php echo $image2 ?>" alt="" width=80 >
                    </div>
                    <div class="caption">
                        <h3>Batalha <?php echo $linhas->IDduelos ?></h3>
                        <p><a href="index.php?p=5&user=<?php echo base64_encode($linhas->ID1);?>"><?php echo $linhas->Login1;?></a> <b>VS</b> 
                        <a href="index.php?p=5&user=<?php echo base64_encode($linhas->ID2);?>"><?php echo $linhas->Login2;?></a></p>
                        <p>
                            <a href="index.php?p=1&duelo=<?php echo base64_encode(" and IDduelos=".$linhas->IDduelos)?>" class="btn btn-default">Votar</a>
                        </p>
                    </div>
                </div>
            </div>
<?php } ?>
            

            </div>

        <!-- /.row -->