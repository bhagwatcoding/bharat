<?php
$arg = isset($this->arg)? $this->arg : false;
echo "<div class='grid-img'>";
foreach (glob(dir::images."*") as $file):
  if (!is_dir($file)) {
    $name = Base::pathinfo($file, 'b');
    $url = url::images.$name;
    $path = exp_end($file, dir::public, '');
    echo "<div class='img' data-path='$path'><img src='$url'></div>\n";
  }
endforeach;
echo "</div>";
?>
<a id='delete-btn'><i class="fa fa-trash"></i></a>

<?php
if($arg):
   if (isset($_GET['path'])):
     $path = $_GET['path'];
     if (!empty($path)):
       $dir = dir::public.$path;
       if (file_exists($dir)) { unlink($dir); }
       Head::loc('admin/media/image');
     else: Head::loc('admin/media/image');
     endif;
   else: Head::loc('admin/media/image');
   endif;
endif;
?>

<script type="text/javascript">
let gridImg = qsa('.grid-img .img');
let delBtn = id('delete-btn');

gridImg.forEach((e, i) => {
  on('mouseup', e, ()=>{
    gridImg[i].classList.toggle('active');
    let atvImg = e.dataset.path;
    delBtn.href = "media/image/delete"+ '?path='+ atvImg;
})
});

</script>

<style type="text/css">
#delete-btn{
  position: fixed;
  right: 1rem;
  bottom: 1rem;
  border: 1px solid var(--light-dark);
  border-radius: 50%;
  background-color: var(--white);
  box-shadow: 2px 2px 5px var(--light-gray);
  cursor: pointer;
  height: 50px;
  width: 50px;
  display: flex;
  align-items: center;
  justify-content: center;
}
.grid-img{
  margin: 1rem auto;
  display: grid;
  grid-gap: 0.8rem;
  grid-template: 1fr/ repeat(auto-fit, minmax(135px, 1fr));
}

.grid-img .img{
    display: grid;
    position: relative;
    apcept-ratio:1/1;
    place-items:center;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    padding: 5px;
}
.grid-img .active{
  background-color: var(--light-dark);
}
.grid-img .active::before,
.grid-img .img:hover::before{
  content: "";
  left: 0;
  top: 0;
  height: 100%;
  width: 100%;
  position: absolute;
  outline: 2px solid var(--light-gray);
}

.grid-img img{
    width: 100%;
}

</style>
