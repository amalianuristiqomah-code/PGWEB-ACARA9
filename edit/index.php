<!DOCTYPE html>
<html>
<body>
<h2>Form Edit Data</h2>
<?php
// Sesuaikan dengan setting MySQL kamu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studikasus"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "SELECT * FROM faskes WHERE ID = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<form action='edit.php' onsubmit='return validateForm()' method='post'>";
    while($row = $result->fetch_assoc()) {
        echo "<input type='hidden' name='id' value='".$row['ID']."'>";
        echo "<label for='wilayah'>Wilayah: </label><br>";
        echo "<input type='text' id='wilayah' name='wilayah' value='".$row['Wilayah']."'><br>";
        echo "<label for='faskes'>Faskes: </label><br>";
        echo "<input type='text' id='faskes' name='faskes' value='".$row['Faskes']."'><br>";
        echo "<label for='alamat'>Alamat: </label><br>";
        echo "<input type='text' id='alamat' name='alamat' value='".$row['Alamat']."'><br>";
        echo "<label for='long'>Longitude: </label><br>";
        echo "<input type='text' id='long' name='longitude' value='".$row['Longitude']."'><br>";
        echo "<label for='lat'>Latitude: </label><br>";
        echo "<input type='text' id='lat' name='latitude' value='".$row['Latitude']."'><br><br>";
        echo "<input type='submit' value='Submit'>";
    }
    echo "</form>";
}
?>
<p id="informasi" style="color: red;"></p>

</body>
</html>