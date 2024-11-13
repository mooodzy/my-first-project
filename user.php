<?php
session_start();
include 'dbconnection.php';

$sql = "SELECT * FROM user WHERE UserID = :userID";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':userID', $userID);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);


if (isset($_POST['changePassword'])) {
    $currentPassword = $_POST['Password'];
    $newPassword = $_POST['newPassword'];

    // Check if the current password is correct
    if ($currentPassword == $user['Password']) {
        // Update the password in the database
        $updateSql = "UPDATE user SET Password = :newPassword WHERE UserID = :userID";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bindParam(':newPassword', $newPassword);
        $updateStmt->bindParam(':userID', $userID);
        $updateStmt->execute();

        // Redirect to the same page after password change
        header("Location: user.php");
        exit();
    } else {
        $passwordChangeError = "Incorrect current password";
    }
}

// Handle logout
if (isset($_POST['logout'])) {
   $deletesql= "DELETE * FROM login WHERE UserID = :userID";
   $deleteStmt = $conn-> prepare($deletesql);
   $deleteStmt-> execute();
    session_destroy();
    header("Location: signin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Details & Change Password</title>
    <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
      color: #333;
    }
    header {
      background-color: #007bff;
      color: white;
      text-align: center;
      padding: 20px 0;
    }
    .container {
      width: 80%;
      margin: 20px auto;
    }
    .user-info {
      background-color: white;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }
    form {
      background-color: white;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    label {
      display: block;
      margin-bottom: 5px;
    }
    input[type=password] {
      width: calc(100% - 12px);
      padding: 6px;
      margin-bottom: 10px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }
   .save {
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      background-color: #007bff;
      color: white;
      font-size: 14px;
    }
	.logout {
      padding: 10px 20px;
      border: solid;
      border-radius: 10px;
      cursor: pointer;
      background-color: red;
      color: white;
      font-size: 16px;
    }
	.auto-style19 {
	margin-right: 27px;
}
.brown{
	background-color: #231709;
	
}
.light{
	background-color: #ecd4b4;
}
.auto-style24 {
	margin-top: 0px;
}
</style>
</head>

<body class="light">
    <header class="brown">
        <a href="homepage.php"><img src="logo.png" width="234" height="131"></a>
        <h1>User Details & Change Password</h1>
    </header>

    <nav>
        <ul>
            <li>
                <figure>
                    <a href="homepage.php" style="width: auto; height: auto;">
                        <img src="home.png" width="58" height="48" class="auto-style19">
                    </a>
                    <figcaption>homepage</figcaption>
                </figure>
            </li>
        </ul>
    </nav>

    <div class="container">
        <div class="user-info">
            <h2>User Information</h2>
            <p>Name: </p>
    <p>Email: </p>
           
        </div>
        <form id="passwordForm" method="post" action="">
            <h2>Change Password</h2>
            <?php if (isset($passwordChangeError)) : ?>
                <p style="color: red;"><?php echo $passwordChangeError; ?></p>
            <?php endif; ?>
            <label for="Password">Current Password:</label>
            <input type="password" id="Password" name="currentPassword" required><br>
            <label for="newPassword">New Password:</label>
            <input type="password" id="newPassword" name="newPassword" required><br>
            <input type="submit" name="changePassword" value="Save" class="save">
        </form>

        <form method="post" action="">
          <input type="submit" name="logout" value="Logout" class="logout">
        </form>
    </div>
</body>

</html>