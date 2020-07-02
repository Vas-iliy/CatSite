<?php

function commentSelect ($id)
{
	return select(['comment', 'comment_time', 'login'],
		'comment', ['comment_moderation' => 1, 'id_state' => ''], $id, ['registrations' => 'id_login']);
}

function commentInsert ($params)
{
	$sql = "INSERT INTO comment (id_login, id_state, comment) VALUES (:id_login, :id_state, :comment)";
	dbQuery($sql, $params);

	return true;
}
