<?php
// master.php - Admin Dashboard Layout for Task Management System
?>
<!DOCTYPE html>
<html lang="en">
<?php include_view('layouts/head', ['title' => $title]); ?>
<?php include_view('layouts/style'); ?>

<body>

    <!-- ================= Main Container ================= -->
    <div class="main">

        <div class="sidebar-container">
            <!-- ================ SIDEBAR ================ -->
            <?php include_view('layouts/sidebar'); ?>
            <!-- ============== END SIDEBAR ============== -->
        </div>

        <div class="main-content">

            <!-- ================= HEADER ================= -->
            <?php include_view('layouts/header'); ?>
            <!-- =============== END HEADER =============== -->

            <div class="dashboard">
                <div class="content">

                    <div class="ceated">

                        <!-- ======= PAGE TITLE ======= -->
                        <section class="page-title">
                            <h2><?= $title ?></h2>
                        </section>
                        <!-- ===== END PAGE TITLE ===== -->

                    </div>

                    <div class="container">

                        <div class="top-bar" style="display:flex;justify-content:space-between;align-items:center;margin-bottom:15px;">
                        </div>

                        <!-- ======= DASHBOARD WIDGETS ======= -->
                        <?php include_view('components/dashboard/widgets'); ?>
                        <!-- ==== END DASHBOARD WIDGETS ==== -->

                        <!-- ======= MAIN DASHBOARD CONTENT ======= -->
                        <section class="dashboard-main-content">
                            <?php include $content ?>
                        </section>
                        <!-- ==== END MAIN DASHBOARD CONTENT ==== -->

                    </div>

                </div>
            </div>

            <!-- ================= FOOTER ================== -->
            <?php include_view('layouts/footer'); ?>
            <!-- =============== END FOOTER ================ -->

        </div>

    </div>
    <!-- ================= Main Container ================= -->

    <?php include_view('layouts/script'); ?>
</body>

</html>