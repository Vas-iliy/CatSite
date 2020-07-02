<?php
if ($userLoadingYes !== null) {
    header('Location:' . BASE_URL . 'stateLog');
}

$authKye = authKeyFunction();
$mail = null;
$alert = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $params = extractFields($_POST, ['login', 'password', 'email']);
    $params['password'] = password_hash($params['password'], PASSWORD_BCRYPT);
    $params['authKey'] = $authKye;
    $person = userInsert($params);

    if ($person) {
        mail($params['email'], 'Подтвердите почту', "http://catsite/registrations/?auth=$authKye" );
        $mail = 'Письмо отправлено, подтвердите почту';
        $alert = 'alert-primary';
    } else {
        $findUser = userSelect($params['email']);
        if (!$findUser['validate']) {
            $mail = 'Ваша почта так и не подтверждена...';
            $alert = 'alert-warning';
        } else {
            $mail = 'Вы уже подписаны на нашу рассылку';
            $alert = 'alert-success';
        }
    }
}

if ($_GET['auth']) {
    $auth = $_GET['auth'];
    userUpdate($auth);
    $login = userSelectLogin()['login'];
    mkdir("people/$login");
    mkdir("people/$login/head");
    header('Location:' . BASE_URL);
}

$pageTitle = 'Регистрация';
$pageContent = template('v_registrations', [
    'mail' => $mail,
    'alert' => $alert
]);