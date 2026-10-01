 body {
            font-family: Arial, sans-serif;

            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-container {
            background: #fff;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            width: 320px;
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input {
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        input:focus {
            border-color: #2575fc;
            outline: none;
            box-shadow: 0px 0px 5px #2575fc;
        }

        button {
            padding: 12px;
            background: #2575fc;
            color: #fff;
            font-size: 16px;
            border: none;
            border-radius: 10px;
            cursor: pointer;

        }

        button:hover {
            background: #b7c1d4ff;
        }
</head>

<body>
    <div class="form-container">
        <h2>login</h2>
        <p>
            <?php
            echo  $massege;
            ?>
        </p>
        <form action="" method="POST">
            <input type="tel" name="mobile" placeholder="Enter Phone Number" required>
            <input type="number" name="password" placeholder="password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html> 