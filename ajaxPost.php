<?php 
include 'config.php';

$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];

if ($name || $phone || $address) {
	$db->query("INSERT INTO messages(name, phone, address) VALUES('$name', '$phone', '$address')");
}