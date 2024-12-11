<?php
// เชื่อมต่อกับฐานข้อมูล 
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = ""; 
$dbName = "newmysql"; // ชื่อฐานข้อมูล

try {
    $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>