<?php
session_start();
class admin extends Controller{
    use auto_construct;

    // Session Check function
    static function session_check(){
      isset($_SESSION['username']) || isset($_COOKIE['login']) ?  true : head::loc('admin/login');
    }

    // index page
    function index(){
      self::session_check();
      $this->view->admin('dashboard');
    }

    // index page
    function editor($url = false){
      self::session_check();
      $file = dir::views.get_url;
      if (is_file($file) && file_exists($file)):
        head::con($file);
        require_once $file;
      else: $this->view->admin('editor/editor');
      endif;
    }

    // Pages Page
    function page($url = false){
      self::session_check();
      switch ($url):
        case 'add':  $this->view->admin('page/add'); break;
        case 'edit': $this->view->admin('page/edit'); break;
        case 'delete': $this->view->admin('page/delete', false); break;
        case 'view': $this->view->admin('page/view', false); break;
        case 'status': $this->view->admin('page/status', false); break;
        default: $this->view->admin(__FUNCTION__); break;
      endswitch;
    }

    // Posts Page
    function post($url = false){
      self::session_check();
      switch ($url):
        case 'add':  $this->view->admin('post/add'); break;
        case 'edit': $this->view->admin('post/edit'); break;
        case 'delete': $this->view->admin('post/delete', false); break;
        case 'view': $this->view->admin('post/view', false); break;
        case 'status': $this->view->admin('post/status', false); break;
        default: $this->view->admin(__FUNCTION__); break;
      endswitch;
    }

    // Email Page
    function rashifal(){
      self::session_check();
      $this->view->admin(__FUNCTION__);
    }
    // Email Page
    function email(){
      self::session_check();
      $this->view->admin(__FUNCTION__);
    }

    // Pages Page
    function media($url = false, $arg = false){
      self::session_check();
      $this->view->arg = $arg;
      switch ($url):
        case 'resizer': $this->view->admin('media/resizer', false); break;
        case 'image': $this->view->admin('media/image'); break;
        case 'uploads': $this->view->admin('media/uploads', false); break;
        case 'manager': $this->view->admin('media/manager', false); break;
        default: $this->view->admin(__FUNCTION__); break;
      endswitch;
    }

    // File Mannager Page
    function file_manager(){
      self::session_check();
      $this->view->admin(__FUNCTION__);
    }

    // Media Upload Page
    function media_uploads(){
      self::session_check();
      $this->view->admin(__FUNCTION__);
    }

    // Database Page
    function database(){
      self::session_check();
      $this->view->admin(__FUNCTION__);
    }
    // Pages Page
    function user($url = false, $arg = false){
      self::session_check();
      $this->view->arg = $arg;
      switch ($url):
        case 'resigster': $this->view->admin('user/resigster'); break;
        default: $this->view->admin(__FUNCTION__); break;
      endswitch;
    }
    // settings Page
    function settings($url = false, $arg = false){
      self::session_check();
      $this->view->arg = $arg;
      switch ($url):
        case 'meta': $this->view->admin('settings/meta'); break;
        default: $this->view->admin(__FUNCTION__); break;
      endswitch;
    }

    // login Page
    function login(){
      isset($_SESSION['username']) ?  head::loc('admin'): true;
      $this->view->admin(__FUNCTION__, false);
    }

    // logout Page
    function logout(){
      session_unset();
      session_destroy();
      setcookie('login', 'logout', time() - 0 , url::admin);
      head::loc('admin/login');
    }

    // JS Page
    function js($url = false){
      self::session_check();
      Head::con('.js');
      base::read(adir::js, 'js');
    }

    // CSS Page
    function css($url = false){
      self::session_check();
      Head::con('.css');
      Base::read(adir::css, 'css');
    }

    // Auto call function
    function __call($url = false, $arg = false){
      self::session_check();
      $asset = str_replace('admin','', get_url);
      $assets = adir::assets.$asset;
      if(is_file($assets) && file_exists($assets)):
        Head::con(".$asset");
        $ext = base::pathinfo($asset, 'e');
        readfile($assets); exit;
      endif;

      $this->view->url = $url;
      $this->view->arg = isset($arg[0])? $arg[0] : false;
      $this->view->admin('verify');
    }
}
?>
