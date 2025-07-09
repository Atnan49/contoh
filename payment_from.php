<!-- payment_form.php -->
<?php include 'header.php';
$students = $pdo->query("SELECT id,name FROM students")->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Input Pembayaran</h2>
<form action="payment_save.php" method="POST">
  <label>Siswa</label>
  <select name="student_id" required>
    <?php foreach ($students as $s): ?>
      <option value="<?= $s['id'] ?>"><?= htmlspecialchars($s['name']) ?></option>
    <?php endforeach; ?>
  </select>
  <label>Jumlah (IDR)</label>
  <input type="number" name="amount" required>
  <button type="submit">Proses Pembayaran</button>
</form>
<?php include 'footer.php'; ?>