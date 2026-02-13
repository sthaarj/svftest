<?php 
    require_once '../config/function.php';

    debug($_POST);
    debug($_FILES);

    if(isset($_POST) && !empty($_POST)){
        $mode = sanitize($_POST['mode']);
        $testdate = sanitize($_POST['testdate']);
        $reportdate = sanitize($_POST['reportdate']);
        $listband = sanitize($_POST['listband']);
        $listremarks = sanitize($_POST['listremarks']);
        $readband = sanitize($_POST['readband']);
        $readremarks = sanitize($_POST['readremarks']);
        $writeband = sanitize($_POST['writeband']);
        $writeremarks = sanitize($_POST['writeremarks']);
        $speakband = sanitize($_POST['speakband']);
        $speakremarks = sanitize($_POST['speakremarks']);
        $score = sanitize($_POST['score']);
        $wasta = sanitize($_POST['wasta']);
        $wascc = sanitize($_POST['wascc']);
        $waslr = sanitize($_POST['waslr']);
        $wasgra = sanitize($_POST['wasgra']);
        $wascmt = sanitize($_POST['wascmt']);
        $sasfc = sanitize($_POST['sasfc']);
        $saslr = sanitize($_POST['saslr']);
        $sasg = sanitize($_POST['sasg']);
        $sasp = sanitize($_POST['sasp']);
        $sascmt = sanitize($_POST['sascmt']);
        $impr = sanitize($_POST['impr']);
        $cname = sanitize($_POST['cname']);
        $cnum = sanitize($_POST['cnum']);
        $dob = sanitize($_POST['dob']);
        $contact = sanitize($_POST['contact']);
        $image = sanitize($_POST['image']);
        $email = sanitize($_POST['email']);
        $sub = sanitize($_POST['sub']);

        $sql = "INSERT INTO ielts SET mode = '$mode',testdate = '$testdate',reportdate = '$reportdate',listband = '$listband',listremarks = '$listremarks',readband = '$readband',readremarks = '$readremarks',writeband = '$writeband',writeremarks = '$readremarks',speakband = '$speakband',speakremarks = '$speakremarks',score = '$score', wasta = '$wasta', wascc = '$wascc', waslr = '$waslr', wasgra = '$wasgra', wascmt = '$wascmt', sasfc = '$sasfc', saslr = '$saslr', sasg = '$sasg', sasp = '$sasp', sascmt = '$sascmt', impr = '$impr', cname = '$cname',cnum = '$cnum', dob = '$dob', contact = '$contact', image = '$image', email = '$email', sub = '$sub'";

        $result = mysqli_query($conn,$sql);

        if($result){
            redirect('../','success','Form Uploaded Successfully');
        }else {
            redirect('../','error','Form Cannot Be Uploaded');
        }
    }
?>