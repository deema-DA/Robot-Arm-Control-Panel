# Robot Arm Control Panel

## Overview
This project is a web-based control panel for a robot arm, allowing users to adjust motor positions, save poses, load saved poses, and run the arm with the configured settings. The application is built using HTML, CSS, JavaScript, and PHP, with a MySQL database for storing pose data. It is designed to run on a local server using XAMPP.


## Installation

### 1. Set Up XAMPP
- Download and install XAMPP.
- Start Apache and MySQL from the XAMPP Control Panel.

### 2. Configure the Database
- Open phpMyAdmin (`http://localhost/phpmyadmin`).
- Create a new database named robot_arm.


  
### 3. Project Files
- Create a folder named vec inside  your XAMPP htdocs directory.
- Place all project files (`index.php`, styles.css, script.js, get_run_pose.php, update_status.php`) inside the `vec folder.

### 4. Run the Application
- Ensure Apache and MySQL are running in XAMPP.
- Open your web browser and navigate to http://localhost/vec/index.php.

## Usage
- Motor Sliders: Adjust the sliders for Motor 1 through Motor 6 (range: 0-180 degrees).
- Reset: Resets all motor positions to 90 degrees.
- Save Pose: Saves the current motor positions to the database.
- Run: Sends the current motor positions to be executed (simulated in this version).
- Load/Remove: Click "Load" to apply a saved pose or "Remove" to delete it from the active list.

## File Structure
- index.php: Main interface with HTML, CSS, and PHP for dynamic content.
- styles.css: Stylesheet for the control panel layout.
- script.js: JavaScript for client-side interactivity.
- get_run_pose.php: PHP script to handle saving, loading, and running poses.
- update_status.php: PHP script to update the status of poses (e.g., remove).

