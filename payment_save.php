<?php
require_once __DIR__ . '/../config.php';
$studentId = $_POST['student_id'];
$amount = $_POST['amount'];

// Simpan ke DB (status pending)
$stmt = $pdo->prepare("INSERT INTO payments (student_id, amount, status) VALUES (?,?, 'pending')");
$stmt->execute([$studentId, $amount]);
$paymentId = $pdo->lastInsertId();

// Contoh redirect ke Stripe Checkout (opsional)
require_once __DIR__ . '/../vendor/autoload.php';
\Stripe\Stripe::setApiKey($env['STRIPE_SECRET_KEY']);
$session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'client_reference_id' => $paymentId,
  'line_items' => [[
    'price_data' => [
      'currency' => 'idr',
      'product_data' => ['name' => "Pembayaran SPP #$paymentId"],
      'unit_amount' => $amount,
    ],
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => "{$_SERVER['HTTP_ORIGIN']}/admin/payments.php?success=1",
  'cancel_url'  => "{$_SERVER['HTTP_ORIGIN']}/admin/payments.php?failed=1",
]);

header('Location: ' . $session->url);