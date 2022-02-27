<?php

class SendSMS{
    public static function send($destNumber,$message){
        require_once __DIR__.'/vendor/autoload.php'; // include requried files
        // Public key = 'rm0CfahzLuYv0nQ/WJZOMAz3MMyBDcBkspnDpvqTX40=' //in case if we need it
        
        \Telnyx\Telnyx::setApiKey('KEY017DB36C72E430D31C14C6271BEA1F70_cDzySR1p7vm3myVn6A3lxw');
        $your_telnyx_number = '+15732061611';
        $new_message = \Telnyx\Message::Create(['from' => $your_telnyx_number, 'to' => $destNumber, 'text' => $message]);
        
        //check what $new_message returns when it is sent
        return true;
    }

} 

// $data = SendSMS::verifyNumber("+9647709999999");
// echo $data['enCode'];
//For sending a message you need to call the following static method
//SendSMS::send('+9647708138928', 'This is a test Message');











?>