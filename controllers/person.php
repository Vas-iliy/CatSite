<?php
$id_person = URL_PARAMS[1];

$person = person($id_person);

$pageTitle = $person['login'];

$reviews = reviews($id_person);
$information = information($id_person);

$pageContent = template('v_person', [
	'person' => $person,
	'informations' => $information,
	'reviews' => $reviews
]);

$header = head($userLoadingYes);
