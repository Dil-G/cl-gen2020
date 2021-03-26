<?php

function writeLog($message){
    $fp = fopen('../logs/log.txt', "a");
    fwrite($fp,date("Y/m/d"));
    fwrite($fp,"  ");
    fwrite($fp,date("h:i:sa P "));
    fwrite($fp," GMT ");
    fwrite($fp,$message);
    fwrite($fp,PHP_EOL);
}
?>