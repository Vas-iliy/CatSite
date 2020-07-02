<?php

function stateSelect ()
{
	return select(['state_title', 'state_content', 'login', 'id_login', 'id_state'],
		'states', ['state_moderation' => 1], null, ['registrations' => 'id_login']);
}

function oneState ($id)
{
	return select(['state_title', 'state_content', 'login', 'id_login'],
		'states', ['id_state' => ''], $id, ['registrations' => 'id_login'], null, '');
}

function stateInsert ($params)
{
	return insert('states', ['state_title', 'state_content', 'id_cat', 'id_login'], $params);
}

function stateUpdate ($params)
{
	return update('states', ['state_title', 'state_content', 'id_cat', 'id_login', 'state_moderation'],'id_state', $params);
}

function stateIdSelect ($id)
{
	return select(['state_title', 'state_content', 'id_state', 'id_login'],
		'states', ['id_login' => ''], $id, ['registrations' => 'id_login']);
}

function oldState ($id)
{
	return select(['state_title', 'state_content', 'id_cat'],
		'states', ['id_state' => ''], $id, [], null, '');
}

function validate (&$params) {
	$errors =[];
	if (mb_strlen($params['state_title'], 'UTF-8') < 10) {
		$errors[] = 'Слишком короткое название статьи';
	}

	if (mb_strlen($params['state_content'], 'UTF-8') < 200) {
		$errors[] = 'Слишком короткий текст статьи';
	}

	$params['state_title'] = htmlspecialchars($params['state_title']);
	$params['state_content'] = htmlspecialchars($params['state_content']);
	$params['cat_title'] = htmlspecialchars($params['cat_title']);
	return $errors;
}