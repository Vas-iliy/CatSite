<?php
$id_login = $userLoadingYes['id_login'];
$pageTitle = 'Новая статья';

$validate = state($id_login, null);
$pageContent = template('v_newState', ['validate' => $validate]);

