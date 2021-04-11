<?php
session_start();
if(empty($_SESSION['admin'])) {
  header("Location: ../index.php");
  session_abort();
}
include ('parcial_admin/head.php');
include ('parcial_admin/nav.php');
?>

<div class="card">
  <div class="card-header">
    Featured
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><a href="insert_news_temp.php">اخبار</a></li>
    <li class="list-group-item"><a href="insert_product_temp.php">ثبت محصول</a></li>
    <li class="list-group-item"> <a href="insert_club_temp.php">ثبت باشگاه</a></li>  
    <li class="list-group-item"> <a href="match_temp.php"> برگزاری مسابقه</a></li>
    <li class="list-group-item"> <a href="match_man_temp.php"> مدیریت  مسابقه ها</a></li>
    <li class="list-group-item"> <a href="club_man_temp.php"> مدیریت باشگاه ها</a></li>

  </ul>
</div>


<?php
include('parcial_admin/footer.php');
?>
