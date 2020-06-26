<?php
$login = $userLoadingYes['login'];
$pageTitle = "$login";
$states = stateSelect();
$cats = catsSelect();


$content = template('v_states', ['states' => $states]);
$sidebar = template('v_cats', ['cats' => $cats]);
$pageContent = template('bace/v_main2c', [
	'left' => $sidebar,
	'content' => $content
]);

$header = template('bace/v_main_login', [
	'name' => $login,
	'loginId' => $userLoadingYes['id_login']
]);

if ($_POST['exit']) {
	session_destroy();
	header('Location:' . BASE_URL);
}
