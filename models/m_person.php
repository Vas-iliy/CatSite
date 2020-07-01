<?php

function reviews ($id)
{
	$sql = "SELECT * FROM reviews WHERE id_login = :id";
	$data = dbQuery($sql, ['id' => $id]);
	$data = $data->fetchAll();

	return $data;
}

function person ($id)
{
	$sql = "SELECT description, img, login FROM registrations WHERE id_login = :id";
	$data = dbQuery($sql, ['id' => $id]);
	$data = $data->fetchAll();

	return $data;
}

function information ($id)
{
	$sql = "SELECT state_title, comment, review FROM registrations JOIN states USING (id_login) 
			JOIN comment USING (id_login) JOIN reviews ON id_login = id_person WHERE id_login = :id";
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

