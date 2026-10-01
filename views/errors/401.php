<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>401 Unauthorised | <?= config("App")->get("app_name") ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://blog.adsplay.in/wp-content/uploads/2025/08/cropped-logol-32x32.png" sizes="32x32" />
    <link rel="icon" href="https://blog.adsplay.in/wp-content/uploads/2025/08/cropped-logol-192x192.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="https://blog.adsplay.in/wp-content/uploads/2025/08/cropped-logol-180x180.png" />
    <meta name="msapplication-TileImage" content="https://blog.adsplay.in/wp-content/uploads/2025/08/cropped-logol-270x270.png" />
    <style>
        body {
            background: #f4f6fb;
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(60, 72, 100, 0.12);
            padding: 48px 32px;
            text-align: center;
            max-width: 400px;
        }

        .error-code {
            font-size: 5rem;
            font-weight: 700;
            color: #3b82f6;
            margin-bottom: 8px;
        }

        .error-message {
            font-size: 1.5rem;
            color: #22223b;
            margin-bottom: 16px;
        }

        .description {
            color: #6b7280;
            margin-bottom: 32px;
        }

        .dashboard-link {
            display: inline-block;
            padding: 12px 28px;
            background: #3b82f6;
            color: #fff;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: background 0.2s;
        }

        .dashboard-link:hover {
            background: #2563eb;
        }

        @media (max-width: 500px) {
            .container {
                padding: 32px 12px;
            }

            .error-code {
                font-size: 3rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="error-code">401</div>
        <div class="error-message">Unauthorised</div>
        <div class="description">
            Sorry, you don't have enough permission to access this resource.<br>
            Please check the URL or return to your dashboard.
        </div>
        <a href="<?php echo routeTo('admin.dashboard'); ?>" class="dashboard-link">Go to Dashboard</a>
    </div>
</body>

</html>