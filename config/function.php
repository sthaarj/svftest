<?php
session_start();
define('UPLOAD_DIR', $_SERVER['DOCUMENT_ROOT'] . '/system/uploads/');
define('ALLOWED_EXTENSION', array('jpg', 'png', 'gif', 'bmp'));

$host = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'system';

$conn = mysqli_connect($host,$dbuser,$dbpass,$dbname);

function debug($data, $is_true = false)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";

    if ($is_true) {
        exit;
    }
}

function setSession($key, $msg)
{
    if (!isset($_SESSION)) {
        session_start();
    }
    $_SESSION[$key] = $msg;
}

function redirect($path, $key = null, $msg = null)
{
    if ($key != null) {
        setSession($key, $msg);
    }
    header("Location: " . $path);
    exit;
}

function flash()
{
    if (isset($_SESSION, $_SESSION['warning']) && !empty($_SESSION['warning'])) {
        echo "<p class='alert alert-warning'>" . $_SESSION['warning'] . "</p>";
        unset($_SESSION['warning']);
    }

    if (isset($_SESSION, $_SESSION['success']) && !empty($_SESSION['success'])) {
        echo "<p class='alert alert-success'>" . $_SESSION['success'] . "</p>";
        unset($_SESSION['success']);
    }

    if (isset($_SESSION, $_SESSION['error']) && !empty($_SESSION['error'])) {
        echo "<p class='alert alert-danger'>" . $_SESSION['error'] . "</p>";
        unset($_SESSION['error']);
    }
}
function sanitize($str)
{
    $str = strip_tags($str);
    $str = rtrim($str);
    return $str;
}

function uploadImage($file, $dir)
{
    if ($file['error'] == 0) {
        if ($file['size'] <= 5000000) {
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            if (in_array(strtolower($ext), ALLOWED_EXTENSION)) {
                $path = UPLOAD_DIR . $dir;
                if (!is_dir($path)) {
                    mkdir($path, 0777, true);
                }

                //Category-2025080394515123.jpg
                $file_name = ucfirst($dir) . "-" . date("Ymdhis") . rand(0, 999) . "." . $ext;
                $success = move_uploaded_file($file['tmp_name'], $path . '/' . $file_name);
                if ($success) {
                    return $file_name;
                } else {
                    return 0;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function deleteImage($image_name,$dir){
    if($image_name != null){
        $path = UPLOAD_DIR.$dir.'/'.$image_name;

        if(file_exists($path)){
            $status = unlink($path);
            return $status;
        }else {
            return false;
        }
    }else {
        return false;
    }
}
