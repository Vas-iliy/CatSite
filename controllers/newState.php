<?php
$id_login = URL_PARAMS[1];
$pageTitle = 'Новая статья';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$params = extractFields( $_POST, [ 'state_title', 'cat_title', 'state_content' ] );
	$validate = validate($params);

	$oneCat = oneCat($params['cat_title']);
	if ($oneCat == '') {
		$cat = catInsert($params['cat_title']);
	}

	$oneCat = oneCat($params['cat_title']);
	var_dump($oneCat);
	unset($params['cat_title']);
	$params['id_cat'] = $oneCat['id_cat'];
	$params['id_login'] = $id_login;

	$state = stateInsert($params);

}
else {
	$validate = [];
}
$pageContent = template('v_newState', ['validate' => $validate]);

