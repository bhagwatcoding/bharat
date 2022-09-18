<?php include_once 'meta.php'; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--======== All Details details ======-->
    <?php

    echo "<title>$title</title>\n";
    $meta->name("robots", 'index, follow');
    $meta->name('description', $desc);
    $meta->name('keywords', $kwd);
    $meta->name('news_keywords', $kwd);
    $meta->name('theme-color', 11);
    echo "    <base href='".base_url."'>\n";
    $meta->link('manifest', 'manifest.json');
    $meta->link('alternate', start_url, "media='x-default'", null);
    $meta->link('canonical', start_url, false, null);

    $meta->apple_touch(16, 18, 'shortcut icon');
    $meta->apple_touch(57, 19, 'apple-touch-icon-precomposed');
    $meta->apple_touch(72, 20);
    $meta->apple_touch(96, 21);
    $meta->apple_touch(114, 22);
    $meta->apple_touch(120, 23);
    $meta->apple_touch(144, 24);
    $meta->apple_touch(192, 25);
    $meta->apple_touch(512, 26);

    $meta->name('google-site-verification', 15);
    $meta->name('author', 3);

    $meta->property('fb:pages', 17);
    $meta->name('language', 'hi');

    $meta->property('og:title', $title);
    $meta->property('og:type', 'website');
    $meta->property('og:url', current_url);
    $meta->property('og:image', $thumbail);
    $meta->property('og:description', $desc);
    $meta->property('og:name', 1);
    $meta->property('og:admin', 1);
    $meta->property('og:site_name', 1);
    $meta->property('og:locale', 'hi_IN');
    $meta->property('og:image:height', 13);
    $meta->property('og:image:width', 14);

    $meta->name('twitter:title', $title);
    $meta->name('twitter:description', $desc);
    $meta->name('twitter:site', 16);
    $meta->name('twitter:image:src', $thumbail);
    $meta->name('twitter:card', 'summary_large_image');
    $meta->name('twitter:creator', 16);
    $meta->name('twitter:url', current_url);

    echo $meta->value(30);
    echo $meta->value(27);
    echo $meta->value(28);

    $meta->link('stylesheet', 'master.css', 'type="text/css"');
    $meta->script('global.js');
    $meta->script('js/model/post.js');
    ?>
</head>
<body class="bg-scroll">
  <?php  echo $meta->value(29); ?>
    <!-- header area Section start-->
    <?php include_once 'header.php'; ?>
    <!-- header area Section end-->
    <!-- header area Section start-->
    <?php include_once 'main.php'; ?>
    <!-- header area Section end-->
