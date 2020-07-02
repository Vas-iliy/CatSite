<?php
$id_state = URL_PARAMS[1];
$state = oneState($id_state);

$pageTitle = 'Страница статьи';

$comments = commentSelect($id_state);

comments($id_state, $userLoadingYes);

$pageContent = template('v_state', [
	'state' => $state,
	'user' => $userLoadingYes,
	'comments' => $comments,
]);
$header = head($userLoadingYes);

