<?php

require_once '../function/funsi.php';

session_start();

unset($_SESSION['profile']);
unset($_SESSION['login_admin']);

header('location:login.php');
