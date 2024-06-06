<?php
/*

Nie dzial kod potrzeban pomoc
Code do not work please help me

*/

session_start();

function recursiveRemoveDir($dir) {
    if (!is_dir($dir)) {
        echo "Каталог не існує: $dir\n"; // Debug message
        return false;
    }

    $includes = new FilesystemIterator($dir);

    foreach ($includes as $include) {
        if (is_dir($include) && !is_link($include)) {
            if (!recursiveRemoveDir($include)) {
                return false;
            }
        } else {
            if (!unlink($include)) {
                echo "Не вдалося видалити файл: $include\n"; // Debug message
                return false;
            }
        }
    }

    if (rmdir($dir)) {
        return true;
    } else {
        echo "Не вдалося видалити каталог: $dir\n"; // Debug message
        return false;
    }
}

// Поєднання з базою даних
require_once __DIR__ . "/config.php";
$conn = mysqli_connect($servername, $userdb, $db_password, $dbname);

if (!$conn) {
    die("З'єднання не вдалося: " . mysqli_connect_error());
}

$username = $_SESSION['username'];
$sqlF = "SELECT users.forder FROM users WHERE users.login LIKE '$username'";
$sqlU = "DELETE FROM users WHERE login LIKE '$username';";
$resultF = mysqli_query($conn, $sqlF);

if ($resultF && mysqli_num_rows($resultF) > 0) {
    while ($row = mysqli_fetch_assoc($resultF)) {
        $path = 'file/andrii48675690572';
        echo "Шлях: $path\n"; // Debug message

        // Перевірка прав доступу
        if (!is_readable($path) || !is_writable($path)) {
            echo "Немає прав доступу до каталогу: $path\n"; // Debug message
            continue;
        }

        if (file_exists($path) && is_dir($path)) {
            if (recursiveRemoveDir($path)) {
                echo "Каталог успішно видалено.\n";
                $resultU = mysqli_query($conn, $sqlU);
                if ($resultU) {
                    echo "Користувача успішно видалено.\n";
                    require_once __DIR__ . "/logout.php";
                } else {
                    echo "Не вдалося видалити користувача: " . mysqli_error($conn) . "\n";
                }
            } else {
                echo "Не вдалося видалити каталог.\n";
            }
        } else {
            echo "Каталог не існує або не є каталогом: $path\n"; // Debug message
        }
    }
} else {
    echo "Не вдалося знайти каталог користувача або виконати запит: " . mysqli_error($conn) . "\n";
}

$conn->close();
?>