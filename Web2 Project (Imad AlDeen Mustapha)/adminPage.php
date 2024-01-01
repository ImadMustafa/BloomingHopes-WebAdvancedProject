<?php
 session_start(); // Start the session if not already started

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
	<link rel="stylesheet" href="style.css">
    <title>Admin - Blooming Hopes</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #ccffcc;
            color: #333;
        }

        .admin {
            margin: 20px;
        }

        a {
            text-decoration: none;
            color: #28a745;
        }

        h1 {
            color: #28a745;
        }

        label {
            font-weight: bold;
            margin-right: 10px;
            color: #333;
        }

        input {
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #28a745;
            border-radius: 4px;
        }

        button {
            background-color: #28a745;
            margin-right: 10px;
            padding: 10px;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        button:hover {
            background-color: #218838;
        }

        #result {
            margin-top: 10px;
            /* color: #28a745; */
            margin-top: 20px;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 4px;
            background-color: #fff;
        }

        #txtHint {
            margin-top: 10px;
            color: #333;
        }
        th {
        background-color: green;
        }
        .addorphan {
            display: inline-block;
            padding: 10px;
            border: 2px solid #218838;
            border-radius: 5px;
            text-align: center;
            transition: background-color 0.3s ease, color 0.3s ease;
            
        }
        .addorphanlink{
            text-decoration: none;
            color: #218838;
            font-weight: bold;
        }
        .addorphan:hover {
            background-color: #218838;
        }
        .addorphanlink:hover {
            color: #ffffff;
        }
        .container {
        display: inline-block;
    }
    .data-container {
        display: flex;
        overflow-y: auto;
        max-height: 500px;
    }

        #orphansContainer,
        #donatorsContainer,
        #workersContainer {
            margin-top: 20px;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 4px;
            background-color: #fff;
        }

        .divdesign {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            padding: 20px;
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

    <div class="admin">
        
    <h1>Admin Dashboard</h1>

    <div class="divdesign">
    <?php

include("connection.php");

$query = "SELECT COUNT(*) AS row_count FROM orphan";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Failed to execute query: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);
$rowCount = $row['row_count'];

echo "<div style='display: inline-block; color: #28a745; font-size: 20px;'>Number of orphans:   <div style='font-size: 40px; font-weight: bold; display: inline-block;'>" . $rowCount . "</div></div>";

mysqli_free_result($result);
mysqli_close($conn);
?>
<br><br>
<div class="addorphan">
<a href="addOrphanPage.php" class="addorphanlink">Add orphan</a>
</div>
<br><br>

<label for="searchInput">Search Orphan:</label>
<input type="text" id="searchInput" onkeyup="searchOrphan()">
<div id="result" style="width = 20px"></div>

<br>
<div class="container">
<button onclick="loadOrphanData()">Load Orphans</button>
<button onclick="loadDonatorData()">Load Donators</button>
<button onclick="loadWorkerData()">Load Workers</button>
<button onclick="clearData()" style="background-color: red;">Close Table</button>
</div>
<div class="data-container">
<div id="orphansContainer"></div>
<div id="donatorsContainer"></div>
<div id="workersContainer"></div>
</div>
    </div>
    </div>

    <footer align="center">
        <p>&copy; 2024 Blooming Hopes</p>
        <p><a href="index.php">Home</a> | <a href="about.php">About</a></p>
    </footer>
</body>

    
<script>
		function loadOrphanData() {
			xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function () {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("donatorsContainer").innerHTML = ""
                    document.getElementById("workersContainer").innerHTML = ""
					document.getElementById("orphansContainer").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET", "loadOrphanData.php", true);
			// xmlhttp.open("GET", "gethint.php?q=" + str, true);
			xmlhttp.send();
		}
		function loadDonatorData() {
			xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function () {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("orphansContainer").innerHTML = ""
                    document.getElementById("workersContainer").innerHTML = ""
					document.getElementById("donatorsContainer").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET", "loadDonaterData.php", true);
			// xmlhttp.open("GET", "gethint.php?q=" + str, true);
			xmlhttp.send();
		}
		function loadWorkerData() {
			xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function () {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("donatorsContainer").innerHTML = ""
                    document.getElementById("orphansContainer").innerHTML = ""
					document.getElementById("workersContainer").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET", "loadWorkerData.php", true);
			// xmlhttp.open("GET", "gethint.php?q=" + str, true);
			xmlhttp.send();
		}
		function clearData() {
        document.getElementById("orphansContainer").innerHTML = "";
        document.getElementById("donatorsContainer").innerHTML = "";
        document.getElementById("workersContainer").innerHTML = "";
    }

	function searchOrphan() {
            var input = document.getElementById("searchInput").value;

            if (input.length == 0) {
                document.getElementById("result").innerHTML = "";
                return;
            }

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("result").innerHTML = xmlhttp.responseText;
                }
            }

            xmlhttp.open("GET", "searchOrphan.php?q=" + input, true);
            xmlhttp.send();
        }

	
	</script>

