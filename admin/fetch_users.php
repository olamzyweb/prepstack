<?php 
include '../includes/connection.php';

$query = "SELECT * FROM users";
$sql = mysqli_query($conn, $query);

if($sql){
    while ($row = mysqli_fetch_assoc($sql)) {
        echo '<tr><td>'.$row['username'].'</td>
              <td>'.$row['email'].'</td></tr>';
    }
} else {
    echo 'NO RECORDS FOUND';
}

?>