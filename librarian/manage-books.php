<?php require_once 'header.php'; ?>
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                <li><a href="javascript: avoid(0)">Manage Books</a></li>
            </ul>
        </div>
    </div>
  
      <div class="row animated fadeInUp">
      <div class="col-sm-12">
        <h4 class="section-subtitle"><b>Books</b></h4>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Book Name</th>
                            <th>Book Image</th>
                            <th>Author Name</th>
                            <th>Publication Name</th>
                            <th>Purchase Date</th>
                            <th>Book Price</th>
                            <th>Book Quantity</th>
                            <th>Available Quantity</th>                                  
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                                $sql = "SELECT * FROM `books` ";
                                $result = mysqli_query($conn,$sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>

                        <tr>
                            <td><?php echo $row['book_name']; ?></td>
                            <td><img style="width: 50px;" src="../images/books/<?php echo $row['book_image']; ?>" alt=""></td>
                            <td><?php echo $row['book_author_name']; ?></td>
                            <td><?php echo $row['book_publication_name']; ?></td>
                            <td><?php echo date('d-M-Y', strtotime($row['book_purchase_date'])); ?></td>
                            <td><?php echo $row['book_price']; ?></td>
                            <td><?php echo $row['book_qty']; ?></td>
                            <td><?php echo $row['available_qty']; ?></td>
                            <td>
                                <a href="javascript:avoid(0)" class="btn btn-info" data-toggle="modal" data-target="#book-<?php echo $row['id']?>"><i class="fa fa-eye"></i></a>
                                <a href="" class="btn btn-warning" data-toggle="modal" data-target="#book-update-<?php echo $row['id']?>"><i class="fa fa-pencil"></i></a>
                                <a href="delete.php?bookdelete=<?= base64_encode($row['id']) ?>" class="btn btn-danger" onclick="return confirm('Are You Sure to Delete!')"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>

                <?php
                    }

                ?>
 
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>





         
    <?php
    $sql = "SELECT * FROM `books` ";
    $result = mysqli_query($conn,$sql);

    while ($row = mysqli_fetch_assoc($result)) {
       
    ?>

<!-- Modal -->
<div class="modal fade" id="book-<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header state modal-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i> Book Info</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                        <tr>
                            <th>Book Name</th>
                            <td><?php echo $row['book_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Book Image</th>
                           <td><img style="width: 50px;" src="../images/books/<?php echo $row['book_image']; ?>" alt=""></td>
                        </tr>
                        <tr>
                            <th>Author Name</th>
                           <td><?php echo $row['book_author_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Publication Name</th>
                             <td><?php echo $row['book_publication_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Purchase Date</th>
                            <td><?php echo date('d-M-Y', strtotime($row['book_purchase_date'])); ?></td>
                        </tr>
                        <tr>
                            <th>Book Price</th>
                             <td><?php echo $row['book_price']; ?></td>
                        </tr>
                        <tr>
                            <th>Book Quantity</th>
                            <td><?php echo $row['book_qty']; ?></td>
                        </tr><tr>
                            <th>Available Quantity</th>
                            <td><?php echo $row['available_qty']; ?></td>
                        </tr>
                </table>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

    <?php
        }

    ?>







<?php
    $sql = "SELECT * FROM `books` ";
    $result = mysqli_query($conn,$sql);

    while ($row = mysqli_fetch_assoc($result)) {

        $id = $row['id'];
        $book_info = mysqli_query($conn, "SELECT * FROM `books` WHERE `id`='$id'");
        $book_info_row = mysqli_fetch_assoc($book_info);
       
    ?>

<!-- Modal -->
<div class="modal fade" id="book-update-<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header state modal-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Update Book Info</h4>
            </div>
            <div class="modal-body">


<div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" action="">
                          

                          <div class="form-group">
                                <label for="book_name">Book Name</label>
                                    <input type="text" class="form-control" name="book_name" id="book_name" placeholder="Book Name" value="<?= $book_info_row['book_name']?>" required>
                                    <input type="hidden" class="form-control" name="id"  value="<?= $book_info_row['id']?>" required>
                            </div>
                               <div class="form-group">
                                <label for="book_author_name">Author Name</label>
                                    <input type="text" class="form-control" name="book_author_name" id="book_author_name" placeholder="Book Author Name" value="<?= $book_info_row['book_author_name']?>" required>
                                </div>
                            <div class="form-group">
                                <label for="book_publication_name" >Book Publication Name</label>
                             
                                    <input type="text" class="form-control" name="book_publication_name" id="book_publication_name" placeholder="Book Publication Name" value="<?= $book_info_row['book_publication_name']?>" required>
                                                                   
                            </div>
                             <div class="form-group">
                                <label for="book_purchase_date" >Purchase Date</label>
                               
                                    <input type="date" class="form-control" name="book_purchase_date" id="book_purchase_date" placeholder="Book Purchase Date" value="<?= $book_info_row['book_purchase_date']?>" required>
                                                                      
                            </div>
                            <div class="form-group">
                                <label for="book_price" >Book Price</label>
                             
                                    <input type="number" class="form-control" name="book_price" id="book_price" placeholder="Book Price" value="<?= $book_info_row['book_price']?>" required>
                                                              
                            </div>
                            <div class="form-group">
                                <label for="book_qty" >Book Quantity</label>
                                
                                    <input type="number" class="form-control" name="book_qty" id="book_qty" placeholder="Book Quantity" value="<?= $book_info_row['book_qty']?>" required>
                                                                    
                            </div>
                             <div class="form-group">
                                <label for="available_qty" >Available Quantity</label>
                               
                                    <input type="number" class="form-control" name="available_qty" id="available_qty" placeholder="Available Quantity" value="<?= $book_info_row['available_qty']?>" required>
                                                                      
                            </div>
                            <div class="form-group">
                                <button type="submit" name="update_book" class="btn btn-primary"><i class="fa fa-save"></i>Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
                
                
            </div>
        </div>
    </div>
</div>

         <?php

            }



    if (isset($_POST['update_book'])) {
   $id = $_POST['id'];
   $book_name = $_POST['book_name'];
   $book_author_name = $_POST['book_author_name'];
   $book_publication_name = $_POST['book_publication_name'];
   $book_purchase_date = $_POST['book_purchase_date'];
   $book_price = $_POST['book_price'];
   $book_qty = $_POST['book_qty'];
   $available_qty = $_POST['available_qty'];
   $libraian_username = $_SESSION['libraian_username'];



$sql = "UPDATE `books` SET `book_name`='$book_name',`book_author_name`='$book_author_name',`book_publication_name`='$book_publication_name',`book_purchase_date`='$book_purchase_date',`book_price`='$book_price',`book_qty`='$book_qty',`available_qty`='$available_qty',`libraian_username`='$libraian_username' WHERE `id`= '$id'";
    $result = mysqli_query($conn,$sql);

     if ($result) {
        ?>
        <script type="text/javascript">
            alert("Book Update Successfully!");
            javascript:history.go(-1);
        </script>
        <?php
         
     }else{

         ?>
        <script type="text/javascript">
            alert("Book not Update!");
        </script>


        <?php

     }

 

}

   ?>




                
 <?php require_once 'footer.php'; ?>