<div class="form-container">
    <form action="" method="post" id="addForm">
        <div class="two-group">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="name" name="name" id="name" value="<?= old("name") ?>" placeholder="Enter your Name" required />
                <?= error('name') ?>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?= old("email") ?>" placeholder="Enter your email" required />
                <?= error('email') ?>
            </div>
        </div>
        <div class="two-group">
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="phone" name="phone" id="phone" value="<?= old("phone") ?>" placeholder="Enter your Phone" required />
                <?= error('phone') ?>
            </div>
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" name="password" id="password" placeholder="Enter new password" require />
                <?= error('password') ?>
            </div>
        </div>

        <div class="form-group button-group">
            <button type="submit">Add User</button>
        </div>
    </form>
</div>