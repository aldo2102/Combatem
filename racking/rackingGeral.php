<div id="corpo">
  <div class="jumbotron">
    <h4>RANCKING POR TOTAL DE VOTOS</h4>
  </div>
        <?php

    // find out how many rows are in the table 
$sql = "SELECT count(Login)
    from dados_usuarios
    order by pontos desc, total_votos desc";
$result = mysql_query($sql) or trigger_error("SQL", E_USER_ERROR);
$r = mysql_fetch_row($result);
$numrows = $r[0];

// number of rows to show per page
$rowsperpage = 50;
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

$sql2="select Login, Nome, total_votos, pontos
    from dados_usuarios
    order by pontos desc, total_votos desc
    LIMIT $offset, $rowsperpage";
    
    
    $consulta = mysql_query($sql2) or trigger_error("SQL", E_USER_ERROR);

    $i=$offset+1;
    while($linhas = mysql_fetch_object($consulta)) {
    ?>
        <ul class="list-group">
          <li class="list-group-item">
            <span class="badge"><?php echo ($linhas->total_votos==1?$linhas->total_votos." voto total" : $linhas->total_votos." votos totais") ?></span>
            <span class="badge"><?php echo ($linhas->pontos==1?$linhas->pontos." Ponto" : $linhas->pontos." Pontos") ?></span>
            <?php  echo "<b>".$i.". "?><a href="index.php?p=5&user=<?php echo $linhas->Login?>" ><?php  echo " </b>  ".$linhas->Nome." - <b>". $linhas->Login."</b>" ?> </a>
          </li>
        </ul>
    
    <?php 
    $i++;
    } ?>
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
	<a href='{$_SERVER['PHP_SELF']}?p=8&currentpage=1' aria-label='Previous'>
        <span aria-hidden='true'><<</span>
      </a>
    </li>";
   // get previous page num
   $prevpage = $currentpage - 1;
   // show < link to go back to 1 page


   echo " <li><a href='{$_SERVER['PHP_SELF']}?p=8&currentpage=$prevpage'><</a></li> ";
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
         echo " <li><a href='{$_SERVER['PHP_SELF']}?p=8&currentpage=$x'>$x</a></li> ";
      } // end else
   } // end if 
} // end for

// if not on last page, show forward and last page links        
if ($currentpage != $totalpages) {
   // get next page
   $nextpage = $currentpage + 1;
    // echo forward link for next page 
   echo " <li><a href='{$_SERVER['PHP_SELF']}?p=8&currentpage=$nextpage'>></a></li> ";
   // echo forward link for lastpage
   echo " <li><a href='{$_SERVER['PHP_SELF']}?p=8&currentpage=$totalpages'>>></a></li> ";
} // end if
/****** end build pagination links ******/
?>
</ul>
</nav>
</div>
</div>