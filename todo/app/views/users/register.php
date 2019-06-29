 <!-- col of img design of todo -->
 <div class="col-sm-7">
    <h1>This is a todo app </h1>
    <p>Create an account to start using this app</p>
</div>
<!-- col of sign up form -->
<div class="col-sm-5 bg-light">
    <h2>Create an Account</h2>
    <p>Please fill out the form to register with us!</p>
    <form action="" method="post">
        <div class="form-group">
            <label for="name">Name: <sup>*</sup></label>
            <input type="text" name="name" class="form-control form-control-md <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
        </div>
        <!-- Field for last name -->
        <div class="form-group">
            <label for="name">Last Name: <sup>*</sup></label>
            <input type="text" name="lastName" class="form-control form-control-md <?php echo (!empty($data['last_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['last_name']; ?>">
            <span class="invalid-feedback"><?php echo $data['last_name_err']; ?></span>
        </div>
        <!-- Field for email -->
        <div class="form-group">
            <label for="name">Email: <sup>*</sup></label>
            <input type="email" name="email" class="form-control form-control-md <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
        </div>
        <!-- Field for password -->
        <div class="form-group">
            <label for="name">Password: <sup>*</sup></label>
            <input type="password" name="password" class="form-control form-control-md <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
        </div>
        <!-- Field for confirm password -->
        <div class="form-group">
            <label for="name">Confirm Password: <sup>*</sup></label>
            <input type="password" name="confirmPassword" class="form-control form-control-md <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
            <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
        </div>
        <!-- Buttons -->
        <div class="row">
            <!-- Button for register submit -->
            <div class="col">
                <input type="submit" value="Register" class="btn btn-success btn-block">
            </div>
                <!-- Button for login page -->
            <div class="col">
                <a href="<?php echo URLROOT . '/users/login';?>" class="btn btn-light btn-block">Have an account? Login</a>
            </div>
        </div>
    </form>
</div>