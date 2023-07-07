<section class="background-theme" id="auth">
    <div class="container-fluid py-5 h-100" >
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5 pb-5">
                <div class="card shadow" style="border-radius: 1rem">
                    <div class="m-4 m-md-5 pb-1">
                        <h4>Sign Up</h4>
                        <hr>
                        <form action="<?=base_url('/register')?>"
                            method="post"
                            class="form"> 
                            <div class="form-group">

                                <input type="text" 
                                class="form-control mb-2"
                                name="first_name"
                                placeholder="First Name"
                                value="<?= set_value('first_name') ?>"
								required>

                                <input type="text" 
                                class="form-control mb-2"
                                name="last_name"
                                placeholder="Last Name"
                                value="<?= set_value('last_name')?>"
								required>

                                <input type="text" 
                                class="form-control mb-2"
                                name="email"
                                placeholder="Email Address"
                                value="<?= set_value('email')?>"
								required>

                                <input type="password" 
                                class="form-control mb-2"
                                name="password"
                                placeholder="Password"
                                value=""
								required>
                                
                                <input type="password" 
                                class="form-control mb-2"
                                name="confirmPassword"
                                placeholder="Confrim Password"
								required>

                                <?php if (isset($validation)): ?>
                                    <div class="col-12 error-msg">
                                        <div class="alert alert-danger" role="alert">
                                            <span class="close-btn error-btn">&times;</span>
                                            <div class="row pt-3">
                                                <?= $validation->listErrors() ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                              <div class="row d-flex justify-content-center">
                                <input type="submit" class="btn btn-info btn-theme mt-4 mx-auto" value="Sign Up">
                                    <button type="button" class="btn btn-info btn-theme mt-4 mx-auto" onclick="location.href='<?=base_url()?>'">
                                    Login to Account
                                    </button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>