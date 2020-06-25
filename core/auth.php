<?php
//проверяет, есть ли данный токен в сессии или куках, возвращает пользователя с таким токином
function authGetUser () {
    $user =null;
    $token = $_SESSION['token'] ?? $_COOKIE['token'] ?? null;
    if ($token !== null) {
        //тут смотрим есть ли сессия с данным токеном в таблице
        $session = sessionOne($token);

        if ($session !== null) {
            $user = usersById($session['id_login']);
        }

        //ну это уже проверка на наебалово, если такого пользователя нет, но все остальное есть
        if ($user === null) {
            unset($_SESSION['token']);
            setcookie('token', $token, time() - 1, '/');
        }
    }

    return $user;
}