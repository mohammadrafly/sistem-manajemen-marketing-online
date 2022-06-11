<?= $this->extend('layout/dashboard') ?>

<?= $this->section('content') ?>
                
<?php if(session()->get('role') === 'Unset'): ?>
                                <div class="alert alert-danger" role="alert">
                                    <strong>Role Unset - </strong> Silahkan hubungi admin untuk pengaktifan Akun!
                                </div>
<?php elseif(session()->get('role') === 'Employee'): ?>
                            <div class="col-lg-3 col-md-6">
                                <!-- Card -->
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Total Post Saya</h4>
                                        <p class="card-text btn btn-lg btn-primary"><?= $post ?></p>
                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
<?php elseif(session()->get('role') === 'Superuser' || session()->get('role') === 'Leader'): ?>
                <div class="card-group">
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium"><?= $postAll ?></h2>
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Iklan</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if(session()->get('role') === 'Superuser'): ?>
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><?= $userAll ?></h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total User
                                    </h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php elseif(session()->get('role') === 'Leader'): ?>
                    <?php endif ?>
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium"><?= $teamAll ?></h2>
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Team</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <h2 class="text-dark mb-1 font-weight-medium"><?= $categoryAll ?></h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Category</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php endif ?>

<?= $this->endSection() ?>