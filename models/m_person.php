<?php

function reviews ($id)
{
	$sql = "SELECT * FROM reviews WHERE id_person = :id";
	$data = dbQuery($sql, ['id' => $id]);
	$data = $data->fetch();

	return $data;
}

function person ($id)
{
	$sql = "SELECT * FROM person WHERE id_login = :id";
	$data = dbQuery($sql, ['id' => $id]);
	$data = $data->fetch();

	return $data;
}

function information ($id)
{
	$sql = "SELECT state_title, comment, review FROM person JOIN states USING (id_login) 
			JOIN comment USING (id_person) JOIN reviews USING (id_person) WHERE id_login = :id";
	$data = dbQuery($sql, ['id' => $id]);
	$data = $data->fetch();

	return $data;
}

