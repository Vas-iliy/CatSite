<?php
$id_cat = URL_PARAMS[1];
$statesCat = states_cat_login_select($id_cat);
var_dump($statesCat);

$pageTitle = 'states | ' . $statesCat[0]['cat_title'];
$pageContent = template('v_states', ['states' => $statesCat]);

$header = head();