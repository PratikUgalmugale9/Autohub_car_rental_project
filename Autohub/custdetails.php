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
    $deleteID = $_POST['delete_id'];
    $deleteQuery = "DELETE FROM sample WHERE id = $deleteID";
    mysqli_query($conn, $deleteQuery);
}

// Handle Add Action
if (isset($_POST['add'])) {
    $newUsername = $_POST['new_username'];
    $newPassword = $_POST['new_password'];
    $newEmail = $_POST['new_email'];
    $newPhoneNo = $_POST['new_phone_no'];

    $addQuery = "INSERT INTO sample (username, password, email, phone_no) VALUES ('$newUsername', '$newPassword', '$newEmail', '$newPhoneNo')";
    mysqli_query($conn, $addQuery);
}

// Fetch data from the database
$selectQuery = "SELECT * FROM sample";
$result = $conn->query($selectQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoHub Admin Dashboard</title>
    <style>
        /* ... Your existing CSS styles ... */
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
    <!-- ... Your existing HTML structure ... -->
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
        <h2>AutoHub Customer details</h2>
        <p>Here is all details of AutoHub customers </p>
        <form method="post">
            <table>
                <tr>
                    <th>id</th>
                    <th>username</th>
                    <th>password</th>
                    <th>email</th>
                    <th>phone_no</th>
                    <th>Action</th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["username"] . "</td>";
                        echo "<td>" . $row["password"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["phone_no"] . "</td>";
                        echo "<td>
                                <form method='post' style='display:inline;'>
                                    <input type='hidden' name='delete_id' value='" . $row['id'] . "'>
                                    <button type='submit'>Delete</button>
                                </form>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No records found</td></tr>";
                }
                ?>
            </table>
        </form>

        <h2>Add New Customer</h2>
        <form method="post">
            <label for="new_username">Username:</label>
            <input type="text" name="new_username" required>
            <label for="new_password">Password:</label>
            <input type="password" name="new_password" required>
            <label for="new_email">Email:</label>
            <input type="email" name="new_email" required>
            <label for="new_phone_no">Phone No:</label>
            <input type="text" name="new_phone_no" required>
            <button type="submit" name="add">Add Customer</button>
        </form>
    </div>

    <!-- ... Your existing JavaScript code ... -->
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
$conn->close();
?>
