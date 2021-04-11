<?php
session_start();
error_reporting(E_ALL); // or E_STRICT
ini_set("display_errors",1);
ini_set("memory_limit","1024M");
include('../../Database/connect_db.php');
include('../Functions/get_database.php');
include('../Admin/parcial_admin/head.php');
include('../Admin/parcial_admin/nav.php');
if(!$_SESSION['user']){
  header("Location: ../index.php");
}else{
  $user_id=$_SESSION['user'];
}
?>
<div class="card text-center" dir="rtl" >
<div class="card-header text-center" style="margin-bottom: 10px;">
<ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link active" href="#">کاربرفعال</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">خروج</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">به صفحه کاربریت خوش آمدی! <?php $row=get_user($user_id,$fetch_assoc=true); echo $row['name']; ?></a>
      </li>
    </ul>
    </div>
    <div class="card-body">
    <h6 class="card-title text-left" dir="rtl"> مسابقات پیش بینی شده لیگ توسط شما :</h6>
    <hr>
  </div>

<div class="card-deck" style="margin: 10px;">
<?php
    $result_pridic=mysqli_query($conn,"SELECT * FROM forecast WHERE user_id='$user_id'");
    
    if($result_pridic){
      while ($row_pridic=mysqli_fetch_assoc($result_pridic)) {
        $league_play=mysqli_query($conn,"SELECT * FROM leage_play WHERE id='$row_pridic[match_id]'");
        $row_play=mysqli_fetch_assoc($league_play);
        $count=0;
        $result1=mysqli_query($conn,"SELECT * FROM team_list WHERE id='$row_pridic[host_id]'");
        $row1=mysqli_fetch_assoc($result1);
        $result2=mysqli_query($conn,"SELECT * FROM team_list WHERE id='$row_pridic[guest_id]'");
        $row2=mysqli_fetch_assoc($result2);
        

        
     ?>
    <div  class="card text-white bg-<?php if($row_play['played']==1 and $row_pridic['status']==0){echo "danger";}if($row_play['played']==1 and $row_pridic['status']==1){echo "success";}if($row_play['played']==0 and $row_pridic['status']==0){echo "warning";} ?> mb-3" style="min-width: 15rem;">
      <div class="card-header">
      <img class="card-img" style="max-width: 40px;" src="../../Public/img/logos/<?php echo $row1['icon']; ?>" alt="Card image cap"> - 
      <img class="card-img" style="max-width: 40px;" src="../../Public/img/logos/<?php echo $row2['icon']; ?>" alt="Card image cap">
      </div>
      <div class="card-body">
          <h5 class="card-title"><?php echo $row1['name']; ?> - <?php echo $row2['name']; ?></h5>
          <p><?php if($row_play['played']==1 and $row_pridic['status']==1){echo "مسابقه برگزار شده است و پیش بینی شما درست بود";} if($row_play['played']==1 and $row_pridic['status']==0){echo"مسابقه برگزار شده است متاسفانه پیش بینی شما درست نبود !";}if($row_play['played']==0 and $row_pridic['status']==0){echo "مسابقه هنوز برگزار نشده است!";} ?></p>
          <h3 class="card-text"><?php echo $row_pridic['forecast_host']; ?> - <?php echo $row_pridic['forecast_guest']; ?></h3>
      </div>
    </div>
  <?php $count++;  } }?>
  <div class="card text-white bg-primary mb-3" style="min-width: 15rem;">
  <div class="card-header">جمع امتیاز های شما</div>
  <div class="card-body">
    <h1 class="card-title"> <?php $row=get_user($user_id,$fetch_assoc=true); echo $row['soccer']; ?>+</h1>
  </div>
</div>

</div>
<hr>
</div>
 


<?php
include('../Admin/parcial_admin/footer.php');
?>