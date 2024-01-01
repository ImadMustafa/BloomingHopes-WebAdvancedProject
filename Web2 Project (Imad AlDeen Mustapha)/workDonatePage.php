
<?php
session_start();
if (!isset($_SESSION["isLoggedIn"]) || $_SESSION["isLoggedIn"] != 1) {
    header("Location: index.php");
    exit();
}
include("connection.php");

$id = 0;
$name = '';
$admin = 0;

$query = "SELECT * FROM user WHERE email= '{$_SESSION['useremail']}'";
$result = mysqli_query($conn, $query);

if (!isset($_SESSION["isLoggedIn"]) || $_SESSION["isLoggedIn"] != 1) {
    header("Location: index.php");
    exit();
} else {
    $r = mysqli_num_rows($result);
    for ($i = 0; $i < $r; $i++) {
        $row = mysqli_fetch_row($result);
        $id = $row[0];
        $name = "$row[1] $row[2]";
    }
    $query3 = "SELECT * FROM user JOIN worker ON user.id = worker.userid WHERE worker.admin= 1";
    $result3 = mysqli_query($conn, $query3);
    $r3 = mysqli_num_rows($result3);
    for ($i = 0; $i < $r3; $i++) {
        $row3 = mysqli_fetch_row($result3);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account - Blooming Hopes</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ccffcc;
        }

        .profile-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 600px;
            padding: 20px;
        }

        .profile-picture {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: #4CAF50;
            margin: 0 auto 20px;
            overflow: hidden;
        }

        .profile-picture img {
            width: 100%;
            height: auto;
        }

        .profile-name {
            font-size: 35px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .profile-description {
            background-color: #fff;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .profile-description p {
            margin: 0;
            padding: 3px;
            color: green;
        }
        h3 {
            color: green;
        }

        .admindiv {
            display: inline-block;
            padding: 10px;
            border: 2px solid #218838;
            border-radius: 5px;
            text-align: center;
            transition: background-color 0.3s ease, color 0.3s ease;
            
        }
        .adminlink{
            text-decoration: none;
            color: #218838;
            font-weight: bold;
        }
        .admindiv:hover {
            background-color: #218838;
        }
        .adminlink:hover {
            color: #ffffff;
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

    <div class="profile-container">
        <div class="profile-picture">
            <img src="<?php echo $row[5]; ?>" alt="Profile Picture">
        </div>

        <div class="profile-name"><?php echo $name; ?></div>

        <div class="profile-description">
            <?php
            echo "<h3>Your account's information</h3>";
            echo "<b><p>Phone:</b> $row[9] <br></p>";
            echo "<b><p>Email:</b> $row[3] <br></p>";
            echo "<b><p>Birthdate:</b> $row[6]</p>";
            ?>
        </div>

        <?php
        echo "<form action='addWorker.php' method='post'>
        <input type='hidden' name='useremail' value='{$_SESSION['useremail']}'>
        <input type='submit' value='Work with us'>
      </form>";
      echo "<br>";

      echo "<form action='addDonator.php' method='post'>
        <input type='hidden' name='useremail' value='{$_SESSION['useremail']}'>
        <input type='submit' value='Become a donater'>
      </form>";
      echo "<br>";
      
      echo "<form action='deleteUser.php' method='post'>
        <input type='hidden' name='useremail' value='{$_SESSION['useremail']}'>
        <input type='submit' value='Delete Account'>
      </form>";
        ?>


        <br><br>
        <p style="color:red;">To update information or delete the account,<br>Contact this Number: <b><?php echo $row3[9]; ?></b></p>
        
        <br><br>

        
    </div>
    <footer align="center">
        <p>&copy; 2024 Blooming Hopes</p>
        <p><a href="index.php">Home</a> | <a href="about.php">About</a></p>
    </footer>
</body>
</html>
