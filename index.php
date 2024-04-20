<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
    <title>Home Page</title>
    
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="about.php">DDEC</a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="buyer_list_user.php">Buyer List</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Log in
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="login_form_admin.php">Admin</a></li>
            <li><a class="dropdown-item" href="login_form_user.php">Buyer</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div id="carouselExampleDark" class="carousel carousel-dark slide">

  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="images/homepage.png" class="d-block w-100" >
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="images/Final/7.png" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="images/homepage.png" class="d-block w-100">
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="b-example-divider"></div>

<div class="b-example-divider"></div>

<?php
    include "footer.php"
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>