<?php
require_once 'db.php';




class Email
{

        private $from;
        private $destination;
        private $header;
        private $body;
        private $filesBrowse;


        


        public function setEmail($form, $destination, $header, $body, $filesBrowse)
        {
                $this->from = $form;
                $this->destination = $destination;
                $this->header = $header;
                $this->body = $body;
                $this->filesBrowse = $filesBrowse;
        }

        private function uploadAttachment($filesBrowse, $email_id)
        {
                $target_dir = "uploads/";

                if (isset($_FILES[$filesBrowse])) {
                        $myFiles = $_FILES[$filesBrowse];
                        $fileCount = count($myFiles["name"]);
                        for ($i = 0; $i < $fileCount; $i++) {
                                try {
                                        $target_file = $target_dir . basename($myFiles["name"][$i] . $email_id);
                                        $query = "INSERT INTO falcon.email_attachment (`email_id` , `url`) VALUES (`$email_id` , ` $target_file`) ";
                                        $execute = new Execute($query, 'execute');
                                } catch (\Throwable $th) {
                                        echo('there is an error in addAtachment');
                                        return false ;
                                }
                        }
                }

                return true;
        }


        private function storeEmail()
        {

                try {
                        $query = "INSERT INTO `falcon`.`email_history` (`from_email`, `destination`, `header` , `body`) VALUES ('$this->from' , ' $this->destination' , '$this->header','$this->body'); ";
                        $query .= "SELECT LAST_INSERT_ID();";
                        $execute = new Execute($query, 'multiQuery');
                        $email_id = $execute->result["0"]["LAST_INSERT_ID()"];
                        print_r($email_id);
                        if ($this->uploadAttachment($this->filesBrowse, $email_id)) {
                                return true;
                        } else { 
                                echo('there is an error in in if statment');
                                $query = "DELETE FROM falcon.email_history WHERE id = `$email_id`";
                                return false;
                        }
                        return true;

                } catch (\Throwable $th) {
                        echo('there is an error in sendEmail' . $th);
                        return false;
                }
        }

        public function sendEmail(){

                if($this->storeEmail()) {


                }

        }

        


}
// public function setEmail($form, $destination, $header, $body, $filesBrowse)

//test
// $test = new Email; 
// $test->setEmail("m@m.com" , "x@x.com"  , "title" , "body" , "" );
// $result =  $test->sendEmail();


