<?php
require_once __DIR__ . "/config.php";

if (isset($_GET['users'])) {
    $user = $_GET['users'];

    $conn = mysqli_connect($servername, $userdb, $db_password, $dbname);

    if (mysqli_connect_error()) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = 'SELECT files.filename, users.forder FROM files, users WHERE users.login LIKE "' . $user . '" AND users.id = files.user_id ORDER BY files.id DESC;';
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<h3>Użytkownik $user</h3>
        <p>Klikni na obrazek żeby otworzyć w nowej kartce</p>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="image-container">
                <a href="file/' . $row["forder"] . '/' . $row["filename"] . '" target="_blank" rel="noopener noreferrer">
                <img src="file/' . $row["forder"] . '/' . $row["filename"] . '" alt="Obrazki"></a><br>
                </div>';
        }
    } else {
        echo "<h3>Nie ma prac</h3>";
    }

    mysqli_close($conn);
} else {
    echo "Nic nie wybrano";
}
?>
