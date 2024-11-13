<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<style>
  .center {
    margin-left: auto;
    margin-right: auto;
    text-align: center; 
  }
 
  .button-container {
    margin-top: 20px; 
    position: relative; 
  }
 
  canvas {
    display: block;
    margin: 0 auto;
  }
 
  input[type="radio"] {
    margin: 5px; 
  }
 
  button {
    margin: 10px 0; 
  }
 
  #returnButton {
    display: none;
    position: absolute; 
    bottom: 1;
    left: 50%; 
    transform: translateX(-50%); 
  }
.auto-style24 {
	margin-top: 0px;
}
.brown{
	background-color: #231709;
}
.light{
	background-color: #ecd4b4;
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
}
video-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }
 
        /* Video styling */
        video {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -1;
        }
 
        /* Other content styles */
        .content {
            position: relative;
            z-index: 1;
            padding: 20px;
            color: white;
        }
</style>
<body class="light">
<header class="brown">
<a href="homepage.php"><img src="logo.png" width="234" height="131" class="auto-style24"></a> 
</header>
<nav>
<ul> 
<li><figure><a href="race_registration.php"><img src="registration.png" width="65" height="53" class="auto-style11"></a><figcaption>registration</figcaption></figure></li>
<li><figure><a href="live-races.php"><img src="live.png" width="49" height="43" class="auto-style22"></a><figcaption>Live</figcaption></figure></li>
<li><figure><a href="predictions.php"><img src="predictions.png" width="53" height="41" class="auto-style23"></a><figcaption>predictions</figcaption></figure></li>
<li><figure><a href="shopping.php"><img src="shopping.png" width="58" height="48" class="auto-style19"></a><figcaption>shopping</figcaption></figure></li>
<li><figure><a href="homepage.php"><img src="home.png" width="58" height="48" class="auto-style19"></a><figcaption>homepage</figcaption></figure></li>
</ul>
</nav>
<div id="video-container">
<video autoplay muted loop poster="poster_image.jpg">
<!-- Replace 'video.mp4' with your video file -->
<source src=".mp4" type="video/mp4">
            Your browser does not support the video tag.
</video>
</div>
 
    <div class="content">
<!-- Your other content goes here -->
</div>
<!DOCTYPE html>
<html>
<head>
<title>News Ticker</title>
<style>
        /* Styling for the news ticker */
        .news-ticker {
            overflow: hidden;
            background-color: #333;
            color: white;
            padding: 10px;
        }
        .news-item {
            display: inline-block;
            margin-right: 20px;
            animation: ticker 15s linear infinite;
        }
 
        /* Keyframes for the animation */
        @keyframes ticker {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }
</style>
</head>
<body>
<div class="news-ticker">
<?php
        // Sample news items - replace with your news source or database query
        $news = array(
            "Breaking news: Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        );
 
        // Display news items in the ticker
        foreach ($news as $item) {
            echo '<div class="news-item">' . $item . '</div>';
        }
        ?>
</div>
 
    <script>
        // Optional: Adjust speed of ticker by changing the duration in milliseconds (e.g., 15000ms = 15s)
        const tickerDuration = 15000;
 
        // Calculate animation duration based on number of news items
        const newsItems = document.querySelectorAll('.news-item').length;
        document.querySelector('.news-ticker').style.animationDuration = (newsItems * tickerDuration / 1000) + 's';
</script>
</body>
</html>
 
	








 
	







</body>
</html>	