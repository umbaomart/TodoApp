<?php require APPROOT. '\views\inc\header.php'; ?>

    <!-- Register Form -->
    <?php 
        if (isset($_SESSION['user_id'])) {
            redirect('index');
        } else {
            
        }
    ?>
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body bg-white mt-5">
                <?php flash('register_success'); ?>
                <h2>Login</h2>
                <p>Please fill your credentials to login</p>
                <form action="<?php echo URLROOT . '/users/login'; ?>" method="POST">
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
                    <!-- Buttons -->
                    <div class="row">
                        <!-- Button for register submit -->
                        <div class="col">
                            <input type="submit" value="Login" class="btn btn-success btn-block">
                        </div>
                            <!-- Button for login page -->
                        <div class="col">
                            <a href="<?php echo URLROOT . '/register';?>" class="btn btn-light btn-block">No account? Register</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require APPROOT. '\views\inc\footer.php'; ?>