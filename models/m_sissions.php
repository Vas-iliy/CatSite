<?php
/**
 * запись в таблице сессий человека и его уникальный токен
 * @param $params
 * @return bool
 */
function sessionAdd ($params) {
    $sql = "INSERT INTO sessions (id_login, token) VALUES (:id, :token)";
    dbQuery($sql, $params);
    return true;
}

/**
 * из таблицы берется айди человека у которого совпадает токин с сессией или кукой
 * @param $token
 * @return bool|mixed|PDOStatement
 */
function sessionOne ($token) {
    $sql = "SELECT id_login FROM sessions WHERE token = :token";
    $data = dbQuery($sql, ['token' => $token]);
    $data = $data->fetch();
    return $data;
}