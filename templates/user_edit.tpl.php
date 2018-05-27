
<!------ edit tpl ---------->
<div class="container">
    <h4 class="page-header" style="padding: 0px">Edit Profile</h4><a href="?controller=my_account"><i class="glyphicon glyphicon-home"></i>Home</a>
    <div class="row">
        <!-- left column -->
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="text-center">
                <form method="POST" enctype="multipart/form-data" action="">
                <img src="http://via.placeholder.com/300x200" class="avatar img-circle img-thumbnail" alt="avatar">
                <h6>Upload a different photo...</h6>
                    <input type="file" class="text-center center-block well well-sm" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit">
                </form>
            </div>
        </div>
        <!-- edit form column -->
        <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
            <div class="alert alert-info alert-dismissable" style="padding: 5px">
                <h3>Personal info</h3>
            </div>
            <form class="form-horizontal" action="?controller=user_edit" method="POST">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" placeholder="Enter name" value="<?php echo $_SESSION['u_name']; ?>" id="name" name="name" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input class="form-control" placeholder="Enter email" value="<?php echo $_SESSION['u_email'] ?>" id="email" name="email" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Phone:</label>
                    <div class="col-md-8">
                        <input class="form-control" placeholder="Enter phone" value="<?php echo $_SESSION['u_phone'] ?>" id="phone" name="phone" type="text">
                    </div>
                </div>
                <!--<div class="form-group">
                    <label class="col-md-3 control-label">Address: Street</label>
                    <div class="col-md-8">
                        <input class="form-control" value="" id="street" name="street" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label" for="textinput" >City:</label>
                    <div class="col-xs-4">
                        <input class="form-control" value="" id="city" name="city" type="text">
                    </div>
                    <label class="col-xs-2 control-label" for="textinput" >Postcode:</label>
                    <div class="col-xs-4">
                        <input class="form-control" value="" id="postcode" name="postcode" type="text">
                    </div>
                </div>-->
                <div class="form-group">
                    <label class="col-md-3 control-label">Password:</label>
                    <div class="col-sm-8">
                        <input class="form-control" id="password" name="password" placeholder="Enter password" type="password" value="<?php echo $_SESSION['u_phone'] ?>" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Confirm password:</label>
                    <div class="col-md-8">
                        <input class="form-control" id="cofirmpassword" name="confirmpassword" placeholder="Confirm password" value="<?php echo $_SESSION['u_phone'] ?>" type="password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <input class="btn btn-info"  type="submit" name="update" id="update" value="update">
                        <input type="hidden" name="uid" value="<?php echo $_SESSION['uid']; ?>">
                        <span></span>
                    </div>
                </div>
            </form>
