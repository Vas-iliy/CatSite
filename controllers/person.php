<?php
$id_person = URL_PARAMS[1];
$user = '';

$person = person($id_person);

$pageTitle = $person['login'];

$reviews = reviews($id_person);
$information = information($id_person);

if ($userLoadingYes['id_login'] == $id_person) {
	$user = 'user';
	if ($_POST['description']) {
		header('Location:' . BASE_URL . 'person/' . $id_person);
	}

	if ($_POST['file']) {

	}
}

$pageContent = template('v_person', [
	'person' => $person,
	'informations' => $information,
	'reviews' => $reviews,
	'user' => $user
]);


$header = head($userLoadingYes);


