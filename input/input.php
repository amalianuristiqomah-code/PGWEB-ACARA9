<?php
// Tangkap data dari form (termasuk longitude & latitude)
$wilayah = $_POST['wilayah'];
$faskes = $_POST['faskes'];
$alamat = $_POST['alamat'];
$longitude = $_POST['longitude'];
$latitude = $_POST['latitude'];

// Sesuaikan dengan setting MySQL lokal
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studikasus"; // Nama database kamu

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Perbaikan: Tambahkan tanda kutip ('') di sekeliling variabel $faskes dan $wilayah karena tipenya teks/VARCHAR
$sql = "INSERT INTO faskes (Wilayah, Faskes, Alamat, Longitude, Latitude)
        VALUES ('$wilayah', '$faskes', '$alamat', $longitude, $latitude)";

if ($conn->query($sql) === TRUE) {
    // Redirect langsung kembali ke index.php setelah berhasil menginput data
    header("Location: ../index.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>