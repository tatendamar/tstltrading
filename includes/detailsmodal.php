<!--modal-->
<div class="modal fade details-1" id="details-1" tabindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true">
 <div class="modal-dialog modal-lg">
   <div class="modal-content">
   <div class="modal-header">
     <button class="close" type="button" data-dismiss="modal" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
     <h4 class="modal-tittle text-center">Products</h4>
   </div>
   <div class="modal-body">
     <div class="container-fluid">
       <div class="row">
         <div class="col-sm-6">
             <div class="center-block">
                <img src="#" alt="Chemicals" class="details img-responsive" />
             </div>
         </div>
         <div class="col-sm-6">
           <h4>Details</h4>
            <p>comment on the Products</p>
            <hr>
            <p>Price: $0.00</p>
            <p>Type:Of chemicals</p>
            <form action="add_cart.php" method="post">
              <div class="form-group">
                <div class="col-xs-3">
                  <label for="quantity">Quantity:</label>
                  <input type="text" class="form-control" id="quantity" name="quantity">
                </div><div class="col-xs-9"</div>
                  <p>Available: 3</p>
              </div><br /><br />
                 <div class="form-group">
                   <label for="range">Range:</label>
                   <select name="size" id="size" class="form-control">
                     <option value=""></option>
                     <option value="#">#</option>
                     <option value="#">#</option>
                     <option value="#">#</option>
                   </select>
                 </div>
            </form>
         </div>
       </div>
     </div>
   </div>
   <div class="modal-footer">
    <button class="btn btn-default" data-dismiss="modal">Close</button>
    <button class="btn btn-warning" type="submit"><span class="glyphicon glyphicon-shopping-cart"></span>Add To Cart</button>
   </div>
 </div>
</div>
</div>
