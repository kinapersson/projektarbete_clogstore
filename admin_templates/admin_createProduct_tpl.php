<div class="container" style="padding-top:25px">
  <div class="wrapper">
    <div class="col-lg-9 col-md-12 col-sm-12 col-sx-12">
      <div id="respond">
      <?php echo $templateData->get_response();?>
        <form method="post" action="?controller=createProduct">
          <div class="form-group">
            <label name="labelCreateTitle">Skriv in produktens titel</label>
            <input name="productTitle" type="text" class="form-control" placeholder="Titel"/>
            <label name="labelCreateDescription">Skriv in produktens beskrivning</label>
            <input name="productDescription" type="text" class="form-control" placeholder="Beskrivning"/>
            <label name="labelCreatePrice">Skriv in produktens pris</label>
            <input name="productPrice" type="text" class="form-control" placeholder="Pris"/>
          </div>
          <button type="submit" class="btn btn-primary">Skapa</button>
        </form>
      </div>
    </div>
  </div>
</div>