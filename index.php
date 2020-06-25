<?php

include_once ('init.php');

define('URL_PARAMS', parsUrl($_GET['querysystemurl'] ?? ''));

$cname = URL_PARAMS[0] ?? 'states';
$patch = "controllers/$cname.php";
$pageTitle = 'Ошибка 404';
$pageContent = '';

if (checkControllerName($cname) && file_exists($patch)) {
	include_once ($patch);
} else {
	$pageContent = template('errors/v_404');
}

$html = template('standart/v_main', [
	'title' => $pageTitle,
	'content' => $pageContent
]);

echo $html;