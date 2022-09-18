<?php
$url = eximplode(end($uarr), '_', ' ');
$url = eximplode($url, '-', ' ');
$title = ($url == 'admin')? "Dashboard" : $url;
$title = ucfirst($title);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : "Error" ?></title>
    <base href="<?php echo url::admin;?>">
    <link rel="shortcut icon" type="image/ico" sizes="16x16" href="<?php echo base_url."favicon.ico"; ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--====== stylesheet require ======-->
    <script src="<?php echo base_url; ?>global.js" type="text/javascript"></script>
    <script src="<?php echo aurl::default.'fetch.js'; ?>" type="text/javascript"></script>

    <link rel="stylesheet" href="<?php echo base_url; ?>default.css">
    <link rel="stylesheet" href="<?php echo url::css; ?>post_card.css">
    <link rel="stylesheet" href="<?php echo url::css; ?>post-card-list.css">
    <link rel="stylesheet" href="<?php echo url::admin; ?>css">
</head>

<body>
  <!-- ========= window pannel start ========= -->
    <div class="window">
        <!-- =========== body pannel start =========== -->
        <!-- ========== Top pannel Start =========== -->
        <div class="header"><?php include_once 'header.php'; ?></div>
        <!-- ========== Top pannel end =========== -->
        <div class="main">
            <!-- ========= Navbar start ========= -->
            <div class="navbar"><?php include_once 'navbar.php'; ?></div>
            <!-- ========== Navbar end ========== -->
            <!-- ============= Body pannel start ========= -->
            <div class="body">
