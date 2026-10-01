<div class="form-container">
    <form action="" method="post" id="addForm">
        <div class="two-group">
            <div class="form-group">
                <label for="task">Task</label>
                <input type="text" name="task" id="task" placeholder="Task" required />
            </div>
            <div class="form-group">
                <label for="due-date">Due Date</label>
                <input type="date" name="due-date" id="due-date" required />
            </div>
        </div>
        <div class="two-group">
            <div class="form-group">
                <label for="assigned">Assigned-to</label>
                <select name="cars" id="cars">
                    <option value="volvo">Hadi</option>
                    <option value="saab">Abuzar</option>
                    <option value="opel">Ali</option>
                    <option value="audi">Cheta</option>
                </select>
            </div>
            <div class="form-group">
                <label for="milestone">Milestone</label>
                <input type="text" name="milestone" id="milestone" placeholder="Milestone" required />
            </div>
        </div>
        <div class="two-group">
            <div class="form-group">
                <label for="start-date">Start Date</label>
                <input type="date" name="start-date" id="start-date" required />
            </div>

            <div class="form-group">
                <label for="end-date">End Date</label>
                <input type="date" name="end-date" id="end-date" required />
            </div>
        </div>
        <div class="two-group">
            <div class="form-group">
                <label for="assignee-not">Assignee Note</label>
                <input type="text" name="assignee-not" id="assignee-not" placeholder="Assignee Note" required />
            </div>
            <div class="form-group">
                <label for="assigner-not">Assigner Note</label>
                <input type="text" name="assigner-not" id="assigner-not" placeholder="Assigner Note" required />
            </div>
        </div>
        <div class="two-group">
            <div class="form-group">
                <label for="cars">Priority</label>
                <select name="priority" id="priority">
                    <option value="urgent">Urgent</option>
                    <option value="high">High</option>
                    <option value="medium">Medium</option>
                    <option value="low">Low</option>
                </select>
            </div>
        </div>
        <div class="form-group ">
            <label for="description">Description</label>
            <textarea name="description" id="" rows="5" cols="137"></textarea>
        </div>
        <div class="form-group button-group">
            <button type="submit">Submit</button>
        </div>
    </form>
</div>