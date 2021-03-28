<?php

function writeLog($message, $path ){
    $file_path = $path."/accessLog.txt";
    $fp = fopen($file_path,'a'); //a is append mode
    fwrite($fp, date("c  "));
    fwrite($fp, $message);
    fwrite($fp, PHP_EOL);
    fclose($fp);
}

function writeApplicationLog($message, $path ){
    $file_path = $path."/applicationLogs.txt";
    $fp = fopen($file_path,'a'); //a is append mode
    fwrite($fp, date("c  "));
    fwrite($fp, $message);
    fwrite($fp, PHP_EOL);
    fclose($fp);
}



?>