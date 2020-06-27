<?php

function state ($id_login, $id_state)
{
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$params = extractFields( $_POST, [ 'state_title', 'cat_title', 'state_content' ] );
		$validate = validate($params);

		$oneCat = oneCat($params['cat_title']);
		if ($oneCat == '') {
			$cat = catInsert($params['cat_title']);
		}

		$oneCat = oneCat($params['cat_title']);
		unset($params['cat_title']);
		$params['id_cat'] = $oneCat['id_cat'];
		$params['id_login'] = $id_login;

		if ($id_state === null) {
			$state = stateInsert($params);
		} else {
			$params['id'] = $id_state;
			$state = stateUpdate($params);
		}


	}
	else {
		$validate = [];
	}
	return $validate;
}