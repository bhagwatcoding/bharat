<?php head::con('.xml'); ?>
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
  <url>
    <loc><?php echo start_url; ?></loc>
    <changefreq>hourly</changefreq>
    <priority>1.00</priority>
  </url>
  <?php
      foreach ($post->fetch('page') as list('ename' => $ename)):
        if (empty($ename)) { continue; }
  ?>
  <url>
    <loc><?php echo start_url.$ename;?></loc>
		<changefreq>hourly</changefreq>
    <priority>0.80</priority>
  </url>
  <?php endforeach;?>
</urlset>
