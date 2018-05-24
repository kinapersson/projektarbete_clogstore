<div class="container" style="padding-top:25px">
  <div class="wrapper">
    <div class="col-lg-9 col-md-12 col-sm-12 col-sx-12">
      <div id="respond">
        <form method="post" action="?controller=manageOrders">
          <div class="form-group">
            <table class="table table-sm table-dark">
                <thead>
                    <tr>
                        <th> OID </th>
                        <th> UID</th>
                        <th> Order date</th>
                        <th> Delivery Address</th>
                        <th> Payment Date</th>
                        <th> Order Status</th>
                        <th> Payment Method</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($templateData as $showOrders){
                    ?>
                        <tr>
                            <td>
                                <?php echo $showOrders->OID ?>
                            </td>
                            <td>
                                <?php echo $showOrders->UID ?>
                            </td>
                            <td>
                                <?php echo $showOrders->OrderDate ?>
                            </td>
                            <td>
                                <?php echo $showOrders->AddressDelivery ?>
                            </td>
                            <td>
                                <?php echo $showOrders->PaymentDate ?>
                            </td>
                            <td>
                                <?php echo $showOrders->OrderStatus ?>
                            </td>
                            <td>
                                <?php echo $showOrders->PaymentMethod ?>
                            </td>
                            <td>
                                <button type="submit" name="removeID" onclick="return confirm('Är du säker?')" class="btn btn-danger float-right" value="<?php echo $showOrders->OID; ?>">Delete</button>
                            </td>
                            <td>
                                <button type="submit" name="editID" class="btn btn-default float-right" value="<?php echo $showOrders->OID; ?>">Edit</button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>