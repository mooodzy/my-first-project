<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Race Registration</title>
	<link rel="stylesheet" href="style.css">
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
        background-color: #f5f5f5;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    header, footer {
        background-color: #231709;
        padding: 10px;
        text-align: center;
        width: 100%;
        color: white;
    }

    h2 {
        color: #333;
    }

    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        width: 20%; /* Adjust the width as needed */
        box-sizing: border-box;
    }

    label {
        display: block;
        margin-bottom: 5px;
        color: #333;
    }

    input, select {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
        background-color: #231709;
        color: #fff;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #423424;
    }

    a {
        color: #4caf50;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    .auto-style24 {
        margin-top: 0px;
    }
	.auto-style11 {
	margin-left: 0px;
}
.auto-style19 {
	margin-left: 27px;
}
.auto-style22 {
	margin-left: 13px;
}
.auto-style23 {
	margin-left: 40px;
}
.light{
	background-color: #ecd4b4;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #b68d67;
  text-align: center;
}

li {
  display: inline-block;
  margin: center;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 16px;
  text-decoration: none;
}
</style>



<body class="light">
<header class="brown">
	    <a href="homepage.php"><img src="logo.png" width="234" height="131" class="auto-style24"></a> 
	   </header>
	   <nav>
		<ul> 
            <li><figure><a href="race_registration.php"><img src="registration.png" width="65" height="53" class="auto-style11"></a><figcaption>registration</figcaption></figure></li>
            <li><figure><a href="live.php"><img src="live.png" width="49" height="43" class="auto-style22"></a><figcaption>Live</figcaption></figure></li>
            <li><figure><a href="predictions.php"><img src="predictions.png" width="53" height="41" class="auto-style23"></a><figcaption>predictions</figcaption></figure></li>
			<li><figure><a href="shopping.php"><img src="shopping.png" width="58" height="48" class="auto-style19"></a><figcaption>shopping</figcaption></figure></li>
            <li><figure><a href="homepage.php"><img src="home.png" width="58" height="48" class="auto-style19"></a><figcaption>homepage</figcaption></figure></li>
		</ul>
    </nav>
    <h2>Race Registration</h2>
    <form action="race_registration.php" method="post">
        <!-- Race registration form fields -->
        <label for="camelId">Camel ID:</label>
        <input type="text" id="camelId" name="camelId" required><br>

        <label for="mobileNumber">Mobile Number:</label>
        <input type="text" id="mobileNumber" name="mobileNumber" required><br>

        <label for="rounds">Select Rounds:</label>
        <select id="rounds" name="rounds" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <!-- Add more options as needed -->
        </select><br>

        <input type="submit" value="Register for Race" name="submit_race">
    </form>

    <p><a href="camel_register.php">Register a Camel</a></p>
<footer class="brown">
        <p>&copy; 2023 Gulf Racing</p>
    </footer>
</body>
</html>
<?php
include 'dbconnection.php'; // Include your database connection file

if (isset($_POST['submit_race'])) {
    $camelId = $_POST['camelId'];
    $mobileNumber = $_POST['mobileNumber'];
    $rounds = $_POST['rounds'];

    // Check if the Camel ID exists in the camel table
    $checkSql = "SELECT * FROM camel WHERE CamelID = :camelId";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->execute(array(':camelId' => $camelId));

    if ($checkStmt->rowCount() > 0) {
        // Camel ID exists, proceed with race registration

        // Insert race registration data into the database
        $raceSql = "INSERT INTO race(CamelID, MobileNumber, Rounds)
		VALUES (:camelId, :mobileNumber, :rounds)";
        $raceStmt = $conn->prepare($raceSql);
        $raceStmt->execute(array(
            ':camelId'      => $camelId,
            ':mobileNumber' => $mobileNumber,
            ':rounds'       => $rounds
        ));

        // Retrieve the Camel ID after insertion
        $lastInsertId = $conn->lastInsertId();

        // Redirect to success page along with Camel ID
        header("Location: homepage.php?camelId=" . $lastInsertId);
        exit();
    } else {
        // Camel ID does not exist, display an error message
        echo '<script type="text/javascript">';
        echo 'alert("Invalid Camel ID. Please register the camel first.");';
        echo 'window.location.href = "camel_register.php";'; // Redirect back to the race registration page
        echo '</script>';
        exit();
    }
}
?>
