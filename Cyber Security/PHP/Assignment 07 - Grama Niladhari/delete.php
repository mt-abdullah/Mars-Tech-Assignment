<html>
    <head>

    </head>
</html>

<?php
include("config.php");

      session_start();
if (isset($_SESSION['row_data'])) {
    $row = $_SESSION['row_data']; // get the row data from session
}


$id=$row['id'];

$result = mysqli_query($mysqli, "DELETE FROM residents WHERE id=$id");

if ($result) {
    echo "<div class='success-message'>Resident deleted successfully!</div>";
}
else {
    echo "<div class='error-message'>Could not delete resident. Please try again.</div>";
}

?>
<a href="index.php" style="font-size: 28px">Go to Home</a>  
</body>
</html>