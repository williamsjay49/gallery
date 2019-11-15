<?php 

class Session {

	private $signed_in = false;
	public $user_id;
	public $count;

	function __construct() {
		session_start();
		$this->check_the_login();
		$this->visitor_count();
	}

	// getter function
	public function is_signed_in() {
		return $this->signed_in;
	}

	// log in the user
	public function login($user) {
		if($user) {
			$this->user_id = $_SESSION['user_id'] = $user->id;
			$this->signed_in = true;
		}
	}

	// logout the user
	public function logout () {
		unset($_SESSION['user_id']);
		unset($this->user_id);
		$this->signed_in = false;
	}

	public function visitor_count() {

		if(isset($_SESSION['count'])) {
			return $this->count = $_SESSION['count']++;
		} else {
			return $_SESSION['count'] = 1;
		}
	}

	private function check_the_login() {
		if(isset($_SESSION['user_id'])) {
			$this->user_id = $_SESSION['user_id'];
			$this->signed_in = true;
		} else {

			unset($this->user_id);
			$this->signed_in = false;
		}
	}
}


$session = new Session();
?>