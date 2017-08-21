<?php

require '../Slim/Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$app->response()->header('Content-Type', 'application/json;charset=utf-8');


$app->get('/duelos','getDuelos');
$app->get('/categorias','getDuelos');
$app->run();

function getConn()
{
    return new PDO('mysql:host=localhost;dbname=c9', "aldohenrique",
    '',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );

}

function getDuelos()
{
    $stmt = getConn()->query("select TIME_TO_SEC(TIMEDIFF(CURRENT_TIMESTAMP,data))/60 as data, IDduelos, votos1, votos2,ID1,ID2,
d1.Login as Login1, 
d1.video as video1,
d1.talento as talento1,
d2.Login as Login2, 
d2.video as video2,
d2.talento as talento2
from duelos as du , dados_usuarios as d1 , dados_usuarios as d2
where 
d1.ID = du.ID1 and  d2.ID = du.ID2
order by IDduelos desc");
    $duelos = $stmt->fetchAll(PDO::FETCH_OBJ);
    echo "{duelos:".json_encode($duelos)."}";
}

function getVideo($video){
        $uri = "https://www.youtube.com/oembed?url=http://www.youtube.com/watch?v=$linhas->video1&format=json";
require 'Slim/Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$app->response()->header('Content-Type', 'application/json;charset=utf-8');
$app->get('/foo', function (ServerRequestInterface $request, ResponseInterface $response) {
    // Use the PSR 7 $request object

    return $response;
});
$app->run();
}