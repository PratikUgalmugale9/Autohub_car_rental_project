<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'db';
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die('could not connect: ' . mysqli_error());
}

// inquiry details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Insert data into an inquiry table 
    $sql = "INSERT INTO inquiry (`name`, `email`, `message`) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) == TRUE) {
        echo '<script>
                alert("Inquiry submitted successfully!");
                setTimeout(function() {
                    window.location.href = "index.html";
                }, 1000); // 1000 milliseconds delay (1 second)
              </script>';
        exit();
    } else {
        echo "error" . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Inquiry</title>
</head>
<body>
</body>
</html>
