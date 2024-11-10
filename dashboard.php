<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Past Questions Catalog</title>
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
        button a{
        color: white;
        text-decoration: none;
        }
    </style>
</head>
<body>
    <div id="loading">
        <div class="spinner"></div>
     </div>
  <!-- Navigation -->
 <?php include 'includes/navbar.php';
  $usernam = $_SESSION['username'];
 ?>

  <div class="container px-5 my-5">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="card border-0 rounded-3 shadow-lg">
        <div class="card-body p-4">
            <h2>Transactions</h2>
          <div class="text-center">
            <div class="table-responsive">
                
          <table class="table">
    <thead>
      <tr>
        <th>TransactionId</th>
        <th>Filename</th>
        <th>Amount</th>
        <th>Date</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

    <?php 
    include 'includes/connection.php';


$query = "SELECT * FROM transactions WHERE username='$usernam'";
$sql = mysqli_query($conn, $query);

while ($row= mysqli_fetch_assoc($sql)) {
  
?>



      <tr>
        <td><?php echo $row['transaction_id'];?></td>
        <td><?php echo $row['file_name'];?></td>
        <td><?php echo $row['amount'];?></td>
        <td><?php echo $row['date'];?></td>
        <td><button type="button" class="btn btn-<?php echo $row['status'];?>"><?php echo $row['status'];?></button></td>
        <td><button type="button" class="btn btn-warning">&nbsp<a href="<?php echo "file/".$row['file_url'];?>">Download</a></button></td>
      </tr>
<?php
    }
    
    ?>
      <!-- <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
        <td>2024-03-16</td>
        <td><button type="button" class="btn btn-success">Completed</button></td>
        <td><button type="button" class="btn btn-warning">&nbspVerify</button></td>
      </tr>  -->
    </tbody>
  </table>
  </div> 
        
        
        
        <!-- </div> -->
    </div>

   

    <script src="assets/js/script.js">
        
    </script>
</body>
<?php include 'includes/footer.php';?>
</html>
