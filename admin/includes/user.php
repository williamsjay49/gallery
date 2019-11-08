<?php 

class User extends Db_object {

	protected static $db_table = "users";
	protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name', 'user_image');
	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;
	public $user_image;
	public $upload_directory = 'images';
	public $image_placeholder = 'http://placehold.it/400x400&text=image';

	public function image_path_and_placeholder() {
		return empty($this->user_image) ? $image_placeholder : $this->upload_directory. DS . $this->user_image;
	}





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