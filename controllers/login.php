<?php
//echo password_hash('123', PASSWORD_BCRYPT);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = extractFields($_POST, ['login', 'password'] );
    $remember = isset($_POST['remember']);
    if (searchValidate($login['login'])) {
        $authArr = true;

        if($login != '' && $login['password'] != '') {
            $user = usersOne($login['login']);
            if ($user !== null && password_verify($login['password'], $user['password'])) {
                $token = substr(bin2hex(random_bytes(128)), 0, 128);
                $params = [
                    'id' => $user['id_login'],
                    'token' => $token
                ];
                sessionAdd($params);

                $_SESSION['token'] = $token;
                if ($remember) {
                    setcookie('token', $token, time() + 3600 * 24 * 30, '/'); //или BASE_URL
                }

                header('Location:' . '/');
                exit();
            }
        }
    } else {
        $authArr = true;
    }

} else {
    $authArr = false;
}

$pageTitle = 'Login';

$pageContent = template('v_login', ['authArr' => $authArr]);