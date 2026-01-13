<?php
include_once "./includes/header.php";
?>


<div class="drawer lg:drawer-open">
  <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
  <div class="drawer-content flex flex-col items-start justify-start lg:p-8">

    <div class="lg:hidden w-full">
      <?php
      include "./includes/navbar.php";
      ?>
    </div>

    <?php
    $path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

      switch ($path) {
        case 'employee/list':
          include './pages/employees/EmployeeList.php';
          break;
        case 'about':
          include './pages/about.php';
          break;
        case 'setup':
          include "./pages/setup/setup.php";
          break;
        default:
          include './pages/home/home.php';
      }

    ?>

  </div>
  <div class="drawer-side">
    <label for="my-drawer-3" aria-label="close sidebar" class="drawer-overlay"></label>
    <?php
    include_once "./includes/sidebar.php";
    ?>
  </div>
</div>

<?php
include_once "./includes/footer.php";
