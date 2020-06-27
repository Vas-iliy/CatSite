<?php
$id_state = URL_PARAMS[1];
$state = oneState($id_state);

$pageTitle = 'Страница статьи';
$pageContent = template('v_state', [
	'state' => $state,
	'user' => $userLoadingYes
]);
$header = head();