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
                    <h1 class="h3 mb-0 text-gray-800">Student Add Form</h1>
                </div>

                <form action="process/register.php" class="form" method="post" enctype="multipart/form-data">
                    <div class="row form-group">
                        <div class="col-md-3">Candidate's Name <span class="text-danger">*</span></div>
                        <div class="col-md-9">
                            <input type="text" required placeholder="Enter Student's Name Here.." name="cname" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Candidate Number <span class="text-danger">*</span></div>
                        <div class="col-md-9">
                            <input type="text" required placeholder="Enter Candidate Number Here.." name="cnum" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Candidate's Email <span class="text-danger">*</span></div>
                        <div class="col-md-9">
                            <input type="email" required placeholder="Enter Candidate Email Here.." name="email" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Date of Birth <span class="text-danger">*</span></div>
                        <div class="col-md-9">
                            <input type="date" required name="dob" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Contact Number <span class="text-danger">*</span></div>
                        <div class="col-md-9">
                            <input type="number" required placeholder="Enter Student's Contact Number Here.." name="contact" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Subject <span class="text-danger">*</span></div>
                        <div class="col-md-9">
                            <select name="sub" required id="" class="form-control form-control-sm">
                                <option value="ielts">IELTS</option>
                                <option value="pte">PTE</option>
                                <option value="japanese">Japanese</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Status <span class="text-danger">*</span></div>
                        <div class="col-md-9">
                            <select name="status" required id="" class="form-control form-control-sm">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Candidate's Image <span class="text-danger">*</span></div>
                        <div class="col-md-9">
                            <input type="file" required name="image" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3 offset-md-3">
                            <button class="btn btn-success"><i class="fa fa-check"></i> Submit</button>
                            <button class="btn btn-danger"><i class="fa fa-multiply"></i> Reset</button>
                        </div>
                    </div>
                </form>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <?php require_once 'inc/footer.php' ?>