<!DOCTYPE html>
<?php session_start();?>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style_upload.css">
    <title>Strona główna</title>
</head>

<body>        
    <?php
    require_once __DIR__ . "/header.php";
    ?>
    <div id="body">
        <div class="container">
            <div class="block">
            <h2>Wgranie pliku</h2>
            <?php
                    if (!isset($_SESSION['username'])) {
                        echo 'Żeby wgrać plik, musisz się ZALOGOWAĆ!';
                    } else {
                        echo '<form action="' . $_SERVER["PHP_SELF"] . '" method="post" enctype="multipart/form-data">
                        <input type="file" name="fileToUpload" id="fileToUpload">
                        <input type="submit" value="Wgraj plik" name="submit">
                        </form>';
                        require_once __DIR__ . "/scripts/config.php";
                        $conn = mysqli_connect($servername, $userdb, $db_password, $dbname);

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $sql1 = "SELECT id, forder FROM users WHERE users.login LIKE '$username';";
                            $result = mysqli_query($conn, $sql1);
                            $row = mysqli_fetch_assoc($result);
                            $userID = $row['id'];
                            $target_dir = "file/".$row['forder'].'/';
                            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                            $uploadOk = 1;
                            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                            // Sprawdzanie, czy plik jest obrazem
                            if(isset($_POST["submit"])) {
                                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                                if($check !== false) {
                                    //echo "Plik jest obrazem - " . $check["mime"] . ".";
                                    $uploadOk = 1;
                                } else {
                                    echo "Plik nie jest obrazem.";
                                    $uploadOk = 0;
                                }
                            }

                            // Sprawdzanie, czy plik już istnieje
                            if (file_exists($target_file)) {
                                echo "Przepraszamy, plik o tej samej nazwie już istnieje w twoim folderze.";
                                $uploadOk = 0;
                            }

                            // Sprawdzanie rozmiaru pliku
                            if ($_FILES["fileToUpload"]["size"] > 50000000) {
                                echo "Przepraszamy, Twój plik jest za duży.";
                                $uploadOk = 0;
                            }

                            // Dozwolone są tylko określone formaty plików
                            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                                echo "Przepraszamy, dozwolone są tylko pliki JPG, JPEG, PNG i GIF.";
                                $uploadOk = 0;
                            }

                            // Sprawdzanie, czy wszystko jest w porządku i przesyłanie pliku
                            if ($uploadOk == 0) {
                                echo "Przepraszamy, Twój plik nie został przesłany.";
                            } else {
                                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                                    // Plik został pomyślnie przesłany, zapisywanie informacji w bazie danych
                                    $filename = basename($_FILES["fileToUpload"]["name"]);

                                    // Zapytanie SQL do wstawienia informacji o pliku do bazy danych
                                    $sql2 = "INSERT INTO files (user_id, filename) VALUES ($userID,'$filename');";

                                    if ($conn->query($sql2) === TRUE) {
                                        echo "Plik został pomyślnie przesłany i zapisany w bazie danych.";
                                    } else {
                                        echo "Błąd: " . $sql2 . "<br>" . $conn->error;
                                    }
                                } else {
                                    echo "Przepraszamy, wystąpił błąd podczas przesyłania pliku.";
                                }
                            }
                        }

                        $conn->close();
                    }
                    ?>
            </div>
            <div>
                
            </div>
        </div>
        
    </div>
    <?php
    require_once __DIR__ . "/footer.php";
    ?>
</body>
</html>
