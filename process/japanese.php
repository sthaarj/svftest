<?php 
    require_once '../config/function.php';

    debug($_POST);
    debug($_FILES);

    if(isset($_POST) && !empty($_POST)){
        $level = sanitize($_POST['level']);
        $testdate = sanitize($_POST['testdate']);
        $reportdate = sanitize($_POST['reportdate']);
        $vocabulary = sanitize($_POST['vocabulary']);
        $grammar = sanitize($_POST['grammar']);
        $reading = sanitize($_POST['reading']);
        $listening = sanitize($_POST['listening']);
        $score = sanitize($_POST['score']);
        $resultstatus = sanitize($_POST['resultstatus']);
        $examremarks = sanitize($_POST['examremarks']);
        $studyrecom = sanitize($_POST['studyrecom']);
        $cname = sanitize($_POST['cname']);
        $cnum = sanitize($_POST['cnum']);
        $dob = sanitize($_POST['dob']);
        $contact = sanitize($_POST['contact']);
        $image = sanitize($_POST['image']);
        $email = sanitize($_POST['email']);
        $sub = sanitize($_POST['sub']);

        $sql = "INSERT INTO japanese SET level = '$level',testdate = '$testdate',reportdate = '$reportdate',vocabulary = '$vocabulary',grammar = '$grammar',reading = '$reading',listening = '$listening',score = '$score',resultstatus = '$resultstatus', examremarks = '$examremarks', studyrecom = '$studyrecom', cname = '$cname',cnum = '$cnum', dob = '$dob', contact = '$contact', image = '$image', email = '$email', sub = '$sub'";

        $result = mysqli_query($conn,$sql);

        if($result){
            redirect('../','success','Form Uploaded Successfully');
        }else {
            redirect('../','error','Form Cannot Be Uploaded');
        }
    }
?>