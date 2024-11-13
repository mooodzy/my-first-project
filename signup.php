<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #ecd4b4;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            margin-top: 50px;
        }

        h2 {
            color: #231709;
        }

        label {
            display: block;
            margin: 10px 0;
            text-align: left;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        textarea {
            resize: none;
        }

        input[type="checkbox"] {
            margin-top: 10px;
        }

        input[type="button"],
        input[type="submit"] {
            background-color: #231709;
            color: #fff;
            cursor: pointer;
            padding: 10px;
            border: none;
            border-radius: 4px;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #423424;
        }

        input[type="button"]:hover {
            background-color: #423424;
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

        .auto-style11 {
            margin-left: 0px;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <h2>Welcome</h2>

        <label for="firstname">Enter your first name:</label>
        <input name="firstname" type="text" required>

        <label for="lastname">Enter your last name:</label>
        <input name="lastname" type="text" required>

         <label for="phone">Enter a phone number:</label><br><br>
  <input type="tel" id="phone" name="phone" pattern="[0-9]{8}" required><br><br>

        <label for="email">Enter your email</label>
        <input name="email" type="email" required>

        <label for="password">Enter your password:</label>
        <input name="password" type="password" required>

        <label for="password2">Confirm the password:</label>
        <input name="password2" type="password" required>

        <p>At least 8 characters with one capital letter and one number</p>

        <input name="checkbox" type="checkbox" required><p>I agree about the terms and conditions</p>

     
        <input name="submit" type="submit" value="Confirm">
        <p>Already registered?<a href="signin.php">Click here to sign in!</a></p>
    </form>
</body>

</html>
<?php
session_start();
include 'dbconnection.php';

if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if (
        !empty($_POST['checkbox'])
        && !empty($firstname)
        && !empty($lastname)
        && !empty($phone)
        && !empty($email)
        && !empty($password)
        && !empty($password2)
    ) {
        if ($password == $password2) {

            $sqlCheckEmail = "SELECT COUNT(*) FROM user WHERE Email = :email";
            $stmtCheckEmail = $conn->prepare($sqlCheckEmail);
            $stmtCheckEmail->execute(array(':email' => $email));

            if ($stmtCheckEmail->fetchColumn() > 0) {
                // Email already exists, set error message
                $error = "Email already exists";
            } else {
                // Insert user data into the database
                $sqlInsertUser = "INSERT INTO user (UserID, Email, Password, FirstName, LastName, PhoneNumber) 
                                  VALUES (:userid, :email, :password, :firstname, :lastname, :phone)";
                $stmtInsertUser = $conn->prepare($sqlInsertUser);

                try {
                    $minLength = 10000000;
                    $maxLength = 99999999;
                    $randomNumber = rand($minLength, $maxLength);

                    $stmtInsertUser->execute(array(
                        ':email' => $email,
                        ':userid' => $randomNumber,
                        ':password' => $password,
                        ':firstname' => $firstname,
                        ':lastname' => $lastname,
                        ':phone' => $phone
                    ));

                    // Redirect to homepage on successful registration
                    header("Location: signin.php");
                    exit();
                } catch (PDOException $e) {
                    // Handle database errors, log or display an appropriate message
                    echo "Error: " . $e->getMessage();
                }
            }
        } else {
            // Passwords do not match, set error message
            $error = "Passwords do not match";
        }
    } else {
        // Empty fields, set error message
        $error = "Please fill in all the required fields";
    }
}

?>
