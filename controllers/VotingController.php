<?php
require_once 'models/Vote.php';
require_once 'session_helper.php';

class VotingController {
    private $vote;

    public function __construct() {
        $this->vote = new Vote();
    }

    public function voteOnBill($billId, $voteChoice) {
        $username = getSessionUsername();
        if ($username) {
            $this->vote->addVote($billId, $username, $voteChoice);
            redirectTo('views/dashboard.php');
        } else {
            echo "Please log in to vote.";
        }
    }

    public function getVotes() {
        return json_decode(file_get_contents('data/votes.json'), true);
    }
}
?>
