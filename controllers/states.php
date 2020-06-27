<?php

$pageTitle = 'Главная страница';
$states = stateSelect();
$cats = catsSelect();
$authArr = false;

$content = template('v_states', ['states' => $states]);
$sidebar = template('v_cats_left', ['cats' => $cats]);
$pageContent = template('bace/v_main2c', [
	'left' => $sidebar,
	'content' => $content
]);

$header = twoHead();


