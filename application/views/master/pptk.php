    <div class="page-header">
        <h3 class="page-title"> Data Master </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Data PPTK</a></li>
                <li class="breadcrumb-item active" aria-current="page">PPTK</li>
            </ol>
        </nav>
    </div>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <blockquote class="blockquote blockquote-primary" style="margin-bottom:-6.5px;">
                       <div style="font-size:14px;margin-bottom:3rem;">
                        <li>
                            Masukkan NIP untuk mencari data
                        </li>

                        <li>
                            Data yang muncul hanya data Pegawai Negeri Sipil
                        </li>
                       </div>
                    <footer class="blockquote-footer">Pengembang Sistem SPPD</footer>
                </blockquote>
            </div>
        </div>
    </div>

    <div class="card">
    <div class="card-header mb-2">
        <a data-bs-toggle="modal" data-bs-target="#add"> <button type="button" class="btn btn-inverse-primary btn-fw">Search NIP</button></a>
        <!-- <a data-bs-toggle="modal" data-bs-target="#import"> <button type="button" class="btn btn-inverse-success btn-fw">Import</button></a> -->
    </div>
        <div class="card-body">
            <h4 class="card-title">Data PPTK Bidang Pembinaan SMK</h4>
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
                                    <th>Anggaran</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach($pptk as $row): ?>
                                <tr>
                                    <td><?=$no++;?></td>
                                    <!-- <td><?=$row['admin_pptk']?></td> -->
                                    <td><?=$row['nm_pegawai']?></td>
                                    <td><?=$row['nip']?></td>
                                    <td><?=$row['jabatan']?></td>
                                    <td><?=$row['pg']?></td>
                                    <td>
                                    <label class="badge badge-info">Rp. <?=number_format($row['anggaran'])?></label>
                                    </td>
                                    <td>
                                    <a data-bs-toggle="modal" data-bs-target="#updated<?=$row['id_pptk'];?>"><button class="btn btn-outline-warning">Update</button></a>

                                    <a data-bs-toggle="modal" data-bs-target="#remove<?=$row['id_pptk'];?>"><button class="btn btn-outline-danger">Remove</button></a>
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
				Cari Data Pegawai
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" >
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" method="post" action="<?=site_url('add-pptk')?>">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="email-id-column" class="mb-2">NIP <small><font color="red">*</font></small></label>
                                <input type="hidden" id="email-id-column" class="form-control" name="admin_pptk" value="<?php 
                                $user_data = $this->session->userdata('user_data');
                                echo $user_data['name'];
                                ?>" required/>
                                <input type="text" id="nip" class="form-control" name="nip" placeholder="ex. 19962020 *********" required autocomplete="off"/>
                            </div>

                            <div class="form-group">
                                <label for="nama_pegawai" class="mb-2"> Nama Pegawai <small><font color="red">*</font> </small></label>
                                <input type="text" class="form-control" name="nm_pegawai" placeholder="ex. Anonim" required autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="nama_pegawai" class="mb-2"> Anggaran <small><font color="red">*</font> </small></label>
                                <input type="number" class="form-control" name="anggaran" placeholder="ex. 2*******" required autocomplete="off">
                            </div>

                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" name="submit" class="btn btn-primary me-1 mb-1 mr-1">
                                Simpan
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

<!-- modal update -->
<?php foreach($pptk as $row): ?>
<div class="modal fade" id="updated<?=$row['id_pptk'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="margin-top:-3rem;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">
				Cari Data Pegawai
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" >
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" method="post" action="<?=site_url('updated-pptk')?>">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="email-id-column" class="mb-2">NIP <small><font color="red">*</font></small></label>
                                <input type="hidden" id="email-id-column" class="form-control" name="admin_pptk" value="<?php 
                                $user_data = $this->session->userdata('user_data');
                                echo $user_data['name'];
                                ?>" required/>
                                <input type="hidden" class="form-control" name="id_pptk" value="<?=$row['id_pptk'];?>" required autocomplete="off"/>
                                <input type="text" id="nip1" class="form-control" name="nip" value="<?=$row['nip'];?>" required autocomplete="off"/>
                            </div>

                            <div class="form-group">
                                <label for="nama_pegawai" class="mb-2"> Nama Pegawai <small><font color="red">*</font> </small></label>
                                <input type="text" class="form-control" name="nm_pegawai" value="<?=$row['nm_pegawai'];?>" required autocomplete="off">
                            </div>
                            
                            <div class="form-group">
                                <label for="nama_pegawai" class="mb-2"> Anggaran <small><font color="red">*</font> </small></label>
                                <input type="text" class="form-control" name="anggaran" value="<?=$row['anggaran'];?>" required autocomplete="off">
                            </div>

                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" name="submit" class="btn btn-warning me-1 mb-1 mr-1">
                                Ubah
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

<!-- remove -->
<?php foreach($pptk as $row): ?>
<div class="modal fade" id="remove<?=$row['id_pptk'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-12 text-center">
                        <h5>Anda yakin ingin menghapus PPTK <br> <?=$row['nm_pegawai'];?> </h5>
                    </div>

                    <div class="col-12 d-flex justify-content-end mt-3">
                        <a href="<?=site_url('remove-pptk/'.$row['id_pptk'])?>" type="submit" name="submit" class="btn btn-block btn-danger me-1 mb-1" style="width:100%;">
                            Remove
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>