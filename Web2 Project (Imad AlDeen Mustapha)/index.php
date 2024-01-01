<?php
 session_start(); // Start the session if not already started

// if (!isset($_SESSION["isLoggedIn"]) || $_SESSION["isLoggedIn"] != 1) {
//     header("Location: workDonatePage.php");
//     exit();
//}
?>
<html>
<head>
    <title>Blooming Hopes - Home</title>
    <link rel="stylesheet" href="style.css">

    <style>
        .bannerlink {
      position: relative;
      overflow: hidden;
      display: inline-block;
      border-radius: 300px; /* Border radius for rounded corners */
      transition: transform 0.3s ease-in-out; /* Hover effect transition */

      /* Additional styling (customize as needed) */
      background-color: #28a745; /* Background color */
      padding: 20px; /* Padding inside the div */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Box shadow for depth effect */
    }

    /* Hover effect */
    .bannerlink:hover {
        background-color: green;
    }
    </style>
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
    <div class="banner" align="center">
    <?php
    include("connection.php");
                        if (!isset($_SESSION["isLoggedIn"]) || $_SESSION["isLoggedIn"] != 1) {
                            echo '
                            <div class="bannerlink" ><a href="signInPage.php" style="color: white; text-decoration: none;">Want to help?</a></div>
                            ';
                        } else {
                            $email = $_SESSION["useremail"];
                            $query = "SELECT * FROM user WHERE email='$email'";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_row($result);
                            
                            if ($row[7] == 1) {
                                echo '<div class="bannerlink" ><a style="color: white; text-decoration: none;" href="workerPage.php">Check Your Page</a></div>';
                                
                            } elseif ($row[10] == 1) {
                                echo '<div class="bannerlink" ><a style="color: white; text-decoration: none;" href="DonatorPage.php">Check Your Page</a></div>';
                                
                            } else {
                                echo '<div class="bannerlink" ><a style="color: white; text-decoration: none;" href="workDonatePage.php">Check Your Page</a></div>';
                            
                            }
                            
                    }
                        ?>
        <img src="images/banner1.jpg">
    </div>
    <div class="text-container">
        <div class="text">
            <h2>We are Blooming Hopes Org</h2>
            <p>We are an organization that aims to help children who are suffering from problems that makes them not live a normal life. Every child deserves a chance to live a life where he/she explores their opportunities they get in their life, and with your help, they can achieve that!</p>

            <h2>Help us in our cause!</h2>
            <p>With your help, many orphans can live a life where they can eat their meal, wear comfy clothes and go to school to learn everday. Every child needs atleast these things to not let their issues get in their way of their future. If you want to save a generation of kids, donate money for these kids, but since this can be hard due to many circumstances, we are here to fill this role into using this money in a responsible manner which will make the orphans recieve your help in a fully positive manner. To donate to our cause, please me sure to sign up to our website, and the rest will pass by easily.</p>
        </div>
        <div class="picture">
            <img src="images/logo.png" width="350px">
        </div>
    </div>
    <div class="list1">
        <div>
        <img src="images/org4.jpg" width="350px">
        <p><b>Give them chance to learn</b></p>
        </div>
        <div>
        <img src="images/org9.jpg" width="350px">
        <p><b>Give them chance to eat well</b></p>
        </div>
        <div>
        <img src="images/org5.jpg" width="350px">
        <p><b>Give them chance to smile</b></p>
        </div>
    </div>
    <br><br>
    <footer align="center">
        <p>&copy; 2024 Blooming Hopes</p>
        <p><a href="index.php">Home</a> | <a href="about.php">About</a></p>
    </footer>
</body>
</html>