<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Login Admin</title>
  <link rel="stylesheet" href="../public/css/styles.css" />
</head>
<body>
  <div class="login-container">
    <h2>Admin Login</h2>
    <form action="authenticate.php" method="POST">
      <label>Email</label>
      <input type="email" name="email" required />
      <label>Password</label>
      <input type="password" name="password" required />
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>