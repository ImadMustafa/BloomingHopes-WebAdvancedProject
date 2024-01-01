<?php
 session_start(); // Start the session if not already started

// if (!isset($_SESSION["isLoggedIn"]) || $_SESSION["isLoggedIn"] != 1) {
//     header("Location: workDonatePage.php");
//     exit();
//}
?>
<html>
<head>
<title>About - Blooming Hopes</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <header>
        <div class="header1">
            <div>
                <a href="index.php"><img src="images/logo2.png" width="230" alt=""></a>
            </div>
            <div>
                <nav>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>

                        <?php
                        if (!isset($_SESSION["isLoggedIn"]) || $_SESSION["isLoggedIn"] != 1) {
                            echo '
                            <li style="background-color: white; border-radius: 20px; padding-left: 5px; padding-right: 5px; padding: 2px;"><a href="signInPage.php" style="color: green; font-weight: bold;">Sign in</a></li>
                            ';
                        } else {
                            echo '
                        <li style="background-color: white; border-radius: 20px; padding-left: 5px; padding-right: 5px; padding: 2px;"><a href="logout.php" style="color: green; font-weight: bold;">Sign out</a></li>
                        ';}
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <div class="text-container">
        <div class="text">
            <h2>Made By: Imad AlDeen Mustapha</h2>
            <p>this is a project for CSCI426 course in LIU where we learn how to use advanced web skills to make functional sites.</p>

        </div>
        <div class="picture">
            <img src="images/logo.png" width="350px">
        </div>
    </div>
    <footer align="center">
        <p>&copy; 2024 Blooming Hopes</p>
        <p><a href="index.php">Home</a> | <a href="about.php">About</a></p>
    </footer>
</body>
</html>