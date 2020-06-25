<?php
$pageTitle = 'Главная страница';
$states = stateSelect();
$cats = catsSelect();
$mail = '';

$content = template('v_states', ['states' => $states]);
$sidebar = template('v_cats', ['cats' => $cats]);
$pageContent = template('bace/v_main2c', [
	'left' => $sidebar,
	'content' => $content
]);

$header = template('bace/v_main_no_login', ['mail' => $mail]);

