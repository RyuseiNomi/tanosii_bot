<?php
ob_start();
$raw = file_get_contents('php://input');
var_dump($raw);

