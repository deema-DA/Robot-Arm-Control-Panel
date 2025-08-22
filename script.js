function reset() {
    document.getElementById('motor1').value = 90;
    document.getElementById('motor2').value = 90;
    document.getElementById('motor3').value = 90;
    document.getElementById('motor4').value = 90;
    document.getElementById('motor5').value = 90;
    document.getElementById('motor6').value = 90;
}

function savePose() {
    let motors = [
        document.getElementById('motor1').value,
        document.getElementById('motor2').value,
        document.getElementById('motor3').value,
        document.getElementById('motor4').value,
        document.getElementById('motor5').value,
        document.getElementById('motor6').value
    ];
    fetch('get_run_pose.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `motor1=${motors[0]}&motor2=${motors[1]}&motor3=${motors[2]}&motor4=${motors[3]}&motor5=${motors[4]}&motor6=${motors[5]}`
    }).then(response => response.json()).then(data => {
        let table = document.getElementById('poseTable');
        let row = table.insertRow(-1);
        row.insertCell(0).innerHTML = data.id;
        for(let i = 0; i < motors.length; i++) {
            row.insertCell(i + 1).innerHTML = motors[i];
        }
        let actionCell = row.insertCell(7);
        actionCell.innerHTML = `<button onclick="loadPose(${data.id})">Load</button> <button onclick="removePose(${data.id})">Remove</button>`;
    });
}

function run() {
    let motors = [
        document.getElementById('motor1').value,
        document.getElementById('motor2').value,
        document.getElementById('motor3').value,
        document.getElementById('motor4').value,
        document.getElementById('motor5').value,
        document.getElementById('motor6').value
    ];
    fetch('get_run_pose.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `run=1&motor1=${motors[0]}&motor2=${motors[1]}&motor3=${motors[2]}&motor4=${motors[3]}&motor5=${motors[4]}&motor6=${motors[5]}`
    });
}

function loadPose(id) {
    fetch(`get_run_pose.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('motor1').value = data.motor1;
            document.getElementById('motor2').value = data.motor2;
            document.getElementById('motor3').value = data.motor3;
            document.getElementById('motor4').value = data.motor4;
            document.getElementById('motor5').value = data.motor5;
            document.getElementById('motor6').value = data.motor6;
        });
}

function removePose(id) {
    fetch(`update_status.php?id=${id}&status=0`, { method: 'POST' })
        .then(() => location.reload());
}