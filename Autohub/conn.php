<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'db';
$conn = mysqli_connect($host ,$user ,$pass);
if(! $conn)
{
    die('could not connect:' . mysqli_error());
}
echo 'Connected successsfully';
mysqli_close($conn);
?>