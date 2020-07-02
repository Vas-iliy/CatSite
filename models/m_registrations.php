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
	return select(['login'], 'registrations', null, null, [], 'id_login', '', [], 'DESC');
}