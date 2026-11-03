<?php
// Sesuaikan dengan setting MySQL lokal
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

// Query untuk mengambil semua kolom dari tabel penduduk
$sql = "SELECT * FROM faskes"; 
$result = $conn->query($sql);

echo "<a href='input/index.html'>Input</a><br><br>";

if ($result->num_rows > 0) {
    echo "<table border='1px'>
            <tr>
                <th>ID</th>
                <th>Wilayah</th>
                <th>Faskes</th>
                <th>Alamat</th>
                <th>Longitude</th>
                <th>Latitude</th>
                <th colspan='2'>Aksi</th>
            </tr>"; 

    // output data setiap baris
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["ID"] . "</td>";
        echo "<td>" . $row["Wilayah"] . "</td>";
        echo "<td>" . $row["Faskes"] . "</td>";
        echo "<td>" . $row["Alamat"] . "</td>";
        echo "<td>" . $row["Longitude"] . "</td>";
        echo "<td align='right'>" . $row["Latitude"] . "</td>";
        echo "<td><a href='delete.php?id=" . $row["ID"] . "'>hapus</a></td>";
        echo "<td><a href='edit/index.php?id=" . $row["ID"] . "'>edit</a></td>";
        echo "</tr>";
    } 
    
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>