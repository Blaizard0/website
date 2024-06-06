<?php
session_start();
$username = $_SESSION['username'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once __DIR__ . "/config.php";

    $conn = mysqli_connect($servername, $userdb, $db_password, $dbname);
    if (!$conn) {
        die("Ошибка подключения к базе данных: " . mysqli_connect_error());
    }
    if (isset($_POST['password']) && isset($_POST['newusername'])) {
        $newusername = $_POST['newusername'];
        $password = $_POST['password'];
        $sqlChect = "SELECT password FROM users WHERE login LIKE '$username'";
        $res = mysqli_query($conn,$sqlChect);
        if ($res) {
            $row = mysqli_fetch_assoc($res);
            if ($row && password_verify($password, $row['password'])) {
                $sqlL = "UPDATE users SET users.login = '$newusername' WHERE users.login LIKE '$username';";
                $res = mysqli_query($conn,$sqlL);
                $_SESSION['username'] = $newusername;
                echo 'Udano';
            } else {
                echo 'Błąd. Spróbuj ponownie.';
            }
        }
    } elseif (isset($_POST['oldpassword']) && isset($_POST['newpassword'])) {
        $oldpassword = $_POST['oldpassword'];
        $newpassword = $_POST['newpassword'];
        $hashedPassword = password_hash($newpassword, PASSWORD_DEFAULT);
        $sqlChect = "SELECT password FROM users WHERE login LIKE '$username'";
        $res = mysqli_query($conn,$sqlChect);
        if ($res) {
            $row = mysqli_fetch_assoc($res);
            if ($row && password_verify($oldpassword, $row['password'])) {
                $hashedPassword1 = password_hash($newpassword, PASSWORD_DEFAULT);
                $sqlP = "UPDATE users SET users.password = '$hashedPassword1' WHERE users.login LIKE '$username';";
                $res = mysqli_query($conn,$sqlP);
                echo 'Udano';
            } else {
                echo 'Błąd. Spróbuj ponownie.';
            }
        }
    } elseif (isset($_POST['password']) && isset($_POST['email'])) {
        $password = $_POST['password'];
        $email = $_POST['email'];
        $hashedEmail = password_hash($email, PASSWORD_DEFAULT);
        $sqlChect = "SELECT password FROM users WHERE login LIKE '$username'";
        $res = mysqli_query($conn,$sqlChect);
        if ($res) {
            $row = mysqli_fetch_assoc($res);
            if ($row && password_verify($password, $row['password'])) {
                $sqlE = "UPDATE users SET users.email = '$hashedEmail' WHERE users.login LIKE '$username';";
                $res = mysqli_query($conn,$sqlL);
                echo 'Udano';
            } else {
                echo 'Błąd. Spróbuj ponownie.';
            }
        }
    } else {
        // Якщо отримані дані не відповідають жодній формі
        echo "Invalid form data";
    }
    mysqli_close($conn);
} else {
    // Якщо отримано не POST-запит
    echo "Invalid request method";
}
?>
