<div class="table-form">
<table>
    <thead>
    <tr>
        <th>Serial No.</th>
        <th>Task</th>
        <th>Description</th>
        <th>Assigned-To</th>
        <th>Assigned-By</th>
        <th>Assigned-Start-Date</th>
        <th>Assigned-End-Date</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Milestone</th>
        <th>Assigner Note</th>
        <th>Assignee Note</th>
        <th>Due Date</th>
        <th>Priority</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <!-- Task rows will be populated here -->
     <?php
     $sr_no = 1;
        foreach ($tasks as $task) {
            echo "<tr>
                    <td>{$sr_no}</td>
                    <td>{$task->task}</td>
                    <td>{$task->description}</td>
                    <td>{$task->assigned_to}</td>
                    <td>{$task->assigned_by}</td>
                    <td>{$task->assigned_date}</td>
                    <td>{$task->assigned_end_date}</td>
                    <td>{$task->start_date}</td>
                    <td>{$task->end_date}</td>
                    <td>{$task->milestone}</td>
                    <td>{$task->assigner_note}</td>
                    <td>{$task->assignee_note}</td>
                    <td>{$task->due_date}</td>
                    <td>{$task->priority}</td>
                    <td>
                        <a href='" . routeTo('user.tasks.edit', ['id' => $task->id]) . "' class='edit-btn'>Edit</a> |
                        <a href='#' class='delete-btn'>Delete</a>
                    </td>
                  </tr>";
        }
        $sr_no++;
    ?>
    </tbody>
</table>
</div>