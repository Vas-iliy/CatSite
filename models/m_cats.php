<?php

function catsSelect ()
{
	return select(['*'], 'cats', ['cat_moderation' => 1], null, [], 'id_cat');
}

function states_cat_login_select ($id)
{
	$sql = "SELECT cat_title, state_title, state_content, login, id_state, id_login FROM cats JOIN states USING (id_cat)
			JOIN registrations USING (id_login) WHERE id_cat = :id AND state_moderation = :m ORDER BY time DESC";
	$data = dbQuery($sql, ['id' => $id, 'm' => 1]);
	$data = $data->fetchAll();

	return $data;
}

function catInsert ($title)
{
	$sql = "INSERT INTO cats (cat_title) VALUE (:cat_title) ";
	dbQuery($sql, ['cat_title' => $title]);

	return true;
}

function oneCat ($title)
{
	return select(['*'], 'cats', ['cat_title' => ''], $title, [], null, '');
}

function oldCat ($id)
{
	return select(['*'], 'cats', ['id_cat' => ''], $id, [], null, '');
}