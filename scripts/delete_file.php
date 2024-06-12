<?php
session_start();
require_once __DIR__ . "/config.php";

// Перевірка чи користувач увійшов у систему
if (!isset($_SESSION['username'])) {
    // Перенаправлення на сторінку входу, якщо користувач не увійшов у систему
    header('Location: ../home');
    exit();
}

// Перевірка, чи передано ім'я файлу
if (isset($_GET['filename'])) {
    $filename = $_GET['filename'];
    
    // Перевірка, чи файл існує та видалення його
    $conn = mysqli_connect($servername, $userdb, $db_password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // Отримання ідентифікатора користувача за його ім'ям
    $username = $_SESSION['username'];
    $sql = "SELECT id, forder FROM users WHERE login LIKE '$username'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['id'];
        $forderName = $row['forder'];
        
        // Видалення файлу з бази даних
        
        $sql_delete = "DELETE FROM files WHERE user_id = (SELECT id FROM users WHERE login LIKE '$username') AND filename = '$filename'";
        if (mysqli_query($conn, $sql_delete)) {
            // Видалення файлу з диска
            $file_path = __DIR__ . "/../file/$forderName/$filename";
            if (file_exists($file_path)) {
                unlink($file_path);
                echo "Файл $filename успішно видалено.";
                header('Location: ../user');
            } else {
                echo "Файл $filename не знайдено.";
            }
        } else {
            echo "Помилка видалення файлу: " . mysqli_error($conn);
        }
    } else {
        echo "Користувача не знайдено.";
    }
    mysqli_close($conn);
} else {
    echo "Не вказано ім'я файлу для видалення.";
}
?>
