<?php session_start();
$ref = $_SESSION['reference'];
$filename = $_SESSION['fname'];
$fileurl = $_SESSION['furl'];

if(empty($ref)){
    // header("location:javascript://history.go(-1)");
    header("location:accessdenied.php");
    exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Past Questions </title>
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
        .btn {
            width: 100px;
            font-size: 15px;
        }
    </style>
</head>
<body>
    <div id="loading">
        <div class="spinner"></div>
     </div>
  <!-- Navigation -->
 <?php include 'includes/navbar.php';?>


 


  <div class="container px-5 my-5">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="card border-0 rounded-3 shadow-lg">
        <div class="card-body p-4">
            <h2>Downloading</h2>
          <div class="text-center">
           Kindly be patient, your download will start now. 
           <ul>
            <li>File name : <?php echo $filename;?></li>
            <li>File name : <?php echo $ref;?></li>
           </ul>
           This might take a while.   <br><div class="spinner-grow text-warning"></div>&nbsp;&nbsp;&nbsp;<div class="spinner-grow text-warning"></div>&nbsp;&nbsp;&nbsp;<div class="spinner-grow text-warning"></div>
  
  <p>Download does not start automaticlly? Click <a href="<?php echo "file/".$fileurl;?>">here</a> </p>
  
        </div> 
        
        
        
        <!-- </div> -->
    </div>
    
<script>
    document.addEventListener("DOMContentLoaded", function() {

        setTimeout(function() {
                window.location.href = "download.php"; // This PHP file will handle the download
            }, 2000); // Adjust delay as needed

    });
</script>


    <script src="assets/js/script.js">
        
    </script>
</body>
</html>
