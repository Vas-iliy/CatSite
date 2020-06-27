<?php
$id_cat = URL_PARAMS[1];
$statesCat = states_cat_login_select($id_cat);

$pageTitle = 'states | ' . $statesCat['cat_title'];
$pageContent = template('v_states', ['states' => $statesCat]);

if ($userLoadingYes === null) {
	$header = template('bace/v_main_no_login', ['mail' => $mail]);
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