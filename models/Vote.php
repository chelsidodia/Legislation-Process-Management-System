<?php
class Vote {
    private $file = 'data/votes.json';

    public function __construct() {
        if (!file_exists($this->file)) {
            file_put_contents($this->file, json_encode([]));
        }
    }

    public function addVote($billId, $username, $vote) {
        $votes = json_decode(file_get_contents($this->file), true);
        $votes[] = [
            'bill_id' => $billId,
            'username' => $username,
            'vote' => $vote
        ];
        file_put_contents($this->file, json_encode($votes));
    }
}
?>
