<?php
class Bill {
    private $file = 'data/bills.json';

    public function __construct() {
        if (!file_exists($this->file)) {
            file_put_contents($this->file, json_encode([]));
        }
    }

    public function getAllBills() {
        return json_decode(file_get_contents($this->file), true);
    }

    public function addBill($data) {
        $bills = $this->getAllBills();
        $data['id'] = uniqid();
        $bills[] = $data;
        file_put_contents($this->file, json_encode($bills));
    }

    public function updateBill($id, $data) {
        $bills = $this->getAllBills();
        foreach ($bills as &$bill) {
            if ($bill['id'] == $id) {
                $bill = array_merge($bill, $data);
                break;
            }
        }
        file_put_contents($this->file, json_encode($bills));
    }

    public function deleteBill($id) {
        $bills = $this->getAllBills();
        $bills = array_filter($bills, fn($bill) => $bill['id'] != $id);
        file_put_contents($this->file, json_encode($bills));
    }
}
?>
