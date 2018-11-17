<?php
$servername = "localhost";
$username = "jiayi";
$password = "*********";
$dbname = "web";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "&nbsp *Connected to mySQL sever<b> ".$servername. "</b> with database <b>".$dbname."</b>.<br>"."<br>";
}

// select data using Mysql
$sql = "SELECT * FROM data1";
$result = $conn->query($sql);

// create a table in html
echo "
<table class='tableNice' border='1'>
<tr class='tr'>
<th class='th'>No.</th>
<th class='th'>file path</th>
<th class='th'>predict time</th>
<th class='th'>object detected</th>
<th class='th'>accuracy</th>
<th class='th'>group</th>
</tr>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = mysqli_fetch_array($result)) {
    echo "<tr class='tr'>";
    echo "<td class='td'>" . $row['No.'] . "</td>";
    echo "<td class='td'>" . $row['file path'] . "</td>";
    echo "<td class='td'>" . $row['predict time'] . "</td>";
    echo "<td class='td'>" . $row['object detected'] . "</td>";
    echo "<td class='td'>" . $row['accuracy'] . "</td>";
    echo "<td class='td'>" . $row['group'] . "</td>";
    echo "</tr>";
    }
} else {
    echo "0 results";
}

echo "</table>";

$conn->close();
?>
