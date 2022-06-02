<?= $this->extend('layout/dashboard') ?>

<?= $this->section('content') ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
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
                            <div class="card-body">
                                <h4 class="card-title"><?= $pages ?></h4>
                                <form method="POST" action="<?= base_url('dashboard/profile') ?>"  enctype="multipart/form-data">
                                <?= csrf_field() ?>     
                                    <input type="text" name="id" class="form-control" value="<?= $content['id'] ?>" hidden>
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nama</label>
                                                    <input type="text" name="name" class="form-control" placeholder="Nama" value="<?= $content['name'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" name="username" class="form-control" placeholder="Username" value="<?= $content['username'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" name="email" class="form-control" placeholder="Email" value="<?= $content['email'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="number" name="phone" class="form-control" placeholder="Phone" value="<?= $content['phone'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">Gender</label>
                                                <select name="gender" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                    <option selected value="<?= $content['gender'] ?>"><?= $content['gender'] ?></option>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label>Photo Profile</label>
                                                <br>
                                                <span>
                                                    <?php if($content['profile'] === NULL): ?>
                                                        <img data-enlargeable width="100" style="cursor: zoom-in" src="<?= base_url('assets/images/default.png') ;?>" width="100px">
                                                    <?php elseif($content['profile']): ?>
                                                        <img data-enlargeable width="100" style="cursor: zoom-in" src="<?= base_url('profile/'.$content['profile']) ?>" width="100px">
                                                    <?php endif ?>
                                                </span>
                                                    <div class="custom-file">
                                                        <input type="file" name="profile" class="custom-file-input" id="inputGroupFile01">
                                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Role</label>
                                                    <input type="text" name="role" class="form-control" placeholder="Role" value="<?= $content['role'] ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Joined</label>
                                                    <input type="text" class="form-control" value="<?= $content['created'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                                <?php if (!empty(session()->getFlashdata('success_password'))) : ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?php echo session()->getFlashdata('success_password'); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty(session()->getFlashdata('error_password'))) : ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <?php echo session()->getFlashdata('error_password'); ?>
                                    </div>
                                <?php endif; ?>
                            <div class="card-body">
                                <h4 class="card-title">Update Password</h4>
                                <form method="POST" action="<?= base_url('Profile/UpdatePassword') ?>">
                                <?= csrf_field() ?>     
                                    <input type="text" name="id" class="form-control" value="<?= $content['id'] ?>" hidden>
                                    <input type="text" name="email" class="form-control" value="<?= $content['email'] ?>" hidden>
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Password Lama</label>
                                                    <input type="password" name="old_password" class="form-control" placeholder="Masukkan Passowrd Lama">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Konfirmasi Password Baru</label>
                                                    <input type="password" name="new_password_conf" class="form-control" placeholder="Masukkan Konfirmasi Password Baru">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Password Baru</label>
                                                    <input type="password" name="new_password" class="form-control" placeholder="Masukkan Password Baru">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

<?= $this->endSection() ?>