<?php
include('dbconnection.php'); 

if (isset($_GET['deleteItem']) && is_numeric($_GET['deleteItem'])) {
    $itemId = $_GET['deleteItem'];
    $deleteSql = "DELETE FROM shopping WHERE ProductID = :id";
    $deleteStmt = $conn->prepare($deleteSql);
    $deleteStmt->bindParam(':id', $itemId);
    $deleteStmt->execute();
    header("Location: ".$_SERVER['PHP_SELF']); // Redirect to refresh the page
    exit();
}

if (isset($_GET['emptyBasket'])) {
    $emptySql = "DELETE FROM shopping";
    $emptyStmt = $conn->prepare($emptySql);
    $emptyStmt->execute();
    header("Location: ".$_SERVER['PHP_SELF']); // Redirect to refresh the page
    exit();
}

$sql = "SELECT * FROM shopping";
$stmt = $conn->prepare($sql);
$stmt->execute();
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

$totalPrice = 0.000;
foreach ($items as $item) {
    $totalPrice += $item['Price'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheetpay.css">
    <title>Payment</title>
    <style type="text/css">
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #ecd4b4;
            color: #333;
        }

        header.logo {
            background-color: #231709;
            color: white;
            text-align: center;
            padding: 0.4em;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 900;
        }


        h1 {
            text-align: center;
            color: #231709;
        }

        .row {
            display: flex;
            justify-content: space-between;
            margin: 20px;
        }

        .col-75 {
            flex: 70%;
            padding: 10px;
        }

        .col-50 {
            flex: 10%;
            padding: 5px;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label, input {
            margin-bottom: 10px;
        }

        .icon-container {
            display: flex;
            justify-content: space-around;
        }

        .icon-container i {
            font-size: 30px;
        }

        input[type=text] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type=checkbox] {
            margin-top: 10px;
        }

        .btn {
            background-color: #C5A984;
            color: white;
			text-align: center;
            padding: 12px;
            margin: 10px 0;
            width: 20%;
            border-radius: 3px;
            cursor: pointer;
            font-size: 17px;
        }

        p {
            font-size: 14px;
            text-align: center;
            margin-top: 10px;
        }

        footer.brown {
            background-color: #231709;
            color: white;
            text-align: center;
            padding: 1em;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header class="logo">
        <a href="homepage.php"><img src="logo.png" width="234" height="131"></a>
    </header>
    
    <h1>Payment</h1>

    <div class="row">
        <div class="col-75">
            <div class="container">
                <form action="orderconfirm.php" method="post">
                    <div class="row">
                        <div class="col-50">
                            <h3>Enter card details</h3>
                            <label for="ccnum">Accepted Cards</label>
                            <div class="icon-container" style="width: 122px">
                                <i class="fa fa-cc-visa"><img src="visa.png" width="55" height="35"></i>
                                <i class="fa fa-cc-mastercard"><img src="masterc.png" width="55" height="35"></i>
                            </div>
                            <label for="ccnum">Card number</label>
                            <input type="text" id="ccnum" name="cardnumber" placeholder="0000-0000-0000-0000" required style="width: 34%">
                            <label for="expmonth">Exp Month</label>
                            <input type="text" id="expmonth" name="expmonth" placeholder="September" required style="width: 21%">
                            <div class="row">
                                <div class="col-50">
                                    <label for="expyear">Exp Year</label>
                                    <input type="text" id="expyear" name="expyear" placeholder="2023" required style="width: 28%">
                                </div>
                                <div class="col-50" style="width: 809px">
                                    <label for="cvv">CVV</label>
                                    <input type="text" id="cvv" name="cvv" placeholder="863" required style="width: 11%">
                                </div>
                            </div>
                        </div>
                    </div>
                    <label>
                        <input type="checkbox" name="sameadr"> Save your card
                    </label>
                    <?php if (count($items) > 0): ?>
                        <a href="shopping.php"><input type="button" value="Cancel" class="btn"></a>
                        <a href="?emptyBasket"><input type="button" value="Empty Basket" class="btn"></a>
                        <input type="submit" name="submit" value="Pay Now" class="btn">
                    <?php else: ?>
                        <a href="shopping.php"><input type="button" value="Continue Shopping" class="btn"></a>
                    <?php endif; ?>
                    <p>* By placing the order, you agree to the credit card payment terms and conditions.</p>
                </form>
            </div>
        </div>
		<br>
		<br>
        <div class="col-25">
            <div class="container">
			<br>
		<br><br>
		<br>
                <?php if (count($items) > 0): ?>
                    <h4>Cart <span class="price"><i class="fa fa-shopping-cart"></i> <b><?php echo count($items); ?></b></span></h4>
                    <?php foreach ($items as $item): ?>
                        <p><a href="#"><?php echo $item['ProductName']; ?></a> <span class="price"><?php echo number_format($item['Price'], 3); ?> OMR</span>
                            <a href="?deleteItem=<?php echo $item['ProductID']; ?>"><input type="button" value="Remove"></a></p>
                    <?php endforeach; ?>
                    <hr>
                    <p>Total <span class="price"><b><?php echo number_format($totalPrice, 3); ?> OMR</b></span></p>
                <?php else: ?>
                    <p>Your basket is empty. Please add items to the basket.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
	<br>
		<br>
    <footer class="brown">
        <p>&copy; 2023 Gulf Racing</p>
    </footer>
</body>
</html>
