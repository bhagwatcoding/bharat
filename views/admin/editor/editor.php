<script src ='<?php echo url::admin; ?>editor/ckeditor.js' type="text/javascript"></script>
<textarea name="article" placeholder="Article write...." required><?php echo isset($details)? $details : false ?></textarea>
<script type="text/javascript">
    CKEDITOR.replace('article');
    setTimeout(()=>{
    id('cke_1_contents').style.minHeight = '50vh';
  }, 500);
</script>
