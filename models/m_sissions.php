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

function dtSession ($id)
{
	$sql = "UPDATE sessions SET dtNew = current_timestamp WHERE id_login = :id ";
	dbQuery($sql, ['id' => $id]);

	return true;
}

function sessionSelect ($id)
{
	$sql = "SELECT dt, dtNew FROM sessions WHERE id_login = :id ORDER BY id_sessions DESC ";
	$data = dbQuery($sql, ['id' => $id]);
	$data = $data->fetch();

	return $data;
}
