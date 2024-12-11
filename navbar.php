
<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <style>
    .dropdown:hover .dropdown-menu {
      display: block;
      margin-top: 0;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg p-3" style="background-color: #546e7a; color: white;">
    <div class="container-fluid">
      <a class="navbar-brand" style="color:#90a4ae; font-size: 2rem;" href="index.php">
        <i class="fa-solid fa-cat" style="font-size: 2rem;"></i> <b>EYETSW</b>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon" style="color: white;"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ">
          <li class="nav-item">
            <a class="nav-link active text-white" style="margin-left: 20px; " aria-current="page" href="resume.php">ABOUT ME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="contact.php">CONTACT</a>
          </li>
        </ul>
        <!-- admin -->
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-light" style="margin-right: 45px;" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                ADMIN
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="member.php">จัดการข้อมูลแอดมิน</a></li>
                <li><a class="dropdown-item" href="portfolio.php">จัดการข้อมูลผมงาน</a></li>
                <li><a class="dropdown-item" href="logout.php">ออกจากระบบ</a></li>
              </ul>
            </li>
          </ul>
          <a class="nav-link active text-white" style="margin-left: -20px; margin-right: 30px; "  href="logout.php" > logout </a>
          <?php endif; ?>
      </div>
    </div>
  </nav>
</body>

</html>