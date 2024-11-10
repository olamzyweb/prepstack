<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Past Questions Catalog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-xL/SVVUR6o3gxFQKJzEsF3s8TpM+f+qIpy9d9fslKn92h1+8aRwoWgJ7RhWYLR+FrhpPCwbIkOM8f5XupEQKfw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../assets/css/style.css">
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
    <!-- <div id="loading">
        <div class="spinner"></div>
     </div> -->
  <!-- Navigation -->
 <?php 
//  include '../includes/navbar.php';
 ?>



 <?php 
 include '../includes/connection.php';

 if (isset($_POST['submit'])) {

 $fileid = $_POST['fileid']; 
$filename = $_POST['file_name'];
$filecategory = $_POST['file_category'];
$filecode = $_POST['file_code'];
$amount = $_POST['amount'];


 
 




$target_dir = "../file/";
$target_filename = basename($_FILES["filetoupload"]["name"]);
$target_file = $target_dir . basename($_FILES["filetoupload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["filetoupload"]["size"] > 20000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "zip"
&& $imageFileType != "pdf" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["filetoupload"]["tmp_name"], $target_file)) {
        echo "<script>alert('The file ". basename( $_FILES["filetoupload"]["name"]). " has been uploaded.')</script>";
    } else {
        echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
    }
}


// $fileurl = $target_file;
$file_path = mysqli_real_escape_string($conn, $target_filename);




$query = "INSERT INTO files (file_id,file_name,file_category,file_code,amount,file_url) VALUES('$fileid','$filename','$filecategory','$filecode','$amount','$file_path')";
$sql = mysqli_query($conn, $query);


if($sql){
  echo "<script>alert('succesfully inserted')</script>";
  header('location:index.html?status=successful');
} else{
  echo "<script>alert('not succesfully inserted')</script>";
}



 }
 

 ?>

  <div class="container px-5 my-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card border-0 rounded-3 shadow-lg">
        <div class="card-body p-4">
          <div class="text-center">
          <a href="index.php"><img width="30" height="30" src="https://img.icons8.com/windows/32/circled-left.png" alt="circled-left"/></a>
            <div class="h1 fw-light">Past question Detail</div>
            <form id="add_file" name="add_file" action="add_file.php" method="post" enctype="multipart/form-data">

<!-- filename Input -->
<div class="form-floating mb-3">
  <input class="form-control" id="fileid" type="text" name="fileid" placeholder="" value="<?php echo(rand(100,10000));?>" data-sb-validations="required"  readonly required />
  <label for="name">Fileid</label>
  <div class="invalid-feedback" data-sb-feedback="name:required">Fileid is required.</div>
</div>


<!-- filename Input -->
<div class="form-floating mb-3">
  <input class="form-control" id="name" type="text" name="file_name" placeholder="FileName" data-sb-validations="required" required />
  <label for="name">FileName</label>
  <div class="invalid-feedback" data-sb-feedback="name:required">FileName is required.</div>
</div>

<!-- filecategory Input -->
<div class="form-floating mb-3">
  <input class="form-control" id="name" type="text" name="file_category" placeholder="FileName" data-sb-validations="required" required/>
  <label for="file_category">File category</label>
  <div class="invalid-feedback" data-sb-feedback="name:required">File Category is required.</div>
</div>

<!-- Amount Input -->
<div class="form-floating mb-3">
  <input class="form-control" id="Amount" type="number" name="amount" placeholder="Amount" data-sb-validations="required" required/>
  <label for="Amount">Amount</label>
  <div class="invalid-feedback" data-sb-feedback="name:required">Price/Amount is required.</div>
</div>

<!-- file code/course code -->
<div class="form-floating mb-3">
  <input class="form-control" id="course_code" type="text" name="file_code" placeholder="File/course code" data-sb-validations="required" required/>
  <label for="cousre_code">course_code</label>
  <div class="invalid-feedback" data-sb-feedback="name:required">File/Course code is required.</div>
</div>



<!-- upload file -->
<div class="form-floating mb-3">
  <input class="form-control" id="filetoupload" name="filetoupload" type="file" placeholder="FileName" data-sb-validations="required" required/>
  <label for="file">File</label>
  <div class="invalid-feedback" data-sb-feedback="name:required">File is required.</div>
</div>




<!-- Submit button -->
<div class="d-grid">
  <button class="btn btn-primary btn-lg" id="submitButton" name="submit" type="submit">Submit</button>
</div>
</form>
          </div>
            
        
        
        
        <!-- </div> -->
    </div>

    <script src="../assets/js/script.js">
        
    </script>
</body>
</html>
