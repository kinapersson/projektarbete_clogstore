<div class="container" style="padding-top:25px">
  <div class="wrapper">
    <div class="col-lg-9 col-md-12 col-sm-12 col-sx-12">
      <div id="respond">
        <!-- <form method="post" action="?controller=editUser"> -->
          <div class="form-group">
            <table class="table table-sm table-dark">
                <thead>
                    <tr>
                        <th> Användare </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($templateData->get_loadUsers() as $showUsers){
                    ?>
                        <tr>
                            <td>
                                <?php echo $showUsers->name  ?>
                            </td>
                            <td>
                                <button type="button" name="editID" class="btn btn-info float-right" data-toggle="modal" data-target="#myModal<?php echo $showUsers->uid; ?>">Edit</button>
                                
                                <!-- Modal -->
                                <div id="myModal<?php echo $showUsers->uid; ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <form method="post" action="?controller=editUser">
                                    <div class="modal-header">
                                        <h4 class="modal-title"><?php echo $showUsers->name ?></h4>
                                    </div>
                                    
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input name="userId" type="hidden" class="form-control" value="<?php echo $showUsers->uid; ?>"/>
                                            <label name="labelCreateName">Skapa ett användarnamn</label>
                                            <input name="userName" type="text" class="form-control" placeholder="Skriv in ett namn" value="<?php echo $showUsers->name; ?>"/>
                                            <label name="labelCreateEmail">Lägg till epost</label>
                                            <input name="userEmail" type="text" class="form-control" placeholder="Skriv in en email" value="<?php echo $showUsers->email; ?>"/>
                                            <label name="labelCreatePhone">Lägg till nummer</label>
                                            <input name="userNumber" type="text" class="form-control" placeholder="Skriv in ett mobilnummer" value="<?php echo $showUsers->phone?>"/>

                                            <label name="labelCreateAddressDelivery">Lägg till en leverans adress</label>
                                            <input name="userAddressDelivery" type="text" class="form-control" placeholder="Skriv in en leverans adress" value="<?php ?>"/>
                                            <label name="labelCreateZipcodeDelivery">Lägg till ett leverans postnummer</label>
                                            <input name="userZipcodeDelivery" type="text" class="form-control" placeholder="Skriv in ett leverans postnummer" value="<?php ?>"/>
                                            <label name="labelCreateCityDelivery">Lägg till en leverans stad</label>
                                            <input name="userCityDelivery" type="text" class="form-control" placeholder="Skriv in en leverans stad" value="<?php ?>"/>

                                            <label name="labelCreateAddressInvoice">Lägg till en faktura adress</label>
                                            <input name="userAddressInvoice" type="text" class="form-control" placeholder="Skriv in en faktura adress" value="<?php ?>"/>
                                            <label name="labelCreateZipcodeInvoice">Lägg till ett faktura postnummer</label>
                                            <input name="userZipcodeInvoice" type="text" class="form-control" placeholder="Skriv in ett faktura postnummer" value="<?php ?>"/>
                                            <label name="labelCreateCityInvoice">Lägg till en faktura stad</label>
                                            <input name="userCityInvoice" type="text" class="form-control" placeholder="Skriv in en faktura stad" value="<?php ?>"/>

                                            <label name="labelCreatePassword">Skapa ett lösenord</label>
                                            <input name="userPassword" type="text" class="form-control" placeholder="Skriv in ett lösenord" value="<?php echo $showUsers->password; ?>"/>
                                            <label name="labelCreateIsAdmin">Skapa en behörighet</label>
                                            <input name="userIsAdmin" type="text" class="form-control" placeholder="Skriv in admin eller user" value="<?php echo $showUsers->userlevel; ?>"/>
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