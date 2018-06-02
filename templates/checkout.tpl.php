<?php

//Create a user form, and all the data from this form will be sent to the "order" table.

require 'templates/cart.tpl.php';

?>

<div class="container" style="padding-top:25px">
  <div class="wrapper">
    <div class="col-lg-9 col-md-12 col-sm-12 col-sx-12">
 
        <form method="post" action="?controller=checkout">
          <div class="form-group">
            <label name="OrderCreateName">User Name</label>
            <input name="userName" type="text" class="form-control" placeholder="Write your user name" value=""/>
            <label name="OrderCreateEmail">E-mail</label>
            <input name="userEmail" type="text" class="form-control" placeholder="Write your e-mail" value=""/>
            <label name="OrderCreatePhoneNumber">Phone Number</label>
            <input name="userMobileNumber" type="text" class="form-control" placeholder="Write your phone number" value=""/>
            <label name="OrderCreateWorkNumber">Contact Number Work</label>
            <input name="WorkNumber" type="text" class="form-control" placeholder="Write your contact number work" value=""/>

            <label name="OrderCreateAddressDelivery">Delivery Address</label>
            <input name="userAddressDelivery" type="text" class="form-control" placeholder="Write your delivery address" value=""/>
            <label name="OrderCreateZipcodeDelivery">Delivery Zip Code</label>
            <input name="userZipcodeDelivery" type="text" class="form-control" placeholder="Write your deilvery zip code" value=""/>
            <label name="OrderCreateCityDelivery">Delivery City</label>
            <input name="userCityDelivery" type="text" class="form-control" placeholder="Write your delivery city" value=""/>

            <label name="OrderCreateAddressInvoice">Billing Address</label>
            <input name="userAddressInvoice" type="text" class="form-control" placeholder="Write your billing address" value=""/>
            <label name="OrderCreateZipcodeInvoice">Billing Address Zip Code</label>
            <input name="userZipcodeInvoice" type="text" class="form-control" placeholder="Write your billing address zip code" value=""/>
            <label name="OrderCreateCityInvoice">Billing Address City</label>
            <input name="userCityInvoice" type="text" class="form-control" placeholder="Write your billing Address City" value=""/>
            
            <label name="OrderCreatePassword">Create a Password</label>
            <input name="userPassword" type="text" class="form-control" placeholder="Create a password" value=""/>
            
            <label name="OrderCreatePassword">Payment Method </label>
            <label class="radio-inline">
            <input type="radio" name="optradio">Credit Card</label>
            <label class="radio-inline">
            <input type="radio" name="optradio">Bank Transfer</label>
          </div>
          <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
      </div>
    </div>
  </div>


		


    
