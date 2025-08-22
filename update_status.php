<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "robot_arm";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id']) && isset($_GET['status'])) {
    $sql = "UPDATE poses SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $_GET['status'], $_GET['id']);
    $stmt->execute();
}

$conn->close();
?>