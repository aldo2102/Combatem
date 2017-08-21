

<div id="corpo">
  <div class="jumbotron jumbotron2">
      <div style="float:right"><span class="list-group-item-success">Ganhou</span> <span class="list-group-item-danger">Perdeu</span> <span class="list-group-item-info">Empatou</span></div>
    <h2>Histório de Duelos</h2> 
  </div>
    <?php
    
  

    // find out how many rows are in the table 
$sql = "SELECT count(h.id)
FROM `historico_duelos` as h join dados_usuarios as d1 on h.ID1=d1.ID join dados_usuarios as d2 on h.ID2=d2.ID 
WHERE h.dataFinal !=  '000-00-00'
    order by h.id desc";
$result = mysql_query($sql) or trigger_error("SQL", E_USER_ERROR);
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

// get the info from the db 
$sql = "SELECT h.id as id, d1.Nome as nome1,d1.Login as login1,d2.Nome as nome2,d2.Login as login2, h.votos1,h.votos2, date(h.dataFinal) as finalD
FROM `historico_duelos` as h join dados_usuarios as d1 on h.ID1=d1.ID join dados_usuarios as d2 on h.ID2=d2.ID 
WHERE h.dataFinal !=  '000-00-00'
    order by h.id desc
    LIMIT $offset, $rowsperpage";
$consulta = mysql_query($sql) or trigger_error("SQL", E_USER_ERROR);

    $i=1;
    while($linhas = mysql_fetch_object($consulta)) {
        if($linhas->votos1>$linhas->votos2){
            $estilo1="list-group-item list-group-item-success";
            $estilo2="list-group-item list-group-item-danger";
        }elseif($linhas->votos2>$linhas->votos1){
            $estilo2="list-group-item list-group-item-success";
            $estilo1="list-group-item list-group-item-danger";
        }elseif($linhas->votos2==$linhas->votos1){
            $estilo1="list-group-item list-group-item-info";
            $estilo2="list-group-item list-group-item-info";
        }
    ?>
    
     <div class="jumbotron jumbotron2" id="<?php echo $linhas->id; ?>"> 
             <div id="centralizado"><h3>  <b>Duelo: <?php echo $linhas->id ?></b> - Data: <?php echo $linhas->finalD ?></h3></div>
             
            
           
            
            <div id="direita"> 
                <ul class="list-group">
                    
                  <li id="<?php echo $linhas->login2.$linhas->id; ?>" class="<?php echo $estilo2; ?>"><span class="badge"><?php echo $linhas->votos2 ?></span><div class="texto"><?php echo $linhas->login2 ?></div></li>
        
                </ul>
            </div>  
             <div id="esquerda">   
                <ul class="list-group">
                  <li id="<?php echo $linhas->login1.$linhas->id; ?>" class="<?php echo $estilo1; ?>" ><span class="badge"><?php echo $linhas->votos1 ?></span><div class="texto"><?php echo $linhas->login1 ?></div></li>
        
                </ul>
            </div> 
    </div>    
    
<?php 
    $i++;
    } 
 ?>
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
	<a href='{$_SERVER['PHP_SELF']}?p=12&currentpage=1' aria-label='Previous'>
        <span aria-hidden='true'><<</span>
      </a>
    </li>";
   // get previous page num
   $prevpage = $currentpage - 1;
   // show < link to go back to 1 page


   echo " <li><a href='{$_SERVER['PHP_SELF']}?p=12&currentpage=$prevpage'><</a></li> ";
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
         echo " <li><a href='{$_SERVER['PHP_SELF']}?p=12&currentpage=$x'>$x</a></li> ";
      } // end else
   } // end if 
} // end for

// if not on last page, show forward and last page links        
if ($currentpage != $totalpages) {
   // get next page
   $nextpage = $currentpage + 1;
    // echo forward link for next page 
   echo " <li><a href='{$_SERVER['PHP_SELF']}?p=12&currentpage=$nextpage'>></a></li> ";
   // echo forward link for lastpage
   echo " <li><a href='{$_SERVER['PHP_SELF']}?p=12&currentpage=$totalpages'>>></a></li> ";
} // end if
/****** end build pagination links ******/
?>
</ul>
</nav>
</div>
</div>