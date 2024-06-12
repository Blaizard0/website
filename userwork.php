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
    <?php require_once __DIR__ . "/header.php"; ?>   
    <div id="body">
        <div class="container">
            <div class="block">
                <div class="usImg">
                    <h1>Wybież użytkownika</h1>
                    <form id="usersForm">
                        <select name="users" id="users" onchange="zmian()">
                            <option value="">Wybierz użytkownika</option>
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
                                    echo '<option value="">Niema użytkowników</option>';
                                }
                                mysqli_close($conn);
                            ?>
                        </select>
                    </form>
                    <div id="user_data">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once __DIR__ . "/footer.php"; ?>
</body>
</html>
