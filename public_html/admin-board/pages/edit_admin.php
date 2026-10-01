<?php include 'sidebar.php'; ?>


<div class="form-container">

    <h3>Edit User</h3>
    <form id="updateForm" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name"
                value="<?php echo htmlspecialchars($row['name']); ?>" required />
        </div>

        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email"
                value="<?php echo htmlspecialchars($row['email']); ?>" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" id="password" name="password"
                value="<?php echo htmlspecialchars($row['password']); ?>" required>
        </div>

        <div class="form-group">
            <label for="designation">Designation</label>
            <input type="text" id="designation" name="designation"
                value="<?php echo htmlspecialchars($row['designation']); ?>" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone"
                value="<?php echo htmlspecialchars($row['phone']); ?>" required>
        </div>

        <input type="hidden" name="stu_id" value="<?php echo $row['id']; ?>">

        <button type="submit">Update</button>
    </form>
</div>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        height: 100vh;
        width: 100%;
        font-family: Arial, sans-serif;
    }

    .form-container {


        margin-left: 109px;
        padding: px 16px;
        height: 1000px;
    }

    form {
        width: 100%;
    }

    .form-group {
        margin-top: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
    }

    .form-group input {
        height: 35px;
        width: 100%;
        padding: 5px;
        border-radius: 5px;
        border: 1px solid #aaa;
    }

    button {
        margin-top: 15px;
        width: 100%;
        height: 35px;
        border-radius: 5px;
        border: none;
        font-size: 16px;
        cursor: pointer;
        border: 1px solid #aaa;

    }

    div.content {
        margin-left: 109px;
        padding: px 16px;
        height: 1000px;
    }

    .ceated {

        display: flex;
        justify-content: space-between;
        border-bottom: rgb(212, 212, 212) solid 1px;
    }

    .ceated {
        color: black;
        text-decoration: none;
        padding: 15px;

    }

    .ceated a {
        color: black;
        text-decoration: none;

    }

    h3 {
        margin-top: 10px;
    }
</style>`