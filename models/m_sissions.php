<?php
/**
 * запись в таблице сессий человека и его уникальный токен
 * @param $params
 * @return bool
 */
function sessionAdd ($params) {
	return insert('sessions', ['id_login', 'token'], $params);
}

/**
 * из таблицы берется айди человека у которого совпадает токин с сессией или кукой
 * @param $token
 * @return bool|mixed|PDOStatement
 */
function sessionOne ($token) {
	return select(['id_login'], 'sessions', ['token' => ''], $token, [], null, '');
}

function dtSession ($params)
{
	return update('sessions', [],'id_login', $params, 'aaa');
}

function sessionSelect ($id)
{
	return select(['dt', 'dtNew'], 'sessions', ['id_login' => ''], $id, [], 'id_sessions', '', [], 'DESC');
}
