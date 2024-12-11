<?php
session_start(); // เริ่มต้น session

// เชื่อมต่อกับฐานข้อมูล
include_once 'dbconfig.php';

// เช็คการส่งข้อมูลฟอร์ม
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // รับข้อมูลจากฟอร์ม
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ตรวจสอบข้อมูลในฐานข้อมูล
    $stmt = $db->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // การล็อกอินสำเร็จ
        $_SESSION['user_id'] = $user['id']; // เก็บ ID ของ user ใน session
        $_SESSION['username'] = $user['username']; // เก็บชื่อผู้ใช้ใน session
        header("Location: index.php"); // เปลี่ยนเส้นทางไปที่หน้า index.php หรือหน้าอื่นๆ
        exit();
    } else {
        $message = "Invalid username or password!";
        $status = "error";
    }
}
?>