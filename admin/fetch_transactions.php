<?php
include '../includes/connection.php';

$query = "SELECT * FROM transactions";
$sql = mysqli_query($conn, $query);

if ($sql) {
    while ($row = mysqli_fetch_assoc($sql)) {
        echo ' <tr>
                                            <td>'.$row['username'].'</td>
                                            <td>'.$row['email'].'</td>
                                            <td>'.$row['file_name'].'</td>
                                            <td>'.$row['amount'].'</td>
                                            <td>'.$row['file_url'].'</td>
                                            <td>'.$row['file_id'].'</td>
                                            <td>'.$row['transaction_id'].'</td>
                                            <td>'.$row['date'].'</td>
                                            <td>'.$row['status'].'</td>
                                            
                                            <td><button class="btn btn-warning">Update</button><button class="btn btn-danger">Delete</button></td>
                                        </tr>';
    }
}else {
    echo 'NO RECORDS FOUND';
}




?>