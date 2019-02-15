<?php
// Pull in DB connection info
include 'dbinfo.php';

// Start the page output
print("<h1>Hello from your LAMP Stack!</h1>");
print("<br>");

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Print next header
print("<h2>Database Connection Status:</h2>");

// Check connection
if (!$conn) {
    die("<p style='color:red;'>Connection failed: " . mysqli_connect_error() . "</p>");
}
print("<p style='color:green;'>Connected successfully to the database " . $dbname . " on server " . $servername . "!</p>");

// Print next header
print("<h2>Current contents of the database:</h2>");

// Pull data from Database
$sql = "SELECT * FROM data ORDER BY created DESC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "TimeStamp: " . $row["created"]. " - MyKey: " . $row["mykey"]. " " . $row["myvalue"]. "<br>";
    }
} else {
    echo "No results found!";
}
mysqli_close($conn);

// Print next header
print("<h2>Insert a new row into the Database:</h2>");

// Begin the submit form
print("<form action='insert.php' method='post'>");
print("MyKey:  <input type='text' name='mykey' /><br>");
print("MyValue: <input type='text' name='myvalue' /><br>");
print("<input type='submit' />");
print("</form>");

// Print footer text
print("This LAMP stack runs Debian Linux, Apache(httpd), MySQL, PHP and phpMyAdmin");
?>
