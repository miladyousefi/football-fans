<?php
include ('parcial_admin/head.php');
include ('parcial_admin/nav.php');
include('../../Database/connect_db.php');
?>
<table class="table" dir="rtl">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">نام باشگاه</th>
      <th scope="col">تاریخ تاسیس  </th>
      <th scope="col">درباره باشگاه </th>
      <th scope="col"> لوگو </th>
      <th scope="col"> مدیریت باشگاه </th>
      <th scope="col"> بازیکنان </th>
      <th scope="col"> ثبت مجله باشگاه </th>



    </tr>
  </thead>
  <tbody>

  <?php 
$sql="SELECT * FROM team_list";
$result=mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){
?>
    <tr>
      <th scope="row"><?php echo $row['id']; ?> </th>
      <td><?php echo $row['name']; ?> </td>
      <td><?php echo $row['production_time']; ?> </td>
      <td><?php echo $row['body']; ?> </td>
      <td><img type="button" data-toggle="modal" data-target="#exampleModal<?php echo $row['id']; ?>" data-whatever="@mdo" class="card-img-top" src="../../Public/img/logos/<?php echo $row['icon']; ?>" style="max-width: 40px;;" alt="Card image cap"></td>
      <td>
          <?php
          $sql1="SELECT * FROM team_manager WHERE team_id='$row[id]'";
          $result1=mysqli_query($conn,$sql1);
          $row1 = mysqli_fetch_assoc($result1);
          if($row1==NULL){
              ?>
          <span class="btn btn-danger" type="button" data-toggle="modal" data-target="#exampleModal<?php echo $row['id']; ?>" data-whatever="@mdo" ><?php echo "ثبت نشده";?></span>

              <?php
          }else{
             
              ?>
          <span class="btn btn-success" type="button" data-toggle="modal" data-target="#exampleModal<?php echo $row['id']; ?>" data-whatever="@mdo" ><?php echo $row1['name'];?></span>
          <?php
             
          }
          ?>
      </td>
      <td><span class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" >لیست نامشخص</span></td>
      <td>
      <a class="btn btn-warning" href="process_temp.php?id_team=<?php echo $row['id']; ?>">ثبت فایل</button></td>
    </tr>





<div dir="rtl" class="modal fade" id="exampleModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['name']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="team_manager.php">
            <p class="text-center text-danger">ثبت اطلاعات مربوط به مدیرباشگاه</p>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">تاریخ تولد : </label>
            <input name="age" type="date" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">نام :</label>
            <input name="name" type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">نام (انگلیسی):</label>
            <input name="name_fa" type="text" class="form-control" id="recipient-name">
          </div>
            <input type="hidden" name="team_id" value="<?php echo $row['id']; ?>" class="form-control" id="recipient-name">
          
          <div class="form-group">
            <label for="message-text" class="col-form-label">بیوگرافی :</label>
            <textarea name="bio" class="form-control" id="message-text"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-block">ثبت اطلاعات مدیر باشگاه</button>
      </div>
      </form>

    </div>
  </div>
</div>



<?php } ?>
  </tbody>
</table>

<?php
include('parcial_admin/footer.php');
?>