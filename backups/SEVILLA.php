<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)), url('logo/CITY.jpg');
      height: 100%;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
      color: #333;
    }

    .sidenav {
      height: 100%;
      width: 200px;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #1D5D9B;
      padding-top: 20px;
      overflow-x: hidden;
    }

    .sidenav a {
      padding: 15px 8px;
      text-decoration: none;
      font-size: 16px;
      color: white;
      display: block;
      transition: background 0.3s ease;
      text-align: center;
    }

    .sidenav a:hover {
      background-color: #144375;
    }

    .header {
      position: sticky;
      top: 0;
      margin-left: 200px;
      padding: 20px;
      background-color: #5390cc;
      color: white;
      text-align: left;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
      z-index: 2;
    }

    .logo {
      text-align: center;
      color: white;
      padding: 10px;
    }

    .logo img {
      width: 80px;
      border-radius: 50%;
    }

    .header h1 {
      font-size: 24px;
      margin: 0;
    }

    .additional-text,
    .districts-container {
      position: sticky;
      top: 0;
      margin-left: 200px;
      padding: 20px;
      text-align: center;
      font-size: 20px;
      z-index: 1;
      font-weight: bold;
    }

    .content-box {
      background-color: #D2D4DA;
      padding: 15px;
      border-radius: 8px;
      margin-bottom: 20px;
      width: 250px;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    }

    
.mini-box {
      margin-left: 250px;
      margin-top: 15px;
      text-align: center;
}

.mini-box .content-box {
  background-color: #D2D4DA;
  padding: 15px;
  border-radius: 8px;
  margin-bottom: 20px;
  width: 200px; /* Adjusted width to 200px */
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
}

/* User Box */
.user-box {
  margin-left: 250px;
  margin-top: 5px;
}

.user-box .content-box {
  background-color: #D2D4DA;
  padding: 15px;
  border-radius: 8px;
  width: 200px; /* Adjusted width to 200px */
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
  text-align: center;
}



    .historical-table {
      margin-left: 550px;
      margin-top: -350px;
      text-align: right;
      width: 1200px; /* Adjusted width to fit the table */
      border-collapse: collapse;
      font-weight: bold;  
    }

    .historical-table th, .historical-table td {
      border: 1px solid #000000;
      padding: 8px;
    }

    .historical-table th {
      background-color: #5390cc;
      color: white;
    }

    .white-bg { background-color: white; }
    .green-bg { background-color: green; }
    .yellow-bg { background-color: yellow; }
    .orange-bg { background-color: orange; }
    .red-bg { background-color: red; }

  /* Donut Chart Styles */
#donutChartContainer {
  margin-left: 1350px;
  margin-top: 170px;
  text-align: center;
  width: 350px; /* Adjusted width to 45% */
}

/* Bar Chart Styles */
#barChartContainer {
  margin-left: 510px;
  margin-top: -350px;
  text-align: center;
  width: 700px; /* Adjusted width to 45% */
}


    @media only screen and (max-width: 600px) {
      .sidenav,
      .header,
      .additional-text,
      .districts-container {
        margin-left: 0;
        width: 100%;
      }

      .historical-table {
    margin-left: 0;
    margin-top: 0;
    width: 100%;
  }
    }

    
  </style>
</head>
<body>

<div class="sidenav">
  <div class="logo">
    <img src="logo/City.png" alt="Logo">
    <p>FMEWS-CDRRMO</p>
  </div>
  <a href="BARANGAY.php">Home</a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Contact</a>
</div>

<div class="header">
  <h1>FLOOD MONITORING ADMIN</h1>
</div>

<div class="additional-text">
  <p>BARANGAY SEVILLA</p>
</div>

<!-- Mini Box -->
<div class="mini-box">
  <div class="content-box">
    <h2>Population</h2>
    <p>Total: 10,000</p>
    <!-- You can dynamically update the population count as needed -->
  </div>
</div>

<!-- User Box -->
<div class="user-box">
  <div class="content-box">
    <h2>Users in Your Barangay</h2>
    <p>Total: 123</p>
  </div>
</div>

<!-- Historical Data Table -->
<table class="historical-table">
  <thead>
    <tr>
      <th>Date</th>
      <th>Time</th>
      <th>Sensor 1</th>
      <th>Sensor 2</th>
      <th>Sensor 3</th>
      <th>Sensor 4</th>
    </tr>
  </thead>
  <tbody>
    <!-- Add rows dynamically based on historical data -->
    <tr>
      <td>2023-12-09</td>
      <td>12:00 PM</td>
      <td class="white-bg"></td>
      <td class="green-bg"></td>
      <td class="yellow-bg"></td>
      <td class="orange-bg"></td>
    </tr>
    tr>
      <td>2023-12-09</td>
      <td>12:00 PM</td>
      <td class="white-bg"></td>
      <td class="green-bg"></td>
      <td class="yellow-bg"></td>
      <td class="orange-bg"></td>
    </tr>

    <td>2023-12-09</td>
    <td>12:00 PM</td>
    <td class="white-bg"></td>
    <td class="green-bg"></td>
    <td class="yellow-bg"></td>
    <td class="orange-bg"></td>
  </tr>

  <td>2023-12-09</td>
  <td>12:00 PM</td>
  <td class="white-bg"></td>
  <td class="green-bg"></td>
  <td class=""></td>
  <td class=""></td>
</tr>
    <!-- Add more rows as needed -->
  </tbody>
</table>
</div>

<!-- Donut Chart -->
<div class="chart-container" id="donutChartContainer">
  <canvas id="donutChart"></canvas>
</div>

<!-- Bar Chart -->
<div class="chart-container" id="barChartContainer">
  <canvas id="barChart"></canvas>
</div>

<script>
  // Dummy data for the charts
  const donutChartData = {
    labels: ['No Water', 'Sensor 1', 'Sensor 2', 'Sensor 3', 'Sensor 4'],
    datasets: [{
      data: [30, 10, 20, 15, 25],
      backgroundColor: ['white', 'green', 'yellow', 'orange', 'red'],
    }]
  };

  const barChartData = {
    labels: ['No Water', 'Sensor 1', 'Sensor 2', 'Sensor 3', 'Sensor 4'],
    datasets: [{
      label: 'Alert Levels',
      data: [30, 10, 20, 15, 25],
      backgroundColor: ['white', 'green', 'yellow', 'orange', 'red'],
    }]
  };

  // Donut Chart
  const donutChartCtx = document.getElementById('donutChart').getContext('2d');
  const donutChart = new Chart(donutChartCtx, {
    type: 'doughnut',
    data: donutChartData,
  });

  // Bar Chart
  const barChartCtx = document.getElementById('barChart').getContext('2d');
  const barChart = new Chart(barChartCtx, {
    type: 'bar',
    data: barChartData,
    options: {
      legend: {
        display: false,
      },
    },
  });
</script>

</body>
</html>
