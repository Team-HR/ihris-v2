<div class="card w-full bg-base-100 card-sm shadow-sm">
    <div class="card-body p-0">

        <!-- WALLPAPER -->
        <div class="w-full h-24 bg-linear-to-r from-primary to-accent rounded"></div>

        <div class="sm:p-8 p-2 relative">

            <div class="block sm:mt-4 mt-2 mb-4">
                <div class="flex sm:flex-row flex-col sm:gap-4 gap-1 sm:items-center">
                    <h1 class="sm:text-3xl text-xl font-bold">Setup</h1>
                </div>
                <h1 class="sm:text-lg mt-2 flex items-center gap-2">
                    <!-- Description here -->
                </h1>

            </div>
            <?php
            // Determine which sub-tab is active
            $subpage = $_GET['subpage'] ?? 'plantilla';

            // Helper for join-item active class
            function sub_active_class($val, $subpage)
            {
                return $val === $subpage ? 'btn-active' : '';
            }
            ?>
            <div class="card w-full bg-base-100 border border-base-content/10">
                <div class="card-body">
                    <div class="join">
                        <a href="?page=setup&subpage=plantilla" class="btn join-item btn-ghost <?php echo sub_active_class('plantilla', $subpage); ?>">Plantilla</a>
                        <a href="?page=setup&subpage=offices" class="btn join-item btn-ghost <?php echo sub_active_class('offices', $subpage); ?>">Offices</a>
                        <a href="?page=setup&subpage=positions" class="btn join-item btn-ghost <?php echo sub_active_class('positions', $subpage); ?>">Positions</a>
                        <a href="?page=setup&subpage=signatories" class="btn join-item btn-ghost <?php echo sub_active_class('signatories', $subpage); ?>">Signatories</a>
                    </div>
                    <div class="divider m-0"></div>

                    <?php
                    // Display subpage content
                    switch ($subpage) {
                        case 'plantilla':
                            include "./pages/setup/components/plantilla.php";
                            break;
                        case 'offices':
                            include "./pages/setup/components/offices.php";
                            break;
                        case 'positions':
                            include "./pages/setup/components/positions.php";
                            break;
                        case 'signatories':
                            include "./pages/setup/components/signatories.php";
                            break;
                        default:
                            include "./pages/setup/components/offices.php";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>