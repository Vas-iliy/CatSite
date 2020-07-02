<?php

function userInsert ($params) {
	return insert('registrations', ['login', 'password', 'email', 'authKey'], $params);
}

function userSelect ($email) {
	return select(['validations'], 'registrations', ['email' => ''], $email, [], null, '');
}

function userUpdate ($auth) {
    $sql = "UPDATE registrations SET validations = 1, dtNew=current_timestamp WHERE authKey = :auth";
    dbQuery($sql, ['auth' => $auth]);

    return true;
}

function userSelectLogin () {
	$sql = "SELECT login FROM registrations ORDER BY id_login DESC ";
	$data = dbQuery($sql, null);
	$data = $data->fetch();

	return $data;
}