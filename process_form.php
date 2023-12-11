<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $vehicleType = $_POST['vehicle_type'];
    $carType = $_POST['car_type'];
    $drivenDistance = $_POST['driven_distance'];
    $days = $_POST['days'];
    $displayPrice = $_POST['display_price'];

    // Insert data into the database
    $sql = "INSERT INTO rental_data (vehicle_type, car_type, driven_distance, days, display_price) 
            VALUES ('$vehicleType', '$carType', '$drivenDistance', '$days', '$displayPrice')";

    if ($conn->query($sql) === TRUE) {
        // Data inserted successfully, set a flag to display an alert
        $successMessage = "Data inserted successfully";
        // Redirect to index.php with a confirmation query parameter
        header("Location: index.php?confirmation=" . urlencode($successMessage));
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
