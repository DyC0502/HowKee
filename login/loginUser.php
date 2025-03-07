<?php
if (is_post()) {
  $userEmail = req('userEmail');
  $userPassword = req('userPassword');
  $loginFail = req('loginFail');
  $maxLoginAttempts = 3;
  $lockoutDuration = 30;


  // Input Validation : name -------------------------------------------------
  if (!$userEmail) {
    $err['userEmail'] = 'Required.';
  }

  // Input Validation : password ---------------------------------------------------
  if (!$userPassword) {
    $err['userPassword'] = 'Required.';
  }

  if (isset($_SESSION['loginAttempts']) && $_SESSION['loginAttempts'] >= $maxLoginAttempts) {
    // Check if the time of the last failed login attempt is within the lockout duration
    $lastFailedLoginTime = isset($_SESSION['lastFailedLoginTime']) ? $_SESSION['lastFailedLoginTime'] : 0;
    $currentTime = time();

    if (($currentTime - $lastFailedLoginTime) < $lockoutDuration) {
      $err['loginFail'] = 'Login blocked. Try again after ' . ($lockoutDuration - ($currentTime - $lastFailedLoginTime)) . ' seconds.';
    } else {
      $_SESSION['loginAttempts'] = 0;
      $_SESSION['lastFailedLoginTime'] = 0;
    }
  }

  // DB operation ------------------------------------------------------------
  if (!$err) {
    $hashedPassword = hash('sha256', $userPassword);
    $stm = $db->prepare('SELECT * FROM user WHERE userEmail = ? AND userPassword = ?');
    $stm->execute([$userEmail, $hashedPassword]);
    $user = $stm->fetch(PDO::FETCH_ASSOC);
    if ($user) {
      // Login successful
      $_SESSION['userEmail'] = $userEmail;
      $_SESSION['loginAttempts'] = 0;
      $_SESSION['lastFailedLoginTime'] = 0;

      $userName = $user['userName'];
      $_SESSION['userName'] = $userName;

      $userRole = $user['userRole'];
      $_SESSION['role'] = $userRole;

      $userID = $user['userId'];
      $_SESSION['userId'] = $userID;

      $status = "Active now";

      date_default_timezone_set("Asia/Kuala_Lumpur");
      $dateTimeNow = date("Y-m-d H:i");

      $stm2 = $db->prepare("UPDATE user SET status = :status, lastOnline = :lastOnline WHERE userId = :userId");
      $stm2->execute([':status' => $status, ':lastOnline' => $dateTimeNow, ':userId' => $userID]);

      temp('info', 'Login Successful');

      if (isset($_SESSION['role']) && $_SESSION['role'] === 'Sales') {
        redirect('/dashboard/dashboard.php');

      } else if (isset($_SESSION['role']) && $_SESSION['role'] === 'Admin'){
        redirect('/adminDashboard/adminDashboard.php');
      }
  
    } else {
      if (isset($_SESSION['loginAttempts'])) {
        $_SESSION['loginAttempts']++;
      } else {
        $_SESSION['loginAttempts'] = 1;
      }
      $_SESSION['lastFailedLoginTime'] = time();
      $err['loginFail'] = 'Login failed. Invalid username or password.';
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - How Kee Frozen Foods</title>
  <link rel="stylesheet" href="/login/loginUser.css"> 
</head>

<body>

  <div class="container">
    <div class="main-item">
    <div class="logo-section">
      <img src="/images/howkeelogo.png" alt="How Kee Frozen Foods">
      <h2>How Kee Frozen Foods</h2>
      <p>Seafood Wholesale Management System</p>
    </div>
    <div class="login-box">
      <h3 class="welcome-text">Welcome Back</h3>
      <p class="subtitle">Sign in to access your seafood order dashboard</p>

      <?php if (!empty($err['loginFail'])) : ?>
        <p class="error-text"><?= $err['loginFail'] ?></p>
      <?php endif; ?>

      <form method="post">
        <div class="input-group">
          <input type="email" name="userEmail" placeholder="Email" value="<?= htmlspecialchars($_POST['userEmail'] ?? '') ?>" required>
          <?php if (!empty($err['userEmail'])) : ?>
            <p class="error-text"><?= $err['userEmail'] ?></p>
          <?php endif; ?>
        </div>

        <div class="input-group">
          <input type="password" name="userPassword" id="passwordField" placeholder="Password" required>
          <?php if (!empty($err['userPassword'])) : ?>
            <p class="error-text"><?= $err['userPassword'] ?></p>
          <?php endif; ?>
        </div>

        <button type="submit" class="login-btn">Sign In →</button>
      </form>
    </div>
    <p class="demo-credentials">Demo Credentials:</p>
      <div class="demo-box">
        <div class="demo-card">
          <strong>Salesperson</strong><br>
          Email: john@seafood.com<br>
          Password: Password@123
        </div>
        <div class="demo-card">
          <strong>Admin</strong><br>
          Email: admin@seafood.com<br>
          Password: Password@123
        </div>
      </div>
  </div>

</div>

  <script>
    document.getElementById('showPassword').addEventListener('change', function() {
      let passwordField = document.getElementById("passwordField");
      passwordField.type = this.checked ? 'text' : 'password';
    });
  </script>
</body>

</html>