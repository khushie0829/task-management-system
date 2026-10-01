<?php use App\core\Classes\Auth; ?>
<aside class="sidebar">
    <div class="logo">
         <a href="#"><img src="<?= asset('assets/images/logo-white.png') ?>" alt="Logo"></a>
    </div>
    <a class="link <?= activeRoute("dashboard") ?>" href="<?= routeTo("dashboard") ?>"><i class="ri-dashboard-fill"></i> Overview</a>
    <a class="link <?= activeRoute("user.tasks") ?>" href="<?= routeTo("user.tasks") ?>"><i class="ri-task-fill"></i> All Tasks</a>
    <?php if (in_array(Auth::user()->id, [1, 2])): ?>
    <a class="link <?= activeRoute("user.tasks.add") ?>" href="<?= routeTo("user.tasks.add") ?>" id="addUser"><i class="ri-add-fill"></i> Create Task</a>
    <a class="link <?= activeRoute("user.teams") ?>" href="<?= routeTo("user.teams") ?>"><i class="ri-team-fill"></i> Teams</a>
    <a class="link <?= activeRoute("user.users") ?>" href="<?= routeTo("user.users") ?>" id="addAdminLink"><i class="ri-user-community-fill"></i> User Management</a>
    <a class="link <?= activeRoute("user.users-designation") ?>" href="<?= routeTo("user.users-designation") ?>" id="addAdminLink"><i class="ri-user-community-fill"></i> User Designations</a>
    <a class="link <?= activeRoute("user.reports") ?>" href="<?= routeTo("user.reports") ?>"><i class="ri-file-list-2-line"></i> Reports</a>
    <a class="link <?= activeRoute("user.settings") ?>" href="<?= routeTo("user.settings") ?>" id="addAdminLink"><i class="ri-settings-2-line"></i> Settings</a>
    <?php endif; ?>

</aside>