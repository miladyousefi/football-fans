<?php
session_start();
include('../../Database/connect_db.php');
include ('parcial_admin/head.php');
include ('parcial_admin/nav.php');
?>
<div style="margin: 10px;">

<table class="table table-bordered" dir="rtl">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">نام باشگاه اول</th>
      <th scope="col">نام باشگاه دوم</th>
      <th scope="col">وضعیت</th>
    </tr>
  </thead>
  <tbody>
<?php
    $sql="SELECT * FROM leage_play WHERE played=0";
    $result=mysqli_query($conn,$sql);
    $count=1;
while($row = mysqli_fetch_assoc($result)){
?>
    <tr>
    <form action="match_man.php" method="post">

      <th scope="row"><?php echo $count; ?></th>
      <?php 
        $sql2="SELECT * FROM team_list WHERE id=$row[host_id]";
        $result2=mysqli_query($conn,$sql2);
        $row1 = mysqli_fetch_assoc($result2);
      ?>

      <td><?php echo $row1['name']; ?> <hr>
      <input class="form-control text-center" type="text" name="result_1" required>
      <input class="form-control text-center" type="hidden" value="<?php echo $row['host_id']?>" name="host_id">

     </td>

      <?php 
      $sql3="SELECT * FROM team_list WHERE id=$row[guest_id]";
      $result3=mysqli_query($conn,$sql3);
      $row3 = mysqli_fetch_assoc($result3)
      ?>

      <td><?php echo $row3['name']; ?><hr>
      <input class="form-control text-center" type="text" name="result_2" required>
      <input class="form-control text-center" type="hidden" value="<?php echo $row['guest_id']?>" name="guest_id">
      <input class="form-control text-center" type="hidden" value="<?php echo $row['id']?>" name="match_id">


    </td>
      <td><button class="btn btn-success btn-block">ثبت نتیجه</button></td>
      </form>
    </tr>
    

<?php $count++;  } ?>
</tbody>
</table>

</div>
<?php include('parcial_admin/footer.php'); ?>