<?php
$id_state = URL_PARAMS[1];
$state = oneState($id_state);

$pageTitle = 'Страница статьи';

$comments = commentSelect($id_state);

$arr = comments($id_state);

$pageContent = template('v_state', [
	'state' => $state,
	'user' => $userLoadingYes,
	'comments' => $comments,
	'arr' => $arr
]);
$header = head($userLoadingYes);

