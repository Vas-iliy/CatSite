<?php

function person ($id)
{
	$sql = "SELECT description, img, login FROM registrations WHERE id_login = :id";
	$data = dbQuery($sql, ['id' => $id]);
	$data = $data->fetchAll();

	return $data;
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
	$sql = "SELECT review, login, dt_review FROM reviews JOIN registrations USING (id_login) 
			WHERE id_person = :id";
	$data = dbQuery($sql, ['id' => $id]);
	$data = $data->fetchAll();

	return $data;
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
	$sql = "SELECT review FROM reviews WHERE id_login = :id";
	$data = dbQuery($sql, ['id' => $id]);
	$data = $data->fetchAll();

	return $data;
}


