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
                    <h1 class="h3 mb-0 text-gray-800">IELTS Marks Form</h1>
                </div>
                <?php 
                    if(isset($_GET,$_GET['id']) && !empty($_GET['id'])){
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM candidate WHERE id = '$id'";
                        $result = mysqli_query($conn,$sql);
                        $all_candiate = mysqli_fetch_assoc($result);
                    }
                ?>
                <div class="text-center bg-danger text-white pt-2 pb-2 mt-2 mb-2">
                    <h2>Candidate's Name: <?php echo $all_candiate['cname'] ?></h2>
                    <p>Candidate Number: <?php echo $all_candiate['cnum'] ?></p>
                </div>
                <form action="process/pte.php" class="form" method="post" enctype="multipart/form-data">
                    <div class="row form-group">
                        <div class="col-md-3">Test Date <span class="text-danger">*</span></div>
                        <div class="col-md-9">
                            <input type="date" required name="testdate" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Report Date <span class="text-danger">*</span></div>
                        <div class="col-md-9">
                            <input type="date" required name="reportdate" class="form-control form-control-sm">
                        </div>
                    </div>
                    <p class="text-danger text-center">Communicative Skills</p>
                    <div class="row form-group">
                        <div class="col-md-3">Listening Score <span class="text-danger">*</span></div>
                        <div class="col-md-9">
                            <input type="number" required placeholder="Enter Candidate Email Here.." name="listband" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Reading Score <span class="text-danger">*</span></div>
                        <div class="col-md-9">
                            <input type="number" required placeholder="Enter Candidate Email Here.." name="readband" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Writing Score <span class="text-danger">*</span></div>
                        <div class="col-md-9">
                            <input type="number" required placeholder="Enter Candidate Email Here.." name="writeband" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Speaking Score <span class="text-danger">*</span></div>
                        <div class="col-md-9">
                            <input type="number" required placeholder="Enter Candidate Email Here.." name="speakband" class="form-control form-control-sm">
                        </div>
                    </div>
                    <p class="text-danger text-center">Enabling Skills</p>
                    <div class="row form-group">
                        <div class="col-md-3">Grammar <span class="text-danger">*</span></div>
                        <div class="col-md-9">
                            <input type="number" required placeholder="Enter Candidate Email Here.." name="grammar" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Oral Fluency <span class="text-danger">*</span></div>
                        <div class="col-md-9">
                            <input type="number" required placeholder="Enter Candidate Email Here.." name="oralflu" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Pronunciation <span class="text-danger">*</span></div>
                        <div class="col-md-9">
                            <input type="number" required placeholder="Enter Candidate Email Here.." name="pro" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Vocabulary <span class="text-danger">*</span></div>
                        <div class="col-md-9">
                            <input type="number" required placeholder="Enter Candidate Email Here.." name="vocabulary" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Spelling <span class="text-danger">*</span></div>
                        <div class="col-md-9">
                            <input type="number" required placeholder="Enter Candidate Email Here.." name="spelling" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Written Discourse <span class="text-danger">*</span></div>
                        <div class="col-md-9">
                            <input type="number" required placeholder="Enter Candidate Email Here.." name="writtendis" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Overall PTE Score <span class="text-danger">*</span></div>
                        <div class="col-md-9">
                            <input type="number" required name="score" class="form-control form-control-sm">
                        </div>
                    </div>
                    <p class="text-danger text-center">Enabling Skills</p>
                    <div class="row form-group">
                        <div class="col-md-3">Speaking Accuracy <span class="text-danger">*</span></div>
                        <div class="col-md-9">
                            <input type="radio" name="speacc" value="low"> Low <input type="radio" name="speacc" value="moderate"> Moderate <input type="radio" name="speacc" value="high"> High
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Time Management <span class="text-danger">*</span></div>
                        <div class="col-md-9">
                            <input type="radio" name="timemgmt" value="poor"> Poor <input type="radio" name="timemgmt" value="average"> Average <input type="radio" name="timemgmt" value="excellent"> Excellent
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Microphone Usage <span class="text-danger">*</span></div>
                        <div class="col-md-9">
                            <input type="radio" name="microusa" value="needsimpro"> Needs Improvement <input type="radio" name="microusa" value="good"> Good
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Improvement Recommendation</div>
                        <div class="col-md-9">
                            <textarea name="impr" id="" class="form-control form-control-sm" rows="7" style="resize: none;"></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3 offset-md-3">
                            <input type="hidden" name="cname" value="<?php echo $all_candiate['cname'] ?>">
                            <input type="hidden" name="cnum" value="<?php echo $all_candiate['cnum'] ?>">
                            <input type="hidden" name="dob" value="<?php echo $all_candiate['dob'] ?>">
                            <input type="hidden" name="contact" value="<?php echo $all_candiate['contact'] ?>">
                            <input type="hidden" name="image" value="<?php echo $all_candiate['image'] ?>">
                            <input type="hidden" name="email" value="<?php echo $all_candiate['email'] ?>">
                            <input type="hidden" name="sub" value="<?php echo $all_candiate['sub'] ?>">
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