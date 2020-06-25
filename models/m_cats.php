<?php

function catsSelect ()
{
	$sql = "SELECT * FROM cats ORDER BY id_cat";
	$data = dbQuery($sql, null);
	$data = $data->fetchAll();

	return $data;
}