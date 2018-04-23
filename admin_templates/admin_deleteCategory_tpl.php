<div class="container" style="padding-top:25px">
  <div class="wrapper">
    <div class="col-lg-9 col-md-12 col-sm-12 col-sx-12">
      <div id="respond">
      <?php echo $templateData->Response;?>
        <form method="post" action="?controller=deleteCategory">
          <div class="form-group">
            <table class="table table-sm table-dark">
                <thead>
                    <tr>
                        <th> Kategorinamn </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($templateData as $showCategories){
                    ?>
                        <tr>
                            <td>
                                <?php echo $showCategories->title ?>
                                <?php var_dump($showCategories->catid); ?>
                            </td>
                            <td>
                                <button type="button" id="<?php $showCategories->catid; ?>" class="btn btn-danger float-right">Delete</button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>