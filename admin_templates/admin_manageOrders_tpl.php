<div class="container" style="padding-top:25px">
  <div class="wrapper">
    <div class="col-lg-9 col-md-12 col-sm-12 col-sx-12">
      <div id="respond">
        <!-- <form method="post" action="?controller=manageOrders"> -->
          <div class="form-group">
            <table class="table table-sm table-dark">
                <thead>
                    <tr>
                        <th> OID </th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($templateData->get_loadOrders() as $showOrders){
                    ?>
                        <tr>
                            <td>
                                <?php echo $showOrders->OID ?>
                            </td>
                            <td>
                                <button type="button" name="editID" class="btn btn-info float-right" data-toggle="modal" data-target="#myModal<?php echo $showOrders->OID; ?>">Edit</button>
                                
                                <!-- Modal -->
                                <div id="myModal<?php echo $showOrders->OID; ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <form method="post" action="?controller=manageOrders">
                                    <div class="modal-header">
                                        <h4 class="modal-title"><?php echo $showOrders->OID ?></h4>
                                    </div>
                                    
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input name="orderId" type="hidden" class="form-control" value="<?php echo $showOrders->OID; ?>"/>
                                            <label name="labelCreateOrderDate">Skriv in beställningsdatumn</label>
                                            <input name="orderDate" type="text" class="form-control" placeholder="Beställningsdatumn" value="<?php echo $showOrders->OrderDate; ?>"/>
                                            <label name="labelCreateAddressDelivery">Skriv in en adress</label>
                                            <input name="orderAddressDelivery" type="text" class="form-control" placeholder="Address" value="<?php echo $showOrders->AddressDelivery; ?>"/>
                                            <label name="labelCreatePaymentDate">Skriv in betalningsdatumn</label>
                                            <input name="orderPaymentDate" type="text" class="form-control" placeholder="Betalningsdatumn" value="<?php echo $showOrders->PaymentDate; ?>"/>
                                            <label name="labelCreateOrderStatus">Skriv in orderns status</label>
                                            <input name="orderStatus" type="text" class="form-control" placeholder="Orderns status" value="<?php echo $showOrders->OrderStatus; ?>"/>
                                            <label name="labelCreatePaymentMethod">Skriv in betalningsmetod</label>
                                            <input name="orderPaymentMethod" type="text" class="form-control" placeholder="Betalningsmetod" value="<?php echo $showOrders->PaymentMethod; ?>"/>
                                        </div>
                                    </div>
                                <div class="modal-footer">
                                    <button type=submit class="btn btn-info">OK</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                                </form>
                                </div>

                            </div>
                            </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
          </div>
        <!-- </form> --> 
      </div>
    </div>
  </div>
</div>