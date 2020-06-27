<?php
$id_login = $userLoadingYes['id_login'];
$id_state = URL_PARAMS[1];
$pageTitle = 'Редактирование';
$oldState = oldState($id_state);
$oldCat = oldCat($oldState['id_cat']);


$validate = state($id_login, $id_state);

$pageContent = template('v_newState', [
	'validate' => $validate,
	'oldTitle' => $oldState['state_title'],
	'oldCat' => $oldCat['cat_title'],
	'oldContent' => $oldState['state_content']
]);

$header = head($userLoadingYes);



