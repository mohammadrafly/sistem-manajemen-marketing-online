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
                                <form method="POST" action="<?= base_url('dashboard/posts/update') ?>" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                    <?php foreach($content as $row): ?>
                                    <div class="form-body">
                                    <input type="text" name="id_post" class="form-control" placeholder="Judul" value="<?= $row->id_post ?>" hidden>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Judul</label>
                                                    <input type="text" name="title" class="form-control" placeholder="Judul" value="<?= $row->title ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Deskripsi</label>
                                                    <textarea type="text" name="content" class="form-control" placeholder="Content" value="<?= $row->content ?>"><?= $row->content ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Meta</label>
                                                    <input type="text" name="meta" class="form-control" placeholder="Meta" value="<?= $row->meta ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tag</label>
                                                    <input type="text" name="tag" class="form-control" placeholder="Tag" value="<?= $row->tag ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">Picture</label>
                                                <div class="input-group mb-3">
                                                    <br>
                                                    <span>
                                                    <?php if($row->picture === NULL): ?>
                                                        <img data-enlargeable width="100" style="cursor: zoom-in" src="<?= base_url('assets/images/dummy.png') ;?>" width="100px">
                                                    <?php elseif($row->picture): ?>
                                                        <img data-enlargeable width="100" style="cursor: zoom-in" src="<?= base_url('picture/'.$row->picture) ?>" width="100px">
                                                    <?php endif ?>
                                                    </span>
                                                    <div class="custom-file">
                                                        <input type="file" name="picture" class="custom-file-input" id="inputGroupFile01">
                                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Category</label>
                                                    <select name="categories" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                        <option selected value="<?= $row->categories ?>"><?= $row->cat_name ?></option>
                                                        <?php 
                                                        foreach($category as $row): ?>
                                                        <option value="<?= $row['id'] ?>"><?= $row['title'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>       
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info">Update Post</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

<?= $this->endSection() ?>