<?php

require_once __DIR__.'/router.php';

get('/', 'views/index.php');

any('/login', 'login.php');

get('/logout', 'views/logout.php');


any('/404','views/404.php');

//can callback be used as auth? should it be?

