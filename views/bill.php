<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Bills</title>
    <style>
        /* Reset styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Body styling */
        body {
            background-color: #f4f4f9;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            background-image: url("../images/image1.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* Container for main content */
        .container {
            width: 100%;
            max-width: 800px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        /* Header styling */
        h2, h3 {
            color: #333;
            margin-bottom: 15px;
            text-align: center;
        }

        /* Form styling */
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            font-size: 16px;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            color: #333;
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        /* Button styling */
        button[type="submit"] {
            padding: 10px 20px;
            background-color: #642f2f;
            color: #fff;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #5b2929;
        }

        /* Existing Bills section */
        h3 {
            margin-top: 20px;
        }

        ul {
            list-style-type: none;
            padding-left: 0;
        }

        ul li {
            background-color: #fafafa;
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        ul li a {
            margin-left: 10px;
            color: #642f2f;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            transition: color 0.3s;
        }

        ul li a:hover {
            color: #333;
        }

    </style>
</head>
<body>

    <div class="container">
        <!-- Page Title -->
        <h2>Bill Management</h2>

        <!-- Create Bill Form -->
        <form method="POST" action="../routes.php?action=create_bill">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required>

            <label for="description">Description:</label>
            <input type="text" name="description" id="description" required>

            <label for="author">Author:</label>
            <input type="text" name="author" id="author" required>

            <label for="draft">Initial Draft:</label>
            <textarea name="draft" id="draft" required></textarea>

            <button type="submit">Create Bill</button>
        </form>

        <!-- Existing Bills Section -->
        <h3>Existing Bills</h3>
        <ul>
            <?php
            $bills = json_decode(file_get_contents('../data/bills.json'), true);
            foreach ($bills as $bill) {
                echo "<li>{$bill['title']} - Status: {$bill['status']}";
                echo " <a href='../routes.php?action=edit_bill&id={$bill['id']}'>Edit</a>";
                echo " <a href='../routes.php?action=delete_bill&id={$bill['id']}'>Delete</a>";
                echo " <a href='../routes.php?action=send_for_approval&id={$bill['id']}'>Send for Approval</a></li>";
            }
            ?>
        </ul>
    </div>

</body>
</html>