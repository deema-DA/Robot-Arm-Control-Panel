<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Robot Arm Control Panel</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="control-panel">
        <h2>Robot Arm Control Panel</h2>
        <div class="motors">
            <div><label>Motor 1:</label><input type="range" min="0" max="180" value="90" id="motor1"></div>
            <div><label>Motor 2:</label><input type="range" min="0" max="180" value="90" id="motor2"></div>
            <div><label>Motor 3:</label><input type="range" min="0" max="180" value="90" id="motor3"></div>
            <div><label>Motor 4:</label><input type="range" min="0" max="180" value="90" id="motor4"></div>
            <div><label>Motor 5:</label><input type="range" min="0" max="180" value="90" id="motor5"></div>
            <div><label>Motor 6:</label><input type="range" min="0" max="180" value="90" id="motor6"></div>
        </div>
        <div class="buttons">
            <button onclick="reset()">Reset</button>
            <button onclick="savePose()">Save Pose</button>
            <button onclick="run()">Run</button>
        </div>
        <table id="poseTable">
            <tr><th>#</th><th>Motor 1</th><th>Motor 2</th><th>Motor 3</th><th>Motor 4</th><th>Motor 5</th><th>Motor 6</th><th>Action</th></tr>
            <?php
            // مثال لعرض البيانات من قاعدة البيانات مباشرة (اختياري)
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "robot_arm";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT id, motor1, motor2, motor3, motor4, motor5, motor6 FROM poses WHERE status = 1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["motor1"] . "</td>";
                    echo "<td>" . $row["motor2"] . "</td>";
                    echo "<td>" . $row["motor3"] . "</td>";
                    echo "<td>" . $row["motor4"] . "</td>";
                    echo "<td>" . $row["motor5"] . "</td>";
                    echo "<td>" . $row["motor6"] . "</td>";
                    echo "<td><button onclick=\"loadPose(" . $row["id"] . ")\">Load</button> <button onclick=\"removePose(" . $row["id"] . ")\">Remove</button></td>";
                    echo "</tr>";
                }
            }
            $conn->close();
            ?>
        </table>
    </div>
    <script src="script.js"></script>
</body>
</html>