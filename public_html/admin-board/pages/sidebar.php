<style>
    body {
        margin: 0;
        font-family: "Lato", sans-serif;
    }

    .sidebar {
        margin: 0;
        padding: 0;
        width: 205px;
        background-color: white;
        position: fixed;
        height: 100%;
        overflow: auto;
        border-right: rgb(211, 204, 199) solid 2px;
        padding-right: 5px;
    }

    .sidebar a {
        display: block;
        color: black;
        padding: 15px;
        text-decoration: none;
    }

    .active a img {
        width: 49px;

    }

    .active a {
        border-bottom: rgb(204, 195, 186) solid 1px;
    }

    .sidebar a:hover:not(.active) {
        background-color: rgb(230, 215, 245);

    }

    div.content {
        margin-left: 109px;
        padding: px 16px;
        height: 1000px;
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="sidebar">
        <div class="active">


        </div>
        <a href="home">
            <i class="ri-bank-line"></i>
            DESHBOARD
        </a>
        <a href="manage-users">
            <i class="ri-list-check"></i>
            MANAGE USERS

        </a>
        <a href="add-users" id="addUser"><i class="ri-user-add-fill">

            </i> ADD USERS</a>
        <a href="manage-admin" id=""><i class="ri-menu-line">

            </i> MANAGE ADMIN</a>
        <a href="add-admin" id="addAdminLink"><i class="ri-admin-fill">

            </i> ADD ADMIN</a>
        <a href="role" id="addAdminLink"><i class="ri-contract-right-line"></i>
            </i> ROLE NAME</a>

        <a href="task" id="addAdminLink"><i class="ri-task-line"></i>
            </i>TASK</a>
        <a href="task-manage" id="addAdminLink"><i class="ri-task-line"></i>
            </i>TASK MANAGE</a>



    </div>

    <div class="content">
        <div class="top-banner">

        </div>

        <link
            href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
            rel="stylesheet" />
</body>

</html>