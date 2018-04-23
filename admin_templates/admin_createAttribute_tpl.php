<div class="container" style="padding-top:25px">
  <div class="wrapper">
    <div class="col-lg-9 col-md-12 col-sm-12 col-sx-12">
      <div id="respond">
      <?php echo $templateData->get_response();?>
      <?php echo var_dump($templateData->get_response()); ?>
        <form method="post" action="?controller=createAttribute">
          <div class="form-group">
            <label name="labelCreateAttribute">Skapa ett attribut</label>
            <input name="attributeName" type="text" class="form-control" placeholder="Skriv in ett attribut"/>
          </div>
          <button type="submit" class="btn btn-primary">Skapa</button>
        </form>
      </div>
    </div>
  </div>
</div>