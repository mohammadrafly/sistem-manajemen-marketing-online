<?= $this->extend('layout/auth') ?>

<?= $this->section('content') ?>

        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Register</h2>
                        <?php if (!empty(session()->getFlashdata('success'))) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo session()->getFlashdata('success'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty(session()->getFlashdata('error'))) : ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <?php echo session()->getFlashdata('error'); ?>
                            </div>
                        <?php endif; ?>
                        <form method="POST" class="register-form" id="register-form" action="<?= base_url('register') ?>">
                        <?= csrf_field() ?>    
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-book material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Nama"/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="name" placeholder="Username"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_password" id="re_pass" placeholder="Konfirmasi Password"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="<?= base_url('auth/images/signup-image.jpg') ?>" alt="sing up image"></figure>
                        <a href="<?= base_url('login') ?>" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

<?= $this->endSection() ?>