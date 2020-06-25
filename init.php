<?php

const BASE_URL = '/Lavrik/lesson4/';

include_once('model/article.php');
include_once ('model/cat.php');

include_once('core/logs.php');
include_once('core/arr.php');
include_once('core/db.php');
include_once('core/system.php');

$l = logs();
$log = write($l);