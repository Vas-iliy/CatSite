<?php

function userInsert ($params) {
    $sql = "INSERT INTO registrations (login, password, email, authKey) 
        VALUES (:login, :password, :email, :auth)";
    dbQuery($sql, $params);

    return true;
}

function authKeyFunction () {
    $arr = '';
    $key = substr(bin2hex(random_bytes(20)), 0, 20);
    for ($i = 0; $i < 20; $i++) {
        $arr .= $key[rand(0, (strlen($key)-1))];
    }

    return $arr;
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