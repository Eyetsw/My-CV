<?php
include 'dbconfig.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $oldUsername = $_POST['old_username'] ?? ''; 
    $newUsername = $_POST['new_username'] ?? ''; 
    $password = $_POST['password'] ?? ''; 

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    if (!empty($oldUsername) && !empty($newUsername) && !empty($password)) {
        try {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $sql = "UPDATE users SET username = :new_username, password = :password WHERE username = :old_username";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':new_username', $newUsername, PDO::PARAM_STR);
            $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
            $stmt->bindParam(':old_username', $oldUsername, PDO::PARAM_STR);

            if ($stmt->execute()) {
                header("Location: member.php?success=" . urlencode("แก้ไขข้อมูลสำเร็จ"));
            }
        } catch (PDOException $e) {
            header("Location: member.php?error=" . urlencode($e->getMessage()));
            exit;
        }
    } else {
        header("Location: member.php?error=" . urlencode("กรุณากรอกข้อมูลให้ครบถ้วน"));
        exit;
    }
}
