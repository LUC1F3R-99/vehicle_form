<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'vehicle_rental'; // The name of the database you created

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vehicleType = $_POST['vehicle_type'];
    $carType = $_POST['car_type'];
    $drivenDistance = $_POST['driven_distance'];
    $days = $_POST['days'];
    $displayPrice = $days * 2000;

    // Use prepared statement to prevent SQL injection
    $sql = $conn->prepare("INSERT INTO vehicle_rental (vehicle_type, car_type, driven_distance, days, display_price)
                           VALUES (?, ?, ?, ?, ?)");

    $sql->bind_param("ssiii", $vehicleType, $carType, $drivenDistance, $days, $displayPrice);

    if ($sql->execute()) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql->close();
}

$conn->close();
?>
