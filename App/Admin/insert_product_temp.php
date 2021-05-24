<?php
include('parcial_admin/head.php');
include('parcial_admin/nav.php');
?>
<div class="container" dir="rtl">
<form action="insert_product.php" method="post" enctype="multipart/form-data">



<div class="form-group">
   عکس
    <input type="file" id="product_image" style="display:none" name="product_image" class="form-control">
    <div class="card-columns" onclick="document.getElementById('product_image').click();">
      <a href="#">
      <div class="card bg-danger">
        <div class="card-body text-center">
          <p class="card-text text-white">انتخاب عکس برای محصول</p>
        </div>
      </div>
      </a>
    </div>
    
  </div>
  <div class="form-group col-md-12">
      <label for="inputState">شهر</label>
      <select name="product_cat" id="inputState" class="form-control">
        <option value="تی شرت">تی شرت</option>
        <option value="کفش">کفش</option>
      </select>
    </div>

  <div class="form-group">
    <label for="formGroupExampleInput">برند</label>
    <input type="text" name="product_brand" class="form-control" id="formGroupExampleInput" placeholder="برند">
  </div>


<div class="form-group">
  <label for="exampleFormControlTextarea1">عنوان</label>
  <input type="text" name="product_title" class="form-control rounded-0" id="exampleFormControlTextarea1">
</div>



<div class="form-group">
  <label for="exampleFormControlTextarea1">قیمت</label>
  <input type="text" name="product_price" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10"></textarea>
</div>

<div class="form-group">
  <label for="exampleFormControlTextarea1">درباره محصول</label>
  <textarea name="product_desc" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10"></textarea>
</div>

<div class="form-group">
  <label for="exampleFormControlTextarea1">دسته بندی </label>
  <input type="text" name="product_keywords" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10"></textarea>
</div>

<div class="form-group">
<input type="submit" class="form-control btn btn-primary">
</div>
</form>
</div>


<?php
include('parcial_admin/footer.php');
?>