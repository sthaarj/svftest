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
                    <h1 class="h3 mb-0 text-gray-800">IELTS Students</h1>
                </div>

            <?php 
                if(isset($_GET,$_GET['sub']) && !empty($_GET['sub'])){
                    $sub = $_GET['sub'];
                    $sql = "SELECT * FROM candidate WHERE sub = '$sub'";
                    $result = mysqli_query($conn,$sql);
                }else {
                    redirect('./','error','Invalid');
                }
            ?>    
            <table class="table table-sm">
                <thead class="table-dark">
                    <tr>
                        <th>S.N.</th>
                        <th>Full Name</th>
                        <th>C. Number</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-stripped table-hover">
                    <?php 
                    $i = 1;
                        if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_assoc($result)){
                                ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $row['cname'] ?></td>
                                        <td><?php echo $row['cnum'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td><?php echo $row['contact'] ?></td>
                                        <td><?php echo $row['status'] ?></td>
                                        <td><img class="img-thumbnail img-fluid" width="200" src="<?php echo 'uploads/category/'.$row['image'] ?>" alt=""></td>
                                        <td><a href="<?php echo $row['sub'] ?>-list.php?id=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                        <a onclick="return confirm('Are you Sure?')" href="process/delete-candidate.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
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