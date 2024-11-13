<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Simple Shopping Page</title>
<link rel="stylesheet" href="style.css"> 
<style>
.category {
	background-color: white;
    border: 1px solid brown;
    padding: 30px;
    margin: 10px;
    width: 200px;
}
.btn {
  background-color: #231709;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 45%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #423424;
}

.auto-style24 {
	margin-top: 0px;
}
.brown{
	background-color: #231709;
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
</head>
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
<h1>Shopping</h1>
<h3> select the store</h3>
<div class="categories">
<?php

$categories = [
    ['button' => '<a href="tools.php"><input type="button" class="btn" value="select"></a>', 'image' => '<img src="camel.png">', 'id' => 1, 'name' => 'Racing tools store', 'time' => 30],
    ['button' => '<a href="camp.php"><input type="button" class="btn" value="select"></a>', 'image' => '<img src="camp.png">', 'id' => 2, 'name' => 'Camping Store', 'time' => 15],
    ['button' => '<a href="food.php"><input type="button" class="btn" value="select"></a>', 'image' => '<img src="food.png">', 'id' => 3, 'name' => 'Camels food Store', 'time' => 20],
    ['button' => '<a href="clinic.php"><input type="button" class="btn" value="select"></a>', 'image' => '<img src="clinic.png">', 'id' => 4, 'name' => 'Veterinary pharmacy', 'time' => 30]
];

foreach ($categories as $category) {
    echo '<div class="category">';
    echo '<h2>' . $category['name'] . '</h2>';
    echo '<p>'.$category['image'].'</p>';
    echo '<p>&#x1F551; within ' . $category['time'] . ' min</p>';
    echo '<form action="" method="post">';
    echo '<input type="hidden" name="product_id" value="' . $category['id'] . '">';
    echo $category['button'];
    echo '</form>';
    echo '</div>';
}
?>


</div>
</div>
 <footer class="brown" style="left: 0px; bottom: 0; height: 4px">
    </footer>
</body>
</html>
