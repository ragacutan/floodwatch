<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FloodWatch</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="LOGO/logo.png" alt="FloodWatch Logo" class="logo">
            <h1>FloodWatch</h1>
        </div>
        <div class="registration-btn">
            <a href="register.php">Register</a>
        </div>
    </header>
    <main>
    <div class="weather-display">
            <?php
            $weather_api_key = 'de2fab5eb72d1d53a9c48fbc67e76782';
            $latitude = '16.602909';
            $longitude = '120.362862';
            $weather_url = "https://api.openweathermap.org/data/2.5/weather?lat=$latitude&lon=$longitude&units=metric&appid=$weather_api_key";
            
            $response = file_get_contents($weather_url);
            $weather_data = json_decode($response, true);
            
            if ($weather_data) {
                $weather_description = $weather_data['weather'][0]['description'];
                $temperature = $weather_data['main']['temp'];
                $weather_icon = $weather_data['weather'][0]['icon'];
                $date_time = date('l, F j, Y - H:i:s');
                $icon_url = "http://openweathermap.org/img/w/$weather_icon.png";
            
                echo "<div class='weather-text'>";
                echo "$temperature &deg;C | <img src='$icon_url' alt='Weather Icon' class='weather-icon'> $weather_description</div>";

                echo "<div class='date-time'>";
                echo "<p> $date_time</p>";
                echo "</div>";
            } else {
                echo "<p>Weather data unavailable.</p>";
            }
            ?>

        <?php
            $water_level_sensor = 4; // Replace with your sensor data

            echo "<div class='water-level-status'>";
            echo "Water Level: ";
            if ($water_level_sensor <= 0) {
                echo "<span class='filled-box white-box'></span>";
            } elseif ($water_level_sensor == 1) {
                echo "<span class='filled-box green-box'></span>";
            } elseif ($water_level_sensor == 2) {
                echo "<span class='filled-box orange-box'></span>";
            } elseif ($water_level_sensor == 3) {
                echo "<span class='filled-box yellow-box'></span>";
            } elseif ($water_level_sensor == 4) {
                echo "<span class='filled-box red-box'></span>";
            }
            echo "</div>";
            ?>

            <div class="flood-advisory-container">
                <h2>Flood Advisory</h2>
                 <p>This is a placeholder for flood advisory information. Replace this with actual advisory content.</p>
               <!-- You can add more content or dynamic data here as needed -->
            </div>

            <div class="water-Level">
    <h2>Water Level Status</h2>
    <div class="water-container">
        <h1><mark class="evacuation">EVACUATION</mark></h1>
        <p>Serious Flooding is expected in low-lying areas! Evacuation in Needed!</p>

        <h1><mark class="prepare">PREPARE</mark></h1>
        <p>Prepare your survival for possible evacuation Flooding is Threatening</p>

        <h1><mark class="alert">ALERT AND MONITORING</mark></h1>
        <p>Monitoring water level Possible Flooding</p>

        <h1><mark class="low-level">LOW WATER LEVEL</mark></h1>
        <p>Observation of weather</p>
    </div>
</div>
            

            <div class="emergency-hotlines">
                <h2>Emergency Hotlines</h2>

             <div class="hotline-container">
                 <img src="LOGO/itrmc.png" alt="Emergency Service Logo" class="hotline-logo">
                    <p>ITRMC</p>
                    <p>09123456789</p>
                    <p>Sevilla</p>
                    <p>San Fernando</p>
            </div>

    <div class="hotline-container">
        <img src="LOGO/pro1.png" alt="Emergency Service Logo" class="hotline-logo">
        <p>CSF POLICE STATION</p>
        <p>(072) 607-8954</p>
        <p>09123456789</p>
        <p>09123456789</p>
    </div>

    <div class="hotline-container">
        <img src="LOGO/bfp.png" alt="Emergency Service Logo" class="hotline-logo">
        <p>Emergency Service 3</p>
        <p>111-222-3333</p>
        <p>09123456789</p>
        <p>09123456789</p>
    </div>

    <div class="hotline-container">
        <img src="LOGO/cdrrmc.png" alt="Emergency Service Logo" class="hotline-logo">
        <p>Emergency Service 4</p>
        <p>444-555-6666</p>
        <p>09123456789</p>
        <p>09123456789</p>
    </div>
</div>


<div class="evacuation-center">
                <h2>Evacuation Center</h2>

<div class="evacuation-center-container">
    
        <div class="evacuation-info">
            <div class="evacuation-location">
                <p><a href="#">Sevilla Brgy. Hall</a></p>
                <p><a href="#">Madayegdeg Brgy. Hall</a></p>
            </div>
        </div>

        <div class="evacuation-info">
            <div class="evacuation-location">
                <p><a href="#">Catbangen Central School</a></p>
                <p><a href="#">Catbangen Brgy. Hall</a></p>
            </div>
        </div>

        <div class="evacuation-info">   
            <div class="evacuation-location">
                <p><a href="#">Senior Citizen Hall</a></p>
                <p><a href="#">4th Floor of Marcos Highway</a></p>
            </div>
        </div>
    </div>
    </main>
    <footer>
    <div style="background-color: smokewhite; color: blue; text-align: center; padding: 10px;">
        <p>Flood Monitoring & Early Warning</p>
        <p>@FloodWatch 2023</p>

    </div>
</footer>
</body>
</html>
