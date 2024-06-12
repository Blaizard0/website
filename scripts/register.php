<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password1 = $_POST['password1']; // Zmieniona nazwa zmiennej
    $email = $_POST['email'];

    require_once __DIR__ . "/config.php";
    
    $conn = mysqli_connect($servername, $userdb, $db_password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // Użyj przygotowanych instrukcji, aby zapobiec wstrzykiwaniu SQL
    $checkQuery = "SELECT login FROM users WHERE login LIKE ?";
    $checkStatement = mysqli_prepare($conn, $checkQuery);
    mysqli_stmt_bind_param($checkStatement, "s", $username);
    mysqli_stmt_execute($checkStatement);
    mysqli_stmt_store_result($checkStatement);

    if (mysqli_stmt_num_rows($checkStatement) == 0) {
        // Haszowanie hasła
        $hashedPassword = password_hash($password1, PASSWORD_DEFAULT); // Zmieniona nazwa zmiennej
        $hashedEmail = password_hash($email, PASSWORD_DEFAULT);
        //tworzenie fordera
        while (true){
            $rand = rand(0, 1238897864328);
            $nameForder = $username.$rand;
            $dir = './../file/'.$nameForder;
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
                break; 
            } else {
                echo 'Bląd';
            }
        }
        // Wstawianie danych użytkownika do bazy danych
        $insertQuery = "INSERT INTO users (login, password, email, forder, uprawnienia) VALUES (?, ?, ?, ?, ?)";
        $insertStatement = mysqli_prepare($conn, $insertQuery);
        $permission = "user";
        mysqli_stmt_bind_param($insertStatement, "sssss", $username, $hashedPassword, $hashedEmail,$nameForder,$permission);
        
        if (mysqli_stmt_execute($insertStatement)) {
            echo 'Rejestracja udana.';
        } else {
            echo 'Błąd zapytania do bazy danych: ' . mysqli_error($conn);
        }
        mysqli_stmt_close($insertStatement);
    } else {
        echo 'Nazwa użytkownika już istnieje.';
    }

    mysqli_stmt_close($checkStatement);
    mysqli_close($conn);
}
?>
