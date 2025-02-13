<?php
$con = new mysqli(hostname:'localhost', username:'root', password:'', database:'users');
if ($con->connect_error) {
    die('failed' . $con->connect_error);
}
?>
