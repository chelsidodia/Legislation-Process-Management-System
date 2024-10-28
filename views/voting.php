<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote on Bills</title>
    <style>
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        
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

        
        .container {
            width: 100%;
            max-width: 800px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        
        h2 {
            color: #333;
            margin-bottom: 15px;
            text-align: center;
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
        
        <h2>Vote on Bills</h2>

        
        <ul>
            <?php
            $bills = json_decode(file_get_contents('../data/bills.json'), true);
            foreach ($bills as $bill) {
                echo "<li>{$bill['title']} - Status: {$bill['status']}";
                if ($bill['status'] == 'For Review') {
                    echo " <a href='billReview.php?id={$bill['id']}'>Vote Now</a>";
                }
                echo "</li>";
            }
            ?>
        </ul>
    </div>

</body>
</html>
