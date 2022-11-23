<?php echo $this->session->flashdata('notif_false'); ?>
<div class="page-header">
        <h3 class="page-title"> Master Patching Sistem </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Master Patching</a></li>
                <li class="breadcrumb-item active" aria-current="page">Patching</li>
            </ol>
        </nav>
    </div>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <blockquote class="blockquote blockquote-primary" style="margin-bottom:-6.5px;">
                <div class='col-md-6'>
                    <div class=' box-solid'>
                        <div class='box-header '>
                            <h3 class='box-title'>Saat ini anda menggunakan versi <span class="badge text-white bg-primary"><?=master('version')?></span></h3>
                        </div><!-- /.box-header -->
                        <div class='box-body'>
                        <form method="post" action="<?=site_url('patching')?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Upload Patch File <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="patching">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-block btn-primary"><i class="fas fa-sync"></i> Patching System</button>
                            </div>
                        </form>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>

                <div class='col-md-6'>
                            <div class=' box-solid'>
                                <div class='box-header '>
                                    <h3 class='box-title'>Update Assets</h3>
                                </div><!-- /.box-header -->
                                <div class='box-body'>
                                <form method="post" action="<?=site_url('assets')?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Upload Patch File <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="patching">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="submit" class="btn btn-block btn-primary"><i class="fas fa-sync"></i> Patching Assets</button>
                                    </div>
                                </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>

            </div>
        </div>
    </div>
</div>
