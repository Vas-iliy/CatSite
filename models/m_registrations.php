<?php

function userAdd ($params) {
    $sql = "INSERT INTO login (login, password, email, country, auth_key) 
        VALUES (:login, :password, :email, :country, :auth)";
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

function findUser ($email) {
    $sql = "SELECT validation FROM login WHERE email = :email";
    $data = dbQuery($sql, ['email' => $email]);
    $data = $data->fetch();

    return $data;
}

function updateUser ($auth) {
    $sql = "UPDATE login SET validation = 1, new_time=current_timestamp WHERE auth_key = :auth";
    dbQuery($sql, ['auth' => $auth]);

    return true;
}