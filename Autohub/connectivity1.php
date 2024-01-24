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


// Register User
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password =$_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone_no'];

    

    // Insert data into a sample table 
    $sql = "INSERT INTO sample (`username`, `password`, `email`, `phone_no`) VALUES ('$username', '$password', '$email', '$phone')";
   
    // if ($conn->query($sql)== TRUE) {
    //     header("Location: login.html");
    //     exit();

    //     //echo "Registration successful";
    // } else {
    //     echo "error". $sql . "<br>" . $conn->error;
        
    // }
    // $conn->close();

    if ($conn->query($sql) == TRUE) {
        echo '<script>
                alert("Register successfully!");
                setTimeout(function() {
                    window.location.href = "login.html";
                }, 1000); // 1000 milliseconds delay (1 second)
              </script>';
        exit();
    } else {
        echo "error" . $sql . "<br>" . $conn->error;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Register</title>
</head>
<body>
</body>
</html>


// echo'connected successfully';
// mysqli_close($conn);
?>
