composer require messagebird/php-rest-api
<?php
require_once '/vendor/autoload.php';
if (isset($_POST['notify']))
{
    $to_no = "91".$phoneNo;
    $body = "Hi, ".$customerName.",".$medicineName." is back in stock in ".$branchName;

    $messagebird = new MessageBird\Client('DTjiWieetrkxR2dog70VB7AXc]');
    $message = new MessageBird\Objects\Message;
    $message->originator = '+918746813292';
    $message->recipients = [ $to_no ];
    $message->body =  $body;
    $response = $messagebird->messages->create($message);

}
?>