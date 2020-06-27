<?php

function catsSelect ()
{
	$sql = "SELECT * FROM cats WHERE moderation = :m ORDER BY id_cat";
	$data = dbQuery($sql, ['m' => 1]);
	$data = $data->fetchAll();

	return $data;
}

function states_cat_login_select ($id)
{
	$sql = "SELECT cat_title ,state_title, state_content, login, id_state FROM cats JOIN states USING (id_cat)
			JOIN registrations USING (id_login) WHERE id_cat = :id AND moderation = :m ORDER BY time DESC";
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
	$sql = "SELECT id_cat FROM cats WHERE cat_title = :cat_title";
	$data = dbQuery($sql, ['cat_title' => $title]);
	$data = $data->fetch();

	return $data;
}