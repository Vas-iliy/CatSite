<?php

function userInsert ($params) {
	return insert('registrations', ['login', 'password', 'email', 'authKey'], $params);
}

function userSelect ($email) {
	return select(['validations'], 'registrations', ['email' => ''], $email, [], null, '');
}

function userUpdate ($params) {
	return update('registrations', ['validations'],'authKey', $params, 'aaa');
}

function userSelectLogin () {
	return select(['login'], 'registrations', null, null, [], 'id_login', '', [], 'DESC');
}