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
    </style>
</head>
<body>
    <div id="loading">
        <div class="spinner"></div>
     </div>
  <!-- Navigation -->
  <?php include 'includes/navbar2.php';?>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Available Past Questions</h2>
        <div class="row">
          



<!-- 
            <div class="col-md-4">
                <div class="card question-card">
                    <div class="card-body">
                        <h5 class="card-title">Math 101</h5>
                        <p class="card-text">Past question for Math 101 (Year: 2022).</p>
                        <a href="checkout.html" class="btn btn-custom">Buy Now</a>
                    </div>
                </div>
            </div> -->
        
        <?php  
        include 'includes/connection.php';


        $query = "SELECT * FROM files";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        $records = $result->fetch_all(MYSQLI_ASSOC);
        
        foreach ($records as $record) {
            echo '
            <div class="col-md-4">
                <div class="card question-card">
                    <div class="card-body">
                        <h5 class="card-title">'.$record['file_name'].'</h5>
                        <p class="card-text">'.$record['file_category'].'</p>
                         <p class="card-text">Past question for : '.$record['file_code'].'</p>
                          <p class="card-text">N'.$record['amount'].'</p>
                        <a href="catalogdetail.php?fileid='.$record['file_id'].'" class="btn btn-custom">Buy Now</a>
                    </div>
                </div>
            </div>';
        }
        
        
        
        
        
        
        
        ?>
        
        </div>
    </div>
    <?php include 'includes/footer.php';?>
    <script src="assets/js/script.js">
        
    </script>
</body>
</html>
