<?php

function checkControllerName ($name) {
    return preg_match('/[aA-zZ0-9-_]/', $name);
}

function template ($patch, $vars = []) {
    $standartTemplateFullPatch = "views/$patch.php";
    extract($vars);
    ob_start();
    include ($standartTemplateFullPatch);
    return ob_get_clean();
}

function parsUrl ($url) {
    $params = explode('/', $url);
    $cnt = count($params);

    if ($params[$cnt-1] === '') {
        unset($params[$cnt-1]);
    }

    return $params;
}
