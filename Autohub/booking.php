<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'db';

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die('could not connect:' . mysqli_error());
}

// Handle Delete Action
if (isset($_POST['delete_id'])) {
    $deleteID = mysqli_real_escape_string($conn, $_POST['delete_id']);
    $deleteQuery = "DELETE FROM cars WHERE select_car = '$deleteID'";
    mysqli_query($conn, $deleteQuery);
}

// Handle Add Action
if (isset($_POST['add'])) {
    $newCarType = $_POST['new_car_type'];
    $newFullName = $_POST['new_full_name'];
    $newStartDestination = $_POST['new_start_destination'];
    $newEndDestination = $_POST['new_end_destination'];
    $newAddress = $_POST['new_address'];
    $newDate = $_POST['new_date'];
    $newPhoneNumber = $_POST['new_phone_number'];
    $newPinCode = $_POST['new_pin_code'];

    $addQuery = "INSERT INTO cars (select_car, full_name, start_destination, end_destination, address, date, phone_no, pincode)
                 VALUES ('$newCarType', '$newFullName', '$newStartDestination', '$newEndDestination', '$newAddress', '$newDate', '$newPhoneNumber', '$newPinCode')";
    mysqli_query($conn, $addQuery);
}

// Fetch data from the database
$selectQuery = "SELECT * FROM cars";
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
        
        .form-group-inline {
            display: inline-block;
            vertical-align:bottom ;
            margin-right: 30px; /* Adjust the margin as needed */
        }

        .form-group-inline label {
            display: block;
            margin-bottom: 8px;
        }

    </style>
</head>
<body>
    <body>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Contact Messages</title>
            <style>
                table {
                    border-collapse: collapse;
                    width: 100%;
                    margin-top: 20px;
                }
        
                th, td {
                    border: 1px solid #ddd;
                    padding: 8px;
                    text-align: left;
                }
        
                th {
                    background-color: #f2f2f2;
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
    <h2>AutoHub car booking details</h2>
    <p>Here is all details of AutoHub car Bookings </p>
    <form method="post">
        <table>
            <tr>
                <th>Car Type</th>
                <th>Full Name</th>
                <th>Start Destination</th>
                <th>End Destination</th>
                <th>Address</th>
                <th>Date</th>
                <th>Phone Number</th>
                <th>Pin Code</th>
                <th>Action</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["select_car"] . "</td>";
                    echo "<td>" . $row["full_name"] . "</td>";
                    echo "<td>" . $row["start_destination"] . "</td>";
                    echo "<td>" . $row["end_destination"] . "</td>";
                    echo "<td>" . $row["address"] . "</td>";
                    echo "<td>" . $row["date"] . "</td>";
                    echo "<td>" . $row["phone_no"] . "</td>";
                    echo "<td>" . $row["pincode"] . "</td>";
                    echo "<td>
                            <form method='post' style='display:inline;'>
                                <input type='hidden' name='delete_id' value='" . $row['select_car'] . "'>
                                <button type='submit'>Delete</button>
                            </form>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No records found</td></tr>";
            }
            ?>
        </table>
    </form>

    <h2>Add New Booking</h2>
    <form method="post">
        <div class="form-group-inline">
            <label for="new_car_type">Car Type:</label>
            <input type="text" name="new_car_type" required>
        </div>

        <div class="form-group-inline">
            <label for="new_full_name">Full Name:</label>
            <input type="text" name="new_full_name" required>
        </div>

        <div class="form-group-inline">
            <label for="new_start_destination">Start Destination:</label>
            <input type="text" name="new_start_destination" required>
        </div>

        <div class="form-group-inline">
            <label for="new_end_destination">End Destination:</label>
            <input type="text" name="new_end_destination" required>
        </div>

        <div class="form-group-inline">
            <label for="new_address">Address:</label>
            <input type="text" name="new_address" required>
        </div>

        <div class="form-group-inline">
            <label for="new_date">Date:</label>
            <input type="date" name="new_date" required>
        </div>

        <div class="form-group-inline">
            <label for="new_phone_number">Phone Number:</label>
            <input type="text" name="new_phone_number" required>
        </div>

        <div class="form-group-inline">
            <label for="new_pin_code">Pin Code:</label>
            <input type="text" name="new_pin_code" required>
        </div>

        <div class="form-group-inline">
            <button type="submit" name="add">Add Booking</button>
        </div>
    </form>
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

<?php
// Close the connection
$conn->close();
?>
