<!-- payments.php -->
<?php include 'header.php'; ?>
<h2>Daftar Pembayaran</h2>
<a href="payment_form.php">Tambah Pembayaran</a>
<table>
  <tr><th>ID</th><th>Siswa</th><th>Jumlah</th><th>Status</th><th>Tanggal</th></tr>
  <?php
  $sql = "SELECT p.*, s.name FROM payments p JOIN students s ON p.student_id=s.id";
  foreach ($pdo->query($sql) as $p):
  ?>
  <tr>
    <td><?= $p['id'] ?></td>
    <td><?= htmlspecialchars($p['name']) ?></td>
    <td><?= number_format($p['amount']) ?></td>
    <td><?= $p['status'] ?></td>
    <td><?= $p['created_at'] ?></td>
  </tr>
  <?php endforeach; ?>
</table>
<?php include 'footer.php'; ?>