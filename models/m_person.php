<?php

function person ($id)
{
	return select(['description', 'img', 'login'], 'registrations', ['id_login' => ''], $id);
}

function updateInformation ($params)
{
	return update('registrations', ['description'],'id_login', $params);
}

function updateImg ($params)
{
	return update('registrations', ['img'],'id_login', $params);
}

function reviews ($id)
{
	return select(['review', 'dt_review', 'login'],
		'reviews', ['id_person' => ''], $id, ['registrations' => 'id_login']);
}

function informFromState ($id)
{
	return select(['state_title'], 'states', ['id_person' => ''], $id,
		['reviews' => ''], null, 'all', ['id_login', 'id_person']);
}

function informFromComment ($id)
{
	return select(['comment'], 'comment', ['id_person' => ''], $id,
		['reviews' => ''], null, 'all', ['id_login', 'id_person']);
}

function informFromReview ($id)
{
	return select(['review'], 'reviews', ['id_login' => ''], $id);
}

function insertReview ($params)
{
	return insert('reviews', ['id_login', 'id_person', 'review'], $params);
}

