<?php
$id_cat = URL_PARAMS[1];
$statesCat = states_cat_login_select($id_cat);
$authArr = false;

$pageTitle = 'states | ' . $statesCat['cat_title'];
$pageContent = template('v_states', ['states' => $statesCat]);

$header = twoHead();