<?php include 'header.php'; ?>
<h2>Data Siswa</h2>
<a href="student_create.php">Tambah Siswa</a>
<table>
  <tr><th>ID</th><th>Nama</th><th>NIS</th><th>Aksi</th></tr>
  <?php
  $rows = $pdo->query("SELECT * FROM students")->fetchAll(PDO::FETCH_ASSOC);
  foreach ($rows as $s):
  ?>
  <tr>
    <td><?= $s['id'] ?></td>
    <td><?= htmlspecialchars($s['name']) ?></td>
    <td><?= htmlspecialchars($s['nis']) ?></td>
    <td>
      <a href="student_create.php?id=<?= $s['id'] ?>">Edit</a> |
      <a href="student_delete.php?id=<?= $s['id'] ?>" onclick="return confirm('Hapus?')">Hapus</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
<?php include 'footer.php'; ?>