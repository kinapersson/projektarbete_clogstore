<div class="container" style="padding-top:25px">
  <div class="wrapper">
    <div class="col-lg-9 col-md-12 col-sm-12 col-sx-12">
      <div id="respond">
        <form method="post" action="?controller=deleteUser">
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
                    foreach($templateData as $showUsers){
                    ?>
                        <tr>
                            <td>
                                <?php echo $showUsers->name ?>
                            </td>
                            <td>
                                <button type="submit" name="removeID" class="btn btn-danger float-right" value="<?php echo $showUsers->uid; ?>">Delete</button>
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