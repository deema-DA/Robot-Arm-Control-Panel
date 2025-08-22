<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "robot_arm";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_GET['id'])) {
    if (isset($_POST['run'])) {
        // Run logic (simplified)
        echo json_encode(['status' => 'running']);
    } else {
        $sql = "INSERT INTO poses (motor1, motor2, motor3, motor4, motor5, motor6, status) VALUES (?, ?, ?, ?, ?, ?, 1)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiiiii", $_POST['motor1'], $_POST['motor2'], $_POST['motor3'], $_POST['motor4'], $_POST['motor5'], $_POST['motor6']);
        $stmt->execute();
        $id = $conn->insert_id;
        echo json_encode(['id' => $id]);
    }
} elseif (isset($_GET['id'])) {
    $sql = "SELECT motor1, motor2, motor3, motor4, motor5, motor6 FROM poses WHERE id = ? AND status = 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    echo json_encode($result->fetch_assoc());
}

$conn->close();
?>