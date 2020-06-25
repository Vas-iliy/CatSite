<?php

include_once ('init.php');

$user = authGetUser();

define('URL_PARAMS', parsUrl($_GET['querysystemurl'] ?? ''));

$cname = URL_PARAMS[0] ?? 'states';
$patch = "controllers/$cname.php";
$pageTitle = 'Ошибка 404';
$pageContent = '';
$sidebar = '';
$header = '';

if (checkControllerName($cname) && file_exists($patch)) {
	include_once ($patch);
} else {
	$pageContent = template('errors/v_404');
}


$html = template('bace/v_main', [
	'title' => $pageTitle,
	'content' => $pageContent,
	'header' => $header
]);



echo $html;