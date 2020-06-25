<?php
$pageTitle = 'Главная страница';
$states = stateSelect();
$mail = '';

$pageContent = template('v_states', ['states' => $states]);

$header = template('bace/v_main_no_login', ['mail' => $mail]);

