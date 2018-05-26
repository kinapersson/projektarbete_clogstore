<div class="container" style="padding-top:25px">
  <div class="wrapper">
    <div class="col-lg-9 col-md-12 col-sm-12 col-sx-12">
      <div id="respond">
      <?php echo $templateData->get_response();?>
        <form method="post" action="?controller=createUser">
          <div class="form-group">
            <label name="labelCreateName">Skapa ett användarnamn</label>
            <input name="userName" type="text" class="form-control" placeholder="Skriv in ett namn" value="<?php echo $templateData->get_userName(); ?>"/>
            <label name="labelCreateEmail">Lägg till epost</label>
            <input name="userEmail" type="text" class="form-control" placeholder="Skriv in en email" value="<?php echo $templateData->get_userEmail(); ?>"/>
            <label name="labelCreatePhoneNumber">Lägg till mobilnummer</label>
            <input name="userMobileNumber" type="text" class="form-control" placeholder="Skriv in ett mobilnummer" value="<?php echo $templateData->get_userMobileNumber(); ?>"/>
            <label name="labelCreateWorkNumber">Lägg till arbetsnummer</label>
            <input name="userWorkNumber" type="text" class="form-control" placeholder="Skriv in ett arbetsnummer" value="<?php echo $templateData->get_userWorkNumber(); ?>"/>

            <label name="labelCreateAddressDelivery">Lägg till en leverans adress</label>
            <input name="userAddressDelivery" type="text" class="form-control" placeholder="Skriv in en leverans adress" value="<?php echo $templateData->get_userAddressDelivery(); ?>"/>
            <label name="labelCreateZipcodeDelivery">Lägg till ett leverans postnummer</label>
            <input name="userZipcodeDelivery" type="text" class="form-control" placeholder="Skriv in ett leverans postnummer" value="<?php echo $templateData->get_userZipcodeDelivery(); ?>"/>
            <label name="labelCreateCityDelivery">Lägg till en leverans stad</label>
            <input name="userCityDelivery" type="text" class="form-control" placeholder="Skriv in en leverans stad" value="<?php echo $templateData->get_userCityDelivery(); ?>"/>

            <label name="labelCreateAddressInvoice">Lägg till en faktura adress</label>
            <input name="userAddressInvoice" type="text" class="form-control" placeholder="Skriv in en faktura adress" value="<?php echo $templateData->get_userAddressInvoice(); ?>"/>
            <label name="labelCreateZipcodeInvoice">Lägg till ett faktura postnummer</label>
            <input name="userZipcodeInvoice" type="text" class="form-control" placeholder="Skriv in ett faktura postnummer" value="<?php echo $templateData->get_userZipcodeInvoice(); ?>"/>
            <label name="labelCreateCityInvoice">Lägg till en faktura stad</label>
            <input name="userCityInvoice" type="text" class="form-control" placeholder="Skriv in en faktura stad" value="<?php echo $templateData->get_userCityInvoice(); ?>"/>
            
            <label name="labelCreatePassword">Skapa ett lösenord</label>
            <input name="userPassword" type="text" class="form-control" placeholder="Skriv in ett lösenord" value="<?php echo $templateData->get_userPassword(); ?>"/>
            <label name="labelCreateIsAdmin">Skapa en behörighet</label>
            <input name="userIsAdmin" type="text" class="form-control" placeholder="Skriv in admin eller user" value="<?php echo $templateData->get_userIsAdmin(); ?>"/>
          </div>
          <button type="submit" class="btn btn-primary">Skapa</button>
        </form>
      </div>
    </div>
  </div>
</div>