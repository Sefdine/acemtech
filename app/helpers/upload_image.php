<?php

function upload_image($input_name, $data, $view, $dest_path){

    if(isset($_FILES[$input_name]) && $_FILES[$input_name]["error"] == 0) {
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES[$input_name]["name"];
        $filetype = $_FILES[$input_name]["type"];
        $filesize = $_FILES[$input_name]["size"];

        // Verify file extension
        $maxsize = 2 * 1024 * 1024;
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($extension, $allowed)) {
            return 'file_format_error';
            //die("Error: Please select a valid file format.");
        } // Verify file size - 5MB maximum
        else if ($filesize > $maxsize) {
            return 'file_size_error';
            die("Error: File size is larger than the allowed limit.");
        } // Verify MYME type of the file
        else if (in_array($filetype, $allowed)) {
            // Check whether file exists before uploading it
            if (file_exists(SITE_ROOT . DIRECTORY_SEPARATOR . $dest_path . DIRECTORY_SEPARATOR . $filename)) {
                return 'file_exist_error';

            } else {
                if (move_uploaded_file($_FILES[$input_name]["tmp_name"], SITE_ROOT . DIRECTORY_SEPARATOR . $dest_path . DIRECTORY_SEPARATOR . $filename)) {
                    $random_string = sha1(bin2hex($filename));
                    $newname = $random_string . "." . $extension;
                    rename(SITE_ROOT . DIRECTORY_SEPARATOR . $dest_path . DIRECTORY_SEPARATOR . $filename, SITE_ROOT . DIRECTORY_SEPARATOR . $dest_path . DIRECTORY_SEPARATOR . $newname);
                    define('FILENAME', $newname);
                    //$data['filename'] = $newname;
                    //$data['user_id'] = $_SESSION['user_id'];
                    return 'true';
                }
                else {
                    return 'file_upload_error';
                }
            }
        }
    } else {
        return 'file_input_error';
    }
}