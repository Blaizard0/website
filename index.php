<!DOCTYPE html>
<?php session_start(); 
require_once __DIR__ . "/scripts/config.php";
?>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Zobacz ostatnie 20 praca naszej skolu">
    <meta name="keywords" content="img, gif, obrazki, prace">
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
                    <h1 id="nagl">Ostatnie 20 prac</h1>
                    <?php
                        // Подключение к базе данных
                        $conn = mysqli_connect($servername, $userdb, $db_password, $dbname);

                        // Проверяем соединение
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT users.login, files.filename, users.forder FROM files, users WHERE users.id = files.user_id ORDER BY files.id DESC LIMIT 20;";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo '<h1>'.$row["login"].'</h1>
                                    <div class="image-container">
                                    <img src="file/'.$row["forder"].'/' . $row["filename"] . '" alt="Obrazki"><br>
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
