<div class="file-mannager-container" id="preview"></div>

<div id="delete">
  <i class="fa fa-trash"></i>
</div>

<script await type="text/javascript">

data_fetch('media/manager', '#preview');
let manager = (path) => {
    let form = new FormData();
    form.append('f', path);
    // query upload url
    fetch('media/manager', {
      method: 'POST',
      body: form })
    .then(req => req.text()
    .then(res => {id('preview').innerHTML = res}))
};
setTimeout(()=>{
  let pathArr = qsa('.file-mannager div');
  pathArr.forEach((e, i) => {
    on('click', e, ()=>{
      // log(e);
      // log(e.dataset.path);
      e.classList.toggle('active');

      // let form = new FormData();
      // form.append('f', path);
      // // query upload url
      // fetch('media/manager', {
      //   method: 'POST',
      //   body: form })
      // .then(req => req.text()
      // .then(res => {id('preview').innerHTML = res}))

    })
  });
}, 1000)
if (qsa('active')) {

}
</script>

<style type="text/css">
#delete{
  position: fixed;
  right: 1.5rem;
  bottom: 1.5rem;
}
#delete i{
  font-size: 1.5rem;
}
.file-mannager-container{
  display: grid;
  grid-template: auto 1fr/ 1fr;
  grid-gap: 0.5rem;
}
.file-navigator{
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.file-navigator button{
  padding: 0.1rem 1rem;
  font-size: 2rem;
  border: none;
  background-color: transparent;
}
.file-navigator button i:hover{
  color: var(--pink);
}
.file-mannager{
  display: grid;
  grid-gap: 0.8rem;
  grid-template: 1fr/ repeat(auto-fit, minmax(100px, 1fr));
  justify-content: center;
  align-items: center;
  text-align: center;
}
.file-mannager div{
  display: grid;
  min-width: 100px;
  max-width: max-content;
  cursor: pointer;
  grid-template: 6rem 1rem/ 1fr;
  padding: 0.5rem;
  grid-gap: 0.5rem;
  border-radius: 5px;
  justify-content: center;
  text-align: center;
}
.file-mannager div *:not(span){
  max-height: 100%;
  apcept-ratio:1/1;
}
.file-mannager span{
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
.file-mannager .active,
.file-mannager div:hover,
.file-mannager div:focus{
  background-color: var(--smoke);
}
.file-mannager div *{
  position: relative;
  display: block;
  background-position: center;
  background-size: contain;
  background-repeat: no-repeat;
  font-size: 13px;
}
.file-mannager div img{
  width: 100%;
}
:root{
<?php
$icon =["icon" => "folder.png",
        "folder" => "folder.png",
        "png" => "png.png",
        "text" => "txt.png",
        "xml" => "xml.webp",
        "css" => "css.png",
        "pdf" => "pdf.png",
        "php" => "php.png",
        "ht" => "html-5.svg",
        "js" => "js.png",
        "json" => "json.png",
        "gif" => "gif.png",
        "mp3" => "mp3.webp",
        "mp4" => "mp4.png"];
  foreach ($icon as $key => $value):
    $url = base_url."icon/file/".$value;
    echo "--$key: url('$url');\n";
  endforeach;
?>
}
/* ========= file mannager icon image ======= */
<?php
$icons = ["icon","folder","photo","text", 'xml', "pdf","php","htmli","css","js","json","png","jpg","jpeg","gif","mp3","mp4"];
foreach ($icons as $key => $value):
  echo ".file-mannager div $value{ background-image: var(--$value);}\n";
endforeach;
?>
/* image open mode */

.image-viewer{
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: auto;
  height: 80vh;
}
.image-viewer img{
  min-height: min-content;
  max-height: 100%;
}
</style>
