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


// Admin Login User

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username=$_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM admin WHERE username = '$username' AND password ='$password'";
    $result = $conn->query($sql);

  // $go= header("Location :dashborad.html");

    // if($result->num_rows>0){

    //     header("Location: dashborad.html");
    //     exit();

    //    // echo "Admin Login successful!".$go;
       

    // }
    // else{
    //     echo "Invalid username or password";
    // }

    // old
    // if ($conn->query($sql) == TRUE) {
    //     echo '<script>
    //             alert("Login successfully!");
    //             setTimeout(function() {
    //                 window.location.href = "dashborad.php";
    //             }, 1000); // 1000 milliseconds delay (1 second)
    //           </script>';
    //     exit();
    // } else {
    //     echo "error" . $sql . "<br>" . $conn->error;
    // }

    // new

    if ($result->num_rows > 0) {
        echo '<script>
            alert("Login successfully!");
            setTimeout(function() {
                window.location.href = "dashborad.php";
            }, 1000); // 1000 milliseconds delay (1 second)
        </script>';
        exit();
    } else {
        echo '<script>
            alert("Invalid username or password");
            setTimeout(function() {
                window.location.href = "adminlogin.html"; // Redirect to login page
            }, 1000);
        </script>';
     }


}



// echo'connected successfully';
//mysqli_close($conn);
?>
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Admin</title>
</head>
<body>
</body>
</html>