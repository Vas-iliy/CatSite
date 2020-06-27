<?php
function login ()
{
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
						setcookie('token', $token, time() + 3600 * 24 * 30, BASE_URL);
					}

					header('Location:' . BASE_URL );
					exit();
				}
			}
		} else {
			$authArr = true;
		}

	} else {
		$authArr = false;
	}
}

function twoHead ()
{
	$authArr = false;
	$userLoadingYes = authGetUser();
	if ($userLoadingYes === null) {
		login();
		$header = template('bace/v_main_no_login', ['authArr' => $authArr]);
	} else {
		$header = template('bace/v_main_login', [
			'name' => $userLoadingYes['login'],
			'loginId' => $userLoadingYes['id_login']
		]);

		if ($_POST['exit']) {
			session_destroy();
			header('Location:' . BASE_URL);
		}
	}
	return $header;
}