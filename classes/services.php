<?php

class Services{
    public static function inputInjectionFilter($var){
        //some filterations
        return $var;

    }

    public static function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    // This function will return the uploaded file path. it returns false if the file isn't uploaded
    //Uploaded images will be in upload directory, if path is added they will be stored inside that path
    // When calling this function provide the name of the file input in the form and everthing else will be
    // Automaticly setted, 
    public static function uploadImage($name, $path = ''){
        $target_dir = Services::backRootPath()."uploads/".$path;
        $target_file = $target_dir . basename($_FILES[$name]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES[$name]["tmp_name"]);
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                return false;
                $uploadOk = 0;
            } else {
                // Check file size
                if ($_FILES[$name]["size"] > 20000000) {
                    echo "Sorry, your file is larger than 20 mb.";
                    return false;
                    $uploadOk = 0;
                } else {
                    // Allow certain file formats
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif" ) {
                        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        return false;
                        $uploadOk = 0;
                    }
                    else {
                        $uploadOk = 1;
                        if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
                            //echo "The file ". htmlspecialchars( basename( $_FILES[$name]["name"])). " has been uploaded.";
                            return $target_file;
                          } else {
                            return false;
                          }
                    }
                    
                }
            }
            
        } else {
            echo "File is not an image.";
            return false;
            $uploadOk = 0;
        }
    }

    //this function returns number of steps ../ to go back to the root directory works for windows.
    public static function backRootPath(){
        $currentPath = getcwd(); // get current path
        $CPArray = explode('\\', $currentPath); //split it into an array
        $cut1 = array_slice($CPArray, 3); // remove c:/xampp/htdocs, last 3 steps
        foreach ($cut1 as $key => $value) { $cut1[$key] = "..";} //replace path with ..
        $path = implode("/", $cut1)."/";
        return $path;
    }

    //delete folder and it's contents
    public static function deleteDir($dirPath) {
        if (! is_dir($dirPath)) {
            //throw new InvalidArgumentException("$dirPath must be a directory");
            return false;
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    }
    //delete specific file
    public static function deleteFile($filePath){
        if (empty($filePath)) {
            echo "empty path";return false;
        }
        if (!unlink($filePath)) { 
             return false;
        } 
        else { 
            return true; //file removed!
        } 
    }

}

// echo Services::generateRandomString();
