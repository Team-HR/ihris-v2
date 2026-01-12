<?php
// Determine current route/page (fallback to 'home' if not set)
$current_page = $_GET['page'] ?? 'home';

// Helper to add highlight class if active
function is_active_class($page_name, $current_page)
{
    return $page_name === $current_page ? 'bg-neutral text-neutral-content' : '';
}

// if (in_array($current_page, ['rsp', 'spms', 'lnd', 'rr'])) echo 'open'
?>
<ul class="menu bg-base-200 min-h-full w-80 p-0">
    <div class="navbar bg-base-100 shadow-sm">
        <a class="btn btn-ghost text-xl">TeamHR</a>
    </div>

    <div class="w-full px-2 mt-1">
        <li><a class="<?php echo is_active_class('home', $current_page) ?>" href="?page=home">Dashboard</a></li>
        <li>
            <details>
                <summary>Core Systems</summary>
                <ul>
                    <li>
                        <details>
                            <summary>RSP</summary>
                            <ul>
                                <li><a>Submenu 1</a></li>
                                <li><a>Submenu 2</a></li>
                            </ul>
                        </details>
                    </li>
                    <li>
                        <details>
                            <summary>SPMS</summary>
                            <ul>
                                <li><a>Submenu 1</a></li>
                                <li><a>Submenu 2</a></li>
                            </ul>
                        </details>
                    </li>
                    <li>
                        <details>
                            <summary>L&D</summary>
                            <ul>
                                <li><a>Submenu 1</a></li>
                                <li><a>Submenu 2</a></li>
                            </ul>
                        </details>
                    </li>
                    <li>
                        <details>
                            <summary>R&R</summary>
                            <ul>
                                <li><a>Submenu 1</a></li>
                                <li><a>Submenu 2</a></li>
                            </ul>
                        </details>
                    </li>

                </ul>
            </details>
        </li>
        <li><a class="<?php echo is_active_class('setup', $current_page) ?>" href="?page=setup">Setup</a></li>
    </div>
</ul>