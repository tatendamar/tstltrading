</div><br><br>
<footer class="text-center" id="footer"> &copy; Copyright 2017 TSL TRADING</footer>

<script type="text/javascript">
function updateSizes(){
  alert("update sizes");
}
function get_child_options(){
  var parentID = $('#parent').val();
  $.ajax({
    url:'/series2/admin/parsers/child_categories.php',
    type: 'POST',
    data: {parentID : parentID},
    success: function(){
      $('#child').html(data);
    },
    error: function(){alert("Something is wrong with the child options.")},
  })
}
$('select[name="parent"]').change(get_child_options):
</script>
 </body>
</html>
