<?php
session_start();
include 'dbconnection.php';

// Check if 'UserID' is set in the session
if (isset($_SESSION['UserID'])) {
    $userID = $_SESSION['UserID'];

    $sql = "SELECT * FROM user WHERE UserID = :userID";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':userID', $userID);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gulf Racing</title>
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

{box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}


.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}


.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
.auto-style24 {
	margin-top: 0px;
}
.user-on-right {
    position: absolute;
    top: 0;
    right: 0;
    margin: 30px;
}

.brown{
	background-color: #231709;
	
}
.h2{
	color: #231709;
	text-align: center;
}
.light{
	background-color: #ecd4b4;
}

.container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        p {
            line-height: 1.6;
        }
		a{
			color: black;
		}
</style>
<body class="light">
    <header class="brown">
	    <img src="logo.png" width="234" height="131" class="auto-style24"> 
		<a href="user.php"><img src="user_icon.png" width="65" height="53" class="user-on-right"></a>
	   </header>
    <nav>
		<ul> 
		    <li><figure><a href="search.php"><img src="search.png" width="65" height="53" class="auto-style11"></a><figcaption>search</figcaption></figure></li>
            <li><figure><a href="race_registration.php"><img src="registration.png" width="65" height="53" class="auto-style11"></a><figcaption>registration</figcaption></figure></li>
            <li><figure><a href="live.php"><img src="live.png" width="49" height="43" class="auto-style22"></a><figcaption>Live</figcaption></figure></li>
            <li><figure><a href="predictions.php"><img src="predictions.png" width="53" height="41" class="auto-style23"></a><figcaption>predictions</figcaption></figure></li>
			<li><figure><a href="shopping.php"><img src="shopping.png" width="58" height="48" class="auto-style19"></a><figcaption>shopping</figcaption></figure></li>
        </ul>
    </nav>
    <section>
        <h2 class="h2">Welcome to Gulf Racing!</h2>

		<div class="slideshow-container" style="left: 7px; top: 0px; width: 1370px; height: 10px">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="show1.png" style="width:100%">
  
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="show2.png" style="width:100%">
  
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="show3.png" style="width:100%">
  
</div>

</div>
<br>
<br>
<br>
<br>
<br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
<div class="container">
<a href="about.php"><h1>About Us</h1></a>
<p>
An Omani private Arabic-speaking Omani electronic channel owned by (Gulf Media Services), a small and medium-sized company that covers everything related to camel sport in the Sultanate through an electronic application of the company on smartphones, tablets and computers to broadcast races and festivals for camel sport in addition to a package of episodes Recorded and direct for the analytical studios and educational, awareness, heritage and tourism programs offered by the people of Oman.
</p>  
</div>
<br><br><br><br><br><br><br><br><br><br><br>
<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000);
}
</script>
<br><br>



    </section>
    <footer class="brown" style="left: -2px; bottom: -18px">
        <p>&copy; 2023 Gulf Racing</p>
    </footer>
</body>
</html>
