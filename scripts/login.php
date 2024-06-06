<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    require_once __DIR__ . "/config.php";

    $conn = mysqli_connect($servername, $userdb, $db_password, $dbname);
    if (!$conn) {
        die("Ошибка подключения к базе данных: " . mysqli_connect_error());
    }
    if (!empty($username) && !empty($password)) {
        $sql = "SELECT login, password FROM users WHERE login = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        if ($res) {
            $row = mysqli_fetch_assoc($res);
            if ($row && password_verify($password, $row['password'])) {
                $_SESSION['username'] = $username;
                session_regenerate_id();
                echo 'Zalogowano pomyślnie!';
            } else {
                echo 'Błąd logowania. Spróbuj ponownie.';
            }
        } else {
            echo 'Błąd выполнения запроса к базе данных: ' . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo 'Wprowadź username lub hasło';
    }
    mysqli_close($conn);
} else {
    echo 'Nieprawidłowe żądanie.';
}
?>
