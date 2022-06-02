<?= $this->extend('layout/dashboard') ?>

<?= $this->section('content') ?>
<?php foreach($content as $row): ?>
                            <div class="col-lg-12 col-md-6">
                                <!-- Card -->
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="<?= base_url('picture/'.$row->picture) ?>"
                                        alt="Card image cap">
                                    <div class="card-body">
                                        <h2 class="card-title"><?= $row->title ?></h2>
                                        <h6 class="card-subtitle">Uploaded <?= $row->created_at ?></h6>
                                        <h5 class="btn btn-sm btn-rounded btn-primary"><?= $row->user_name ?></h5>
                                        <h5 class="btn btn-sm btn-rounded btn-success"><?= $row->cat_name ?></h5>
                                        <span><h5 class="btn btn-sm btn-rounded btn-secondary">#<?= $row->tag ?></h5></span>
                                        <p class="card-text"><?= $row->content ?></p>
                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
<?php endforeach ?>
<?= $this->endSection() ?>