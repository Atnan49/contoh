<!-- student_create.php -->
<?php include 'header.php';
$id = $_GET['id'] ?? null;
$student = [];
if ($id) {
  $stmt = $pdo->prepare("SELECT * FROM students WHERE id = ?");
  $stmt->execute([$id]);
  $student = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<h2><?= $id ? 'Edit' : 'Tambah' ?> Siswa</h2>
<form action="student_save.php" method="POST">
  <input type="hidden" name="id" value="<?= $id ?>">
  <label>Nama</label>
  <input name="name" value="<?= $student['name'] ?? '' ?>" required>
  <label>NIS</label>
  <input name="nis" value="<?= $student['nis'] ?? '' ?>" required>
  <button type="submit">Simpan</button>
</form>
<?php include 'footer.php'; ?>