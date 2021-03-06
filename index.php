<?php
//var_dump(password_hash('123', PASSWORD_BCRYPT));

session_start();

include_once ('init.php');

$userLoadingYes = authGetUser();

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
	'header' => $header,
	'user' => $userLoadingYes
]);

echo $html;