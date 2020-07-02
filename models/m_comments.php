<?php

function commentSelect ($id)
{
	return select(['comment', 'comment_time', 'login'],
		'comment', ['comment_moderation' => 1, 'id_state' => ''], $id, ['registrations' => 'id_login']);
}

function commentInsert ($params)
{
	return insert('comment', ['id_login', 'id_state', 'comment'], $params);
}
