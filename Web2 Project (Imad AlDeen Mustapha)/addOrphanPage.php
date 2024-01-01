<?php
session_start();

if (!isset($_SESSION["isLoggedIn"]) || $_SESSION["isLoggedIn"] != 1) {
    header("Location: index.php");
    exit();
}
if (!isset($_SESSION["isadmin"]) || $_SESSION["isadmin"] != 1) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Blooming Hopes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ccffcc;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
        }

        tr, td {
            padding: 10px;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"],
        input[type="file"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form name="addOrphanForm" action="addOrphan.php" method="GET" enctype="multipart/form-data" onsubmit="return validateForm()">
    <a href="adminPage.php">Go back</a>
        <table>
            <tr>
                <td>First Name</td>
                <td><input type="text" name="fname"></td>
                <td>Last Name</td>
                <td><input type="text" name="lname"></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><select id="gender" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select></td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td><input type="date" name="birthdate"></td>
            </tr>
            <tr>
                <td>Parent's Phone Number</td>
                <td><input type="number" name="phone" maxlength="8"></td>
            </tr>
            <tr>
                <td>Orphan Picture</td>
                <td><input type="file" name="orphanpic"></td>
            </tr>
            <tr>
                <td>Father Name</td>
                <td><input type="text" name="fathername"></td>
                <td>Mother Name</td>
                <td><input type="text" name="mothername"></td>
            </tr>
            <tr>
                <td>Which parent is gone?</td>
                <td><select id="dead" name="dead">
                    <option value="father">Father</option>
                    <option value="mother">Mother</option>
                    <option value="both">Both</option>
                </select></td>
            </tr>
            <tr>
                <td>Donater's ID</td>
                <td>
                    <select id="donid" name="donid">
                        <?php
                        include 'connection.php';
                        $query = "SELECT * FROM donater";
                        $result = mysqli_query($conn, $query);
                        $n = mysqli_num_rows($result);
                        for ($i = 0; $i < $n; $i++) {
                            $row = mysqli_fetch_row($result);
                            echo "<option value=\"$row[0]\">$row[0]</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Submit"></td>
                <td><input type="reset"></td>
            </tr>
        </table>
    </form>

    <script>
        function validateForm() {
            // Add any validation logic here if needed
            return true;
        }
    </script>
</body>
</html>
