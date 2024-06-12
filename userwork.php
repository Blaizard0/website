<?php 
session_start(); 
require_once __DIR__ . "/scripts/config.php";
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Strona główna</title>
    <script>
        function zmian() {
            var user = document.getElementById("users").value;
            if (user != "") {
                window.location.href = "?users=" + user + "&page=1";
            }
        }
    </script>
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
                        <?php
                            if (isset($_GET['users'])) {
                                $user = $_GET['users'];
                                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                                $limitImg = 20;
                                $offset = ($page - 1) * $limitImg;

                                $conn = mysqli_connect($servername, $userdb, $db_password, $dbname);

                                if (mysqli_connect_error()) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }

                                $sql = 'SELECT files.filename, users.forder 
                                        FROM files, users 
                                        WHERE users.login LIKE "' . $user . '" 
                                          AND users.id = files.user_id 
                                        ORDER BY files.id DESC 
                                        LIMIT ' . $limitImg . ' OFFSET ' . $offset;
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    echo "<h3>Użytkownik $user</h3>
                                    <p>Klikni na obrazek żeby otworzyć w nowej картке</p>";
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<div class="image-container">
                                            <a href="file/' . $row["forder"] . '/' . $row["filename"] . '" target="_blank" rel="noopener noreferrer">
                                            <img src="file/' . $row["forder"] . '/' . $row["filename"] . '" alt="Obrazki"></a><br>
                                            </div>';
                                    }
                                } else {
                                    echo "<h3>Nie ma prac</h3>";
                                }

                                // Підрахунок загальної кількості зображень для пагінації
                                $sql_total = 'SELECT COUNT(*) as total 
                                              FROM files, users 
                                              WHERE users.login LIKE "' . $user . '" 
                                                AND users.id = files.user_id';
                                $result_total = mysqli_query($conn, $sql_total);
                                $row_total = mysqli_fetch_assoc($result_total);
                                $totalImg = $row_total['total'];
                                $ileStron = ceil($totalImg / $limitImg);
                                mysqli_close($conn);
                            } else {
                                echo "Nic nie wybrano";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pagination">
        <?php
            if (isset($ileStron) && $ileStron > 1) {
                for ($i = 1; $i <= $ileStron; $i++) {
                    echo "<a href='?users={$user}&page={$i}'><button>{$i}</button></a>";
                }
            }
        ?>
    </div>
    <?php require_once __DIR__ . "/footer.php"; ?>
</body>
</html>
