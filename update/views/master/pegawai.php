    <div class="page-header">
        <h3 class="page-title"> Data Master </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Data Pegawai</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pegawai</li>
            </ol>
        </nav>
    </div>
    
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <blockquote class="blockquote blockquote-primary" style="margin-bottom:-6.5px;">
                       <div style="font-size:14px;margin-bottom:3rem;">
                       <li>
                            Pastikan NIP tidak salah
                        </li>
                        <li>
                            Bagi Non ASN masukkan No Reg sebagai pengganti NIP
                        </li>
                        <li>
                            Bagi yang SK kegiatan masukkan No pada SK kegiatan
                        </li>
                       </div>
                    <footer class="blockquote-footer">Pengembang Sistem SPPD</footer>
                </blockquote>
            </div>
        </div>
    </div>

<div class="card">
    <div class="card-header mb-2">
        <a data-bs-toggle="modal" data-bs-target="#add"> <button type="button" class="btn btn-inverse-primary btn-fw">Tambah</button></a>
        <a data-bs-toggle="modal" data-bs-target="#import"> <button type="button" class="btn btn-inverse-success btn-fw">Import</button></a>
    </div>
        <div class="card-body">
            <h4 class="card-title">data Pegawai</h4>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <!-- <th>Admin</th> -->
                                    <th>Nama Pegawai</th>
                                    <th>NIP</th>
                                    <th>Jabatan</th>
                                    <th>Pangkat/Gol</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            <?php $no=1; foreach($pegawai as $row): ?>
                                <tr>
                                    <td><?=$no++;?></td>
                                    <!-- <td><?=$row['admin_peg']?></td> -->
                                    <td><?=$row['nm_pegawai']?></td>
                                    <td><?=$row['nip']?></td>
                                    <td><?=$row['jabatan']?></td>
                                    <td><?=$row['pg']?></td>
                                    <td>
                                    <label class="badge badge-info"><?=$row['status']?></label>
                                    </td>
                                    <td>
                                    <a data-bs-toggle="modal" data-bs-target="#updated<?=$row['id_pegawai'];?>"><button class="btn btn-outline-warning">Update</button></a>

                                    <a data-bs-toggle="modal" data-bs-target="#remove<?=$row['id_pegawai'];?>"><button class="btn btn-outline-danger">Remove</button></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- modal add -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="margin-top:-3rem;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">
				Tambah Data Pegawai
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" >
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" method="post" action="<?=site_url('add-pegawai')?>">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="email-id-column" class="mb-2">Nama Pegawai <small><font color="red">*</font></small></label>
                                <input type="hidden" id="email-id-column" class="form-control" name="admin_peg" value="<?php $user_data = $this->session->userdata('user_data'); echo $user_data['name'];?>" required/>
                                <input type="text" id="email-id-column" class="form-control" name="nm_pegawai" placeholder="ex. Anonim" required autocomplete="off"/>
                            </div>

                            <div class="form-group">
                                <label for="email-id-column" class="mb-2">NIP/No Reg/No SK <small><font color="red">*</font></small></label>
                                <input type="text" id="email-id-column" class="form-control" name="nip" placeholder="ex. 198193 *******" required autocomplete="off"/>
                            </div>

                            <div class="form-group">
                                <label for="email-id-column" class="mb-2">Jabatan <small><font color="red">*</font></small></label>
                                <input type="text" id="email-id-column" class="form-control" name="jabatan" placeholder="ex. Anonim" required autocomplete="off"/>
                            </div>

                            <div class="form-group">
                                <label for="email-id-column" class="mb-2">Pangkat / Gol <small><font color="red">*</font></small></label>
                                <input type="text" id="email-id-column" class="form-control" name="pg" placeholder="ex. 198193 *******" required autocomplete="off"/>
                            </div>

                            <div class="form-group">
                                <label  class="mb-2">Status ASN <small><font color="red">*</font></small></label>
                                <div id="bloodhound">
                                <input name="status" class="typeahead" type="text" placeholder="3 Karakter" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" name="submit" class="btn btn-primary me-1 mb-1 mr-1">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-secondary me-1 mb-1">
                                Clear
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal updated -->
<?php foreach($pegawai as $row): ?>
    <div class="modal fade" id="updated<?=$row['id_pegawai'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="margin-top:-3rem;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">
				Tambah Data Pegawai
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" >
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" method="post" action="<?=site_url('edit-pegawai')?>">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="email-id-column" class="mb-2">Nama Pegawai <small><font color="red">*</font></small></label>
                                <input type="hidden" id="email-id-column" class="form-control" name="admin_peg" value="<?=__session('fullname');?>" required/>
                                <input type="hidden" id="email-id-column" class="form-control" name="id_pegawai" value="<?=$row['id_pegawai'];?>" required autocomplete="off"/>

                                <input type="text" id="email-id-column" class="form-control" name="nm_pegawai" value="<?=$row['nm_pegawai'];?>" required autocomplete="off"/>
                            </div>

                            <div class="form-group">
                                <label for="email-id-column" class="mb-2">NIP/No Reg/No SK <small><font color="red">*</font></small></label>
                                <input type="text" id="email-id-column" class="form-control" name="nip" value="<?=$row['nip'];?>" required autocomplete="off"/>
                            </div>

                            <div class="form-group">
                                <label for="email-id-column" class="mb-2">Jabatan <small><font color="red">*</font></small></label>
                                <input type="text" id="email-id-column" class="form-control" name="jabatan" value="<?=$row['jabatan'];?>" required autocomplete="off"/>
                            </div>

                            <div class="form-group">
                                <label for="email-id-column" class="mb-2">Pangkat / Gol <small><font color="red">*</font></small></label>
                                <input type="text" id="email-id-column" class="form-control" name="pg" value="<?=$row['pg'];?>" required autocomplete="off"/>
                            </div>

                            <div class="form-group">
                                <label  class="mb-2">Status ASN <small><font color="red">*</font></small></label>
                                <div id="bloodhound">
                                <input name="status" value="<?=$row['status'];?>" class="typeahead" type="text" placeholder="3 Karakter" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" name="submit" class="btn btn-primary me-1 mb-1 mr-1">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-secondary me-1 mb-1">
                                Clear
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<!-- remove pegawai -->
<?php foreach($pegawai as $row): ?>
<div class="modal fade" id="remove<?=$row['id_pegawai'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <!-- <form class="form" method="post" action="<?=site_url('edit-provinsi')?>"> -->
                    <div class="row">
                        <div class="col-md-12 col-12 text-center">
                            <h5>Anda yakin ingin menghapus Pegawai <br> <?=$row['nm_pegawai'];?> </h5>
                        </div>

                        <div class="col-12 d-flex justify-content-end mt-3">
                            <a href="<?=site_url('remove-pegawai/'.$row['id_pegawai'])?>" type="submit" name="submit" class="btn btn-block btn-danger me-1 mb-1" style="width:100%;">
                                Remove
                            </a>
                        </div>
                    </div>
                <!-- </form> -->
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<!-- import data -->
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">
                    Import Data Pegawai
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" >
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 col-12 text-center">
                    <a href="<?= site_url('assests/excel/format_inport_pegawai.xlsx');?>" download>
                    <button class="btn btn-outline-primary block mb-3"> <i class="bi bi-cloud-download"></i> Download Template Excel</button>
                    </a>
                </div>

                <form method="post" action="<?= site_url('import-inputan') ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="email-id-column">File Import <small><font color="red">*</font> File Excel</small></label>
                                <input type="hidden" id="email-id-column" class="form-control" name="admin_peg" value="<?php $user_data = $this->session->userdata('user_data'); echo $user_data['name'];?>" placeholder="ex. 201501015"/>
                                <input type="file" id="email-id-column" class="form-control" name="dataexcel" placeholder="Data excel"/>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">
                                Import
                            </button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                Reset
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>