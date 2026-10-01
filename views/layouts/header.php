<?php

use App\core\Classes\Auth;
?>
<header>
    <!-- Logo -->
    <div class="logo">
        <h3><?= (Auth::user()->role != "") ? Auth::user()->role . " " : "" ?>(<?= Auth::user()->name ?>)</h3>
    </div>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <!-- <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Tasks</a></li>
            <li><a href="#">Users</a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Settings</a></li>
        </ul> -->
        <!-- User Profile Dropdown -->
        <div class="user-profile drop-down">
            <div class="drop-down-content">
                <ul class="header-link-container">
                    <li>
                        <div class="header-link">
                            <a href="#"><i class="ri-notification-line"></i> Notifications</a>
                            <div class="header-link-content list">
                                <?php include_view("components/header/notifications") ?>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="header-link">
                            <a href="#"><i class="ri-message-line"></i> Messages</a>
                            <div class="header-link-content list">
                                <?php include_view("components/header/messages") ?>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="header-link">
                            <a href="#"><i class="ri-profile-line"></i> Profile</a>
                            <div class="header-link-content">
                                <?php include_view("components/header/profile") ?>
                            </div>
                        </div>
                    </li>
                    <li><a class="logout-link" href="<?= routeTo("logout") ?>"><i class="ri-shut-down-line"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>