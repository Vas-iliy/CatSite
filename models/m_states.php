<?php

function stateSelect ()
{
	$sql = "SELECT state_title, state_content FROM states WHERE moderation = 1";
	$data = dbQuery($sql, null);
	$data = $data->fetchAll();

	return $data;
}