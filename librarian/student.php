 <?php require_once 'header.php'; ?>

 				<!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                            <li><a href="javascript: avoid(0)">Students</a></li>
                        </ul>
                    </div>
                </div>
              
                <div class="row animated fadeInUp">
                  <div class="col-sm-12">
                    <div class="pull-left"><h4 class="section-subtitle"><b>All Students</b></h4></div>
                    <div><a href="print-all-students.php" class="btn btn-primary pull-right"><i class="fa fa-print"></i>Print</a></div>
                    <div class="clearfix"></div>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>SI</th>
                                        <th>Name</th>
                                        <th>Roll</th>
                                        <th>Reg.No</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Phone</th>
                                        <th>Image</th>
                                        <th>Stataus</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
										
										<?php
											$sql = "SELECT * FROM `students` ";
											$result = mysqli_query($conn,$sql);
											$i = 0;
											while ($row = mysqli_fetch_assoc($result)) {
											$i ++;		
										?>

                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo ucwords($row['fname']. ' ' .$row['lname']); ?></td>
                                        <td><?php echo $row['roll']; ?></td>
                                        <td><?php echo $row['reg']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['phone']; ?></td>
                                        <td><img src="<?php echo $row['image']; ?>" alt=""></td>
                                        <td><?php echo $row['status'] == 1 ? 'Active' : 'Inactive'; ?></td>
                                        <td>

                                        	<?php
                                        		if ($row['status'] == 1) {
                                        	?>
										<a class="btn btn-primary" href="status-inactive.php?id=<?php echo base64_encode($row['id']); ?>"><i class="fa fa-arrow-up"></i></a>

                                        		<?php

                                        		}else{

                                        		?>

										<a class="btn btn-warning" href="status-active.php?id=<?php echo base64_encode($row['id']); ?>"><i class="fa fa-arrow-down"></i></a>

											<?php
                                        		}
                                        	?>

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


 <?php require_once 'footer.php'; ?>