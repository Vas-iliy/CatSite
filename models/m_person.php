<?php

function person ($id)
{
	return select(['description', 'img', 'login'], 'registrations', ['id_login' => ''], $id);
}

function updateInformation ($params)
{
	$sql = "UPDATE registrations SET description = :description WHERE id_login = :id";
	dbQuery($sql, $params);

	return true;
}

function updateImg ($params)
{
	$sql = "UPDATE registrations SET img = :img WHERE id_login = :id";
	dbQuery($sql, $params);

	return true;
}

function reviews ($id)
{
	return select(['review', 'dt_review', 'login'],
		'reviews', ['id_person' => ''], $id, ['registrations' => 'id_login']);
}

function informFromState ($id)
{
	$sql = "SELECT state_title FROM states JOIN reviews ON states.id_login = reviews.id_person 
			WHERE id_person = :id";
	$data = dbQuery($sql, ['id' => $id]);
	$data = $data->fetchAll();

	return $data;
}

function informFromComment ($id)
{
	$sql = "SELECT comment FROM comment JOIN reviews ON comment.id_login = reviews.id_person 
			WHERE id_person = :id";
	$data = dbQuery($sql, ['id' => $id]);
	$data = $data->fetchAll();

	return $data;
}

function informFromReview ($id)
{
	return select(['review'], 'reviews', ['id_login' => ''], $id);

}


