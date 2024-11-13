<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camel Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
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
.brown{
	background-color: #231709;
	
}

.light{
	background-color: #ecd4b4;
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
    <h2>Camel Registration</h2>
    <form action="camel_register.php" method="post">
        <label for="camelName">Camel Name:</label>
        <input type="text" id="camelName" name="camelName" required><br>

        <label for="camelAge">Camel Age:</label>
        <input type="number" id="camelAge" name="camelAge" required><br>

        <label for="camelColor">Camel Color:</label>
        <input type="text" id="camelColor" name="camelColor" required><br>

        <label for="camelWeight">Camel Weight:</label>
        <input type="number" id="camelWeight" name="camelWeight" required><br>

        <input type="submit" value="Register Camel" name="submit_camel">
    </form>

    <p><a href="race_registration.php">Back to Race Registration</a></p>
    <footer class="brown">
        <p>&copy; 2023 Gulf Racing</p>
    </footer>
</body>
</html>

<?php
include 'dbconnection.php'; // Include your database connection file

if (isset($_POST['submit_camel'])) {
    $minLength = 10000000;
    $maxLength = 99999999;
    $randomNumber = rand($minLength, $maxLength);

    $sql = "INSERT INTO camel (CamelID, CamelName, Age, Color, Weight) VALUES (:id, :name, :age, :color, :weight)";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(
        ':id'    => $randomNumber,
        ':name'  => $_POST['camelName'], 
        ':age' => $_POST['camelAge'],
        ':color' => $_POST['camelColor'],
        ':weight'=> $_POST['camelWeight']
    ));

    // Display CamelID before redirecting
    echo 'Camel registered successfully! Camel ID: ' . $randomNumber;
    echo '<br><a href="race_registration.php">Click here to proceed to race registration</a>';
    exit();
}
?>
