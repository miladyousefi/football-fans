<?php
include('parcial/head.php');
include('parcial/nav.php');
include('../Database/connect_db.php');
?>
<table class="table" dir="rtl">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">نام باشگاه</th>
      <th scope="col">تاریخ تاسیس  </th>
      <th scope="col">درباره باشگاه </th>
      <th scope="col"> لوگو </th>

      <th scope="col"> نشریه باشگاه </th>
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
      <td><img class="card-img-top" src="../Public/img/logos/<?php echo $row['icon']; ?>" style="max-width: 40px;;" alt="Card image cap"></td>
      <?php 
      $result1=mysqli_query($conn,"SELECT * FROM journals WHERE id_team='$row[id]'");
      $row1=mysqli_fetch_assoc($result1);
      ?>
      <td><a href="../Public/journals/<?php echo $row1['file'] ?>" class="btn btn-dark">دانلود نشریه باشگاه</a></td>
    </tr>

<?php } ?>
  </tbody>
</table>

<?php
include('parcial/footer.php');
?>