<?php
 session_start();

$ref = $_GET['reference'];
$username = $_GET['username'];
$filename = $_GET['filename'];
$fileurl = $_GET['fileurl'];
$amount = $_GET['amount'];
$fileid = $_GET['fileid'];
if($ref == ""){
header("location:javascript://history.go(-1)");


}
?>

<?php
$curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/" .rawurlencode($ref),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer Put your secret key here",
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    // echo $response;
    $result = json_decode($response);
// echo $response;
// print_r($result);

  
  
  if($result->data->status == 'success'){
$status = $result->data->status;
$reference = $result->data->reference;
// $amount = $result->data->amount;
$furl = $fileurl;
$fname = $filename;
$fullname = $username;
$cus_email = $result->data->customer->email;
date_default_timezone_set('Africa/Lagos');
$date_time = date('Y.m.d h:i:sa', time());
  
include ('includes/connection.php');


// $stmt =$conn
// ->prepare("INSERT INTO paystack (status, reference, lname, fname, fullname, email, date) VALUES (?,?,?,?,?,?,?)");
// $stmt->bind_param("sssssss", $status, $reference, $lname, $fname, $fullname, $cus_email, $date_time);
// $stmt->execute();
// if ($stmt->error){
//   echo 'There was a problem on yuor code'. mysqli_error($conn);
// }
// else {
// header("location: success.php?status=success");
// exit;
// }
// $stmt->close();


 $query = "INSERT INTO transactions (status,transaction_id,file_name,file_url,file_id,username,email,amount,date) VALUES ('$status','$reference','$fname','$furl','$fileid','$fullname','$cus_email','$amount','$date_time')";
 $merge = mysqli_query($conn,$query);

 if(!$merge){
    echo "<script>alert('an error occured while inserting')</script>";
 }
 else {
  echo "<script>alert('order successfully updated in database')</script>";
  $_SESSION['reference'] = $reference;
  $_SESSION['fname'] = $filename;
  $_SESSION['furl'] = $fileurl;

   header("location: success.php");
 }


}
  else {
      header("location: error.php");
exit;  
}
}
?>
