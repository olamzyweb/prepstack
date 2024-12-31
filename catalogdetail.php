<?php session_start();
include 'includes/connection.php';
$fileid=@$_GET['fileid'];
 
if($fileid == ""){
    echo "<script>alert('Access Denied to this page Or page missing')</script>";
    header('location:catalog.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Past Questions Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="assets/css/style.css">
    <style>

        body{
            background-image: url('images/bg.jpg');
        }
        .question-card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .card-title {
            color: #2c3e50;
        }
        .btn-custom {
            background-color: #f39c12;
            color: white;
        }
    </style>
</head>
<body>
    <div id="loading">
        <div class="spinner"></div>
     </div>
  <!-- Navigation -->
 <?php include 'includes/navbar.php';?>


 <?php 


$query = "SELECT * FROM files WHERE file_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $fileid);
$stmt->execute();
$result = $stmt->get_result();
 

 if(empty($result)){
    header('location: catalog.php');
    echo "<script>alert('not found');</script>";
    
 } 

 while ($row=mysqli_fetch_assoc($result)) {
    $file_name = $row['file_name'];
    $file_category = $row['file_category'];
    $file_code = $row['file_code'];
    $amount = $row['amount'];
    $file_url = $row['file_url'];
    $status = $row['is_paid'];
 }
 
 
 $username = $_SESSION['username'];
 $email = $_SESSION['email']; 
 
 ?>

  <div class="container px-5 my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 rounded-3 shadow-lg">
                <div class="card-body p-4">
                    <div class="text-center">
                        <div class="h1 fw-light">Past question Detail</div>
                            <p class="mb-4 text-muted">File name : <?php echo @$file_name;?></p>
                            <p class="mb-4 text-muted">File description : <?php echo @$file_category;?></p>
                            <p class="mb-4 text-muted">File amount (in naira) : <?php echo @$file_code;?></p>
                            <p class="mb-4 text-muted">File amount (in naira) : <?php echo @$amount;?></p>
                            <p class="mb-4 text-muted">File size : unavailable</p>


                            <form id="paymentform">
    <input type="text" value="<?php echo @$email;?>" id="email" hidden>
    <input type="text" value="<?php echo @$username;?>" id="username" hidden>
<input type="text" value="<?php echo @$file_name;?>" id="filename" hidden>
<input type="text" value="<?php echo @$file_category;?>" id="filecategory" hidden>
<input type="text" value="<?php echo @$file_code;?>" id="filecode" hidden>
<input type="text" value="<?php echo @$amount;?>" id="amount" hidden>
<input type="text" value="<?php echo @$file_url;?>" id="fileurl" hidden>
<input type="text" value="<?php echo @$fileid;?>" id="fileid" hidden>


<?php 
if(@$status == "1"){
    echo '<button type="button" onclick="payWithPaystack()"  class="btn btn-custom">Buy</button>';
}elseif(@$status == "0"){
    echo '<button type="button" onclick="download()"  class="btn btn-custom">Download</button>';
}else{
    echo 'Something went Wrong';
}
?>

                            
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
  
    </div>

    
    <script>

function payWithPaystack(){
  

  let handler = PaystackPop.setup({
    key: 'pk_test_b7d97f5bd5a42fedff6dd0caa52d7d806f152c53', // Replace with your public key
    email: document.getElementById("email").value,
    amount: document.getElementById("amount").value * 100,
    // currency:"USD",
    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function(){
        window.location = "catalog.php?transaction=cancel";
      alert('Window closed.');
    },
    callback: function(response){

        const email = document.getElementById("email").value;
        const username = document.getElementById("username").value;
    const filename = document.getElementById("filename").value;
    const fileurl = document.getElementById("fileurl").value;
    const filecode = document.getElementById("filecode").value;
    const amount = document.getElementById("amount").value;
    const fileid = document.getElementById("fileid").value;

    const verifyUrl = `verify_transaction.php?reference=${response.reference}&email=${encodeURIComponent(email)}&filename=${encodeURIComponent(filename)}&filecategory=${encodeURIComponent(filecategory)}&filecode=${encodeURIComponent(filecode)}&amount=${encodeURIComponent(amount)}&username=${encodeURIComponent(username)}&fileurl=${encodeURIComponent(fileurl)}&fileid=${encodeURIComponent(fileid)}`;

      let message = 'Payment complete! Reference: ' + response.reference;
      alert(message);
   window.location = verifyUrl;
    }
  });
 handler.openIframe();
}

function download(){
    const fileurl2 = document.getElementById("fileurl").value;
    window.location.href = 'file/' + fileurl2 //

} 

</script>
<?php include 'includes/footer.php';?>
    <script src="assets/js/script.js">
        
    </script>
    <script src="https://js.paystack.co/v1/inline.js"></script>

</body>
</html>
