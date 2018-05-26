<?php

//Create a user form, and all the data from this form will be sent to the "order" table.

require 'templates/cart.tpl.php';

?>



<section class="container fluid" id="cart_form" style="padding-top:25px">
	<div class="col-lg-12 col-md-12 col-sm-12 col-sx-12">



<form method="post" action="?controller=place_order">
    <h3 class="panel-title">Contact information</h3>
    <div class="panel-body">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputName">Name</label>
        <input type="name" class="form-control" id="inputName" placeholder="Name">
      </div>
      <div class="form-group col-md-6">
        <label for="inputSurname">Surname</label>
        <input type="surname" class="form-control" id="inputPassword4" placeholder="Surname">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Email</label>
        <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
      </div>
      <div class="form-group col-md-6">
        <label for="inputPhone4">Phone</label>
        <input type="phone" class="form-control" id="inputPhone" placeholder="Phone">
      </div>
    </div>
    <div class="form-group col-md-6">
      <label for="inputAddress">Address</label>
      <input type="text" class="form-control" id="inputAddress" placeholder="Street name and number">
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputCity">City</label>
        <input type="text" class="form-control" id="inputCity">
      </div>
      <div class="form-group col-md-6">
      <label for="inputAddress">Zip</label>
      <input type="text" class="form-control" id="inputAddress" placeholder="Street name and number">
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputCity">Country</label>
        <input type="text" class="form-control" id="inputCity">
      </div>
      
    </div>
  
	  <h3 class="panel-title">Delivery Address</h3>

<div class="form-group col-md-6">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Street name and number">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-6">
    <label for="inputAddress">Zip</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Street name and number">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Country</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    
  </div>

  
  <button type="submit" class="btn btn-primary">Sign in</button>
   <button type="submit" class="btn btn-primary">Place Order</button>
   <div>

</div>
 
</form>


		


    
