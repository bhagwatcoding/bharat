<?php
  $query = isset($_GET['q'])? $_GET['q'] : '';
?>

<input type="text" class="search-single grid" id="searchPost" name="q" value="<?php echo $query; ?>" placeholder="Search...">

<div class="post-card-list grid gap" id="search-post-set"></div>

<script type="text/javascript">
// post maker function
serachPost = (value = '') =>{
      let formData = new FormData();
      formData.append('search', value);
      formData.append('limit', 12);
      fetch('api/posts', { body: formData, method: "post"})
      .then(req => req.json()
      .then(res => {
        if(res.length > 0){
          let post = '';
          res.forEach(e => {
            Post.title    = e.title;
            Post.thumbail = e.thumbail;
            Post.post_url = e.post_url;
            Post.cat_name = e.cat_name;
            Post.post_at = e.post_at;
            post += Post.carder();
          });
          id('search-post-set').innerHTML = post;
        }
  }));
}

<?php echo "serachPost('$query');"; ?>

let searchInput = id('searchPost');
on('input', searchInput, () =>{
  serachPost(searchInput.value);
});

</script>

<style type="text/css">
.search-single{
  outline: none;
  width: 100%;
  padding: 0.6rem;
  margin: 1rem auto;
}
</style>
