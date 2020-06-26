<?php

/**
 * выводит информацию о зарегистрированном пользователе
 * @param $login
 * @return bool|mixed|PDOStatement
 */
function usersOne ($login) {
    $sql = "SELECT id_login, password FROM registrations WHERE login = :login";
    $data = dbQuery($sql, ['login' => $login]);
    $data = $data->fetch();
    return $data;
}

/**
 * получаем айди залогинившегося пользователя
 * @param $id
 * @return bool|mixed|PDOStatement
 */
function usersById ($id) {
    $sql = "SELECT id_login, login FROM registrations WHERE id_login = :id";
    $data = dbQuery($sql, ['id' => $id]);
    $data = $data->fetch();
    return $data;
}

/**
 * проверка, подтверждена ли почта
 * @param $login
 * @return bool|mixed|PDOStatement
 */
function searchValidate ($login) {
    $sql = "SELECT id_login FROM registrations WHERE login = :login AND validations = '1'";
    $data = dbQuery($sql, ['login' => $login]);
    $data = $data->fetch();
    return $data;
}

