<?php
include('parcial/head.php');
include('parcial/nav.php');
?>

<div class="container" dir="rtl">
<form action="login.php" method="post" >
  

  <div class="form-group">
    <label for="inputAddress2"> شماره تلفن</label>
    <input type="text" name="phone" class="form-control" id="inputAddress2" placeholder="شماره تلفن خودرا وارد نمایید.">
  </div>
  
  
  <button type="submit" class="btn btn-primary"> ارسال کد تایید(ورود)</button>
</form>
</div>


<?php
include('parcial/footer.php');
?>