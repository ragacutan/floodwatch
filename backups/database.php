<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "sensor_data";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sensor_number = $_POST['sensor_number'];
$sensor_value = $_POST['sensor_value'];
$name = $_POST['name'];

$sql = "INSERT INTO sensor_readings (sensor_number, sensor_value, name) VALUES ('$sensor_number', '$sensor_value', '$name')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
