<div class="card w-full bg-base-100 card-sm shadow-sm">
    <div class="card-body p-0">

        <!-- WALLPAPER -->
        <div class="w-full h-24 bg-linear-to-r from-primary to-accent rounded"></div>

        <div class="sm:p-8 p-2 relative">

            <div class="block sm:mt-4 mt-2 mb-4">
                <div class="flex sm:flex-row flex-col sm:gap-4 gap-1 sm:items-center">
                    <h1 class="sm:text-3xl text-xl font-bold">PDS</h1>
                </div>
                <h1 class="sm:text-lg mt-2 flex items-center gap-2">
                    <!-- Description here -->
                </h1>

            </div>
            <?php
            // Determine which sub-tab is active
            $subpage = $_GET['subpage'] ?? 'bio';

            // Helper for join-item active class
            function sub_active_class($val, $subpage)
            {
                return $val === $subpage ? 'btn-active' : '';
            }
            ?>
            <div class="card w-full bg-base-100 border border-base-content/10">
                <div class="card-body">
                    <div class="join flex-wrap">
                        <a href="?page=pds&subpage=personal" class="btn join-item btn-ghost w-full sm:w-auto btn-sm sm:btn-md <?php echo sub_active_class('personal', $subpage); ?>">Personal</a>
                        <a href="?page=pds&subpage=professional" class="btn join-item btn-ghost w-full sm:w-auto btn-sm sm:btn-md <?php echo sub_active_class('professional', $subpage); ?>">Professional</a>
                        <a href="?page=pds&subpage=family" class="btn join-item btn-ghost w-full sm:w-auto btn-sm sm:btn-md <?php echo sub_active_class('family', $subpage); ?>">Family</a>
                        <a href="?page=pds&subpage=education" class="btn join-item btn-ghost w-full sm:w-auto btn-sm sm:btn-md <?php echo sub_active_class('education', $subpage); ?>">Education</a>
                        <a href="?page=pds&subpage=eligibility" class="btn join-item btn-ghost w-full sm:w-auto btn-sm sm:btn-md <?php echo sub_active_class('eligibility', $subpage); ?>">Eligibility</a>
                    </div>
                    <div class="divider m-0"></div>

                    <?php
                    // Display subpage content
                    switch ($subpage) {
                        case 'personal':
                            include "./pages/pds/components/personal.php";
                            break;
                        case 'professional':
                            include "./pages/pds/components/professional.php";
                            break;
                        case 'family':
                            include "./pages/pds/components/family.php";
                            break;
                        case 'education':
                            include "./pages/pds/components/education.php";
                            break;
                        case 'eligibility':
                            include "./pages/pds/components/eligibility.php";
                            break;
                        default:
                            include "./pages/pds/components/personal.php";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>