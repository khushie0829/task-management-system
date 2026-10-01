<?php

use App\core\Classes\Flash; ?>
<footer>
    <p>&copy; <?php echo date('Y'); ?> <?= config("App")->app_name ?>. All rights reserved.</p>
</footer>
<?php if (Flash::get('failed')): ?>
    <?php include_view('components/common/toast/failed'); ?>
<?php endif ?>
<?php if (Flash::get('success')): ?>
    <?php include_view('components/common/toast/success'); ?>
<?php endif ?>