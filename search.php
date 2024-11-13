<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <title>Search Results</title>
    <style>
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
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

        .auto-style24 {
            margin-top: 0px;
        }

        .brown {
            background-color: #231709;
        }

        .light {
            background-color: #ecd4b4;
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
    <h2>Search Results</h2>
<form action="search.php" method="GET">
        <label for="search">Search:</label>
        <input type="text" name="search" id="search" required>
        <input type="submit" value="submit">
    </form>

 <?php
include('dbconnection.php');

if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];

    // Prepare and execute the case-insensitive database query
    $sql = "SELECT * FROM products WHERE LOWER(Name) LIKE :searchTerm";
    $stmt = $conn->prepare($sql);
    $searchTerm = '%' . strtolower($searchTerm) . '%'; // Case-insensitive search
    $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($results)) {
        // Group products by the first word of the name
        $groupedResults = [];
        foreach ($results as $result) {
            $firstWord = explode(' ', $result['Name'])[0];
            $groupedResults[$firstWord][] = $result;
        }

        echo "<p>Showing results for: <strong>$searchTerm</strong></p>";

        foreach ($groupedResults as $firstWord => $group) {
            echo "<h3>$firstWord</h3>";
            echo "<div class='search-results'>";
            foreach ($group as $product) {
                // Generate a clickable link for each product
                echo "<p><a href='shopping.php'>{$product['Name']} - {$product['Price']} OMR</a></p>";
                // Add more information as needed
            }
            echo "</div>";
        }
    } else {
        echo "<p>No results found for: <strong>$searchTerm</strong></p>";
    }
} else {
    echo "<p>No search term provided.</p>";
}
?>

</div>
</body>
</html>