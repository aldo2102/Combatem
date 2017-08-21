<?php

if($_POST['video']){
        $video=$_POST['video'];
        $objeto = getVideo($video);
        echo $objeto->author_name;
    }

function getVideo($video){
    
        $uri = "https://www.youtube.com/oembed?url=http://www.youtube.com/watch?v=$video&format=json";
    $json = @file_get_contents($uri);
    $obj = json_decode($json);
    return $obj;
}