<?php
$id_login = $userLoadingYes['id_login'];
$id_state = URL_PARAMS[1];
$pageTitle = 'Редактирование';
$oldState = oldState($id_state);
$oldCat = oldCat($oldState[0]['id_cat']);


$validate = state($id_login, $id_state);

$pageContent = template('v_newState', [
	'validate' => $validate,
	'oldTitle' => $oldState[0]['state_title'],
	'oldCat' => $oldCat['cat_title'],
	'oldContent' => $oldState[0]['state_content']
]);


