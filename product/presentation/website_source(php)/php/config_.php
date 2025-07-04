<?php


function FOLDER_VENDOR(){
    return  $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
}
function FILE_BOOTSTRAP(){
    return  $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
}

function FILE_AUTOLOAD(){
    return   $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
}

?>