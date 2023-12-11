<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Rental Form</title>
</head>
<body>
    <h2>Vehicle Rental Form</h2>

    <form method="post" action="process_form.php">
        <label for="vehicle_type">Vehicle Type:</label>
        <select name="vehicle_type" id="vehicle_type" onchange="updateCarOptions()">
            <option value="Motorcycles">Motorcycles</option>
            <option value="Vans">Vans</option>
            <option value="SUVs">SUVs</option>
            <option value="Trucks">Trucks</option>
        </select>

        <label for="car_type">Car Type:</label>
        <select name="car_type" id="car_type">
            <!-- Car options will be dynamically updated using JavaScript -->
        </select>

        <label for="driven_distance">Driven Distance (in km):</label>
        <input type="number" name="driven_distance" id="driven_distance" required>

        <label for="days">Number of Days:</label>
        <input type="number" name="days" id="days" oninput="calculatePrice()" required>

        <label for="display_price">Display Price:</label>
        <input type="text" name="display_price" id="display_price" readonly>

        <input type="submit" value="Submit">
    </form>

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
    </script>
</body>
</html>
