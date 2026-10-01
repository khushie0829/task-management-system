<link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: serif;
        background: #fff;
        margin: 0;
        padding: 0;

    }

    .main {
        display: flex;
        height: 100vh;
    }

    .sidebar-container {
        width: 17%;
    }



    .main-content {
        width: 83%;

    }

    .welcome-box {
        background: #fff;
        display: inline-block;
        width: 100%;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 22px;

    }

    .welcome-box h1 {
        font-size: 28px;
        text-align: center;

    }

    .welcome-box p {
        font-size: 16px;
        color: #555;
        text-align: center;
    }

    /* Sidebar */
    .sidebar {
        margin: 0;
        padding: 0;

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



    /* User Manager */
    table {

        width: 100%;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 4px;
        text-align: center;
        font-size: medium;

    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }



    .edit {
        margin: 2px;
        color: black;
    }

    .delete {

        color: black;
    }

    .ceated {

        display: flex;
        justify-content: space-between;
        border-bottom: rgb(212, 212, 212) solid 1px;
    }

    .ceated {
        color: black;
        text-decoration: none;
        padding: 10px;

    }

    .ceated a {
        color: black;
        text-decoration: none;

    }

    .container {
        padding: 6px;
    }




    .sidebar {
        margin: 0;
        padding: 20px 10px;
        width: 220px;
        background-color: #fff;
        position: fixed;
        height: 100%;
        overflow: auto;
        border-right: 2px solid #d3ccc7;
        font-weight: 1000;
        font-size: 15px
    }

    .sidebar .logo {
        text-align: center;
        margin-bottom: 25px;
        border-bottom: 1px solid #d3ccc7;

    }

    .sidebar .logo img {
        max-width: 120px;
        /* adjust size */
        height: auto;
        margin-top: -20px;

    }

    .sidebar a {
        display: block;

        padding: 12px 10px;

        font-weight: 500;
        font-size: 18px;
        transition: 0.3s;
    }



    /* manage user */
    .table-form {
        background: #fff;
        display: inline-block;
        width: 100%;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 22px;
    }

    /* add user */
    .dashboard {
        padding: 2rem 1rem;

    }

    .form-container {
        background: #fff;
        display: inline-block;
        width: 100%;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 22px;
    }

    .two-group {
        display: flex;
        gap: 1px;
    }

    .form-group {
        flex: 1;
        padding: 8px;
        /* each will take equal space */
    }

    .form-group input {
        width: 100%;
    }

    .form-group input {
        height: 35px;
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid rgba(170, 170, 170, 1);
    }

    .form-group select {
        height: 35px;
        width: 100%;
        padding: 5px;
        border-radius: 5px;
        border: 1px solid rgba(170, 170, 170, 1);
    }

    .form-group textarea {
        border-radius: 7px;
    }

    .button-group {
        display: flex;
        justify-content: center;
        margin-top: 15px;
    }

    .button-group button {
        background: linear-gradient(135deg, #4facfe, #00f2fe);
        color: white;
        font-size: 16px;
        font-weight: bold;
        padding: 12px 25px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    }

    .button-group button:hover {
        background: linear-gradient(135deg, #43e97b, #38f9d7);
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.25);
    }

    .button-group button:active {
        transform: translateY(1px);
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
    }
</style>