<h1>Welcome to <?php echo htmlspecialchars($appName); ?></h1>
<p>Title: <?php echo htmlspecialchars($title); ?></p>
<p>Environment: <?php echo htmlspecialchars($appEnv); ?></p>
<p><a href="<?php echo routeTo('admin.settingTwo', ['id' => 42, 'action' => 'edit']); ?>">Admin Settings Edit</a></p>
