<?php
require_once 'controllers/AuthController.php';
require_once 'controllers/BillController.php';
require_once 'controllers/VotingController.php';

$authController = new AuthController();
$billController = new BillController();
$votingController = new VotingController();

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'login':
        $authController->login($_POST['username'], $_POST['password']);
        break;
    case 'register':
        $authController->register($_POST['username'], $_POST['password']);
        break;
    case 'create_bill':
        $billController->createBill($_POST['title'], $_POST['description'], $_POST['author'], $_POST['draft']);
        break;
    case 'edit_bill':
        $billController->editBill($_GET['id'], $_POST);
        break;
    case 'delete_bill':
        $billController->deleteBill($_GET['id']);
        break;
    case 'send_for_approval':
        $billController->sendForApproval($_GET['id']);
        break;
    case 'vote_on_bill':
        $votingController->voteOnBill($_POST['bill_id'], $_POST['vote']);
        break;
    default:
        echo "Invalid action.";
        break;
}
?>