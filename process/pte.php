<?php 
    require_once '../config/function.php';

    debug($_POST);
    debug($_FILES);

    if(isset($_POST) && !empty($_POST)){
        $testdate = sanitize($_POST['testdate']);
        $reportdate = sanitize($_POST['reportdate']);
        $listband = sanitize($_POST['listband']);
        $readband = sanitize($_POST['readband']);
        $writeband = sanitize($_POST['writeband']);
        $speakband = sanitize($_POST['speakband']);
        $grammar = sanitize($_POST['grammar']);
        $oralflu = sanitize($_POST['oralflu']);
        $pro = sanitize($_POST['pro']);
        $vocabulary = sanitize($_POST['vocabulary']);
        $spelling = sanitize($_POST['spelling']);
        $writtendis = sanitize($_POST['writtendis']);
        $score = sanitize($_POST['score']);
        $speacc = sanitize($_POST['speacc']);
        $timemgmt = sanitize($_POST['timemgmt']);
        $microusa = sanitize($_POST['microusa']);
        $impr = sanitize($_POST['impr']);
        $cname = sanitize($_POST['cname']);
        $cnum = sanitize($_POST['cnum']);
        $dob = sanitize($_POST['dob']);
        $contact = sanitize($_POST['contact']);
        $image = sanitize($_POST['image']);
        $email = sanitize($_POST['email']);
        $sub = sanitize($_POST['sub']);

        $sql = "INSERT INTO pte SET testdate = '$testdate',reportdate = '$reportdate',listband = '$listband',readband = '$readband',writeband = '$writeband',speakband = '$speakband',grammar = '$grammar',oralflu = '$oralflu', pro = '$pro', vocabulary = '$vocabulary', spelling = '$spelling', writtendis = '$writtendis', score = '$score', speacc = '$speacc', timemgmt = '$timemgmt', microusa = '$microusa', impr = '$impr', cname = '$cname',cnum = '$cnum', dob = '$dob', contact = '$contact', image = '$image', email = '$email', sub = '$sub'";

        $result = mysqli_query($conn,$sql);

        if($result){
            redirect('../','success','Form Uploaded Successfully');
        }else {
            redirect('../','error','Form Cannot Be Uploaded');
        }
    }
?>