<?php
 require_once 'core/init.php';
 include 'includes/head.php';
 include 'includes/navigation.php';
 include 'includes/headerfull.php';
 include 'includes/leftside.php';
 ?>

    <!--main content-->
    <div class="col-md-8">
      <div class="row">
        <h2 class="text-center">Feature Products</h2>
          <div class="col-md-3">
            <h4>Chemicals</h4>
            <img src="#" alt="tslprod" class="img-thumb" />
            <p class="list-price text-danger">List Price: <s>$0.00</s></p>
            <p class="price">Our Price: $0.00</p>
            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-1">Details</button>
          </div>

          <div class="col-md-3">
            <h4>Chemicals</h4>
            <img src="#" alt="tslprod"  class="img-thumb" />
            <p class="list-price text-danger">List Price: <s>$0.00</s></p>
            <p class="price">Our Price: $0.00</p>
            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-1">Details</button>
          </div>

          <div class="col-md-3">
            <h4>Chemicals</h4>
            <img src="#" alt="tslprod"  class="img-thumb" />
            <p class="list-price text-danger">List Price: <s>$0.00</s></p>
            <p class="price">Our Price: $0.00</p>
            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-1">Details</button>
          </div>

          <div class="col-md-3">
            <h4>Chemicals</h4>
            <img src="#" alt="tslprod"  class="img-thumb" />
            <p class="list-price text-danger">List Price: <s>$0.00</s></p>
            <p class="price">Our Price: $0.00</p>
            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-1">Details</button>
          </div>

          <div class="col-md-3">
            <h4>Chemicals</h4>
            <img src="#" alt="tslprod"  class="img-thumb" />
            <p class="list-price text-danger">List Price: <s>$0.00</s></p>
            <p class="price">Our Price: $0.00</p>
            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-1">Details</button>
          </div>

          <div class="col-md-3">
            <h4>Chemicals</h4>
            <img src="#" alt="tslprod"  class="img-thumb" />
            <p class="list-price text-danger">List Price: <s>$0.00</s></p>
            <p class="price">Our Price: $0.00</p>
            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-1">Details</button>
          </div>

          <div class="col-md-3">
            <h4>Chemicals</h4>
            <img src="#" alt="tslprod"  class="img-thumb" />
            <p class="list-price text-danger">List Price: <s>$0.00</s></p>
            <p class="price">Our Price: $0.00</p>
            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-1">Details</button>
           </div>

          <div class="col-md-3">
            <h4>Chemicals</h4>
            <img src="#" alt="tslprod"  class="img-thumb" />
            <p class="list-price text-danger">List Price: <s>$0.00</s></p>
            <p class="price">Our Price: $0.00</p>
            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-1">Details</button>
          </div>
      </div>
    </div>
  <!--right side bar -->
   <div class="col-md-2">Right Side Bar</div>

 </div><br><br>
<footer class="text-center" id="footer">&copy; Copyright 2017 TSL TRADING</foooter>


<script>
$(window).scroll(function() {
 var vscroll = $(this).scrollTop();
 $('#logotext').css({
   "transform" : "translate(0px, "vscroll/2+"px)"
 });
});
</script>

</body>
</html>


    <?php
      include 'includes/detailsmodal.php';
      include 'includes/rightside..php';
      include 'includes/footer..php';
     ?>
