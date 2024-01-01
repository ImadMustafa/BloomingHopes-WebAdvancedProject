<head>
    <title>Admin - Blooming Hopes</title>
</head>
<?php
include 'connection.php';
$id = $_GET['id'];
$query = "SELECT * FROM orphan WHERE id = $id";
$result = mysqli_query($conn, $query);
$n = mysqli_num_rows($result);
for ($i = 0; $i < $n; $i++) {
    $row = mysqli_fetch_row($result);
    
$donid = $row[10];
$gender = $row[3];
$dead = $row[9];

echo '
<form action="UpdateOrphan.php">
    <table border="0">
        <tr>
            <td>First Name</td>
            <td><input type="text" name="fname" value="' . $row[1] . '"></td>
            <td>Last Name</td>
            <td><input type="text" name="lname" value="' . $row[2] . '"></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td><select id="gender" name="gender" value="' . $row[3] . '">
            <option value="'.$gender.'">'.$gender.'</option>
            
            <option value="male">male</option>
            <option value="female">female</option>
            </select></td>
        </tr>
        <tr>
            <td>Date of Birth</td>
            <td><input type="date" name="birthdate" value="' . $row[4] . '"></td>
        </tr>
        <tr>
            <td>Parent\'s Phone Number</td>
            <td><input type="number" name="phone" maxlength="8" value="' . $row[5] . '"></td>
        </tr>
        <tr>
            <td>Orphan Picture</td>
            <td><input type="file" name="orphanpic"></td>
        </tr>
        <tr>
            <td>Father Name</td>
            <td><input type="text" name="fathername" value="' . $row[7] . '"></td>
            <td>Mother Name</td>
            <td><input type="text" name="mothername" value="' . $row[8] . '"></td>
        </tr>
        <tr>
            <td>which parent is gone?</td>
            <td><select id="dead" name="dead" value="' . $row[9] . '">
            <option value="'.$dead.'">'.$dead.'</option>
            <option value="father">Father</option>
            <option value="mother">Mother</option>
            <option value="both">Both</option>
            </select></td>
        </tr>
        <tr>
            <td>Donater\'s ID</td>
            <td>
                <select id="donid" name="donid">
                <option value="donid">'.$donid.'</option>
                ';
                ?>
                <?php
                include 'connection.php';
                $query = "SELECT * FROM donater";
                $result = mysqli_query($conn, $query);
                $n = mysqli_num_rows($result);
                for ($i = 0; $i < $n; $i++) {
                    $row = mysqli_fetch_row($result);
                    if($row[0] != $donid){
                        echo "<option value=\"$row[0]\">$row[0]</option>";
                    }
                    
                }
            }
                ?>
                </select>
            </td>
        </tr>
        
        <tr>
        
            <?php
            include 'connection.php';
            $id = $_GET['id'];
            
            echo "<form action='updateOrphan.php' method='post'>
            <input type='hidden' name='id' value='{$id}'>
            <input type='submit' value='Update Orphan'>
            </form>";

            ?>
            <td><input type="reset"></td>
        </tr>
    </table>
</form>