<div class="container" style="padding-top:25px">
  <div class="wrapper">
    <div class="col-lg-9 col-md-12 col-sm-12 col-sx-12">
      <div id="respond">
      <?php echo $templateData->get_response();?>
        <form method="post" action="?controller=createProduct" enctype="multipart/form-data">
          <div class="form-group">
            <label name="labelCreateTitle">Skriv in produktens titel</label>
            <input name="productTitle" type="text" class="form-control" placeholder="Titel" value="<?php echo $templateData->get_productTitle(); ?>"/>
            <label name="labelCreateDescription">Skriv in produktens beskrivning</label>
            <input name="productDescription" type="text" class="form-control" placeholder="Beskrivning" value="<?php echo $templateData->get_productDescription(); ?>"/>
            <label name="labelCreatePrice">Skriv in produktens pris</label>
            <input name="productPrice" type="text" class="form-control" placeholder="Pris" value="<?php echo $templateData->get_productPrice(); ?>"/>
            <label name="labelCreateImage">Ladda upp bild</label>
            <input name="productImage" type="file" class="form-control" placeholder="Bild" value="<?php echo $templateData->get_productImage(); ?>"/>
            <label name="labelCreateProductCategories">Välj kategorier till produkten</label>
            <div class="dropdown show">
              <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Kategorier
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <?php
                foreach($templateData->get_loadCategories() as $showCategories){
                ?>
                <div class="checkbox">
                  <label>
                    <?php echo $showCategories->title ?> <input name="addCategories[]" type="checkbox" class="dropdown-item" value="<?php echo $showCategories->catid ?>">
                  </label>
                </div>
                <?php
                }
                ?>
              </div>
            </div>

            <label name="labelCreateProductAttributes">Välj attribut till produkten</label>
            <div class="dropdown show">
              <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Attribut
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <?php
                foreach($templateData->get_loadAttributes() as $showAttributes){
                ?>
                <div class="checkbox">
                  <label>
                    <?php echo $showAttributes->AttributeNameType ?> <input name="addAttributes[]" type="checkbox" class="dropdown-item" value="<?php echo $showAttributes->ATID ?>">
                  </label>
                </div>
                <?php
                }
                ?>
              </div>
            </div>
            
          </div>
          <button type="submit" class="btn btn-primary">Skapa</button>
        </form>
      </div>
    </div>
  </div>
</div>