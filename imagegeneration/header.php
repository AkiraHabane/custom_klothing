<?php
session_start();
$count = isset($_SESSION['userdata']['id']) ? $conn->query("SELECT SUM(quantity) as items from `cart` where client_id = " . $_SESSION['userdata']['id'])->fetch_assoc()['items'] : 0;
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="http://localhost/custom_klothing/">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/custom_klothing/customization/index.html">Personalize</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php">
            Cart
            <?php if ($count > 0) : ?>
              <span class="badge bg-dark text-white"><?php echo $count; ?></span>
            <?php endif; ?>
          </a>
        </li>
        <?php if (!isset($_SESSION['userdata']['id'])) : ?>
          <li class="nav-item">
            <a class="nav-link" href="#">Login</a>
          </li>
        <?php else : ?>
          <li class="nav-item">
            <a class="nav-link" href="#">Hi, <?php echo $_SESSION['userdata']['firstname']; ?>!</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Logout</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
