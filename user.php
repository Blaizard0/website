<!DOCTYPE html>
<?php session_start(); 
require_once __DIR__ . "/scripts/config.php";
?>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Strona główna</title>
</head>
<body>  
    <?php
    require_once __DIR__ . "/header.php";
    ?>
    <div id="body">
        <div class="container">
            <div class="block">
                <div class="usImg">
                    <h1 id="nagl">Twoje obrazki</h1>
                    <?php
                        $conn = mysqli_connect($servername, $userdb, $db_password, $dbname);

                        // Проверяем соединение
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT files.filename, users.forder FROM files, users WHERE files.user_id = users.id AND users.login LIKE '$username' ORDER BY files.id DESC;";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            // Выводим каждое изображение
                            while($row = mysqli_fetch_assoc($result)) {
                                echo '<div class="image-container">
                                <img src="file/'.$row["forder"].'/' . $row["filename"] . '" alt="Obrazki">
                                </div>';
                            }
                        } else {
                            echo "Nie ma prac";
                        }
                        mysqli_close($conn);
                        ?>
                </div>
            </div>
        </div>
        
    </div>
    <?php
    require_once __DIR__ . "/footer.php";
    ?>
</body>
</html>