<?php 


function loadJson($path) {
    if (!file_exists($path)) {
        file_put_contents($path, json_encode([]));
    }
    return json_decode(file_get_contents($path), true);
}

function saveJson($path, $data) {
    file_put_contents($path, json_encode($data, JSON_PRETTY_PRINT));
}



?>