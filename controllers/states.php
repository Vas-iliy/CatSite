<?php
$pageTitle = 'Главная страница';
$states = stateSelect();

$pageContent = template('v_states', ['states' => $states]);

