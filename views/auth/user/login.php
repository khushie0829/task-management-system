<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Login | <?= config("App")->get("app_name") ?></title>
    <style>
        :root {
            --primary-color: #4fc3f7;
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
            --border-radius: 16px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: var(--font-family);
            background-color: var(--background-color);
            color: var(--text-body-color);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-container {
            background-color: var(--text-white);
            padding: 2.5rem 2rem;
            border-radius: var(--border-radius);
            box-shadow: 0 10px 30px var(--box-shadow);
            width: 100%;
            max-width: 400px;
        }

        .login-title {
            font-size: 1.75rem;
            margin-bottom: 1.5rem;
            color: var(--secondary-color);
            text-align: center;
        }

        .form-group {
            margin-bottom: 1.2rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text-color);
            font-weight: 500;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: var(--primary-color);
            outline: none;
        }

        .login-btn {
            width: 100%;
            padding: 0.75rem 1rem;
            background-color: var(--primary-color);
            color: var(--text-white);
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-btn:hover {
            background-color: var(--text-primary-hover);
        }

        .login-footer {
            margin-top: 1.5rem;
            text-align: center;
            font-size: 0.9rem;
            color: var(--text-secondary);
        }

        .login-footer a {
            color: var(--text-primary-dark);
            text-decoration: none;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 2rem 1.5rem;
            }
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h2 class="login-title">User Login</h2>

        <?php

        use App\core\Classes\Flash; ?>

        <?php if (Flash::get('failed')): ?>
            <div class='error-message' style='color: #e57373; margin: 13px 0; text-align: center;'><?= Flash::get('failed') ?></div>
        <?php endif ?>
        <?php if (Flash::get('success')): ?>
            <div class='error-message' style='color: #2563eb; margin: 13px 0; text-align: center;'><?= Flash::get('success') ?></div>
        <?php endif ?>
        <form method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?= old('email') ?>" required />
                <?= error('email') ?>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" value="<?= old('password') ?>" required />
                <?= error('password') ?>
            </div>

            <button type="submit" class="login-btn">Sign In</button>
        </form>

        <div class="login-footer">
            <p>Forgot your password? <a href="#">Reset here</a></p>
        </div>
    </div>

</body>

</html>