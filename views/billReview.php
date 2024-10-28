<?php
require_once '../session_helper.php';
$username = getSessionUsername();

// Fetch the bill ID from the URL and retrieve bill data
$billId = $_GET['id'];
$bills = json_decode(file_get_contents('../data/bills.json'), true);
$votes = json_decode(file_get_contents('../data/votes.json'), true);
$bill = null;

foreach ($bills as $b) {
    if ($b['id'] == $billId) {
        $bill = $b;
        break;
    }
}

if (!$bill) {
    echo "Bill not found.";
    exit;
}

// Handle voting
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $voteOption = $_POST['vote_option'];

    $newVote = [
        'bill_id' => $billId,
        'username' => $username,
        'vote' => $voteOption
    ];

    $votes[] = $newVote;
    file_put_contents('../data/votes.json', json_encode($votes));
    echo "Your vote has been recorded!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Review</title>
    <style>
        /* Use same style as voting.php */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
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
            text-align: center;
            color: #642f2f;
        }

        .bill-details {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            font-size: 16px;
        }

        .vote-options {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        button {
            padding: 10px 20px;
            background-color: #642f2f;
            color: #fff;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #5b2929;
        }

    </style>
</head>
<body>

<div class="container">
    <h2>Review Bill - <?php echo htmlspecialchars($bill['title']); ?></h2>

    <div class="bill-details">
        <p><strong>Description:</strong> <?php echo htmlspecialchars($bill['description']); ?></p>
        <p><strong>Author:</strong> <?php echo htmlspecialchars($bill['author']); ?></p>
        <p><strong>Status:</strong> <?php echo htmlspecialchars($bill['status']); ?></p>
    </div>

    <form method="POST">
        <label>Select your vote:</label>
        <div class="vote-options">
            <button type="submit" name="vote_option" value="In Favor">In Favor</button>
            <button type="submit" name="vote_option" value="Against">Against</button>
            <button type="submit" name="vote_option" value="Abstain">Abstain</button>
        </div>
    </form>
</div>

</body>
</html>
