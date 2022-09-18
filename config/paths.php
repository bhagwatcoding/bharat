<?php
$get_url = isset($_GET['url'])? $_GET['url'] : null;
define('current_url', sprintf('%s://%s%s', isset($_SERVER['HTTPS']) ? 'https' : 'http', $_SERVER['HTTP_HOST'], $_SERVER['REQUEST_URI']));
define('base_url', str_replace('index.php', '', $_SERVER['PHP_SELF']));
define('get_url', $get_url);
define('start_url', str_replace(get_url, '', current_url));
define('url_arr', explode('/', rtrim(get_url, '/')));

$uarr   = url_arr;
$start  = isset(url_arr[0])? url_arr[0] : false;
$first  = isset(url_arr[1])? url_arr[1] : false;
$second = isset(url_arr[2])? url_arr[2] : false;
$third  = isset(url_arr[3])? url_arr[3] : false;

define('main_dir', dirname(__DIR__).'/');
define('domain', $_SERVER['HTTP_HOST']);

class Dir{
  const api      = main_dir.'api/';
  const config   = main_dir.'config/';
  const control  = main_dir.'controllers/';
  const db       = main_dir.'database/';
  const libs     = main_dir.'libs/';
  const traits   = main_dir.'traits/';
  const models   = main_dir.'models/';
  const widgets  = main_dir.'widgets/';
  const views    = main_dir.'views/';
  const vendor   = main_dir."vendor/";
  const error    = self::views.'error/';
  const admin    = self::views.'admin/';
  const module   = self::views.'module/';
  const public   = main_dir.'public/';
  const js       = self::public."js/";
  const css      = self::public."css/";
  const images   = self::public."images/";
  const json     = self::public."json/";
  const svg      = self::public."svg/";
  const trash    = self::public."trash/";
  const theme    = self::public."theme/";
  const logo     = self::public."logo/";
  const custom   = self::views."custom/";
}

class vdir{
  const self    = dir::views;
  const admin   = self::self.'admin/';
  const api     = self::self.'api/';
  const custom  = self::self.'custom/';
  const error   = self::self.'error/';
  const module  = self::self.'module/';
  const query   = self::self.'query/';
  const sitemap = self::self.'sitemap/';
  const theme   = self::self.'theme/';
}


class url{
  const arr     = url_arr;
  const base    = base_url;
  const start   = start_url;
  const admin   = self::base."admin/";
  const images  = self::base."images/";
  const theme   = self::base."theme/";
  const icon    = self::base."icon/";
  const svg     = self::base."svg/";
  const css     = self::base."css/";
  const js      = self::base."js/";
}

// Admin Directory strat
class Adir{
  const theme   = dir::admin."theme/";
  const assets  = dir::admin."assets/";
  const js      = self::assets."js/";
  const css     = self::assets."css/";
}

// Admin url strat
class Aurl{
  const theme      = url::admin."theme/";
  const js         = url::admin."js/";
  const css        = url::admin."css/";
  const default    = url::admin."default/";
}
// Admin url end

// statics configration details
require_once 'config.php';

define('thumbail', 'theme/thumbail.png');
define('small_thumbail', 'theme/small_thumbail.png');
define('middle_thumbail', 'theme/middle_thumbail.png');
define('URL', start_url);
define('url', start_url);
?>
