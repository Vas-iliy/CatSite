<?php

function state ($id_login, $id_state)
{
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$params   = extractFields( $_POST, [ 'state_title', 'cat_title', 'state_content' ] );
		$validate = validate( $params );

		$oneCat = oneCat( $params['cat_title'] );
		if ( $oneCat == '' ) {
			$cat = catInsert( $params['cat_title'] );
		}

		$oneCat = oneCat( $params['cat_title'] );
		unset( $params['cat_title'] );
		$params['id_cat']   = $oneCat['id_cat'];
		$params['id_login'] = $id_login;

		if ( $id_state === null ) {
			$state = stateInsert( $params );
		} else {
			$params['id'] = $id_state;
			$state = stateUpdate( $params );
		}

		if ( $state ) {
			header( 'Location:' . BASE_URL );
		}

	}
	else {
		$validate = [];
	}
	return $validate;
}

function comments ($id_state, $userLoadingYes)
{
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$params   = extractFields( $_POST, [ 'comment' ] );
		$params['id_login'] = $userLoadingYes['id_login'];
		$params['id_state'] = $id_state;

		commentInsert($params);

		return true;
	}
}