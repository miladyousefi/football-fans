<?php
include('parcial_admin/head.php');
include('parcial_admin/nav.php');
?>
<div class="container" dir="rtl">
<form action="process.php" method="post" enctype="multipart/form-data">


<input type="hidden" name="id_team" value="<?php echo $_GET['id_team']; ?>">
<input type="file" name="file" style="display: none;" id="selectedFile">
<input type="button" class="btn btn-danger" style="margin: 10px;" value="انتخاب فایل" onclick="document.getElementById('selectedFile').click();" /> 
<div class="form-group">
<button type="submit" class="btn btn-success btn-block">بارگزاری فایل</button>
</div>
</form>
</div>


<?php
include('parcial_admin/footer.php');
?>