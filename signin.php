<?php
session_start();
include 'dbconnection.php';

if (isset($_POST['submit'])) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM user WHERE Email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $n = $stmt->rowCount();

        if ($n > 0) {
            // Consider using password_verify() here
            if ($password == $row['Password']) {
                $_SESSION['Email'] = $email;

                // Regenerate session ID for security
                session_regenerate_id(true);

                $loginTime = date("Y-m-d H:i:s");
                
                // Retrieve UserID from user table
                $userId = $row['UserID'];

                // Insert into login table
                $sql = "INSERT INTO login (UserID, Email, Time) VALUES (:userid, :email, :time)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':userid', $userId);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':time', $loginTime);
                $stmt->execute();

                if ($row['Email'] == "admin@gulf") {
                    header("Location: adminprofile.php");
                    exit();
                } else {
                    header("Location: homepage.php");
                    exit();
                }
            } else {
                $errorMessage = "Wrong Password";
            }
        } else {
            $errorMessage = "No user found";
        }
    } else {
        $errorMessage = "Email and password are required";
    }
}
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input[type=text],
        .form-group input[type=password],
        .form-group input[type=email] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
        }

        .checkbox-group input[type=checkbox] {
            margin-right: 10px;
        }

        .checkbox-group label {
            font-size: 16px;
        }

        .form-group input[type=submit] {
            background-color: #231709;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
		.form-group input[type=button] {
            background-color: #231709;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
.light{
	background-color: #ecd4b4;
}
.error-message {
            color: #ff0000;
            margin-bottom: 10px;
        }
    </style>
</head>

<body class="light">
    <div class="form-container">
    <h2>Sign in</h2>
        <form action="" method="post">
            <fieldset>
                <legend>Welcome</legend>
				<div class="error-message">
                <div class="form-group">
                    <label for="email">Enter your email:</label>
                    <input name="email" type="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Enter your password:</label>
                    <input name="password" type="password" required>
                </div>
            </fieldset>
            <div class="form-group checkbox-group">
                <input id="remember-me" name="Checkbox" type="checkbox">
                <label for="remember-me">Remember Me</label>
            </div>
            <div class="form-group">
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input name="submit" type="submit" value="Sign in" style="width: 160px">
                
                <p>Not registered? <a href="signup.php">Click here</a></p>
            </div>
        </form>
    </div>
</body>

</html>
