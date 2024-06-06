<div class="leftMenu">  
        <div class="sidebar">
            <br><br><br>
            <div class="LMButton">
                <a href="index.php">Główna</a>
            </div>
            <div class="LMButton">
                <div class="button" onclick="toggleContent()">
                <img src="img/icon/user.png" id="img-user" alt="user">
                <?php 
                    if (!isset($_SESSION['username'])) {
                        echo 'Użytkownik';
                    } else {
                        $username = $_SESSION['username'];
                        echo "$username";
                    }
                    ?>
                </div>
                <div class="content hidden">
                    <div>
                        <?php 
                        if (!isset($_SESSION['username'])) {
                            echo '<a href="login.php">Login</a>';
                        } else {
                            echo '<a href="user.php">twoje pliki</a>
                            <a href="upload.php">Wprowadzenie plików</a>
                            <a href="settings.php">Ustawienie</a>
                            <a href="scripts/logout.php">Logout</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="LMButton">
                <a href="userwork.php">Prace innych</a>
            </div>
        </div>
    </div>
    <nav>
        <div>
            <button type="button" id="button_menu" onclick="toggleSidebar()">Menu</button>
        </div>
        <a href="index.php">Główna</a>
        <div class="dropdown">
            <div class="dropbtn">
                <img src="img/icon/user.png" id="img-user" alt="user">
                <?php 
                if (!isset($_SESSION['username'])) {
                    echo 'Użytkownik';
                } else {
                    echo "$username";
                }
                ?>
            </div>
            <div class="dropdown-content">
            <?php
                if (!isset($_SESSION['username'])) {
                    echo '<a href="login.php">Login</a>';
                } else {
                    echo '<a href="user.php">twoje pliki</a>
                    <a href="upload.php">Wprowadzenie plików</a>
                    <a href="settings.php">Ustawienie</a>
                    <a href="scripts/logout.php">Logout</a>';
                }
                ?>
            </div>
        </div>
        <a href="userwork.php">Prace innych</a>
    </nav>