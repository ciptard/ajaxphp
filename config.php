<?php
include 'mysqli.class.php';

$config = array();
$config['host'] = 'localhost';
$config['user'] = 'root';
$config['pass'] = '';
$config['table'] = 'codes';

$db = new DB($config);