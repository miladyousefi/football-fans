<?php
session_start();
if(!$_SESSION['user']){
  header("Location: index.php");
}
include('parcial/head.php');
include('parcial/nav.php');
include('../Database/connect_db.php');
?>

<div style="margin: 10px;">



<table class="table" dir="rtl">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">مهمان</th>
      <th scope="col">لوگو</th>

      <th scope="col">میزبان</th>
      <th scope="col">لوگو</th>
      <th scope="col">تاریخ</th>

      <th scope="col">پیش بینی</th>
      <th scope="col">رزرو بلیط </th>
    </tr>
  </thead>
  <tbody>
<?php 
$sql="SELECT * FROM leage_play";
$result=mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){

  $user_id=$_SESSION['user'];
  $mathc_id=$row['id'];
  $sql_query="SELECT * FROM forecast WHERE user_id='$user_id' AND match_id='$mathc_id'";
  $result_query=mysqli_query($conn,$sql_query);
  $row_query=mysqli_fetch_assoc($result_query);
    
?>

    <tr>
      <th scope="row"><?php echo $row['id']; ?></th>
      <?php 
      $sql2="SELECT * FROM team_list WHERE id=$row[host_id]";
      $result2=mysqli_query($conn,$sql2);
      $row1 = mysqli_fetch_assoc($result2)
      ?>

      <td><?php echo $row1['name']; ?></td>
      <td><img class="card-img-top" src="../Public/img/logos/<?php echo $row1['icon']; ?>" alt="no image" style="max-width: 40px;"></td>


      <?php 
      $sql2="SELECT * FROM team_list WHERE id=$row[guest_id]";
      $result2=mysqli_query($conn,$sql2);
      $row2 = mysqli_fetch_assoc($result2)
      ?>
      <td><?php echo $row2['name']; ?></td>
      <td><img class="card-img-top" src="../Public/img/logos/<?php echo $row2['icon']; ?>" alt="Card image" style="max-width: 40px;"></td>


      <td><?php echo $row['time']; ?></td>
      

      <?php if($row_query!=NULL){ ?>

      <td><button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#exampleModalCenter">
          پیش بینی شده (<?php echo $row_query['forecast_guest']; ?>,<?php echo $row_query['forecast_host']; ?>)
      </button></td>
      <?php }else{ ?>


      <td><button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#exampleModalCenter<?php echo $row['id']; ?>">
        پیش بینی 
      </button></td>

      <?php } ?>

      <?php
      $match_id=$row['id'];
      $user_id=$_SESSION['user'];
      $sql22="SELECT * FROM reserve WHERE user_id='$user_id' AND match_id='$match_id'";
      $result22=mysqli_query($conn,$sql22);
      $row22=mysqli_fetch_assoc($result22);
      if($row22==NULL){
      ?>
        <td>
          <a type="button" class="btn btn-block btn-primary" data-toggle="modal" href="reserve.php?match_id=<?php echo $row['id'] ?>">رزرو بلیط</a>
      
        </td>
      <?php }else{?>
        <td>
          <a type="button" class="btn btn-block btn-<?php if($row['played']==1){echo "warning";}else{echo "success";} ?>" data-toggle="modal" href="reserve.php?match_id=<?php echo $row['id'] ?>"><?php if($row['played']==1){echo "اتمام مسابقه";}else{ echo "رزرو شد";} ?> </a>
      
        </td>
      <?php }?>
      

    </tr>
   <?php 
   if(isset($_SESSION['user'])){
   ?>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" dir="rtl">
        <h5 class="modal-title" id="exampleModalLongTitle">پیش بینی</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="forecast.php" class="form-control" method="post">
      <div class="modal-body">
      <input type="hidden" class="form-control" name="user_id" value="<?php echo $_SESSION['user'] ?>">
      <input type="hidden" class="form-control" name="match_id" value="<?php echo $row['id'] ?>">
      <input type="hidden" class="form-control" name="guest_id" value="<?php echo $row['guest_id'] ?>">
      <input type="hidden" class="form-control" name="host_id" value="<?php echo $row['host_id'] ?>">

      <?php echo $row2['name']; ?> <input type="text" class="form-control" name="guest">
      <hr>
      <?php echo $row1['name']; ?><input type="text" class="form-control" name="host">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success btn-block">ثبت نتیجه</button>
      </div>
      </form>

    </div>
  </div>
</div>

   <?php }else{?>
    <script type="text/javascript">location.href = 'http://localhost/football-fans/App/register_temp.php';</script>

   <?php } ?>
<?php }?>

</tbody>
</table>
</div>
<?php
include('parcial/footer.php');
?>