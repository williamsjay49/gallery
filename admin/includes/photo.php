<?php 

class Photo extends Db_object {

	protected static $db_table = "photos";
	protected static $db_table_fields = array('id', 'title', 'caption', 'description', 'filename', 'alternate_text', 'type', 'size');
	public $id;
	public $title;
	public $description;
	public $filename;
	public $type;
	public $size;
	public $caption;
	public $alternate_text;

	public $temp_path;
	public $upload_directory = "images";
	public $errors = array();
	public $upload_errors_array = array(

		UPLOAD_ERR_OK => "There is no error",
		UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filesize directive in php.ini",
		UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
		UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded",
		UPLOAD_ERR_NO_FILE => "No file was uploaded",
		UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder",
		UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk",
		UPLOAD_ERR_EXTENSION => "File upload stopped by extension"
	);

	public function set_files($file) {

		if(empty($file) || !$file || !is_array($file)) {
			$this->errors[] = "There was no file uploaded here";

			return false;
		} elseif($file['error'] != 0) {
			$this->errors[] = $this->upload_errors_array[$file['error']];
			return false;
		} else {

			$this->filename = basename($file['name']);
			$this->temp_path = $file['tmp_name'];
			$this->type = $file['type'];
			$this->size = $file['size'];
		}

	}

	public function picture_path() {
		return $this->upload_directory. DS. $this->filename;
	}

	public function save() {
		if($this->id) {
			$this->update();

		} else {
			if(!empty($this->errors)) {
				return false;
			}

			if(empty($this->filename) || empty($this->temp_path)) {
				$this->errors[] = "This file is not available";
				return false;
			}

			$target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->filename;

			if(file_exists($target_path)) {
				$this->errors[] = "This file {$this->filename} already exist";
				return false;
			}

			if(move_uploaded_file($this->temp_path, $target_path)) {
				if($this->create()) {

					unset($this->temp_path);
					return true;
				}
			} else {
				$this->errors[] = "the file directory probably doesn't have permission";
				return false;
			}
		}

	}

	public function delete_photo() {
		
		if($this->delete()) {
			$target_path = SITE_ROOT . 'admin' . DS . $this->picture_path(); 

			return unlink($target_path) ? true : false;
		} else {
			return false;
		}

	}

}

?>
