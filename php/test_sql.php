<?php
$servername = "128.2.113.165:3306";
$username = "root";
$password = "15213";
$dbname = "kitti_database";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "&nbsp *Connected to mySQL sever<b> ".$servername. "</b> with database <b>".$dbname."</b>"."<br>"."<br>";
}

// select data using Mysql
$sql = "SELECT * FROM kitti_core";
$result = $conn->query($sql);

// create a table in html
// <table class='tableNice' border='1'>
// table table-striped table-bordered
echo "
<table id='mainTable' class='table table-striped table-bordered' 
style='width:95%; margin-left: 5%;'>
    <thead>
        <tr class='tr'>
            <th class='th'>bag ID</th>
            <th class='th'>file ID</th>
            <th class='th'>timestamp</th>
            <th class='th'>latitude</th>
            <th class='th'>longitude</th>
            <th class='th'>forward speed</th>
            <th class='th'>x movement speed</th>
        </tr>
    </thead>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = mysqli_fetch_array($result)) {
    echo "<tr class='tr'>";
    echo "<td class='td'>" . $row['bag_id'] . "</td>";
    echo "<td class='td'>" . $row['id'] . "</td>";
    echo "<td class='td' style='white-space: nowrap'>" . $row['timestamp'] . "</td>";
    echo "<td class='td'>" . $row['lat'] . "</td>";
    echo "<td class='td'>" . $row['lon'] . "</td>";
    echo "<td class='td'>" . $row['vf'] . "</td>";
    echo "<td class='td'>" . $row['ax'] . "</td>";
    echo "</tr>";
    }
} else {
    echo "0 results";
}

echo "</table>";

$conn->close();
?>
