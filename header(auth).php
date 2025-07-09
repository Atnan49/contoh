<?php
require_once __DIR__ . '/../config.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: ../auth/login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="../public/css/styles.css" />
</head>
<body>
  <nav>
    <a href="dashboard.php">Dashboard</a> |
    <a href="students.php">Siswa</a> |
    <a href="payments.php">Pembayaran</a> |
    <a href="../auth/logout.php">Logout</a>
  </nav>
  <main>