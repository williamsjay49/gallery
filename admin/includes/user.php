<?php 

class User extends Db_object {

	protected static $db_table = "users";
	protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name');
	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;





	// verify username and password
	public static function verify_user($username, $password) {
		global $database;

		$username = $database->escape_string($username);
		$password = $database->escape_string($password);

		$sql = "SELECT * FROM users WHERE username = '$username' && password = '$password'"; 

		$result = self::find_by_query($sql);

		return !empty($result) ? array_shift($result) : false;
	}





}



	
?>