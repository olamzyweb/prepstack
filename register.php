<?php
session_start();
 include 'includes/connection.php';

//  if (isset($_POST['register'])) {

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    $username = test_input($_POST['username']);
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);


if(empty($username)){
  echo "username field empty";
} elseif(empty($email)) {
  echo "Email field empty";
}elseif(empty($password)) {
  echo "Password field empty";
}
else{ 


  // Check if either the username or email already exists
  $query = "SELECT * FROM users WHERE username = ? OR email = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("ss", $username, $email);
  $stmt->execute();
  $result = $stmt->get_result();

  // Check if any records were found for username or email
  if ($result->num_rows > 0) {
      // Fetch the existing record to determine which field is a duplicate
      $existingUser = $result->fetch_assoc();
      if ($existingUser['username'] === $username) {
          echo "Username already exists. Please choose a different one.";
      } elseif ($existingUser['email'] === $email) {
          echo "Email already exists. Please choose a different one.";
      }
  } else {

    
   $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES(?,?,?)");
   $stmt->bind_param("sss", $username, $email, $password);

      if($stmt->execute()){
        echo '<div class="card card-success">user successfully registered</div>';

    
       
      }else{
        echo "An error occurred";
      }
    }
 }
//  }
?>