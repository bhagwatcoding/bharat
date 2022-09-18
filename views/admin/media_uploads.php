<div class="upload">
    <input type="file" id='file' value="" />
    <div><button type="submit" id="upload">UPLOAD</button></div>
</div>
<div class='upload-img' ><img id="preview" src='' data-src='<?php echo url::theme.'upload.png'; ?>'></div>

<div class="alert-box">
    <div id='massage'>Please Select File</div>
    <div><i class="fa fa-times"></i></div>
</div>

<script type="text/javascript">
// select preview id
let preview = id('preview');
let alertBox = qs('.alert-box');
let alertMassage = id('massage');
// click to call function
on('click', id('upload'), (e) => {
    let files = id('file').files;
    let form = new FormData();
    if(files.length > 0){
      form.append('upfile', files[0]);
      // query upload url
      fetch('media/uploads', {
          method: 'POST',
          body: form })
      .then(res => res.json())
      .then(data => {
        alertMassage.innerHTML = data.message;
        preview.src = data.name;
        alertBox.classList.add('active');
      })
      .catch(err => { preview.src = preview.dataset.src }
      )
    }else{
      preview.src = preview.dataset.src;
      alertBox.classList.add('active');
    }
});
// auto set srcin image tag
preview.src = preview.dataset.src;
on('click', alertBox, ()=>{alertBox.classList.remove('active');})
</script>

<style type="text/css">
.upload{
    margin: auto;
    padding: 1rem;
    max-width: 500px;
    display: grid;
    grid-template: 1fr/ 4fr 1fr;
    border: 1px solid var(--light-gray);
    align-items: center;
    justify-content: space-between;
}

.upload button{
  padding: 5px 1rem;
  font-weight: bold;
}

.upload-img{
    display: flex;
    margin: 1rem auto;
    max-width: 500px;
    min-height: 300px;
    max-height: 500px;
    apcept-ratio:1/1;
    align-items: center;
    justify-content: center;
}

.upload-img img{
    max-width: 100%;
}

</style>
