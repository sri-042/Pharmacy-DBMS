<?php
require 'config.php';
require 'vendor/autoload.php';
if (isset($_POST['notify']))
{
    $to_no = "91".$phoneNo;
    $body = "Hi, ".$customerName.",".$medicineName." is back in stock in ".$branchName;

    $messagebird = new MessageBird\Client('E9uBMY0EhhvJbOJOGwSkW5VAn');
    $message = new MessageBird\Objects\Message;
    try{
        $message->originator = '+918746813292';
        $message->recipients = [ $to_no ];
        $message->body =  $body;
        $response = $messagebird->messages->create($message);

    }
    catch(Exception $e){ echo $e;}
}
// session_start();

// $branchID = $_SESSION['branchID'];
// $username = $_SESSION['userName'];

$sql = "SELECT * FROM alert";
$res1 = $mysqli -> query($sql);


if($res1->num_rows >= 1)
{
    while($row = $res1 -> fetch_assoc())
    {
        $medicineID = $row['medicineID'];
       $branchID = $row['branchID'];
    $sql2 = "SELECT userName FROM pending WHERE medicineID = '$medicineID' AND branchID = '$branchID'";
    $res2 = $mysqli -> query($sql2);
    while($row1 = $res2 -> fetch_assoc())
    {
       $username = $row1['userName'];
       
        
       $sql3 = "SELECT * FROM customer WHERE userName = '$username'";
       $res3 = $mysqli -> query($sql3);
       $row3 = $res3 -> fetch_assoc();
       $to_email = $row3['emailID'];
       $phoneNo = $row3['phoneNo'];
       $customerName = $row3['customerName'];

       $to_no = "91".$phoneNo;
       echo $to_no;
        $sql7 = "SELECT branchName FROM branch WHERE branchID = '$branchID'";
        $res7 = $mysqli -> query($sql7);
        $row4 = $res7 -> fetch_assoc();
        $branchName = $row4['branchName'];

        $sql8 = "SELECT medicineName FROM medicine WHERE medicineID = '$medicineID'";
        $res8 = $mysqli -> query($sql8);
        $row5 = $res8 -> fetch_assoc();
        $medicineName = $row5['medicineName'];


       $subject = $medicineName." is back in stock!!!";
       $body = "Hi, ".$customerName.",".$medicineName." is back in stock in ".$branchName;
       $headers = "From: pharmacydb2022@gmail.com";

       if (mail($to_email, $subject, $body, $headers)) {
        echo "Email successfully sent to $to_email...";
        
        $sql6 = "DELETE FROM pending WHERE medicineID = '$medicineID' AND branchID = '$branchID' ";
        $res4 = $mysqli -> query($sql6);
        $sql7 = "DELETE FROM alert WHERE medicineID = '$medicineID' AND branchID = '$branchID' ";
        $res5 = $mysqli -> query($sql7);

        // header("location: employee.php");
    } 
    else {
        echo "Email sending failed...";}
    }
    }
}

?>