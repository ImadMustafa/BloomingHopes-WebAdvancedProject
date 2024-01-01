<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
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
        input[type="password"],
        input[type="date"],
        input[type="number"] {
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
    <form name="registrationForm" action="addUser.php" method="GET" >
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
                <td>Phone Number</td>
                <td><input type="number" name="phone" maxlength="8"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="useremail"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="userpassword"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Submit"></td>
                <td><input type="reset"></td>
            </tr>
            
        </table>
        <a href="signInPage.php">Already have an account? Log in</a>
    </form>

</body>
</html>
