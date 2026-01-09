<div class="card w-full bg-base-100 card-sm shadow-sm">
    <div class="card-body p-0">

        <!-- WALLPAPER -->
        <div class="w-full h-24 bg-linear-to-r from-primary to-accent rounded"></div>

        <div class="sm:p-8 p-2 relative">

            <!-- AVATAR -->
            <div class="sm:w-36 sm:h-36 w-24 h-24 bg-neutral text-neutral-content flex items-center justify-center rounded absolute sm:-top-20 -top-15">
                <span class="text-4xl">
                    K
                </span>
            </div>

            <div class="block sm:mt-10 mt-8 mb-4">
                <div class="flex sm:flex-row flex-col sm:gap-4 gap-1 sm:items-center">
                    <h1 class="sm:text-3xl text-xl font-bold">Kim Harold V Pinanonang</h1>
                    <div class="badge badge-success badge-md badge-soft">Permanent</div>
                </div>
                <h1 class="sm:text-lg mt-2 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>
                    Since: July 31 2000
                </h1>
            </div>

            <?php
            // Determine which sub-tab is active
            $subpage = $_GET['subpage'] ?? 'user-details';

            // Helper for join-item active class
            function sub_active_class($val, $subpage)
            {
                return $val === $subpage ? 'btn-active' : '';
            }
            ?>
            <div class="card w-full bg-base-100 border border-base-content/10">
                <div class="card-body">
                    <div class="join">
                        <a href="?page=home&subpage=user-details" class="btn join-item btn-ghost <?php echo sub_active_class('user-details', $subpage); ?>">User Details</a>
                        <a href="?page=home&subpage=pds" class="btn join-item btn-ghost <?php echo sub_active_class('pds', $subpage); ?>">PDS</a>
                        <a href="?page=home&subpage=competencies" class="btn join-item btn-ghost <?php echo sub_active_class('competencies', $subpage); ?>">Competencies</a>
                        <a href="?page=home&subpage=calendar" class="btn join-item btn-ghost <?php echo sub_active_class('calendar', $subpage); ?>">Calendar</a>
                        <a href="?page=home&subpage=appointment" class="btn join-item btn-ghost <?php echo sub_active_class('appointment', $subpage); ?>">Appointment</a>
                    </div>
                    <div class="divider m-0"></div>

                    <?php
                    // Display subpage content
                    switch ($subpage) {
                        case 'pds':
                            echo '<div class="p-4 text-lg">PDS Section Coming Soon...</div>';
                            break;
                        case 'competencies':
                            echo '<div class="p-4 text-lg">Competencies Section Coming Soon...</div>';
                            break;
                        case 'calendar':
                            echo '<div class="p-4 text-lg">Calendar Section Coming Soon...</div>';
                            break;
                        case 'appointment':
                            echo '<div class="p-4 text-lg">Appointment Section Coming Soon...</div>';
                            break;
                        case 'user-details':
                        default:
                            include "./pages/home/components/UserDetails.php";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    fetch('/?api=user&empid=3977')
        .then(response => response.json())
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
</script>