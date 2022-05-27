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
                                <form method="POST" action="<?= base_url('dashboard/users/update') ?>">
                                <?= csrf_field() ?>     
                                    <input type="number" name="id" value="<?= $content['id'] ?>" hidden>
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
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Role</label>
                                                    <select name="role" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                        <option selected value="<?= $content['role'] ?>"><?= $content['role'] ?></option>
                                                        <option value="Unset">Unset</option>
                                                        <option value="Employee">Employee</option>
                                                        <option value="Leader">Leader</option>
                                                        <option value="Superuser">Superuser</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info">Update User</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

<?= $this->endSection() ?>