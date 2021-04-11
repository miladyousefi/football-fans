<?php
error_reporting(E_ALL); // or E_STRICT
ini_set("display_errors",1);
ini_set("memory_limit","1024M"); 

include_once('../Database/connect_db.php');
include('parcial/head.php');
include('parcial/nav.php');
?>
<div class="container-fluid">

<table class="table" dir="rtl">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">نام</th>
      <th scope="col">لوگو</th>
      <th scope="col">امتیاز </th>
      <th scope="col">تعداد بازی </th>

      <th scope="col">زده </th>
      <th scope="col">خرده </th>

    </tr>
  </thead>
  <tbody>
<?php
$sql = "SELECT * FROM league ORDER BY score DESC";
$result=mysqli_query($conn,$sql);
$count=1;
while($row=mysqli_fetch_assoc($result)){

?>
 <?php 
      $sql2="SELECT * FROM team_list WHERE id=$row[team_id]";
      $result2=mysqli_query($conn,$sql2);
      $row1 = mysqli_fetch_assoc($result2)
      ?>


    <tr>
      <th scope="row"><?php echo $count; ?></th>
      <td><?php echo $row1['name']; ?></td>
      <td><img class="card-img-top" src="../Public/img/logos/<?php echo $row1['icon']; ?>" alt="no image" style="max-width: 40px;"></td>
      <td><?php echo $row['score']; ?></td>
      <td><?php echo $row['games_played']; ?></td>
      <td><?php echo $row['goal_eaten']; ?></td>
      <td><?php echo $row['goal_hit']; ?></td>
    </tr>
   

<?php $count++; } ?>

  </tbody>
</table>

</div>



<?php include('parcial/head.php'); ?>