<?php
include 'config.php';

$id = $_POST['id'];

$db->query('DELETE FROM messages WHERE `id` = ' . $id);