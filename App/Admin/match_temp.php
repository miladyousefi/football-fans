<?php
include('parcial_admin/head.php');
include('parcial_admin/nav.php');
include('../../Database/connect_db.php');
?>
<div class="container" dir="rtl">
<form action="match.php" method="post" enctype="multipart/form-data">


  <div class="form-group col-md-12">
      <label for="inputState">تیم اول</label>
      <select name="host_id" id="inputState" class="form-control">
          <?php 
    $sql="SELECT * FROM team_list";
    $result=mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
    ?>
        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?> </option>

    <?php } ?>
      </select>
    </div>


    <div class="form-group col-md-12">
      <label for="inputState">تیم دوم</label>
      <select name="guest_id" id="inputState" class="form-control">
          <?php 
    $sql="SELECT * FROM team_list";
    $result=mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
    ?>
        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?> </option>

    <?php } ?>
      </select>
    </div>






<div class="form-group">
  <label for="exampleFormControlTextarea1">تاریخ </label>
  <input type="date" name="time" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10"></textarea>
</div>

<div class="form-group">
<input type="submit" class="form-control btn btn-primary" value="ثبت مسابقه">
</div>
</form>
</div>


<?php
include('parcial_admin/footer.php');
?>