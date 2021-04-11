<?php
include('parcial/head.php');
include('parcial/nav.php');
?>

<div class="container" dir="rtl">
<form action="register.php" method="post" >
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">نام</label>
      <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="نام">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">نام خانوادگی</label>
      <input type="text" name="family" class="form-control" id="inputPassword4" placeholder="نام خانوادگی">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">نام پدر</label>
    <input type="text" name="name_father" class="form-control" id="inputAddress" placeholder="نام پدر">
  </div>
  <div class="form-group">
    <label for="inputAddress2"> کدملی</label>
    <input type="text" name="code_meli" class="form-control" id="inputAddress2" placeholder="کدملی">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">شماره تلفن</label>
      <input type="text" name="phone" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">شهر</label>
      <select name="city" id="inputState" class="form-control">
        <option value="تبریز">تبریز</option>
        <option value="ارومیه">ارومیه</option>
      </select>
    </div>
    <div class="form-group col-md-12">
      <label for="inputZip">آدرس</label>
      <input type="text" name="address" class="form-control" id="inputZip">
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary btn-block"> ثبت نام</button>
</form>
</div>


<?php
include('parcial/footer.php');
?>