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
                        $myFile = $_FILES[$filesBrowse];
                        $fileCount = count($myFile["name"]);
                        for ($i = 0; $i < $fileCount; $i++) {
                                try {
                                        $target_file = $target_dir . basename($myFile["name"][$i]);
                                        $query = "INSERT INTO falcon.email_attachment (`email_id` , `url`) VALUES (`$email_id` , ` $target_file`) ";
                                        $execute = new Execute($query, 'execute');
                                } catch (\Throwable $th) {
                                        return false ;
                                }
                        }
                }

                return true;
        }


        public function sendEmail()
        {
                try {
                        $query = "INSERT INTO falcon.email_history(`from_email` , `destination` , `header` , `body`) VALUES (`$this->from` , ` $this->destination` , `$this->header` , `$this->body`); ";
                        $query .= "SELECT LAST_INSERT_ID()";
                        $execute = new Execute($query, 'execute');
                        $email_id = $execute;

                        try {
                                $this->uploadAttachment($this->filesBrowse, $email_id);
                        } catch (\Throwable $th) {
                                $query = "DELETE FROM falcon.email_history WHERE id = `$email_id`";
                                return false;
                        }
                        return true;
                } catch (\Throwable $th) {
                        return false;
                }
        }
}
