<?php

require 'templates/cart.tpl.php';

?>

<div class="container" style="padding-top:25px">
  <div class="wrapper">
    <div class="col-lg-9 col-md-12 col-sm-12 col-sx-12">
        <form method="post" action="?controller=thanks">
          <div class="form-group">
            <label name="OrderCreateAddressDelivery">User Name</label>
            <input name="addressDelivery" type="text" class="form-control" placeholder="Write your address delivery" value=""/>

            <label name="OrderCreatePaymentMethod">Payment Method </label><br>
            <label class="radio-inline">
            <input type="radio" name="paymentMethod" value="Credit Card">Credit Card</label><br>
            <label class="radio-inline">
            <input type="radio" name="paymentMethod" value="Bank Transfer">Bank Transfer</label>
          </div>
          <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
      </div>
    </div>
  </div>