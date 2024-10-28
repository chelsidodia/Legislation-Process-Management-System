<?php
require_once '../session_helper.php';
$username = getSessionUsername();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Legislation System Dashboard</title>
    <style>
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        
        body {
            display: flex;
            min-height: 100vh;
            background-color: #f4f4f9;
            color: #333;
        }

        
        .sidebar {
            width: 250px;
            background: linear-gradient(180deg, black,#642f2f);
            color: #fff;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            position: fixed;
            height: 100%;
        }

        
        .sidebar h1 {
            font-size: 22px;
            margin-bottom: 30px;
            text-align: center;
        }

        
        .user-section {
            text-align: center;
            margin: 40px auto;
        }

        .user-image {
            width: 60px;
            height: 60px;
            margin: 0px auto;
            border-radius: 50%;
            display: block;
            background-image: url("../images/image2.png");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .user-name {
            display:block;
            margin-top: 10px;
            font-size: 16px;
        }

        .user-tag {
            background-color: #fff;
            color: #333;
            padding: 2px 8px;
            font-size: 12px;
            border-radius: 12px;
            margin-top: 5px;
            display: inline-block;
        }

        
        .nav-links {
            width: 100%;
            list-style: none;
            text-align: center;
        }

        .nav-links li {
            margin: 15px 0;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            padding: 10px 20px;
            display: block;
            border-radius: 8px;
            transition: background 0.3s;
        }

        .nav-links a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        
        .logout-btn {
            margin-top: auto;
            color: #fff;
            background-color: transparent;
            border: none;
            font-size: 16px;
            cursor: pointer;
        }

        
        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
        }

        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            color: #fff;
            padding: 20px;
            border-radius: 8px;
        }

        .header h2 {
            font-size: 20px;
        }

        .header .notification-icon {
            font-size: 20px;
            cursor: pointer;
            position: relative;
        }

        .notif-dropdown {
            display: none;
            position: absolute;
            top: 30px;
            right: 0;
            padding: 5%;
            background-color: #fff;
            color: #333;
            width: 200px;
            height: 200px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 4px;
            z-index: 1;
        }

        .noti-li{
            display: block;
            padding: 1%;
            margin: 3%;
            background-color: #e0cfcf;
        }

        .notification-icon:hover .notif-dropdown {
            display: block;
        }

        
        .dashboard-widgets {
            margin-top: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .widget {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            width: calc(50% - 20px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .widget h3 {
            margin-bottom: 10px;
            font-size: 18px;
        }

        
        body {
            
        }

        .widget-1{
            background-image: url("../images/image1.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            width: 70%;
            height: 400px;
            color: white;
            text-align: center;
            text-shadow: 1px 1px 5px black;
            padding-top: 14%;
            font-size: 17px;
        }

        .widget-2{
            width: 20%;
        }

    </style>
</head>
<body>

    
    <div class="sidebar">
        <h1>Legislation System</h1>
        
        
        <div class="user-section">
            <div class="user-image"></div> 
            <div class="user-name"><?php echo htmlspecialchars($username); ?></div>
            <div class="user-tag">Administrator</div>
    
        </div>

        
        <ul class="nav-links">
            <li><a href="bill.php">Manage Bills</a></li>
            <li><a href="voting.php">Vote on Bills</a></li>
        </ul>
        
        
        <button class="logout-btn">Log out</button>
    </div>

    
    <div class="main-content">
        
        <div class="header">
            <h2>Welcome back, <?php echo htmlspecialchars($username); ?>!</h2>
            <div class="notification-icon">
                🔔 
                <div class="notif-dropdown">
                <ul>
                    <?php
                    $bills = json_decode(file_get_contents('../data/bills.json'), true);
                    $votes = json_decode(file_get_contents('../data/votes.json'), true);

                    foreach ($bills as $bill) {
                        if ($bill['status'] == 'For Review') {
                            echo "<li class='noti-li'>Bill '{$bill['title']}' is awaiting review.</li>";
                        }
                    }

                    foreach ($votes as $vote) {
                        echo "<li class='noti-li'>Vote on bill ID {$vote['bill_id']} by {$vote['username']} - {$vote['vote']}</li>";
                    }
                    ?>
                </ul>
                </div>
            </div>
        </div>

        
         <br>
        <p>Take a look on what's happening!</p>

        
        <div class="dashboard-widgets">
            <div class="widget widget-1">
                <h2>Legislation System</h2>
                <p>As noticed, the newly created bills will be available in Manage Bills. You can manage votes as follows.</p>
            </div>
            <div class="widget widget-2">
                <h3>The tasks are under</h3>
                <p>Manage Bills</p>
                <p>Votes are now started</p>
            </div>
        </div>
    </div>

</body>
</html>
