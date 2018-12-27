<?php
$servername = "128.2.113.165:3306";
$username = "root";
$password = "15213";
$dbname = "encounter_data";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "&nbsp *Connected to mySQL sever<b> ".$servername. "</b> with database <b>".$dbname."</b>"."<br>"."<br>";
}

// select data using Mysql
$sql = "SELECT * FROM encounter_tiny";
$result = $conn->query($sql);

// create a table in html
// <table class='tableNice' border='1'>
// table table-striped table-bordered
echo "
<table id='encTable' class='table table-striped table-bordered' 
style='width:95%; margin-left: 5%'>
    <thead>
        <tr class='tr'>
            <th class='th'>bag ID</th>
            <th class='th'>1st timestamp</th>
            <th class='th'>1st latitude</th>
            <th class='th'>1st longitude</th>
            <th class='th'>1st forward speed</th>
            <th class='th'>1st angle</th>
            <th class='th'>2nd timestamp</th>
            <th class='th'>2nd latitude</th>
            <th class='th'>2nd longitude</th>
            <th class='th'>2nd forward speed</th>
            <th class='th'>2nd angle</th>
        </tr>
    </thead>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = mysqli_fetch_array($result)) {
    echo "<tr class='tr'>";
    echo "<td class='td'>" . $row['bag_id'] . "</td>";
    echo "<td class='td' style='white-space: nowrap'>" . $row['F2'] . "</td>";
    echo "<td class='td'>" . $row['F3'] . "</td>";
    echo "<td class='td'>" . $row['F4'] . "</td>";
    echo "<td class='td'>" . $row['F5'] . "</td>";
    echo "<td class='td'>" . $row['F6'] . "</td>";
    echo "<td class='td' style='white-space: nowrap'>" . $row['F7'] . "</td>";
    echo "<td class='td'>" . $row['F8'] . "</td>";
    echo "<td class='td'>" . $row['F9'] . "</td>";
    echo "<td class='td'>" . $row['F10'] . "</td>";
    echo "<td class='td'>" . $row['F11'] . "</td>";
    echo "</tr>";
    }
} else {
    echo "0 results";
}

echo "</table>";

$conn->close();
?>