<?php 
$con = mysqli_connect("localhost","root","","fullstack");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>CRUD OPERATION</title>
  </head>
  <body>
   

        <table class="table">
            <tr>
                <th>Sno</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Action</th>

            </tr>

                <?php 
                    $query = mysqli_query($con,"SELECT * FROM users");
                    
                    if(mysqli_num_rows($query) > 0){
                    $sno = 1;
                        foreach($query as $value){
                        ?>
                        <tr>
                            <td><?php echo $sno ?></td>
                            <td><?php echo $value['name'] ?></td>
                            <td><?php echo $value['email'] ?></td>
                            <td><?php echo $value['address'] ?></td>
                            <td>
                                <button class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteUser_<?php echo $value['id'] ?>">Delete</button>
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editUser_<?php echo $value['id'] ?>">Edit</button>
                            </td>

                        </tr>



                        <!-- Delete Model -->

<div class="modal fade" id="deleteUser_<?php echo $value['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content"> 
        <form method="post">
            <div class="modal-header">
                
                <h5 class="modal-title" id="exampleModalLabel">DELETE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
            <h3>Are You Want To Delete Data?</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="delete" class="btn btn-danger">Delete</button>
            </div>
      </form>
    </div>
  </div>
</div>


<!-- Edit Model -->


<div class="modal fade" id="editUser_<?php echo $value['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content"> 
        <form method="post">
            <div class="modal-header">
                
                <h5 class="modal-title" id="exampleModalLabel">EDIT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                            
                <input type="text" class="form-control mb-3" placeholder="Name" name="name" value="<?php echo $value['name'] ?>">

                 <input type="email" class="form-control mb-3" placeholder="Email" name="email" value="<?php echo $value['email'] ?>">
                 
                  <input type="text" class="form-control mb-3" placeholder="Password" name="password" value="<?php echo $value['password'] ?>">

                   <input type="text" class="form-control mb-3" placeholder="Address" name="address" value="<?php echo $value['address'] ?>">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="update" class="btn btn-success">Update</button>
            </div>
      </form>
    </div>
  </div>
</div>



                        <?php 
                        $sno++;
                    }

                    }else{
                        ?>
                        <tr>
                            <td colspan="5">Data Not Available Yet!</td>
                        </tr>

                        <?php 
                    }
                ?>

        </table>  

        <?php 
            if(isset($_POST['delete'])){
                
                $query = mysqli_query($con,"DELETE FROM users WHERE id = '".$_POST['id']."'");

                if($query){
                    echo "<script>
                        alert('Data Deleted Successfully')
                        location.assign('view.php')
                    </script";
                }
            }


            // Update Code

            if(isset($_POST["update"])){
                
                    echo "<script>
                        alert('Data Updated Successfully')
                        location.assign('view.php')
                    </script";



              // $name = "abc";
                // $name = "Updated";

                // $query = mysqli_query($con,"UPDATE users SET name='".$_POST['name']."',email='".$_POST['email']."',password='".$_POST['password']."',address='".$_POST['address']."' WHERE id = '".$_POST['id']."'");


            //     if($query){


            //         echo "<script>
            //             alert('Data Updated Successfully')
            //             location.assign('view.php')
            //         </script";
            // }

        }

?>

    <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="js/bootstrap.min.js"></script>

   
  </body>
</html>