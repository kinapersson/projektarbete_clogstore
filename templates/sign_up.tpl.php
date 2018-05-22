
<link rel="stylesheet" href="css/signup.css">
<body>
<div class="login-form">
<form  class="form-horizontal" method="POST" action="?controller=sign_up">
    <h2 class="text-center">Sign up</h2>

        <div class="form-group">
            <label for="name" class="control-label col-sm-2" value="<?php echo $name; ?>">Name</label>
            <div class="col-sm-10">
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter name" required>
            </div>
        </div>

        <div class="form-group">
                <label for="email" class="control-label col-sm-2"  value="<?php echo $email;?>">Email</label>
                <div class="col-sm-10">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter email" required>
                </div>
            </div>
            <div class="form-group">
                    <label for="phone" class="control-label col-sm-2" value="<?php echo $phone;?>">Phone</label>
                    <div class="col-sm-10">
                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter phone number">

                    </div>
                </div>
                <div class="form-group">
                        <label for="password" class="control-label col-sm-2" value="<?php echo $password;?>">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-4">
                            <button class="btn btn-primary" type="submit" id="submit" name="submit">Sign up</button>
                        </div>
                    </div>

</form>
    <p class="text-center" style="font-size: 18px"><a href="?controller=log_in">Log in</a></p>
</body>
</html>

