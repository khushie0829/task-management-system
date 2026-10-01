<?php use App\core\Classes\Auth; ?>
<div class="form-container">
    <form action="" method="post">
        <div class="two-group">
            <div class="form-group">
                <label for="task">Task</label>
                <input type="text" name="task" id="task" value="<?= old('task') ?>" placeholder="Task" required />
                <?= error('task') ?>
            </div>

            <div class="form-group">
                <label for="due-date">Due Date</label>
                <input type="date" name="due_date" id="due-date" value="<?= old('due_date') ?>" required />
                <?= error('due_date') ?>
            </div>
        </div>
        <div class="two-group">
            <div class="form-group">
                <label for="assigned_to">Assigned-to</label>
                <select name="assigned_to" id="assigned_to">
                    <?php foreach ($users as $user): ?>
                        <option value="<?= $user->id ?>" <?= $user->id == old('assigned_to') ? 'selected' : '' ?>><?= $user->name ?></option>
                    <?php endforeach; ?>
                </select>
                <?= error('assigned_to') ?>
            </div>

            <div class="form-group">
                <label for="assigned_by">Assigned-by</label>
                <select name="assigned_by" id="assigned_by" disabled>
                    <?php foreach ($users as $user): ?>
                        <option value="<?= $user->id ?>" <?= $user->id == Auth::user()->id ? 'selected' : '' ?>><?= $user->name ?></option>
                    <?php endforeach; ?>
                </select>
                <?= error('assigned_by') ?>
            </div>
        </div>
        <div class="two-group">
            <div class="form-group">
                <label for="assigned-start-date">Assigned Start Date</label>
                <input type="datetime-local" name="assigned_start_date" id="assigned-start-date" value="<?= old('assigned_start_date') ?>" required />
                <?= error('assigned_start_date') ?>
            </div>

            <div class="form-group">
                <label for="assigned-end-date">Assigned End Date</label>
                <input type="datetime-local" name="assigned_end_date" id="assigned-end-date" value="<?= old('assigned_end_date') ?>" required />
                <?= error('assigned_end_date') ?>
            </div>
        </div>
        <div class="two-group">
            <div class="form-group">
                <label for="assignee-note">Assignee Note</label>
                <input type="text" name="assignee_note" id="assignee-note" value="<?= old('assignee_note') ?>" placeholder="Assignee Note" disabled />
                <?= error('assignee_note') ?>
            </div>



            <div class="form-group">
                <label for="assigner-note">Assigner Note</label>
                <input type="text" name="assigner_note" id="assigner-note" value="<?= old('assigner_note') ?>" placeholder="Assigner Note" required />
                <?= error('assigner_note') ?>
            </div>
        </div>

        <div class="two-group">
            <!--  -->
            <div class="form-group">
                <label for="milestone">Milestone</label>
                <input type="text" name="milestone" id="milestone" value="<?= old('milestone') ?>" placeholder="Milestone" required />
                <?= error('milestone') ?>
            </div>
            <!--  -->
            <div class="form-group">
                <label for="priority">Priority</label>
                <select name="priority" id="priority">
                    <option value="urgent" <?= old('priority') === "urgent" ? 'selected' : '' ?>>Urgent</option>
                    <option value="high" <?= old('priority') === "high" ? 'selected' : '' ?>>High</option>
                    <option value="medium" <?= old('priority') === "medium" ? 'selected' : '' ?>>Medium</option>
                    <option value="low" <?= old('priority') === "low" ? 'selected' : '' ?>>Low</option>
                </select>
                <?= error('priority') ?>
            </div>

        </div>
        <div class="form-group ">
            <label for="description">Description</label>
            <textarea name="description" id="" rows="5" cols="137"><?= old('description') ?></textarea>
            <?= error('description') ?>
        </div>
        <div class="form-group button-group">
            <button type="submit">Add Task</button>
        </div>
    </form>
</div>