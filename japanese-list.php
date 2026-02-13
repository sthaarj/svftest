<?php require_once 'inc/header.php';
require_once 'config/function.php';
?>

<!-- Page Wrapper -->
<div id="wrapper">

    <?php require_once 'inc/sidebar.php' ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <?php require_once 'inc/topbar.php' ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <?php flash() ?>
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Japanese Students</h1>
                </div>
            <?php 
                if(isset($_GET,$_GET['id']) && !empty($_GET['id'])){
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM candidate WHERE id = '$id'";
                    $result = mysqli_query($conn,$sql);
                    $all_candidate = mysqli_fetch_assoc($result);
                    $cnum = $all_candidate['cnum'];
                    $sql1 = "SELECT * FROM japanese WHERE cnum = '$cnum' ORDER BY testdate DESC";
                    $result1 = mysqli_query($conn,$sql1);
                }else {
                    redirect('./','error','Invalid');
                }
            ?>
            <div class="d-flex justify-content-end mb-4">
                <a href="japanese-form.php?id=<?php echo $all_candidate['id'] ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add Marks</a>
            </div> 
            <table class="table table-sm">
                <thead class="table-dark">
                    <tr>
                        <th>S.N.</th>
                        <th>Exam Date</th>
                        <th>Report Date</th>
                        <th>Overall PTE Score</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-stripped table-hover">
                    <?php 
                    $i = 1;
                        if(mysqli_num_rows($result1)>0){
                            while($row = mysqli_fetch_assoc($result1)){
                                ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $row['testdate'] ?></td>
                                        <td><?php echo $row['reportdate'] ?></td>
                                        <td><?php echo $row['score'] ?></td>
                                        <td><a href="japanese.php?id=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                        <a onclick="return confirm('Are you Sure?')" href="process/delete-ielts.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                <?php
                                $i++;
                            }
                        }
                    ?>
                </tbody>
            </table>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <?php require_once 'inc/footer.php' ?>