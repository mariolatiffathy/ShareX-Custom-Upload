<?php
$config = include('u/config.php');

$key = $config['secure_key'];
$uploadhost = $config['output_url'];
$redirect = $config['redirect_url'];
$rand = substr(md5(microtime()),rand(0,26),5);

if ($_SERVER["REQUEST_URI"] == "/robot.txt") { die("User-agent: *\nDisallow: /"); }

if(!isset($_POST['name'])) {
   $_POST['name'] = $rand;
} else {
    $_POST['name'] = $rand;
}

if (isset($_POST['key'])) {
    if ($_POST['key'] == $key) {
        $parts = explode(".", $_FILES["d"]["name"]);
        $target = getcwd() . "/u/" . $_POST['name'] . "." . end($parts);
        if (move_uploaded_file($_FILES['d']['tmp_name'], $target)) {
            $target_parts = explode("/u/", $target);
            //echo $uploadhost . end($target_parts);
            echo $uploadhost . "img.php?i=" . $_POST['name'];
        } else {
            echo "Sorry, there was a problem uploading your file. (Ensure your directory has 777 permissions)";
        }
    } else {
        header('Location: '.$redirect);
    }
} else {
    header('Location: '.$redirect);
}
?>
