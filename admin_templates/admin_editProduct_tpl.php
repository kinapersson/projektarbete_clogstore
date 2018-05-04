<?php
var_dump($templateData->get_loadProducts());
echo "<br>";
echo "<br>";
echo "mellanrum";
echo "<br>";
echo "<br>";
var_dump($templateData->get_loadCategories());
echo "<br>";
echo "<br>";
echo "mellanrum";
echo "<br>";
echo "<br>";
var_dump($templateData->get_loadAttributes());
?>

<div class="container" style="padding-top:25px">
  <div class="wrapper">
    <div class="col-lg-9 col-md-12 col-sm-12 col-sx-12">
      <div id="respond">
        <!-- <form method="post" action="?controller=editProduct"> -->
          <div class="form-group">
            <table class="table table-sm table-dark">
                <thead>
                    <tr>
                        <th> Produktnamn </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($templateData->get_loadProducts() as $showProducts){
                    ?>
                        <tr>
                            <td>
                                <?php echo $showProducts->Title ?>
                                <!-- <?php var_dump($showProducts->PID); ?> -->
                            </td>
                            <td>
                                <button type="button" name="editID" class="btn btn-info float-right" data-toggle="modal" data-target="#myModal" value="<?php echo $showProducts->PID; ?>">Edit</button>
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

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><?php echo $showProducts->Title?></h4>
      </div>
      <div class="modal-body">
        <form method="post" action="?controller=editProduct">
            <div class="form-group">
                <label name="labelCreateTitle">Skriv in produktens titel</label>
                <input name="productTitle" type="text" class="form-control" placeholder="Titel" value="<?php echo ""; ?>"/>
                <label name="labelCreateDescription">Skriv in produktens beskrivning</label>
                <input name="productDescription" type="text" class="form-control" placeholder="Beskrivning" value="<?php echo "" ?>"/>
                <label name="labelCreatePrice">Skriv in produktens pris</label>
                <input name="productPrice" type="text" class="form-control" placeholder="Pris" value="<?php echo "" ?>"/>
                <label name="labelCreateImage">Skriv in produktens bildnamn</label>
                <input name="productImage" type="text" class="form-control" placeholder="Bild" value="<?php echo "" ?>"/>

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
        </form>
      </div>
      <div class="modal-footer">
        <button type=submit class="btn btn-info">OK</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>