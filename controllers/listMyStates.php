<?php
$id_login = $userLoadingYes['id_login'];
$pageTitle = 'Мои статьи';
$states = stateIdSelect($id_login);
$cats = catsSelect();

$content = template('v_states', [
	'states' => $states,
	'user' => 'yes'
]);
$sidebar = template('v_cats_left', ['cats' => $cats]);
$pageContent = template('bace/v_main2c', [
	'left' => $sidebar,
	'content' => $content
]);

$header = head($userLoadingYes);
