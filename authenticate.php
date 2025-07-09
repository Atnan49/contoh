<?php
require_once __DIR__ . '/../config.php';

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$stmt = $pdo->prepare("SELECT * FROM admin WHERE email = ?");
$stmt->execute([$email]);
$admin = $stmt->fetch(PDO::FETCH_ASSOC);

if ($admin && password_verify($password, $admin['password'])) {
    $_SESSION['admin_id'] = $admin['id'];
    header('Location: ../admin/dashboard.php');
} else {
    header('Location: login.php?error=1');
}