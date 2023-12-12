<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Rental Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<style>
    body {
        background-color: #f4f4f4;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container {
        margin-top: 50px;
    }

    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        padding: 30px;
    }

    .card-title {
        color: #333;
    }

    label {
        font-weight: bold;
        color: #555;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-control {
        border-radius: 8px;
    }

    .btn-primary {
        border-color: #4CAF50;
        transition: background-color 0.3s;
    }
    
    .alert {
        margin-top: 20px;
    }
</style>
<script>
        <?php
        // Check if the 'confirmation' query parameter is set
        if (isset($_GET['confirmation'])) {
            // Display an alert with the confirmation message
            echo "alert('" . htmlspecialchars($_GET['confirmation']) . "');";
        }
        ?>
    </script>

<body class="container">

    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title mt-4 mb-4">Vehicle Rental Form</h2>

                <form method="post" action="process_form.php" class="mb-4" onsubmit="return validateForm()">
                    <div class="form-group">
                        <label for="vehicle_type">Vehicle Type:</label>
                        <select name="vehicle_type" id="vehicle_type" class="form-control" onchange="updateCarOptions()" required>
                            <option value="" disabled selected>Choose the vehicle you want</option>
                            <option value="Motorcycles">Motorcycles</option>
                            <option value="Vans">Vans</option>
                            <option value="SUVs">SUVs</option>
                            <option value="Trucks">Trucks</option>
                            <option value="Cars">Cars</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="car_type">Car Type:</label>
                        <select name="car_type" id="car_type" class="form-control" required>
                            <option value="" disabled selected>First choose the vehicle</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="driven_distance">Driven Distance (in km):</label>
                        <input type="number" name="driven_distance" id="driven_distance" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="days">Number of Days:</label>
                        <input type="number" name="days" id="days" class="form-control" oninput="calculatePrice()" required>
                    </div>

                    <div class="form-group">
                        <label for="display_price">Display Price:</label>
                        <input type="text" name="display_price" id="display_price" class="form-control" readonly>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                <div id="alert" class="alert alert-danger" style="display:none;">
                    Please complete all required fields.
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateCarOptions() {
            const vehicleType = document.getElementById('vehicle_type').value;
            const carTypeSelect = document.getElementById('car_type');
            carTypeSelect.innerHTML = ''; // Clear previous options

            if (vehicleType === 'Motorcycles') {
                addCarOption('Compact Motorcycles');
                addCarOption('Touring Motorcycles');
            } else if (vehicleType === 'Vans') {
                addCarOption('Compact Vans');
                addCarOption('Cargo Vans');
            } else if (vehicleType === 'SUVs') {
                addCarOption('Compact SUVs');
                addCarOption('Luxury SUVs');
            } else if (vehicleType === 'Trucks') {
                addCarOption('Pickup Trucks');
                addCarOption('Heavy-duty Trucks');
            } else if (vehicleType === 'Cars') {
                addCarOption('Compact Cars');
                addCarOption('Luxury Cars');
            }
        }

        function addCarOption(carType) {
            const carTypeSelect = document.getElementById('car_type');
            const option = document.createElement('option');
            option.value = carType;
            option.textContent = carType;
            carTypeSelect.appendChild(option);
        }

        function calculatePrice() {
            const days = document.getElementById('days').value;
            const displayPrice = document.getElementById('display_price');
            const pricePerDay = 2000;

            displayPrice.value = days * pricePerDay;
        }

        function validateForm() {
            const vehicleType = document.getElementById('vehicle_type').value;
            const carType = document.getElementById('car_type').value;
            const drivenDistance = document.getElementById('driven_distance').value;
            const days = document.getElementById('days').value;

            if (!vehicleType || !carType || !drivenDistance || !days) {
                document.getElementById('alert').style.display = 'block';
                return false;
            } else {
                document.getElementById('alert').style.display = 'none';
                return true;
            }
        }
    </script>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
