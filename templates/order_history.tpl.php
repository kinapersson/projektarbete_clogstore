<div class="container">
<h3>Order history</h3><a href="?controller=my_account"><i class="glyphicon glyphicon-home"></i>Home</a><br><br>
    <div class="table-responsive">
        <div class="col-lg-10 col-md-9 col-sm-10 col-sx-10">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th> OID </th>
                                <th> Order date</th>
                                <th> Delivery Address</th>
                                <th> Payment Date</th>
                                <th> Order Status</th>
                                <th> Payment Method</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($templateData as $showOrders) {
                                if ($_SESSION['u_id'] == $showOrders->UID) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $showOrders->OID ?>
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

                                    </tr>
                                    <?php
                                }
                            }
                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
                </form>