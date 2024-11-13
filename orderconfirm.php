<?php
include('dbconnection.php');

// Delete a single item
if (isset($_GET['deleteItem']) && is_numeric($_GET['deleteItem'])) {
    $itemId = $_GET['deleteItem'];
    $deleteSql = "DELETE FROM shopping WHERE ProductID = :id";
    $deleteStmt = $conn->prepare($deleteSql);
    $deleteStmt->bindParam(':id', $itemId);
    $deleteStmt->execute();
    header("Location: ".$_SERVER['PHP_SELF']); // Redirect to refresh the page
    exit();
}

// Empty the entire cart
if (isset($_GET['emptyBasket'])) {
    $emptySql = "DELETE FROM shopping";
    $emptyStmt = $conn->prepare($emptySql);
    $emptyStmt->execute();
    header("Location: ".$_SERVER['PHP_SELF']); // Redirect to refresh the page
    exit();
}

// Retrieve items from the shopping table
$sql = "SELECT * FROM shopping";
$stmt = $conn->prepare($sql);
$stmt->execute();
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Calculate total price
$totalPrice = 0.000;
foreach ($items as $item) {
    $totalPrice += $item['Price'];
}

// Check if payment was successful and order was confirmed
$paymentSuccessful = checkPaymentSuccess();

if ($paymentSuccessful) {
    // Insert payment details into the database
    $orderNumber = uniqid(); // Generate a unique order number
    $userId =uniqid(); // Replace with the actual user ID
    $orderDate = date('Y-m-d H:i:s'); // Get the current date and time

    $insertSql = "INSERT INTO payment (TransactionID, UserID, Amount, PaymentDate) VALUES (:transactionId, :userId, :amount, :paymentDate)";
    $insertStmt = $conn->prepare($insertSql);
    $insertStmt->bindParam(':transactionId', $orderNumber);
    $insertStmt->bindParam(':userId', $userId);
    $insertStmt->bindParam(':amount', $totalPrice);
    $insertStmt->bindParam(':paymentDate', $orderDate);
    $insertStmt->execute();

    // Clear the shopping cart after a successful order
    $emptySql = "DELETE FROM shopping";
    $emptyStmt = $conn->prepare($emptySql);
    $emptyStmt->execute();
}

// Function to check payment success - replace this with your actual logic
function checkPaymentSuccess() {
    // Replace this with your logic to check if payment was successful
    // For example, you might check a payment gateway response
    // and return true if payment was successful, false otherwise.
    return true; // Placeholder, replace with actual logic
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheetpay.css">
    <style>
	@media print {
            body {
                font-family: 'Arial', sans-serif;
                background-color: #fff; /* Set background color for print */
            }

            .no-print {
                display: none;
            }
        }
        body {
            font-family: 'Arial', sans-serif;
            background-color:  #ecd4b4;;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #231709;
            color: white;
            text-align: center;
            padding: 1em;
            position: relative;
        }

        h1, p {
            text-align: center;
			color: #231709;
        }

        div {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .confirmation-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #231709;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .confirmation-btn:hover {
            background-color: #633B3B;
        }

        a {
            color: #333;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
		
.auto-style24 {
	margin-top: 0px;
}
    </style>
    <title>Order Confirmation</title>
</head>
<body>
    <header>
        <a href="homepage.php"><img src="logo.png" width="234" height="131"></a>
    </header>
    <h1 class="h2">Order Confirmation</h1>

    <?php if ($paymentSuccessful): ?>
        <div>
            <p>Thank you for your order!</p>
            <p>Order Number: <?php echo $orderNumber; ?></p>
            <p>Order Date: <?php echo $orderDate; ?></p>

            <!-- Display other order details if needed -->

            <!-- Display payment details -->
            <p>Transaction ID: <?php echo $orderNumber; ?></p>
            <p>User ID: <?php echo $userId; ?></p>
            <p>Total Amount: <?php echo number_format($totalPrice, 3); ?> OMR</p>

            <a href="homepage.php" class="confirmation-btn">Return to Home</a>
			<button onclick="window.print()" class="confirmation-btn no-print">Print Receipt</button>
        </div>
    <?php else: ?>
        <div>
            <p>Sorry, the payment was not successful. Please try again.</p>
            <!-- You might want to provide additional instructions or options for the user -->
            <a href="payment.php" class="confirmation-btn">Retry Payment</a>
        </div>
    <?php endif; ?>
<footer class="brown">
        <p>&copy; 2023 Gulf Racing</p>
    </footer>
</body>
</html>
