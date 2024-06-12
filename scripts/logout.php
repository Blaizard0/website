<?php
session_start();

    session_unset(); // Очищення всіх змінних сесії
    session_destroy(); // Знищення сесії

    // Перенаправлення на сторінку входу або іншу сторінку, яку ви хочете
    header('Location: ../home');
    exit();
?>