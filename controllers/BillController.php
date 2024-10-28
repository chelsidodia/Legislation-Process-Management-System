<?php
require_once 'models/Bill.php';
require_once 'session_helper.php';

class BillController {
    private $bill;

    public function __construct() {
        $this->bill = new Bill();
    }

    public function createBill($title, $description, $author, $draft) {
        $this->bill->addBill([
            'title' => $title,
            'description' => $description,
            'author' => $author,
            'draft' => $draft,
            'status' => 'Pending'
        ]);
        redirectTo('views/bill.php');
    }

    public function editBill($id, $data) {
        $this->bill->updateBill($id, $data);
        redirectTo('views/bill.php');
    }

    public function deleteBill($id) {
        $this->bill->deleteBill($id);
        redirectTo('views/bill.php');
    }

    public function getBills() {
        return $this->bill->getAllBills();
    }

    public function sendForApproval($id) {
        $this->editBill($id, ['status' => 'For Review']);
    }
}
?>
