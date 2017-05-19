<?php
function upload_image($file,$fileArrayName) {
	$upload_ok = true;
	
	$target_dir = "uploads/";
	$target_file= $target_dir.basename($_FILES[$fileArrayName]['name']);
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			$upload_ok = false;
			$imgName = 'bad';
		}
	
	if ($upload_ok == true) {

		if (move_uploaded_file($_FILES[$fileArrayName]["tmp_name"], $target_file)) {
			return basename( $_FILES[$fileArrayName]["name"]);
		} else {
			return $upload_ok;
		}
	}else {
		return $upload_ok;
	}
}
//http://www.w3schools.com/php/php_file_upload.asp
?> 