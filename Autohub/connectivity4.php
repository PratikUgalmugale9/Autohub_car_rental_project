<?php

//include(conn.php);

$host = 'localhost';
$user = 'root';
$pass = '';
$db='db';
$conn = mysqli_connect($host,$user, $pass, $db);
if(! $conn)
{
    die('could not connect:'. mysqli_error());
}


// cars details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $select_car = $_POST['select_car'];
    $full_name=$_POST['full_name'];
    $start_destination = $_POST['start_destination'];
    $end_destination= $_POST['end_destination'];
    $address = $_POST['address'];
    $date = $_POST['date'];
    $phone_no = $_POST['phone_no'];
    $pincode = $_POST['pincode'];

    

    // Insert data into a sample table 
    $sql = "INSERT INTO cars  (`select_car`, `full_name`, `start_destination`, `end_destination`, `address`, `date`, `phone_no`, `pincode`) VALUES ('$select_car', '$full_name', '$start_destination', '$end_destination', '$address', '$date', '$phone_no', '$pincode')";
   
    // if ($conn->query($sql)== TRUE) {
    //     echo "Book successful";
    // } else {
    //     echo "error". $sql . "<br>" . $conn->error;
        
    // }
    // $conn->close();

    if ($conn->query($sql) == TRUE) {
        echo '<script>
                alert("Book successfully!");
                setTimeout(function() {
                    window.location.href = "index.html";
                }, 1000); // 1000 milliseconds delay (1 second)
              </script>';
        exit();
    } else {
        echo "error" . $sql . "<br>" . $conn->error;
    }

}



// echo'connected successfully';
// mysqli_close($conn);
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