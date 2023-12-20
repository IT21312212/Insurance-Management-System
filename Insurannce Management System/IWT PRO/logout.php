<?php
session_start();
session_destroy();
header("Location: login.html"); // Redirect to the login page after logging out
?>
