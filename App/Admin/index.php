<?php
include('functions/session.php');
include ('parcial_admin/head.php');
include ('parcial_admin/nav.php');
?>

<div class="card-columns">
  <div class="card bg-primary">
    <div class="card-body text-center text-white">
      <p class="card-text">
      <a class="nav-link text-white" href="insert_news_temp.php">اخبار</a>
      </p>
    </div>
  </div>
  <div class="card bg-primary">
    <div class="card-body text-center text-white">
      <p class="card-text"><a class="nav-link text-white" href="insert_product_temp.php">ثبت محصول</a></p>
    </div>
  </div>
  <div class="card bg-primary">
    <div class="card-body text-center text-white">
      <p class="card-text">
      <a class="nav-link text-white" href="insert_club_temp.php">ثبت باشگاه</a>
      </p>
    </div>
  </div>
  <div class="card bg-primary">
    <div class="card-body text-center text-white">
      <p class="card-text">
      <a class="nav-link text-white" href="match_temp.php"> برگزاری مسابقه</a>
      </p>
    </div>
  </div>
  <div class="card bg-primary">
    <div class="card-body text-center text-white">
      <p class="card-text">
      <a class="nav-link text-white" href="match_man_temp.php"> مدیریت  مسابقه ها</a>
      </p>
    </div>
  </div>
  <div class="card bg-primary">
    <div class="card-body text-center text-white">
      <p class="card-text">
      <a class="nav-link text-white" href="club_man_temp.php"> مدیریت باشگاه ها</a>
      </p>
    </div>
  </div>
</div>
  
<?php
include('parcial_admin/footer.php');
?>
