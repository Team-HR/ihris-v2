<?php
// Determine current route/page (fallback to 'home' if not set)
// $path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$path = $_GET['page'] ?? 'home';
$current_page = $path ?: 'home';

// Helper to add highlight class if active
function is_active_class($page_name, $current_page)
{
    return $page_name === $current_page ? 'bg-neutral text-neutral-content' : '';
}

// Helper to decide if <details> should be open
function is_details_open(array $pages, $current_page)
{
    return in_array($current_page, $pages) ? 'open' : '';
}
?>
<ul class="menu bg-base-200 min-h-full w-80 p-0">

    <?php include "./includes/navbar.php"; ?>

    <div class="w-full px-2 mt-1">
        <li>
            <a class="<?php echo is_active_class('home', $current_page) ?>" href="/?page=home">
                Dashboard
            </a>
        </li>

        <li>
            <!-- Employees menu -->
            <details <?php echo is_details_open(['employee/list', 'Temporary'], $current_page) ?>>
                <summary>
                    Employees
                </summary>
                <ul>
                    <li>
                        <a class="<?php echo is_active_class('employee/list', $current_page) ?>" href="employee/list">
                            Employee List
                        </a>
                    </li>
                    <li>
                        <a class="<?php echo is_active_class('Temporary', $current_page) ?>" href="/?page=Temporary">
                            Temporary/Probation
                        </a>
                    </li>
                </ul>
            </details>
        </li>

        <li>
            <details <?php echo is_details_open(['rsp', 'spms', 'lnd', 'rr'], $current_page) ?>>
                <summary>Core Systems</summary>
                <ul>
                    <li>
                        <details <?php echo is_details_open(['rsp'], $current_page) ?>>
                            <summary>RSP</summary>
                            <ul>
                                <li><a href="#">Submenu 1</a></li>
                                <li><a href="#">Submenu 2</a></li>
                            </ul>
                        </details>
                    </li>
                    <li>
                        <details <?php echo is_details_open(['spms'], $current_page) ?>>
                            <summary>SPMS</summary>
                            <ul>
                                <li><a href="#">Submenu 1</a></li>
                                <li><a href="#">Submenu 2</a></li>
                            </ul>
                        </details>
                    </li>
                    <li>
                        <details <?php echo is_details_open(['lnd'], $current_page) ?>>
                            <summary>L&D</summary>
                            <ul>
                                <li><a href="#">Submenu 1</a></li>
                                <li><a href="#">Submenu 2</a></li>
                            </ul>
                        </details>
                    </li>
                    <li>
                        <details <?php echo is_details_open(['rr'], $current_page) ?>>
                            <summary>R&R</summary>
                            <ul>
                                <li><a href="#">Submenu 1</a></li>
                                <li><a href="#">Submenu 2</a></li>
                            </ul>
                        </details>
                    </li>
                </ul>
            </details>
        </li>
        <li><a class="<?php echo is_active_class('pds', $current_page) ?>" href="?page=pds">PDS (remove after test)</a></li>
        <li><a class="<?php echo is_active_class('setup', $current_page) ?>" href="?page=setup">Setup</a></li>
    </div>
</ul>