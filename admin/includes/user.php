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



	public function set_files($file) {

		if(empty($file) || !$file || !is_array($file)) {
			$this->errors[] = "There was no file uploaded here";

			return false;
		} elseif($file['error'] != 0) {
			$this->errors[] = $this->upload_errors_array[$file['error']];
			return false;
		} else {

			$this->user_image = basename($file['name']);
			$this->temp_path = $file['tmp_name'];
			$this->type = $file['type'];
			$this->size = $file['size'];
		}

	}

	public function upload_photo() {
	
		if(!empty($this->errors)) {
			return false;
		}

		if(empty($this->user_image) || empty($this->temp_path)) {
			$this->errors[] = "This file is not available";
			return false;
		}

		$target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_image;

		if(file_exists($target_path)) {
			$this->errors[] = "This file {$this->user_image} already exist";
			return false;
		}

		if(move_uploaded_file($this->temp_path, $target_path)) {

				unset($this->temp_path);
				return true;
		} else {
			$this->errors[] = "the file directory probably doesn't have permission";
			return false;
		}
		
	}


	public function image_path_and_placeholder() {
		return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory. DS . $this->user_image;
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