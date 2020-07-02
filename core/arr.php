<?php

function extractFields($target, $fields) {
    $arr = [];
    foreach ($fields as $field) {
        $arr[$field] = $target[$field];
    }
    return $arr;
}

function authKeyFunction () {
	$arr = '';
	$key = substr(bin2hex(random_bytes(20)), 0, 20);
	for ($i = 0; $i < 20; $i++) {
		$arr .= $key[rand(0, (strlen($key)-1))];
	}

	return $arr;
}