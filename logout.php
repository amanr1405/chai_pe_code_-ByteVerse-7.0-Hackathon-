<?php
// Start the session
session_start();

// Destroy all session data
session_unset();
session_destroy();

// Redirect to the index.html page
header("Location: index.html");
exit();
?>
