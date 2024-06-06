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
                    <h1>Wybież użytkownika</h1>
                    <form id="usersForm" action="userwork.php" method="post">
                        <select name="users" id="users">
                            <?php                         
                                $conn = mysqli_connect($servername, $userdb, $db_password, $dbname);

                                if (mysqli_connect_error()) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }
                                
                                $sql = 'SELECT users.login FROM users ORDER BY users.login ASC;';
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo '<option value="'.$row["login"].'">'.$row["login"].'</option>';
                                    }
                                } else {
                                    echo "Niema użytkowników";
                                }
                            ?>
                        </select>
                        <button type="submit">Sprawdż</button>
                    </form>
                    <?php
                        if (isset($_POST['users'])) {
                            $user = $_POST['users'];
                            echo "<h3>Użytkownik $user</h3>";
                            $sql = 'SELECT files.filename, users.forder FROM files, users WHERE users.login LIKE "'.$user.'" AND users.id = files.user_id ORDER BY files.id DESC;';
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo '<div class="image-container">
                                        <img src="file/'.$row["forder"].'/' . $row["filename"] . '" alt="Obrazki"><br>
                                        </div>';
                                }
                            } else {
                                echo "Nie ma prac";
                            }
                        }else {
                            echo "Nic nie wybrano";
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