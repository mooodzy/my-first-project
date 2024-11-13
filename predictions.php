<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
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
}
</style>
<body class="light">
<header class="brown">
	    <a href="homepage.php"><img src="logo.png" width="234" height="131" class="auto-style24"></a> 
	   </header>
  <h1 style="text-align: center">Predictions</h1>
  <br><br><br><br>

  <div class="center">
  <div class="button-container">
      <label><input type="radio" name="camel" onchange="selectCamel(0)">Vote for Camel 1</label>
      <label><input type="radio" name="camel" onchange="selectCamel(1)">Vote for Camel 2</label>
      <label><input type="radio" name="camel" onchange="selectCamel(2)">Vote for Camel 3</label>
      <label><input type="radio" name="camel" onchange="selectCamel(3)">Vote for Camel 4</label>
      <button onclick="vote()" id="voteButton">Vote</button>
      <p id="voteMessage" style="color: green; font-weight: bold;"></p>
     	 <button onclick="returnHome()" id="returnButton">Return to Home Page</button>
		 <br><br><br><br>
      </div>
	<canvas id="myChart" style="width:100%;max-width:850px"></canvas>
    
  </div>
<br><br><br><br><br><br><br><br>
  <script>
    const xValues = ["Camel name 1", "Camel name 2", "Camel name 3", "Camel name 4"];
    let yValues = [0, 0, 0, 0];
    const barColors = ["red", "green", "blue", "orange", "brown"];
    let selectedCamelIndex = null;

    const chart = new Chart("myChart", {
      type: "bar",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        legend: { display: false },
        title: {
          display: true,
          text: "Vote for the Winner",
          fontSize: 18,
        }
      }
    });

    function selectCamel(index) {
      selectedCamelIndex = index;
    }

    function vote() {
      if (selectedCamelIndex !== null) {
        yValues[selectedCamelIndex]++;
        chart.update(); 
        document.getElementById("voteButton").disabled = true; // Disable the button after voting
        document.getElementById("voteMessage").innerText = "Voted successfully!";
        document.getElementById("returnButton").style.display = "block"; // Display the return button
      } else {
        alert("Please select a camel before voting.");
      }
    }

    function returnHome() {
      
      window.location.href = "homepage.php";
    }
  </script>

</body>
</html>
