<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }

        html {
            background-image: url("../images/image1.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .register-box {
            width: 350px;
            padding: 20px;
            border-radius: 8px;
            background-color: #ffffff;
            box-shadow: 3px 3px 15px black;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: black;
        }

        label {
            font-size: 14px;
            color: #333;
            display: block;
            margin: 10px 0 5px;
            text-align: left;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            width: 95%;
            padding: 10px;
            background-color: #904c4c;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: black;
        }

        .login-link {
            margin-top: 10px;
            display: block;
            font-size: 14px;
        }

        .login-link a {
            color: #0066cc;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-box">
        <h2>Register</h2>
        <form method="POST" action="../routes.php?action=register">
            <label>Username:</label>
            <input type="text" name="username" required>
            <label>Set Password:</label>
            <input type="password" name="password" required>
            <label>Confirm Password:</label>
            <input type="password" name="password" required>
            <button type="submit">Register</button>
        </form>
        <br>
        <p class="login-link">Already have an account? <a href="login.php">Login now</a></p>
    </div>
</body>
</html>