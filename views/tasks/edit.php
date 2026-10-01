<?php use App\core\Classes\Auth; ?>
<div class="form-container">
    <form action="" method="post">
        <div class="two-group">
            <div class="form-group">
                <label for="task">Task</label>
                <input type="text" name="task" id="task" value="<?= old('task', $task->task) ?>" placeholder="Task" <?= in_array(Auth::user()->id, [1, 2]) ? '' : 'disabled' ?> required />
                <?= error('task') ?>
            </div>

            <div class="form-group">
                <label for="due-date">Due Date</label>
                <input type="date" name="due_date" id="due-date" value="<?= old('due_date', $task->due_date) ?>" <?= in_array(Auth::user()->id, [1, 2]) ? '' : 'disabled' ?> required />
                <?= error('due_date') ?>
            </div>
        </div>
        <?php if (in_array(Auth::user()->id, [1, 2])): ?>
        <div class="two-group">
            <div class="form-group">
                <label for="assigned_to">Assigned-to</label>
                <select name="assigned_to" id="assigned_to">
                    <?php foreach ($users as $user): ?>
                        <option value="<?= $user->id ?>" <?= $user->id == old('assigned_to', $task->assigned_to) ? 'selected' : '' ?>><?= $user->name ?></option>
                    <?php endforeach; ?>
                </select>
                <?= error('assigned_to') ?>
            </div>

            <div class="form-group">
                <label for="assigned_by">Assigned-by</label>
                <select name="assigned_by" id="assigned_by">
                    <?php foreach ($users as $user): ?>
                        <option value="<?= $user->id ?>" <?= $user->id == old('assigned_by', $task->assigned_by) ? 'selected' : '' ?>><?= $user->name ?></option>
                    <?php endforeach; ?>
                </select>
                <?= error('assigned_by') ?>
            </div>
        </div>
        <?php endif; ?>
        <div class="two-group">
            <div class="form-group">
                <label for="assigned-start-date">Assigned Start Date</label>
                <input type="datetime-local" name="assigned_start_date" id="assigned-start-date" value="<?= old('assigned_start_date', $task->assigned_date) ?>" <?= in_array(Auth::user()->id, [1, 2]) ? '' : 'disabled' ?> required />
                <?= error('assigned_start_date') ?>
            </div>

            <div class="form-group">
                <label for="assigned-end-date">Assigned End Date</label>
                <input type="datetime-local" name="assigned_end_date" id="assigned-end-date" value="<?= old('assigned_end_date', $task->assigned_end_date) ?>" <?= in_array(Auth::user()->id, [1, 2]) ? '' : 'disabled' ?> required />
                <?= error('assigned_end_date') ?>
            </div>
        </div>
        <div class="two-group">
            <div class="form-group">
                <label for="start-date">Start Date</label>
                <input type="datetime-local" name="start_date" id="start-date" value="<?= old('start_date', $task->start_date) ?>" required />
                <?= error('start_date') ?>
            </div>

            <div class="form-group">
                <label for="end-date">End Date</label>
                <input type="datetime-local" name="end_date" id="end-date" value="<?= old('end_date', $task->end_date) ?>" required />
                <?= error('end_date') ?>
            </div>
        </div>
        <div class="two-group">
            <div class="form-group">
                <label for="assignee-note">Assignee Note</label>
                <input type="text" name="assignee_note" id="assignee-note" value="<?= old('assignee_note', $task->assignee_note ?? '') ?>" placeholder="Assignee Note" required />
                <?= error('assignee_note') ?>
            </div>



            <div class="form-group">
                <label for="assigner-note">Assigner Note</label>
                <input type="text" name="assigner_note" id="assigner-note" value="<?= old('assigner_note', $task->assigner_note) ?>" placeholder="Assigner Note" <?= in_array(Auth::user()->id, [1, 2]) ? '' : 'disabled' ?> required />
                <?= error('assigner_note') ?>
            </div>
        </div>

        <div class="two-group">
            <!--  -->
            <div class="form-group">
                <label for="milestone">Milestone</label>
                <input type="text" name="milestone" id="milestone" value="<?= old('milestone', $task->milestone) ?>" placeholder="Milestone" <?= in_array(Auth::user()->id, [1, 2]) ? '' : 'disabled' ?> required />
                <?= error('milestone') ?>
            </div>
            <!--  -->
            <div class="form-group">
                <label for="priority">Priority</label>
                <select name="priority" id="priority" <?= in_array(Auth::user()->id, [1, 2]) ? '' : 'disabled' ?> >
                    <option value="urgent" <?= $task->priority === old('priority', 'urgent') ? 'selected' : '' ?>>Urgent</option>
                    <option value="high" <?= $task->priority === old('priority', 'high') ? 'selected' : '' ?>>High</option>
                    <option value="medium" <?= $task->priority === old('priority', 'medium') ? 'selected' : '' ?>>Medium</option>
                    <option value="low" <?= $task->priority === old('priority', 'low') ? 'selected' : '' ?>>Low</option>
                </select>
                <?= error('priority') ?>
            </div>

        </div>
        <div class="form-group ">
            <label for="description">Description</label>
            <textarea name="description" id="" rows="5" cols="137" <?= in_array(Auth::user()->id, [1, 2]) ? '' : 'disabled' ?> ><?= old('description', $task->description) ?></textarea>
            <?= error('description') ?>
        </div>
        <div class="form-group button-group">
            <button type="submit">Update</button>
        </div>
    </form>
</div>