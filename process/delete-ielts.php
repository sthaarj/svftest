<?php
require_once '../config/function.php';
if (isset($_GET, $_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sub = $_GET['sub'];
    $sql1 = "DELETE FROM $sub WHERE id = '$id'";
    $result1 = mysqli_query($conn, $sql1);
    if($result1) {
        redirect('../', 'success', 'Deleted Successfully');
    } else {
        redirect('../', 'error', 'Not Deleted');
    }
}
