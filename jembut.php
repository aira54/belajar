<?php
// Konfigurasi koneksi database
$servername = "localhost";
$username = "root";
$password = ""; // Sesuaikan password jika diperlukan
$dbname = "rpl";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Cek apakah data dikirim melalui POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];

    // Persiapkan dan bind
    $stmt = $conn->prepare("INSERT INTO bara2 (name) VALUES (?)");
    $stmt->bind_param("s", $name);

    // Eksekusi statement
    if ($stmt->execute()) {
        header("location:index.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Tutup statement dan koneksi
    $stmt->close();
}

$conn->close();
?>
