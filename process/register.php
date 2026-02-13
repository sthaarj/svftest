<?php 
    require_once '../config/function.php';

    debug($_POST);
    debug($_FILES);

    if(isset($_POST) && !empty($_POST)){
        $cname = sanitize($_POST['cname']);
        $cnum = sanitize($_POST['cnum']);
        $email = sanitize($_POST['email']);
        $dob = sanitize($_POST['dob']);
        $contact = sanitize($_POST['contact']);
        $sub = sanitize($_POST['sub']);
        $status = sanitize($_POST['status']);

        if(isset($_FILES['image']) && $_FILES['image']['error']==0){
            $image_name = uploadImage($_FILES['image'],"category");
        }

        $sql = "INSERT INTO candidate SET cname = '$cname',cnum = '$cnum',email = '$email',dob = '$dob',contact = '$contact',sub = '$sub',status = '$status',image = '$image_name'";

        $result = mysqli_query($conn,$sql);

        if($result){
            redirect('../register.php','success','Form Uploaded Successfully');
        }else {
            redirect('../register.php','error','Form Cannot Be Uploaded');
        }
    }
?>