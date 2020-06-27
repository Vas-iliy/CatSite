<?php

function stateSelect ()
{
	$sql = "SELECT state_title, state_content, login, id_state FROM states JOIN registrations USING (id_login)
			WHERE moderation = 1";
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