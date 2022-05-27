<?= $this->extend('layout/auth') ?>

<?= $this->section('content') ?>

        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="<?= base_url('auth/images/signin-image.jpg') ?>" alt="sing up image"></figure>
                        <a href="<?= base_url('register') ?>" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Log In</h2>
                        <?php if (!empty(session()->getFlashdata('error'))) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo session()->getFlashdata('error'); ?>
                            </div>
                        <?php endif; ?>
                        <form method="POST" class="register-form" id="login-form" action="<?= base_url('login') ?>">
                        <?= csrf_field() ?>
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="your_name" placeholder="Username"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="your_pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" id="signin" class="form-submit" value="Masuk"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

<?= $this->endSection() ?>