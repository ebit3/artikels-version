<?php

require_once '../function/funsi.php';

$id = $_GET['id'];

if (delete_user($id) > 0) {

    return true;
} else {

    return false;
}
