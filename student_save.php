<?php
require_once __DIR__ . '/../config.php';
$id = $_POST['id'] ?: null;
$name = $_POST['name'];
$nis = $_POST['nis'];
if ($id) {
    $stmt = $pdo->prepare("UPDATE students SET name=?, nis=? WHERE id=?");
    $stmt->execute([$name, $nis, $id]);
} else {
    $stmt = $pdo->prepare("INSERT INTO students (name, nis) VALUES (?,?)");
    $stmt->execute([$name, $nis]);
}
header('Location: students.php');