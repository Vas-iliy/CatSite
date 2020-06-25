<?php

function stateSelect ()
{
	$sql = "SELECT state_title, state_content, login, id_state FROM states JOIN registrations USING (id_login)
			WHERE moderation = 1";
	$data = dbQuery($sql, null);
	$data = $data->fetchAll();

	return $data;
}