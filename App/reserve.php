<?php
session_start();
include('../Database/connect_db.php');

$match_id=$_GET['match_id'];
$user_id=$_SESSION['user'];
$sql2="SELECT * FROM reserve WHERE user_id='$user_id' AND $match_id='$match_id'";
$result2=mysqli_query($conn,$sql2);
$row=mysqli_fetch_assoc($result2);
if($row!=NULL){
     $sql11="DELETE FROM reserve WHERE user_id='$user_id' AND match_id='$match_id'";
     $result11=mysqli_query($conn,$sql11);
?> 
     <script type="text/javascript">window.history.back();</script>
<?php
}
if(!isset($_SESSION['user'])){
?>
     <script type="text/javascript">window.history.back();</script>
<?php
}
include('../Database/connect_db.php');
$match_id=$_GET['match_id'];
$user_id=$_SESSION['user'];
$sql="INSERT INTO reserve(match_id,user_id) VALUES('$match_id','$user_id')";
$result=mysqli_query($conn,$sql);
if ($result) {
    ?>
     <script type="text/javascript">window.history.back();</script>
    <?php
}