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
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
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

            <form method="post" action="process_form.php" class="mb-4">
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
                        <!-- Car options will be dynamically updated using JavaScript -->
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

                <button type="submit" class="btn btn-primary" onclick="submitForm()">Submit</button>
            </form>
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

        function submitForm() {
            // Perform form validation if needed

            // Show a Bootstrap modal
            $('#myModal').modal('show');
        }
    </script>

    <!-- Bootstrap Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Submitted</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Form submitted! Data will be sent to the server.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>


    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</html>
