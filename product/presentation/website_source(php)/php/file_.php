<?php


function createFileEx($path)
{
    echo $path;
    try {
        if (!file_exists($path)) {
            $file = fopen($path, 'w');
            fclose($file);
            return true;
        } else {
            return true;
        }
    } catch (Exception $ex) {
        return false;
    }
}

function createFolderEx($dir_path)
{
    try {
        if (!is_dir($dir_path)) {

            mkdir($dir_path, 0777, true);
            return true;
        } else {
            return true;
        }
    } catch (Exception $ex) {
        return false;
    }
}

?>
