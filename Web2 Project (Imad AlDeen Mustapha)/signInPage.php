<!-- <head>
    
</head>
<body>
    <form action="login.php" method="POST">
        <table>
            <tr>
                <td>Email</td>
                <td><input type="text" name="useremail"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="userpassword"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Log in"></td>
                <td><input type="reset"></td>
            </tr>
            <tr>
                <td><a href="addUserPage.php">Make a new account</a></td>
            </tr>
        </table>
    </form>
</body> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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
        input[type="password"] {
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

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <form name="loginForm" action="login.php" method="POST" onsubmit="return validateForm()">
    <div align="center"><a href="index.php"><img src="images/logo.png" width="200" alt=""></a></div>
    <br>
    <br>
        <table>
            <tr>
                <td>Email</td>
                <td><input type="text" name="useremail"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="userpassword"></td>
            </tr>
            <tr>
                <td colspan="2" style="color: red;" id="errorMessage"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Log in"></td>
            </tr>
            <tr>
                <td><a href="addUserPage.php">Make a <br>new account</a></td>
            </tr>
        </table>
    </form>

    <script>
        function validateForm() {
            var email = document.forms["loginForm"]["useremail"].value;
            var password = document.forms["loginForm"]["userpassword"].value;

            if (email === "" || password === "") {
                document.getElementById("errorMessage").innerHTML = "Please fill in both email and password fields";
                return false;
            }
        }
    </script>
</body>
</html>