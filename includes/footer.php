</div><br><br>
<footer class="text-center" id="footer"> &copy; Copyright 2017 TSL TRADING</footer>


<script type="text/javascript">
$(window).scroll(function() {
   var vscroll = $(this).scrollTop();
   $('#logotext').css({
     "transform" : "translate(0px, "+vscroll/2+"px)"
   });
});

function detailsModal(product_id){
  var data = {"product_id" : product_id};
  $.ajax({
    url: '/series2/includes/detailsmodal.php',
    method : "post",
    data : data,
    success: function(data){
      $('body').append(data);
      $('#details-modal').modal('toggle');
    },
    error: function(){
      alert("Something is wrong");
    },
  });
};

  //var data = {"product_id": product_id};
  //$.ajax({
  //  url: <?php echo BASEURL; ?>+'includes/detailsmodal.php',
  //  method: "post",
    //data :data,
    //success: function(){
    //  $('body').append(data);
    //  $('#details-1').modal('toggle');
    //};
    //error: function(){
    //  alert("Something is not right")
    //};
  //});
//};

</script>
</body>
</html>
