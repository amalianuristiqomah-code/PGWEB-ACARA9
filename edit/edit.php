<?php
$id = $_POST['id'];
$wilayah = $_POST['wilayah'];
$faskes = $_POST['faskes'];
$alamat = $_POST['alamat'];
$longitude = $_POST['longitude'];
$latitude = $_POST['latitude'];

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

// Query UPDATE disesuaikan dengan kolom tabel faskes yang baru
$sql = "UPDATE faskes SET wilayah='$wilayah', faskes='$faskes', alamat='$alamat', longitude=$longitude, latitude=$latitude WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record edited successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

// Kembali ke halaman utama index.php di luar folder edit
header("Location: ../index.php");
exit();
?>