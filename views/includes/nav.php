<div class="nav-wrapper">
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid ">
      <img src="./public/img/logo.png" alt="LOGO" width="180" height="35">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?=BASE_URL?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=BASE_URL?>products">Products</a>
          </li>
          <?php if (isset($_SESSION["admin"]) && $_SESSION["admin"] == true): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?=BASE_URL?>dashboard">ADMIN</a>
          </li>
          <?php endif; ?>
        </ul>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="<?=BASE_URL?>cart"><i class="fas fa-shopping-cart"></i> Cart
            <?php if (isset($_SESSION["count"]) && $_SESSION["count"] > 0): ?>
          (<?php echo $_SESSION["count"]?>)
          <?php else: ?>
            (0)
            <?php endif; ?>
          </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" type="button">
              Account
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php if (isset($_SESSION["logged"]) && $_SESSION["logged"] === true): ?>
                <li><a class="dropdown-item" href="#"><?=$_SESSION['fullname']?></a></li>
                <li><a class="dropdown-item" href="<?=BASE_URL?>logout">Log out</a></li>
              <?php else: ?>
                <li><a class="dropdown-item" href="<?=BASE_URL?>register">Register</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="<?=BASE_URL?>login">Log In</a></li>
              <?php endif; ?>
            </ul>
            
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>
