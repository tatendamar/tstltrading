</div><br><br>
<footer class="text-center" id="footer"> &copy; Copyright 2017 TSL TRADING</footer>


<script>
$(window).scroll(function() {
   var vscroll = $(this).scrollTop();
   $('#logotext').css({
     "transform" : "translate(0px, "+vscroll/2+"px)"
   });
});

function detailsmodal(product_id){
  var data = {"product_id": product_id};
  $.ajax({
    url: <?php echo BASEURL; ?>+'includes/detailsmodal.php',
    method: "post",
    data :data,
    success: function(){
      $('body').append(data);
      $('#details-1').modal('toggle');
    },
    error: function(){
      alert("Something is not right")
    }
  });
};

</script>
</body>
</html>
