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
                                <form method="POST" action="<?= base_url('dashboard/teams/add/anggota') ?>">
                                <?= csrf_field() ?>     
                                    <div class="form-body">
                                        <div class="row">
                                        <input type="text" name="id_teams" class="form-control" value="<?= $id ?>" hidden>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Anggota Team</label>
                                                    <select name="id_user" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                        <option selected>Pilih Anggota</option>
                                                        <?php 
                                                        foreach($users as $row): ?>
                                                        <?php if($row['teams'] === NULL && $row['role'] === 'Employee'): ?>
                                                        <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                                        <?php elseif($row['teams']): ?>
                                                        <?php endif ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info">Add Team</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

<?= $this->endSection() ?>