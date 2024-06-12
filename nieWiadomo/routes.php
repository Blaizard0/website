<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/router.php';

get('/', 'index.php');
get('/login', 'login.php');
get('/register', 'register.php');
get('/user', 'user.php');
get('/userwork', 'userwork.php');
get('/settings', 'settings.php');
get('/upload', 'upload.php');
get('/home', 'index.php'); // Замість '/website/index.php'
get('/test', "test.php");

?>
