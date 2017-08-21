<div id="mainContent">
        <div class="body-panel">
            <div class="top-left-corner"></div>
            <div class="top-right-corner"></div>
            <div class="inside">
                <p align="center" >&nbsp;</p>
                <p>
                <div align="center">
                  <p align="center">Selecione o estilo de batalha que deseja ver:</p>
                  <p align="center"><a href="index.php?p=1&estilo=Tocando">Tocando</a>, <a href="index.php?p=1&estilo=Cantando">Cantando</a>,<a href="index.php?p=1&estilo=Tocando/Cantando"> Tocando e Cantando</a>, <a href="index.php?p=1&estilo=Dançando">Dan&ccedil;ando</a> ou <a href="index.php?p=1&estilo=Todos">Todos </a></p>
                  <p align="center" >&nbsp;</p>
                <style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg .tg-s6z2{text-align:center}
.tg .tg-baqh{text-align:center;vertical-align:top}
</style>
<?php
      $dueloEspecifico = $_GET['duelo'];
      $dueloEspecifico = base64_decode($dueloEspecifico);
                    $estilo = $_GET['estilo'];
										if($estilo== "" || $estilo== "Todos")
					{
						$sql =" from duelos as du , dados_usuarios as d1 , dados_usuarios as d2
where 
d1.ID = du.ID1 and  d2.ID = du.ID2 $dueloEspecifico
order by IDduelos desc";
					}
					else
					{
					  $sql=" from duelos as du , dados_usuarios as d1 , dados_usuarios as d2
where 
(d1.ID = du.ID1 and  d2.ID = du.ID2) and d1.talento='$estilo'
order by IDduelos desc";

}
    // find out how many rows are in the table 
$sql2 = "SELECT count(IDduelos) ".$sql;

$result = @mysql_query($sql2) or trigger_error("SQL", E_USER_ERROR);
$r = mysql_fetch_row($result);
$numrows = $r[0];

// number of rows to show per page
$rowsperpage = 10;
// find out total pages
$totalpages = ceil($numrows / $rowsperpage);

// get the current page or set a default
if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
   // cast var as int
   $currentpage = (int) $_GET['currentpage'];
} else {
   // default page num
   $currentpage = 1;
} // end if

// if current page is greater than total pages...
if ($currentpage > $totalpages) {
   // set current page to last page
   $currentpage = $totalpages;
} // end if
// if current page is less than first page...
if ($currentpage < 1) {
   // set current page to first page
   $currentpage = 1;
} // end if

// the offset of the list, based on current page 
$offset = ($currentpage - 1) * $rowsperpage;


include_once("duelos/votar.php");

						$consulta = @mysql_query("select distinct TIME_TO_SEC(TIMEDIFF(CURRENT_TIMESTAMP,data))/60 as data, IDduelos, votos1, votos2,ID1,ID2,
d1.Login as Login1, 
d1.video as video1,
d1.talento as talento1,
d2.Login as Login2, 
d2.video as video2,
d2.talento as talento2
 ".$sql." LIMIT $offset, $rowsperpage") or trigger_error("SQL", E_USER_ERROR);
						
					
						
					//$consulta = @mysql_query($consulta, $conn) or trigger_error("SQL", E_USER_ERROR);
					// faz consulta no banco de dados
										$num_rows = mysql_num_rows($consulta);
					while($linhas = mysql_fetch_object($consulta)) {
					if($linhas->ID2!=0){
					?>
<div style="overflow-x:auto;">
<table class="jumbotron jumbotron2" id="<?php echo $linhas->IDduelos ?>">
  <tr>
    <th class="tg-031e" colspan="6"><a href="index.php?p=1&duelo=<?php echo base64_encode(" and IDduelos=".$linhas->IDduelos)?>">Batalha <?php echo $linhas->IDduelos ?></a></th>
  </tr>
  <tr>
    <th class="tg-031e" colspan="2" style="width:50%">Guerreiro(a) <p><a href="index.php?p=5&user=<?php echo base64_encode($linhas->ID1);?>"><?php echo $linhas->Login1;?></p></a></th>
    <th class="tg-031e" colspan="2" style="width:50%">Guerreiro(a) <p><a href="index.php?p=5&user=<?php echo base64_encode($linhas->ID2);?>"><?php echo $linhas->Login2;?></p></a></th>
  </tr>
  <tr>
    <th style="width:10%">Votos (%)</th>
    <th  style="width:40%">Vídeo</th>
    <th  style="width:10%">Votos (%)</th>
    <th  style="width:40%">Vídeo</th>
  </tr>
                    
  
  <tr>
    <td class="tg-yw4l"><?php 
							  $T=$linhas->votos1+$linhas->votos2;
							  $p=100*$linhas->votos1;
							  $s=0;
							  if($T!=0)
							  {
							  	$s=$p/$T;
							  }
							  echo number_format($s,2,",","."),'%';
							  ?></td>
    <td class="tg-yw4l"  width="245" height="150" ><div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $linhas->video1;?>" frameborder="0" allowfullscreen  ></iframe>
        </div>
        <br />
        <a href="#myModal" class="btn btn-primary btn-sm btn-responsive" style="width:100%;" id="custId" data-toggle="modal" data-duelo="<?php echo $linhas->IDduelos ?>" data-user="<?php echo $linhas->ID1 ?>">Votar</a>
    <p><br /><a href="index.php?p=5&user=<?php echo base64_encode($linhas->ID1);?>" class="btn btn-primary btn-sm btn-responsive" style="width:100%;">Ver Perfil</a></p>
    
                        </td>
    
    <td class="tg-yw4l"><?php 
							  $T=$linhas->votos1+$linhas->votos2;
							  $p=100*$linhas->votos2;
							  $s=0;
							  if($T!=0)
							  {
							  	$s=$p/$T;
							  }
							  echo number_format($s,2,",","."),'%';
							  ?></td>
    <td class="tg-yw4l"  width="245" height="150" >
      <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $linhas->video2;?>" frameborder="0" allowfullscreen ></iframe>
        </div>
        <br />
      <a href="#myModal" class="btn btn-primary btn-sm btn-responsive" style="width:100%;" id="custId" data-toggle="modal" data-duelo="<?php echo $linhas->IDduelos ?>" data-user="<?php echo $linhas->ID2 ?>">Votar</a>
    <p><br /><a href="index.php?p=5&user=<?php echo base64_encode($linhas->ID2);?>" class="btn btn-primary btn-sm btn-responsive" style="width:100%;">Ver Perfil</a></p>
    
  </tr>
  <tr>
    <th class="tg-031e" colspan="6">
      <h6>Tempo do Duelo - <?php echo intval(((100*(floatval ($linhas->data)))/4320)) ?>% concluído</h6>
        <div class="progress">
          <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?php echo intval(((100*(floatval ($linhas->data)))/4320)) ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo intval(((100*(floatval ($linhas->data)))/4320)) ?>%">
            <span class="sr-only"><?php echo intval(((100*(floatval ($linhas->data)))/4320)) ?>%</span>
          </div>
        </div>
    </th>
  </tr>

        </div>
</table>
</div>

<hr />
  <?php
  }
}


?>

      
      
        </div>
<div id="centralizado">
 <nav aria-label='Page navigation'>
  <ul class='pagination'>
 <?php
// range of num links to show
$range = 3;

// if not on page 1, don't show back links
if ($currentpage > 1) {
   // show << link to go back to page 1
   
   echo " 
    <li>
	<a href='{$_SERVER['PHP_SELF']}?p=1&currentpage=1' aria-label='Previous'>
        <span aria-hidden='true'><<</span>
      </a>
    </li>";
   // get previous page num
   $prevpage = $currentpage - 1;
   // show < link to go back to 1 page


   echo " <li><a href='{$_SERVER['PHP_SELF']}?p=1&currentpage=$prevpage'><</a></li> ";
} // end if 

// loop to show links to range of pages around current page
for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
   // if it's a valid page number...
   if (($x > 0) && ($x <= $totalpages)) {
      // if we're on current page...
      if ($x == $currentpage) {
         // 'highlight' it but don't make a link
         echo " <li class='active'><a href='#'><b>$x</b></a></li>";
      // if not current page...
      } else {
         // make it a link
         echo " <li><a href='{$_SERVER['PHP_SELF']}?p=1&currentpage=$x'>$x</a></li> ";
      } // end else
   } // end if 
} // end for

// if not on last page, show forward and last page links        
if ($currentpage != $totalpages) {
   // get next page
   $nextpage = $currentpage + 1;
    // echo forward link for next page 
   echo " <li><a href='{$_SERVER['PHP_SELF']}?p=1&currentpage=$nextpage'>></a></li> ";
   // echo forward link for lastpage
   echo " <li><a href='{$_SERVER['PHP_SELF']}?p=1&currentpage=$totalpages'>>></a></li> ";
} // end if
/****** end build pagination links ******/
?>
</ul>
</nav>
</div>
</div>
  
  
  
  
  
 