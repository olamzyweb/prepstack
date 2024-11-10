


                                <?php 

                                    include '../includes/connection.php';

                                    $query = "SELECT * FROM files";
                                    $sql = mysqli_query($conn, $query);


                                    if ($sql) {
                                        while ($row = mysqli_fetch_assoc($sql)) {
                                            echo '<tr>
                                        <td>'.$row['file_name'].'</td>
                                        <td>'.$row['file_category'].'</td>
                                        <td>'.$row['file_url'].'</td>
                                        <td>'.$row['file_code'].'</td>
                                        <td>'.$row['amount'].'</td>
                                        <td><button class="btn btn-warning">Update</button> <button class="btn btn-danger">Delete</button></td>
                                       
                                   </tr>';
                                        }
                                    }

                                    ?>
                                   
                           