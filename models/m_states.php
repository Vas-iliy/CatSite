<?php

function stateSelect ()
{
	$sql = "SELECT state_title, state_content, login, id_state FROM states JOIN registrations USING (id_login)
			WHERE state_moderation = 1";
	$data = dbQuery($sql, null);
	$data = $data->fetchAll();

	return $data;
}

function oneState ($id)
{
	$sql = "SELECT state_title, state_content, login FROM states JOIN registrations USING (id_login)
			WHERE id_state = :id";
	$data = dbQuery($sql, ['id' => $id]);
	$data = $data->fetch();

	return $data;
}

function stateInsert ($params)
{
	$sql = "INSERT INTO states (state_title, state_content, id_cat, id_login) VALUES 
			(:state_title, :state_content, :id_cat,  :id_login)";
	dbQuery($sql, $params);

	return true;
}

function stateUpdate ($params)
{
	$sql = "UPDATE states SET state_title = :state_title, state_content = :state_content, 
			id_cat = :id_cat, id_login = :id_login WHERE id_state = :id";
	dbQuery($sql, $params);

	return true;
}

function stateIdSelect ($id)
{
	$sql = "SELECT state_title, state_content, id_state FROM states JOIN registrations USING (id_login)
			WHERE id_login = :id";
	$data = dbQuery($sql, ['id' => $id]);
	$data = $data->fetchAll();

	return $data;
}

function oldState ($id)
{
	$sql = "SELECT state_title, state_content, id_cat FROM states WHERE id_state = :id";
	$data = dbQuery($sql, ['id' => $id]);
	$data = $data->fetch();

	return $data;
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