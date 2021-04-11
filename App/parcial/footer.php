    <script src="../Public/assets/js/jquery-3.3.1.min.js"></script>
    <script src="../Public/assets/js/popper.min.js"></script>
    <script src="../Public/assets/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
$('.form-item').on('submit', function() {

    var id = $(this).attr("id");
    var user = $('#user').val();
    var id = $('#id'+1).val();

   

    $.ajax({
       url:"cart-process.php",   // script location
       method:"POST",            // if you use post, then get the values from $_POST
       //dataType:"json", NO NEED
       data:{
          id:id,                 // this is how the array will be read
          user:user,
        },
        success:function(data)          //success call
        {
         $('#mycart').html(data);        
         alert("محصول مورد نظر به سبد خرید شما اضافه شد");  // even if no data is returned 
                                                   //alert will be shown
        }
    });
return false;
});
</script>
</div>
</body>
</html>