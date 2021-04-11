<?php
include('parcial_admin/head.php');
include('parcial_admin/nav.php');
?>
<div class="container" dir="rtl">
<form action="insert_news.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="formGroupExampleInput">عنوان خبر</label>
    <input type="text" name="title" class="form-control" id="formGroupExampleInput" placeholder="Example input">
  </div>
  <div class="form-group">
   عکس
    <input type="file" name="image" class="form-control">
  </div>

  <div class="form-group">
  <label for="exampleFormControlTextarea1">متن خبر</label>
  <textarea name="body" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10"></textarea>
</div>
<div class="form-group">
<input type="submit" class="form-control btn btn-primary">
</div>
</form>
</div>


<?php
include('parcial_admin/footer.php');
?>