<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "head.php" ?>
    <?php include "styles.php" ?>
</head>

<body>
    <div class="main">
        <div class="sidebar-container">
            <?php include "sidebar.php" ?>
        </div>
        <div class="main-content">
            <div class="dashboard">
                <div class="content">
                    <div class="ceated">
                        <?= $title ?>
                        <a href=""> <i class="ri-shut-down-line"></i></a>
                    </div>
                    <div class="container">
                        <div class="top-bar" style="display:flex;justify-content:space-between;align-items:center;margin-bottom:15px;">
                        </div>
                        <?php include $content ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php include "footer.php" ?>
    <?php include "script.php" ?>
</body>

</html>