<?php

/**
 * выводит информацию о зарегистрированном пользователе
 * @param $login
 * @return bool|mixed|PDOStatement
 */
function usersOne ($login) {
	return select(['password', 'id_login'], 'registrations', ['login' => ''], $login, [], null, '');
}

/**
 * получаем айди залогинившегося пользователя
 * @param $id
 * @return bool|mixed|PDOStatement
 */
function usersById ($id) {
	return select(['id_login', 'login'], 'registrations', ['id_login' => ''], $id, [], null, '');
}

/**
 * проверка, подтверждена ли почта
 * @param $login
 * @return bool|mixed|PDOStatement
 */
function searchValidate ($login) {
	return select(['id_login'], 'registrations', ['validations' => 1, 'login' => ''], $login, [], null, '');
}

