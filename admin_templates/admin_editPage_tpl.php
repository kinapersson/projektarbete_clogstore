<div class="container" style="padding-top:25px">
  <div class="wrapper">
    <div class="col-lg-9 col-md-12 col-sm-12 col-sx-12">
      <div id="respond">
        <?php echo $templateData->get_response();?>
        <form method="post" action="?controller=editPage">
          <div class="form-group">
            <label name="labelCreateAboutUsText">Lägg till text om oss</label>
            <?php
              foreach($templateData->get_loadPageInfo() as $showPageInfo){
            ?>
              <textarea name="aboutUsText" class="form-control" placeholder="Skriv en text" rows="3"><?php echo $showPageInfo->aboutus; ?></textarea>
            <?php } ?>
          </div>
          <button type="submit" class="btn btn-primary">Redigera</button>
        </form>
      </div>
    </div>
  </div>
</div>