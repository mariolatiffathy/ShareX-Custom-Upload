<?php
$config = include('u/config.php');
if(!isset($_GET['i']) || empty($_GET['i'])) { die("The image field is required."); }
?>
<html>
<head>
<meta property="og:title" content="Screenshot" />
<meta property="og:image" content="<?php echo $config['output_url'] . $_GET['i']; ?>" />
</head>
</html>
