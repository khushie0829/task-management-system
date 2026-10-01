<div class="form-group mb-3">
    <a href="<?= routeTo('user.users.add') ?>" class="button-sm">Add User</a>
</div>
<div class="table-form">
    <table>
        <thead>
            <tr>
                <th>Serial No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)) : ?>
                <?php foreach ($users as $index => $user) : ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= htmlspecialchars($user->name) ?></td>
                        <td><?= htmlspecialchars($user->email) ?></td>
                        <td><?= htmlspecialchars($user->phone_no) ?></td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="<?= routeTo('user.users.edit', ['id' => $user->id]) ?>">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No users found.</p>
            <?php endif; ?>
        </tbody>
    </table>
</div>