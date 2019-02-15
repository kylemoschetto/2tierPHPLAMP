<?php
// Auto redirect back to the index.php page
$url='/index.php';
echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';

// Pull in database connection info
include 'dbinfo.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Establish the proper format for the date
$today = date("Y-m-d H:i:s");

// Add the new row to the database
$sql="INSERT INTO data (created, mykey, myvalue) VALUES ('".$today."','$_POST[mykey]','$_POST[myvalue]')";
if ($conn->query($sql) === TRUE) {
    echo "<p style='color:green;'><b>New record created successfully!</b></p><br> Redirecting you back to index.php in 1 second.";
} else {
    echo "<p style='color:red;'>Error: " . $sql . "</p><br>" . $conn->error;
}
$conn->close();
?>
