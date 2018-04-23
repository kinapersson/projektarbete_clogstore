<div class="container" style="padding-top:25px">
  <div class="wrapper">
    <div class="col-lg-9 col-md-12 col-sm-12 col-sx-12">
      <div id="respond">
      <?php echo $templateData->get_response();?>
      <?php echo var_dump($templateData->get_response()); ?>
        <form method="post" action="?controller=createImage">
          <div class="form-group">
            <label name="labelCreateImage">Skapa en bild</label>
            <input name="imageURL" type="text" class="form-control" placeholder="Skriv in en URL"/>
          </div>
          <button type="submit" class="btn btn-primary">Skapa</button>
        </form>
      </div>
    </div>
  </div>
</div>