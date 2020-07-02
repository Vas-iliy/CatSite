<?php

function commentSelect ($id)
{
	$sql ="SELECT comment, login, comment_time FROM comment JOIN registrations 
			USING (id_login) WHERE id_state = :id AND comment_moderation = 1";
	$data = dbQuery($sql, ['id' => $id]);
	$data = $data->fetchAll();

	return $data;
}

function commentInsert ($params)
{
	$sql = "INSERT INTO comment (id_login, id_state, comment) VALUES (:id_login, :id_state, :comment)";
	dbQuery($sql, $params);

	return true;
}
