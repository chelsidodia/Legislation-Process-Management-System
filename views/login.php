<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }


        html{
            background-image: url("../images/image1.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .login-box {
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

        .register-link {
            margin-top: 10px;
            display: block;
            font-size: 14px;
        }

        .register-link a {
            color: #0066cc;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Login</h2>
        <form method="POST" action="../routes.php?action=login">
            <label>Username:</label>
            <input type="text" name="username" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <p class="register-link">Do not have an account? <a href="registration.php">Register now</a></p>
            <button type="submit">Login</button>
        </form>
        
    </div>
</body>
</html>
