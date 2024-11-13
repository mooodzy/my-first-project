<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Racing Tools Store</title>
    <link rel="stylesheet" href="style.css">
	
</head>
<style>
.product {
	background-color: white;
    border: 1px solid brown;
    padding: 20px;
    margin: 10px;
    width: 200px;
}
    .auto-style3 {
        margin-top: 0px;
		border: 1px solid brown;
    }

    input[type="button"], input[type="submit"] {
        background-color: #231709;
        color: white;
        padding: 12px;
        margin: 10px 5px;
        border: none;
        width: 170px; 
        border-radius: 3px;
        cursor: pointer;
        font-size: 17px;
    }

 .btn:hover {
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
.brown{
	background-color: #231709;
	
}
.light{
	background-color: #ecd4b4;
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
<div class="container">
    <img src="toolstore.png" width="180" height="131" class="auto-style3">
    <h1 class="h2">Racing Tools Store</h1>
    <div class="products">
        <div class="product">
            
            <p><img src="motorola.jpg" width="55px" height="50px"></p>
            <h2>Motorola Talkabout T82</h2>
           <p><?php echo number_format(51.915, 3); ?> OMR</p>
            <form action="" method="post">
                <input type="hidden" name="productID">
                <input type="hidden" name="productName" value="Motorola-Talkabout-T82">
                <input type="hidden" name="price" value="51.915">
                <input type="submit" value="Add to basket" name="submit1">
            </form>
        </div>

        <div class="product">
            <p><img src="battery.jpg" width="55px" height="50px"></p>
            <h2>Dewalt 18V Battery</h2>
            <p><?php echo number_format(20.500, 3); ?> OMR</p>
            <form action="" method="post">
                <input type="hidden" name="productID">
                <input type="hidden" name="productName" value="Dewalt-18V-Battery">
                <input type="hidden" name="price" value="20.500">
                <input type="submit" value="Add to basket" name="submit2">
            </form>
        </div>

        <div class="product">
            <p><img src="dewalt.jpg" width="55px" height="50px"></p>
            <h2>Dewalt DCE530N 530c</h2>
            <p><?php echo number_format(150.475, 3); ?> OMR</p>
            <form action="" method="post">
                <input type="hidden" name="productID">
                <input type="hidden" name="productName" value="Dewalt-DCE530N-530c">
                <input type="hidden" name="price" value="150.475">
                <input type="submit" value="Add to basket" name="submit3">
            </form>
        </div>
    </div>
    <a href="shopping.php"><input type="button" value="back"></a>
    <a href="homepage.php"><input type="button" value="homepage"></a>
    <form action="payment.php" method="post">
        <input type="Submit" value="continue to checkout" name="submit">
    </form>
</div>
<footer class="brown" style="left: 0px; bottom: 0; height: 4px">
    </footer>
</body>
</html>
<?php
            include('dbconnection.php');
    $minLength = 10000000;
    $maxLength = 99999999;
    $randomNumber = rand($minLength, $maxLength);
            if (isset($_POST['submit1'])) {
                $sql = "INSERT INTO shopping (ProductID, ProductName, Price) VALUES (:ID, :Name, :Price)";
                $stmt = $conn->prepare($sql);
                $stmt->execute(array(
                    ':ID'    => $randomNumber,
                    ':Name'  => $_POST['productName'], 
                    ':Price' => $_POST['price']        
                ));


               
            }
			if (isset($_POST['submit2'])) {
                $sql = "INSERT INTO shopping (ProductID, ProductName, Price) VALUES (:ID, :Name, :Price)";
                $stmt = $conn->prepare($sql);
                $stmt->execute(array(
                    ':ID'    => $randomNumber,
                    ':Name'  => $_POST['productName'], 
                    ':Price' => $_POST['price']        
                ));

               
               
            }
			if (isset($_POST['submit3'])) {
                $sql = "INSERT INTO shopping (ProductID, ProductName, Price) VALUES (:ID, :Name, :Price)";
                $stmt = $conn->prepare($sql);
                $stmt->execute(array(
                    ':ID'    => $randomNumber,
                    ':Name'  => $_POST['productName'], 
                    ':Price' => $_POST['price']        
                ));
               
            
            
            }
            ?>