<?php
// Start or resume the session
session_start();

// Destroy all session data
session_destroy();

// Redirect to the index.php page
header("Location: index.html");
exit();
?>
