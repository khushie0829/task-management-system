<?php

use App\core\Classes\Auth;
?>
<div class="profile-section">
    <div class="profile-avatar">
        <img src="<?= asset("assets/images/user.png") ?>" alt="User Avatar" />
    </div>
    <div class="profile-info">
        <strong><?= Auth::user()->name ?></strong>
        <span class="profile-role"><?= Auth::user()->role ?></span>
    </div>
</div>
<div class="profile-links">
    <a href="/profile"><i class="ri-user-line"></i> View Profile</a>
    <a href="/settings"><i class="ri-settings-3-line"></i> Account Settings</a>
    <a href="<?= routeTo("logout") ?>" class="profile-logout-link"><i class="ri-shut-down-line"></i> Logout</a>
</div>