<?php
include('session.php');
if ($admin_type==1) {
  //admin, treasurer
?>
<nav class="mb-1 navbar navbar-expand-lg navbar-dark warning-color">
  <img src="./assets/img/gct_logo.png" height="50" alt="mdb logo">
  <a class="navbar-brand" href="#">
      Garcia College of Technology
    </a>
    <button class="navbar-toggler first-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent20"
    aria-controls="navbarSupportedContent20" aria-expanded="false" aria-label="Toggle navigation">
    <div class="animated-icon1"><span></span><span></span><span></span></div>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent20">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">
          <i class="fab fa-facebook-f"></i> Facebook
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fab fa-instagram"></i> Instagram</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i> Profile </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
          <a class="dropdown-item" href="admin-profile.php?admin=<?php echo $admin_username; ?>">My Account</a>
          <a class="dropdown-item" href="admin-change-password.php"></a>
          <a class="dropdown-item" href="logout.php">Log Out</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<?php } 

if ($student_type==2) {
  //student
?>
<nav class="mb-1 navbar navbar-expand-lg navbar-dark warning-color">
  <img src="./assets/img/gct_logo.png" height="50" alt="mdb logo">
  <a class="navbar-brand" href="#">
      Garcia College of Technology
    </a>
  <button class="navbar-toggler first-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent20"
    aria-controls="navbarSupportedContent20" aria-expanded="false" aria-label="Toggle navigation">
    <div class="animated-icon1"><span></span><span></span><span></span></div>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent20">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">
          <i class="fab fa-facebook-f"></i> Facebook
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fab fa-instagram"></i> Instagram</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i> Profile </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
          <a class="dropdown-item" href="student-profile.php?user=<?php echo $student_username; ?>">My Account</a>
          <a class="dropdown-item" href="logout.php">Log Out</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<?php } ?>