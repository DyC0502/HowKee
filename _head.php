<?php

include '_base.php';

// Check if the user is an admin
if (isset($_SESSION['role']) && $_SESSION['role'] === 'Sales') {
    
} else {
    $errormsgtext = "Access denied. You must be an admin to view this file.";
    $_SESSION['errormsgtext'] = $errormsgtext;
    redirect('/');
}


if(empty($_SESSION['userId'])) {
    
} else {
    $userId = $_SESSION['userId'];

    $stm = $db->prepare('SELECT * FROM user WHERE userId = ?');
    $stm->execute([$userId]);
    if ($s = $stm->fetch()) {
        $userName2 = $s->userName;
        $userRole = $s->userRole;
        $userPicture = $s->userPicture;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>How Kee Frozen Foods</title>
  <link rel="stylesheet" href="/css/app.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

  <header class="header">
    <div class="container">
      <div class="logo-section">
        <img src="/images/howkeelogo.png" alt="How Kee Frozen Foods Logo" class="logo">
        <div>
          <h1 class="company-name">How Kee Frozen Foods</h1>
          <p class="company-subtitle">Sdn Bhd</p>
        </div>
      </div>

      <div class="user-section">
        <div class="user-info">
          <div class="avatar">U</div> 
          <span class="user-name"><?php echo $userName2 ?></span>
        </div>
        <a href="/login/logoutUser.php"> <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
      </div>
    </div>
  </header>

</body>
</html>
