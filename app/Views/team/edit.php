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
                                <form method="POST" action="<?= base_url('dashboard/teams/update') ?>">
                                <?= csrf_field() ?>     
                                <?php foreach($content as $row): ?>
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nama Team</label>
                                                    <input type="text" name="title" class="form-control" placeholder="Nama Team" value="<?= $row->title ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Leader Team</label>
                                                    <select name="leader" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                        <option value="<?= $row->leader ?>" selected><?= $row->user_name ?></option>
                                                        <?php 
                                                        foreach($users as $row): ?>
                                                        <?php if($row['role'] === 'Leader'): ?>
                                                        <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                                        <?php elseif($row['role']): ?>
                                                        <?php endif ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info">Update Team</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

<?= $this->endSection() ?>
