<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'db';

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die('could not connect:' . mysqli_error());
}

$selectQuery = "SELECT * FROM cars"; // Replace 'your_car_booking_table' with the actual table name in your database
$result = $conn->query($selectQuery);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoHub Admin Dashboard</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #ecf0f1; /* Light gray background */
        }

        #dashboard {
            background-color: #e67e22;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 24px;
            position: relative;
        }

        #navbar {
            background-color: #e67e22;
            padding: 15px;
            width: 200px;
            height: 100%;
            position: fixed;
            top: 20;
            left: 0;
            transition: width 0.5s; /* Smooth transition for width change */
        }

        #navbar a {
            display: block;
            color: white;
            padding: 10px; /* Default padding */
            text-decoration: none;
            margin-bottom: 5px;
            transition: padding 0.5s, font-size 0.5s; /* Smooth transition for padding and font-size change */
        }

        #navbar a:hover {
            background-color: #d35400; /* Darker orange on hover */
        }

        #toggle-btn {
            position: absolute;
            top: 15px;
            left: 15px;
            cursor: pointer;
            color: white;
            font-size: 20px;
            z-index: 1; /* Ensure it appears above other elements */
        }

        #toggle-btn:hover {
            color: #d35400; /* Darker orange on hover */
        }

        #content {
            margin-left: 250px;
            padding: 40px;
            transition: margin-left 0.5s; /* Smooth transition for margin-left change */
        }

        .dashboard-box {
            background-color: #e67e22; /* Orange color for boxes */
            color: white;
            padding: 25px;
            box-sizing :border-box;
            margin: 10px 20px;
            text-align: center;
            float: left;
        }
    </style>
</head>
<body>

    <div id="dashboard">
        AutoHub Admin Dashboard
        <div id="toggle-btn" onclick="toggleNavbar()">☰</div>
    </div>

    <div id="navbar">
        <a href="dashborad.php">Dashboard</a>
        <a href="car_list.php">Car_list</a>
        <a href="booking.php">Bookings</a>
        <a href="custdetails.php">Customers Details </a>
        <a href="inquire.php">Inquiries</a>
        <a href="feedbackresp.html">Feedbacks</a>
        <a href="sign_out.php">Sign Out</a>
    </div>

    <div id="content">
        <!-- Your content goes here -->
        <h2>Welcome to AutoHub Admin Dashboard</h2>
        <p>Here is your Overview of AutoHub</p>
    
        <!-- Total Customers Box -->
        <div class="dashboard-box">
            <h3>Number of Customers</h3>
            <p>
                <?php
                $customerQuery = "SELECT COUNT(*) as totalCustomers FROM sample";
                $customerResult = $conn->query($customerQuery);
                $totalCustomers = $customerResult->fetch_assoc()['totalCustomers'];
                echo $totalCustomers;
                ?>
            </p>
        </div>
        <!-- Total Car Bookings Box -->
        <div class="dashboard-box">
            <h3>Total Car Bookings</h3>
            <p>
                <?php
                $carBookingQuery = "SELECT COUNT(*) as totalCarBookings FROM cars";
                $carBookingResult = $conn->query($carBookingQuery);
                $totalCarBookings = $carBookingResult->fetch_assoc()['totalCarBookings'];
                echo $totalCarBookings;
                ?>
            </p>
        </div>

        <!-- Total Cars -->
        <div class="dashboard-box">
            <h3>Total Cars</h3>
            <p>
                <?php
                $carQuery = "SELECT COUNT(*) as totalCars FROM car_list";
                $carResult = $conn->query($carQuery);
                $totalCars = $carResult->fetch_assoc()['totalCars'];
                echo $totalCars;
                ?>
            </p>
        </div>

        <!-- Total Inquiries -->
        <div class="dashboard-box">
            <h3>Total Inquiries</h3>
            <p>
                <?php
                $inquiryQuery = "SELECT COUNT(*) as totalinquiries FROM inquiry";
                $inquiryResult = $conn->query($inquiryQuery);
                $totalinquiries = $inquiryResult->fetch_assoc()['totalinquiries'];
                echo $totalinquiries;
                ?>
            </p>
        </div>




    </div>

    <script>
        function toggleNavbar() {
            var navbar = document.getElementById('navbar');
            var content = document.getElementById('content');
            var toggleBtn = document.getElementById('toggle-btn');

            if (navbar.style.width === '200px' || navbar.style.width === '') {
                navbar.style.width = '50px';
                content.style.marginLeft = '50px';

                // Adjust text size when minimized
                Array.from(document.querySelectorAll('#navbar a')).forEach(item => {
                    item.style.padding = '5px';
                    item.style.fontSize = '12px';
                });
            } else {
                navbar.style.width = '200px';
                content.style.marginLeft = '200px';

                // Reset text size to default
                Array.from(document.querySelectorAll('#navbar a')).forEach(item => {
                    item.style.padding = '10px';
                    item.style.fontSize = 'inherit';
                });
            }
        }
    </script>

</body>
</html>
