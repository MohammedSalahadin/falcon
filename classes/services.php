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
    
    public static function uploadImage($name){
        $target_dir = "../uploads/";
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

}

// echo Services::generateRandomString();











?>