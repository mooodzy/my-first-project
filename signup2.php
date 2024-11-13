<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
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
        }

        h2 {
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        input[type=submit] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type=button] {
            background-color: #2196f3;
            color: #fff;
            cursor: pointer;
        }

        input[type=submit], input[type=button] {
            padding: 10px;
            border: none;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <h2>Welcome</h2>
        <p>We sent a code to verify your phone number set to +968----</p>

        <h2>Enter Your OTP Number</h2>
        <label for="otp">OTP Number:</label>
        <input type="text" id="otp" name="otp" required>

        <input type="submit" value="Verify OTP">
        <br>

        <input type="submit" name="Submit1" value="DONE">
        <input type="button" name="Button1" value="Home Page">
    </form>
</body>

</html>
