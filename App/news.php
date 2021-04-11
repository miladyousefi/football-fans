<?php
include('parcial/head.php');
include('parcial/nav.php');
include('../Database/connect_db.php');
?>

<div class="row col-12"  dir="rtl" style="margin: 10px;">
<?php 
$sql="SELECT * FROM news";
$result=mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){
?>
  <div class="card col-12" style="margin: 10px;">
    <img class="card-img" style="max-width: 100px;" src="../Public/img/<?php echo $row['image']; ?>" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><?php echo $row['title']; ?></h5>
    </div>
    <div class="card-footer">
      <small class="text-muted"><?php echo nl2br($row['body']);?> </small>
    </div>
  </div>

<?php }?>


<?php
include('parcial/footer.php');
?>