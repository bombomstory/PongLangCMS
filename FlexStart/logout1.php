<?php
session_start();
?>

<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();
?>

<html>
<head>
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=index1.php">
</head>
</html>
