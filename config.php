<?php
// Load .env
$env = parse_ini_file(__DIR__ . '/.env');

// Koneksi database
try {
    $dsn = "mysql:host={$env['DB_HOST']};dbname={$env['DB_NAME']};charset=utf8";
    $pdo = new PDO($dsn, $env['DB_USER'], $env['DB_PASS'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Database Connection Failed: " . $e->getMessage());
}

// Mulai session
session_start();
?>