<?php
require_once '../config/function.php';
    if(isset($_GET,$_GET['id']) && !empty($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM candidate WHERE id = '$id'";
        $result = mysqli_query($conn,$sql);
        $all_candidate = mysqli_fetch_assoc($result);

        $status = deleteImage($all_candidate['image'],'category');

        if($status){
            $sql1 = "DELETE FROM candidate WHERE id = '$id'";
            $result1 = mysqli_query($conn,$sql1);
            if($result){
                redirect('../','success','Deleted Successfully');
            }else {
                redirect('../','error','Not Deleted');
            }
        }
    }
?>