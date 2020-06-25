<?php
if ($user !== null) {
    header('Location:/');
}

$authKye = authKeyFunction();
$mail = null;
$alert = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $params = extractFields($_POST, ['login', 'password', 'email', 'country']);
    $params['password'] = password_hash($params['password'], PASSWORD_BCRYPT);
    $params['auth'] = $authKye;
    $person = userAdd($params);

    if ($person) {
        mail($params['email'], 'Подтвердите почту', "http://cookies/registrations/?auth=$authKye" );
        $mail = 'Письмо отправлено, подтвердите почту';
        $alert = 'alert-primary';
    } else {
        $findUser = findUser($params['email']);
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
    updateUser($auth);
    $mail = 'Ваша почта подтверждена';
    $alert = 'alert-success';
}

$pageTitle = 'Регистрация';
$pageContent = template('v_registrations', [
    'mail' => $mail,
    'alert' => $alert
]);