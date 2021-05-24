<?php
error_reporting(E_ALL); // or E_STRICT
ini_set("display_errors",1);
ini_set("memory_limit","1024M");
include('parcial_admin/head.php');
include('parcial_admin/nav.php');
?>
<div class="container">
<form action="insert_club.php" method="post" enctype="multipart/form-data" dir="rtl">



<div class="form-group">
   لوگو
    <input type="file" id="icon" name="icon" style="display:none" class="form-control">
    <a href="#" onclick="document.getElementById('icon').click();">
      <div class="card bg-danger">
        <div class="card-body text-center">
          <p class="card-text text-white">انتخاب لوگوی باشگاه</p>
        </div>
      </div>
      </a>
  </div>
 

  <div class="form-group">
    <label for="formGroupExampleInput">نام  باشگاه</label>
    <input type="text" name="name" class="form-control" id="formGroupExampleInput" >
  </div>


<div class="form-group">
  <label for="exampleFormControlTextarea1">تاریخ تاسیس</label>
  <input type="text" name="production_time" class="form-control rounded-0" id="exampleFormControlTextarea1">
</div>




<div class="form-group">
  <label for="exampleFormControlTextarea1"> درباره باشگاه</label>
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