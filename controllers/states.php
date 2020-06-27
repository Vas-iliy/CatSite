<?php

$pageTitle = 'Главная страница';
$states = stateSelect();
$cats = catsSelect();

$content = template('v_states', ['states' => $states]);
$sidebar = template('v_cats_left', ['cats' => $cats]);
$pageContent = template('bace/v_main2c', [
	'left' => $sidebar,
	'content' => $content
]);

$header = head($userLoadingYes);
