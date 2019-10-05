<?php require_once 'header.php'; ?>

 				<!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                            <li><a href="#">books</a></li>
                        </ul>
                    </div>
                </div>
              
                <div class="row animated fadeInUp">
                    <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-content">
                                <form action="" method="POST">
                                    <div class="row pt-md">
                                        <div class="form-group col-sm-9 col-lg-10">
                                                <span class="input-with-icon">
                                            <input type="text" name="result" class="form-control" id="lefticon" placeholder="Search">
                                            <i class="fa fa-search"></i>
                                        </span>
                                        </div>
                                        <div class="form-group col-sm-3  col-lg-2 ">
                                            <button type="submit" name="books" class="btn btn-primary btn-block">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <?php
                    if (isset($_POST['books'])) {
                        $result = $_POST['result'];
                        ?>
                        <div class="col-sm-12">
                       <div class="panel">
                           <div class="panel-content">
                            <div class="row">
                                <?php
                                $result = mysqli_query($conn, "SELECT * FROM `books` WHERE `book_name` LIKE '%$result%'");
                                $temp = mysqli_num_rows($result);

                                if ($temp > 0) {
                                    ?>
                                    <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <div class="col-sm-3 col-md-2">
                                    <img style="width: 100%; height:100px;" src="../images/books/<?= $row['book_image']?>" alt="">
                                    <p><?= $row['book_name']?></p>
                                    <span><b>Available :<?= $row['available_qty']?></b></span>
                                </div>
                                <?php
                                }
                                ?>

                                 <?php   
                                }else{
                                    echo "<h2>Boocks Not Found !</h2>";
                                }
                                ?>

                           </div>
                           </div>
                       </div>
                   </div>

                        <?php
                    }else{
                        ?>
                        <div class="col-sm-12">
                       <div class="panel">
                           <div class="panel-content">
                            <div class="row">
                                <?php
                                $result = mysqli_query($conn, "SELECT * FROM `books`");
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <div class="col-sm-3 col-md-2">
                                    <img style="width: 100%; height:100px;" src="../images/books/<?= $row['book_image']?>" alt="">
                                    <p><?= $row['book_name']?></p>
                                    <span><b>Available :<?= $row['available_qty']?></b></span>
                                </div>
                                <?php
                                }
                                ?>
                           </div>
                           </div>
                       </div>
                   </div>
                   <?php
                 }
                    ?>
                   
                </div>


 <?php require_once 'footer.php'; ?>