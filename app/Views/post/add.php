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
                                <form method="POST" action="<?= base_url('dashboard/posts/add') ?>">
                                <?= csrf_field() ?>     
                                    <input type="text" name="author" class="form-control" value="<?= $id ?>" hidden>
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Judul</label>
                                                    <input type="text" name="title" class="form-control" placeholder="Judul" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Deskripsi</label>
                                                    <textarea type="text" name="content" class="form-control" placeholder="Content" ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Meta</label>
                                                    <input type="text" name="meta" class="form-control" placeholder="Meta" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tag</label>
                                                    <input type="text" name="tag" class="form-control" placeholder="Tag" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Category</label>
                                                    <select name="categories" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                        <option selected>Pilih Category...</option>
                                                        <?php 
                                                        foreach($category as $row): ?>
                                                        <option value="<?= $row['id'] ?>"><?= $row['title'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Picture</label>
                                                    <input type="text" name="picture" class="form-control" placeholder="Picture" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info">Add Post</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

<?= $this->endSection() ?>