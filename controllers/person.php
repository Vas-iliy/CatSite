<?php
$id_person = URL_PARAMS[1];
$user = '';
$person = person($id_person);

$pageTitle = $person['login'];
$reviews = reviews($id_person);

if ($userLoadingYes['id_login'] == $id_person) {

	$user = 'user';
	if ($_POST['description']) {
		$params['description'] = $_POST['description'];
		$params['id'] = $id_person;
		$inform = updateInformation($params);
		if ($inform) {
			header('Location:' . BASE_URL . 'person/' . $id_person);
		}
	}

	if (isset($_POST['go'])) {

		$file = extractFields($_FILES['file'], ['name', 'type', 'tmp_name', 'error', 'size']);

		$fileExtension = strtolower(end(explode('.', $file['name']))); //это массив, в котором будет [имя,расширение]
		$allowedExtensions = ['jpg', 'jpeg', 'png'];

		if (in_array($fileExtension, $allowedExtensions)) {
			if ($file['size'] < 5000000) {
				if ($file['error'] == 0) {
					$params['img'] = '/people/' . $userLoadingYes['login'] . '/head/' . $file['name'];
					$params['id'] = $id_person;
					updateImg($params);
					$fileDestination = 'people/' . $userLoadingYes['login'] . '/head/' . $file['name'] ;
					move_uploaded_file($file['tmp_name'], $fileDestination);

				} else {
					echo 'Что-то пошло не так';
				}
			} else {
				echo 'Большой размер файла';
			}

		} else {
			echo 'Неверный тип файла';
		}
	}
	if ($fileDestination) {
		header('Location:' . BASE_URL . 'person/' . $id_person);
	}
}

$pageContent = template('v_person', [
	'person' => $person,
	'states' => count(informFromState ($id_person)),
	'comments' => count(informFromComment($id_person)),
	'review' => count(informFromReview($id_person)),
	'reviews' => $reviews,
	'user' => $user
]);


$header = head($userLoadingYes);


