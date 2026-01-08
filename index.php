<?php
include_once "./includes/header.php";
include_once "./includes/navbar.php";
?>

<div class="py-3 p-sm-5">
  <?php
  $page = $_GET['page'] ?? 'home';

  // switch ($page) {
  //   case 'about':
  //     include "./pages/about.php";
  //     break;
  //   default:
  //     include "./pages/home.php";
  // }
  ?>
</div>

<?php
include_once "./includes/footer.php";
