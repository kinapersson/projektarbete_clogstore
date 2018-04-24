<div class="container" style="padding-top:25px">
  <div class="wrapper">
    <div class="col-lg-9 col-md-12 col-sm-12 col-sx-12">
      <div id="respond">
        <form method="post" action="?controller=deleteAttribute">
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
                    foreach($templateData as $showAttributes){
                    ?>
                        <tr>
                            <td>
                                <?php echo $showAttributes->AttributeNameType ?>
                                <!-- <?php var_dump($showAttributes->catid); ?> -->
                            </td>
                            <td>
                                <button type="submit" name="removeID" class="btn btn-danger float-right" value="<?php echo $showAttributes->ATID; ?>">Delete</button>
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