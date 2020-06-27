<?php

function catsSelect ()
{
	$sql = "SELECT * FROM cats ORDER BY id_cat";
	$data = dbQuery($sql, null);
	$data = $data->fetchAll();

	return $data;
}

function states_cat_login_select ($id)
{
	$sql = "SELECT cat_title ,state_title, state_content, login, id_state FROM cats JOIN states USING (id_cat)
			JOIN registrations USING (id_login) WHERE id_cat = :id ORDER BY time DESC";
	$data = dbQuery($sql, ['id' => $id]);
	$data = $data->fetchAll();

	return $data;
}