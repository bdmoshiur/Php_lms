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
<h4 class="section-subtitle"><b>Return Books</b></h4>
<div class="panel">
    <div class="panel-content">
        <div class="table-responsive">
            <table id="basic-table" class="table-bordered data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Roll</th>
                    <th>Phone</th>
                    <th>Book Name</th>
                    <th>Book Issue Date</th>
                    <th>Return Book</th>
                </tr>
                </thead>
                <tbody>
					
			<?php
				$sql = "SELECT `issue_books`.`id`,`issue_books`.`book_id`,`issue_books`.`book_issue_date`,`students`.`fname`,`students`.`lname`,`students`.`roll`,`students`.`phone`,`books`.`book_name`,`books`.`book_image`
                FROM `issue_books`
                INNER JOIN `students` ON `students`.`id` = `issue_books`.`student_id`
                INNER JOIN `books` ON `books`.`id`= `issue_books`.`book_id`
                WHERE `issue_books`.`book_return_date`= '' ";

				$result = mysqli_query($conn,$sql);
				while ($row = mysqli_fetch_assoc($result)) {
			?>
                <tr>
                    <td><?php echo ucwords($row['fname']. ' ' .$row['lname']); ?></td>
                    <td><?php echo $row['roll']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['book_name']; ?></td>
                    <td><?php echo $row['book_issue_date']; ?></td>
                    <td><a href="return-book.php?id=<?= base64_encode($row['id']) ?>&bookid=<?=base64_encode($row['book_id']) ?>">Return book</a></td>
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

if (isset($_GET['id'])) {
    $id = base64_decode($_GET['id']);
    $bookid = base64_decode($_GET['bookid']);
    $date = date('d-m-y');

    $result = mysqli_query($conn, "UPDATE `issue_books` SET `book_return_date`='$date' WHERE `id`='$id'");
    if ($result) {
         mysqli_query($conn,"UPDATE `books` SET `available_qty`=`available_qty`+1 WHERE `id`='$bookid'");
        ?>
        <script type="text/javascript">
            alert("Book Return Successfully!");
            javascript:history.go(-1);
        </script>
        <?php

    }else{
         ?>
        <script type="text/javascript">
            alert("Something Wrong!");
        </script>
        <?php

    }
}


?>


<?php require_once 'footer.php'; ?>