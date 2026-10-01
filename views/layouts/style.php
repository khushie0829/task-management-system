<link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
<style>
    :root {
        --primary-color: #4fc3f7;
        /* --primary-color: #2563eb; */
        --secondary-color: #222e3c;
        --info-color: #F5B301;
        --info-color-hover: #EAB308;
        --background-color: #f4f6f8;
        --text-primary: #2563eb;
        --text-primary-hover: #1e40af;
        --text-primary-dark: #6366f1;
        --text-color: #222;
        --text-body-color: #444;
        --text-white: #fff;
        --text-danger: #e57373;
        --text-danger-hover: #d32f2f;
        --text-secondary: #b0bec5;
        --sidebar-bg: #1a2232;
        --sidebar-hover-bg: #263043;
        --box-shadow: rgba(34, 46, 60, 0.04);
        --font-family: 'Segoe UI', Arial, sans-serif;
        /* --font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; */
        --border-radius: 16px;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: var(--font-family);
    }

    body {
        background: #eee;
        margin: 0;
        padding: 0;

    }

    a {
        text-decoration: none;
    }

    .text-danger {
        color: var(--text-danger);
    }

    .text-primary {
        color: var(--text-primary);
    }

    .d-flex {
        display: flex;
    }

    .justify-content-center {
        justify-content: center;
    }

    .justify-content-between {
        justify-content: space-between;
    }

    .align-items-center {
        align-items: center;
    }

    .muted {
        color: rgba(0, 0, 0, 0.6);
    }

    .main {
        display: flex;
        height: 100vh;
    }

    .mb-1 {
        margin-bottom: 0.5rem;
    }
    .mb-2 {
        margin-bottom: 0.75rem;
    }
    .mb-3 {
        margin-bottom: 1rem;
    }
    .mb-4 {
        margin-bottom: 1.5rem;
    }
    .mb-5 {
        margin-bottom: 2rem;
    }

    .button-sm{
        padding: 8px 16px;
        background: linear-gradient(135deg, #4facfe, #00f2fe);
        color: white;
        font-size: 14px;
        font-weight: bold;
        border: none;
        border-radius: var(--border-radius);
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    }
    header {
        background: var(--sidebar-bg);
        color: var(--text-white);
        padding: 0 32px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        height: 64px;
    }

    .logo h1 {
        margin: 0;
        font-size: 1.5rem;
        letter-spacing: 1px;
    }

    .navbar {
        display: flex;
        align-items: center;
    }

    .navbar ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
    }

    .navbar ul li {
        margin: 0 12px;
    }

    .navbar ul li a {
        color: var(--text-white);
        text-decoration: none;
        font-weight: 500;
        transition: color 0.2s;
    }

    .navbar ul li a:hover {
        color: var(--primary-color);
    }

    .user-profile {
        margin-left: 24px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .user-profile span {
        font-weight: 600;
    }

    .user-profile a {
        color: var(--text-white);
        text-decoration: underline;
        font-size: 0.95em;
        transition: color 0.2s;
    }

    .user-profile .logout-link:hover {
        color: var(--text-danger);
    }

    .sidebar-container {
        width: 17%;
        height: 100vh;
    }

    .main-content {
        width: 83%;
    }

    .welcome-box {
        background: var(--background-color);
        display: inline-block;
        width: 100%;
        border-radius: 12px;
        border-radius: var(--border-radius);
        box-shadow: 0 4px 10px var(--box-shadow);
        padding: 22px;

    }

    .welcome-box h1 {
        font-size: 28px;
        text-align: center;

    }

    .welcome-box p {
        font-size: 16px;
        color: var(--text-body-color);
        text-align: center;
    }

    /* Sidebar */
    .sidebar {
        margin: 0;
        padding: 0;
        height: 100%;
        overflow: auto;
        padding-right: 5px;
    }

    .sidebar a {
        display: block;
        color: black;
        padding: 15px;
        text-decoration: none;
    }

    .sidebar .link {
        display: block;
        color: var(--text-secondary);
        text-decoration: none;
        padding: 12px 32px;
        margin-bottom: 8px;
        border-left: 4px solid transparent;
        transition: background 0.2s, color 0.2s, border-color 0.2s;
    }

    .sidebar .link:hover {
        background: var(--sidebar-hover-bg);
        color: var(--primary-color);
        border-left: 4px solid var(--primary-color);
    }

    .sidebar .link.active {
        background: var(--sidebar-hover-bg);
        color: var(--primary-color);
        border-left: 4px solid var(--primary-color);
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
        padding: 4px;
        text-align: center;
        font-size: medium;

    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        cursor: pointer;
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
        justify-content: space-between
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
        padding: 20px 0px;
        width: 100%;
        background-color: var(--sidebar-bg);
        height: 100%;
        overflow: auto;
        font-weight: 1000;
        font-size: 15px
    }

    .sidebar .logo {
        text-align: center;
    }

    .sidebar .logo img {
        max-width: 180px;
        height: auto;
        margin-top: -20px;

    }

    .sidebar .link {
        display: block;
        padding: 12px 10px;
        font-weight: 500;
        font-size: 18px;
        transition: color 0.2s;
        color: var(--text-white);
    }

    .sidebar .link:hover {
        color: var(--primary-color);
    }



    /* manage user */
    .table-form {
        background: var(--background-color);
        display: inline-block;
        width: 100%;
        border-radius: var(--border-radius);
        box-shadow: 0 4px 10px var(--box-shadow);
        padding: 22px;
    }

    /* add user */
    .dashboard {
        padding: 2rem 1rem;
        overflow: scroll;
        height: calc(100vh - 100px);
    }

    .form-container {
        background: #fff;
        display: inline-block;
        width: 100%;
        border-radius: var(--border-radius);
        box-shadow: 0 4px 10px var(--box-shadow);
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
        border-radius: var(--border-radius);
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


    /* All New */

    /* Header */
    .header-link-container {
        position: relative;
    }

    .header-link-content {
        display: none;
        position: absolute;
        background: #fff;
        color: #000;
        top: 20px;
        right: 0;
        width: 200px;
        width: 390px;
        padding: 22px 20px;
        background: linear-gradient(135deg, #f8fafc 60%, #e0e7ff 100%);
        border-radius: var(--border-radius);
        box-shadow: 0 6px 32px rgba(30, 64, 175, 0.08);
    }

    .header-link-content.list {
        padding-left: 0;
        padding-right: 0;
    }

    .header-link:hover .header-link-content {
        display: block;
    }

    /* Header Profile */
    .profile-section {
        display: flex;
        align-items: center;
        min-width: 290px;
        gap: 20px;
    }

    .profile-avatar {
        flex-shrink: 0;
        width: 72px;
        height: 72px;
        border-radius: 50%;
        overflow: hidden;
        border: 3px solid var(--text-primary);
        box-shadow: 0 2px 12px rgba(37, 99, 235, 0.10);
        background: #f3f4f6;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .profile-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .profile-info {
        display: flex;
        flex-direction: column;
        gap: 8px;
        width: 100%;
    }

    .profile-info strong {
        font-size: 1.18rem;
        color: #1e293b;
        font-weight: 700;
        letter-spacing: 0.01em;
    }

    .profile-role {
        color: var(--text-primary-dark);
        font-size: 0.98rem;
        font-weight: 500;
        margin-bottom: 2px;
    }

    .profile-links {
        display: flex;
        justify-content: space-around;
        gap: 12px;
        margin: 32px 0 0 0;
    }

    .profile-links a {
        color: var(--text-primary) !important;
        text-decoration: none;
        font-size: 0.97rem;
        display: flex;
        align-items: center;
        gap: 4px;
        padding: 2px 0;
    }

    .profile-links a.profile-logout-link {
        color: var(--text-danger) !important;
    }

    .profile-links a:hover {
        color: var(--text-primary-hover);
        text-decoration: underline;
    }

    .info-badge {
        background: var(--text-danger);
        border-radius: var(--border-radius);
        padding: 2px 8px 3px;
        color: var(--text-white);
        font-size: 0.9rem;
    }

    .message-header {
        margin-bottom: 28px;
        padding: 0 20px;
    }

    .message-list-item {
        padding: 13px 20px;
        transition: background-color 0.3s ease;
        background-color: transparent;
        cursor: pointer;
    }

    .message-list-item:hover {
        background-color: var(--text-primary-hover);
        background-color: rgba(0, 0, 0, 0.05);
    }

    .message-list-item .icon {
        color: var(--text-primary);
        font-size: 1.5rem;
    }

    .message-list-item .close-icon {
        color: var(--text-danger);
        cursor: pointer;
    }

    .message-list-item .message {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        width: 250px;
    }

    .message-list-item .date {
        font-size: 0.9rem;
    }

    .quick-action-btns {
        padding: 0 20px;
        margin-top: 32px;
    }

    .quick-action-btns .primary {
        color: var(--text-primary) !important;
    }

    .quick-action-btns .primary:hover {
        color: var(--text-primary-hover) !important;
    }

    .quick-action-btns .info {
        color: var(--info-color) !important;
    }

    .quick-action-btns .info:hover {
        color: var(--info-color-hover) !important;
    }

    .quick-action-btns .danger {
        color: var(--text-danger) !important;
    }

    .quick-action-btns .danger:hover {
        color: var(--text-danger-hover) !important;
    }


    /* Widgets */

    .dashboard-widgets {
        display: flex;
        gap: 24px;
        margin-bottom: 32px;
        flex-wrap: wrap;
    }

    .widget {
        background: var(--background-color);
        border-radius: 16px;
        box-shadow: 0 2px 8px var(--box-shadow);
        padding: 24px 32px;
        min-width: 180px;
        flex: 1 1 180px;
        text-align: center;
    }

    .widget h3 {
        margin: 0 0 8px 0;
        font-size: 1.1rem;
        color: var(--secondary-color);
    }

    .widget p {
        margin: 0;
        font-size: 2rem;
        font-weight: bold;
        color: var(--primary-color);
    }

    footer {
        background: var(--sidebar-bg);
        color: var(--text-white);
        text-align: center;
        font-size: 0.95em;
        letter-spacing: 0.5px;
        position: relative;
        bottom: 0;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 36px;
    }
</style>