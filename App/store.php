<?php
error_reporting(E_ALL); // or E_STRICT
ini_set("display_errors",1);
ini_set("memory_limit","1024M");
include('parcial/head.php');
include('parcial/nav.php');
include('../Database/connect_db.php');

?>
<div class="container-fluid" dir="rtl">
  <div class="row">

<?php 
$sql="SELECT * FROM ecommerce";
$result=mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){
?>
<div class="card" style="min-width: 18rem; max-width: 18rem; margin: 8px;">
  <img class="card-img-top" src="../Public/img/product/<?php echo $row['product_image']; ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['product_title']; ?></h5>
    <p class="card-text"><?php echo $row['product_desc'];?></p>
    <form class="form-item"  method="post" >
      <input type="hidden"  id="id" value="<?php echo $row['product_id']; ?>" name="id">
      <input type="hidden" id="user" value="<?php echo $_SESSION['user']; ?>" name="user">
      <input type="submit" class="btn btn-primary btn btn-block" name="add_to_cart" value="افزودن به سبد">
    </form>
  </div>
</div>
<?php }?>
</div>

</div>

<?php
include('parcial/footer.php');
?>

