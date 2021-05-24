<?php
error_reporting(E_ALL); // or E_STRICT
ini_set("display_errors",1);
ini_set("memory_limit","1024M");
?>

<nav class="navbar navbar-expand-lg navbar-light bg-primary" style="margin-bottom: 10px;" dir="rtl">
  <a class="navbar-brand" href="../index.php">
    <img src="http://localhost/football-fans/Public/img/l.png" width="90" alt="هواداری">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php"> صفحه اصلی <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../news.php">اخبار</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../store.php">فروشگاه</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../league.php"> جدول لیگ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"> هواداری</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../list_clubs.php"> باشگاه ها</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="../match.php">
          مسابقات
        </a>
        
      </li>

      <?php 
      if (!isset($_SESSION['user'])) {
        # code...
      ?>
       <li class="nav-item">
        <a class="nav-link" href="../register_temp.php"> ثبت نام </a>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="../login_temp.php"> ورود  </a>
      </li>

      <?php }else{

      ?>
      <li class="nav-item">
        <a class="nav-link" href="../user/index.php"> کاربر  </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../user/logout.php"> خروج کاربر  </a>
      </li>


      <?php }?>
        <?php 
              if (isset($_SESSION['admin'])) {
                
             
        ?>
      <li class="nav-item">
        <a class="nav-link" href="../Admin/logout_admin.php"> خروج ادمین </a>
      </li>

              <?php } ?>
    </ul>
  </div>
</nav>
<div class="container-fluid">