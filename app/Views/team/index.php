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
                                <h4 class="card-title float-left"><?= $pages ?></h4>
                                <div class="card-title float-right">
                                    <a href="<?= base_url('dashboard/teams/add') ?>" class="btn btn-outline-secondary btn-rounded"><i
                                                    class="far fa-user-plus"></i> Add Team</a>
                                </div>
                                <div class="table-responsive">
                                    <table id="zero_config"
                                        class="table table-striped table-bordered display no-wrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Title</th>
                                                <th>Leader Name</th>
                                                <th>Created At</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if($content): ?>
                                        <?php 
                                        $no = 1;
                                        foreach($content as $row): ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row->title ?></td>
                                                <td><?= $row->user_name ?></td>
                                                <td><?= $row->created_at ?></td>
                                                <td>
                                                <a href="<?= base_url('dashboard/teams/edit/'.$row->id) ?>" class="btn btn-outline-primary btn-rounded"><i
                                                    class="far fa-edit"></i> Edit</a>
                                                <a href="<?= base_url('dashboard/teams/delete/'.$row->id) ?>" class="btn btn-outline-danger btn-rounded"><i
                                                    class="far fa-trash-alt"></i> Delete</a>
                                                <a href="<?= base_url('dashboard/teams/add/anggota/'.$row->id) ?>" class="btn btn-outline-secondary btn-rounded"><i
                                                    class="far fa-plus-circle"></i> Tambah Anggota</a>
                                                <a href="<?= base_url('dashboard/teams/list/anggota/'.$row->id) ?>" class="btn btn-outline-secondary btn-rounded"><i
                                                    class="far fa-plus-circle"></i> List Anggota</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <?php endif; ?> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<?= $this->endSection() ?>