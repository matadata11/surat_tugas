<?php echo $this->session->flashdata('notif_false'); ?>
<div class="page-header">
        <h3 class="page-title"> Master Surat Tugas Perjalanan Dinas </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Master Surat</a></li>
                <li class="breadcrumb-item active" aria-current="page">Surat Tugas</li>
            </ol>
        </nav>
    </div>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <blockquote class="blockquote blockquote-primary" style="margin-bottom:-6.5px;">
                       <div style="font-size:14px;margin-bottom:3rem;">
                        <li>
                            Masukkan NIP untuk mencari data Bagi ASN
                        </li>

                        <li>
                            Masukkan No reg atau No SK bagi yang No ASN
                        </li>
                       </div>
                    <footer class="blockquote-footer">Pengembang Sistem SPPD.</footer>
                </blockquote>
            </div>
        </div>
    </div>

    <div class="card">
    <div class="card-header mb-2">
        <a data-bs-toggle="modal" data-bs-target="#add"> <button type="button" class="btn btn-inverse-primary btn-fw">Buat ST</button></a>
        <a data-bs-toggle="modal" data-bs-target="#print"> <button type="button" class="btn btn-inverse-success btn-fw">Print</button></a>
    </div>
        <div class="card-body">
            <h4 class="card-title">Data Surat Tugas Perjalaan Dinas</h4>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Admin</th>
                                    <th>Nama Pegawai</th>
                                    <th>NIP/NoReg/NoSK</th>
                                    <th>Tanggal ST</th>
                                    <!-- <th>Keterangan Tugas</th> -->
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach($st as $row): ?>
                                <tr>
                                    <td><?=$no++;?></td>
                                    <td><?=$row['admin_surat']?></td>
                                    <td><a href="#" data-bs-toggle="modal" data-bs-target="#lihat<?=$row['id_surat'];?>" style="text-decoration: none;"><?=$row['nm_pegawai']?></a></td>
                                    <td><?=$row['nip']?></td>
                                    <td><?=indo_date($row['tanggal'])?></td>
                                    <!-- <td style="word-wrap: break-word;"><?=$row['keterangan']?></td> -->
                                    
                                    <td>
                                    <a data-bs-toggle="modal" data-bs-target="#anggota<?=$row['id_surat'];?>"><button class="btn btn-outline-info"><i class="mdi mdi-account-multiple-plus"></i></button></a>

                                    <a data-bs-toggle="modal" data-bs-target="#updated<?=$row['id_surat'];?>"><button class="btn btn-outline-warning"><i class="mdi mdi-grease-pencil"></i></button></a>

                                    <a data-bs-toggle="modal" data-bs-target="#remove<?=$row['id_surat'];?>"><button class="btn btn-outline-danger"> <i class="mdi mdi-delete"></i> </button></a>
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
				Surat Tugas Perjalanan Dinas
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" >
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" method="post" action="<?=site_url('add-surat')?>">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="email-id-column" class="mb-2">NIP <small><font color="red">*</font></small></label>
                                <input type="hidden" id="email-id-column" class="form-control" name="admin_surat" value="<?=__session('fullname');?>" required/>
                                <input type="text" id="nip" class="form-control" name="nip" placeholder="ex. 19962020 *********" required autocomplete="off"/>
                            </div>

                            <div class="form-group">
                                <label for="nama_pegawai" class="mb-2"> Nama Pegawai <small><font color="red">*</font> </small></label>
                                <input type="text" class="form-control" name="nm_pegawai" placeholder="ex. Anonim" required autocomplete="off" readonly style="color:#000000;">
                            </div>

                            <div class="form-group">
                                <label for="tanggal">Tanggal ST <small><font color="red">*</font></small></label>
                                <input type="date" name="tanggal" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="keterangan">Keterangan ST</label>
                                <textarea rows="1" cols="10" name="keterangan" class="form-control" placeholder="ex. lorem ipsum .... " required></textarea>
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

<!-- anggota -->
<?php $no=1; foreach($st as $row): ?>
<div class="modal fade" id="anggota<?=$row['id_surat'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="margin-top:-3rem;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">
				Anggota Perjalanan Dinas
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" >
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" method="post" action="<?=site_url('edit-anggota')?>">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="email-id-column" class="mb-2">Anggota I <small><font color="red">*</font></small></label>
                                <input type="hidden" id="email-id-column" class="form-control" name="id_surat" value="<?=$row['id_surat'];?>" required/>

                                <input type="text" id="email-id-column" class="form-control" name="anggota1"  autocomplete="off" placeholder="ex. anonim"/>
                                <input type="text" id="email-id-column" class="form-control" name="nip1"  autocomplete="off" placeholder="ex. 19962020 *********"/>
                            </div>

                            <div class="form-group">
                                <label for="email-id-column" class="mb-2">Anggota II <small><font color="red">*</font></small></label>
                                <input type="text" id="email-id-column" class="form-control" name="anggota2"  autocomplete="off" placeholder="ex. anonim"/>
                                <input type="text" id="email-id-column" class="form-control" name="nip2"  autocomplete="off" placeholder="ex. 19962020 *********"/>
                            </div>

                            <div class="form-group">
                                <label for="email-id-column" class="mb-2">Anggota III <small><font color="red">*</font></small></label>
                                <input type="text" id="email-id-column" class="form-control" name="anggota3"  autocomplete="off" placeholder="ex. anonim"/>
                                <input type="text" id="email-id-column" class="form-control" name="nip3"  autocomplete="off" placeholder="ex. 19962020 *********"/>
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

<!-- lihat data -->
<?php foreach($st as $row): ?>
<div class="modal fade" id="lihat<?=$row['id_surat'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="margin-top:-3rem;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Transaction History</h4>
                                <canvas id="transaction-history" class="transaction-chart"></canvas>
                                <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                                    <div class="text-md-center text-xl-left">
                                        <h6 class="mb-1">Transfer to Paypal</h6>
                                        <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
                                    </div>
                                    <div class="align-self-center flex-grow text-end text-md-center text-xl-right py-md-2 py-xl-0">
                                        <h6 class="font-weight-bold mb-0">$236</h6>
                                    </div>
                                </div>
                                <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                                    <div class="text-md-center text-xl-left">
                                        <h6 class="mb-1">Tranfer to Stripe</h6>
                                        <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
                                    </div>
                                    <div class="align-self-center flex-grow text-end text-md-center text-xl-right py-md-2 py-xl-0">
                                        <h6 class="font-weight-bold mb-0">$593</h6>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row justify-content-between">
                                    <h4 class="card-title mb-1">Data Pegawai</h4>
                                    <p class="text-muted mb-1">Your data status</p>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-thumbnail">
                                                    <div class="preview-icon bg-primary">
                                                        <i class="mdi mdi-file-document"></i>
                                                    </div>
                                                </div>

                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject"><?=$row['nm_pegawai']?></h6>
                                                        <p class="text-muted mb-0"><?=$row['nip']?>
                                                            <br>
                                                            <?=$row['jabatan']?> | <?=$row['pg']?>
                                                        </p>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?=indo_date($row['tanggal'])?></p>
                                                        <!-- <p class="text-muted mb-0">30 tasks, 5 issues </p> -->
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-thumbnail">
                                                    <div class="preview-icon bg-primary">
                                                        <i class="mdi mdi-file-document"></i>
                                                    </div>
                                                </div>

                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject"><?=$row['anggota1']?></h6>
                                                        <p class="text-muted mb-0"><?=$row['nip1']?>
                                                            <br>
                                                            <?=$row['jabatan1']?> | <?=$row['pg1']?>
                                                        </p>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?=indo_date($row['tanggal'])?></p>
                                                        <!-- <p class="text-muted mb-0">30 tasks, 5 issues </p> -->
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-thumbnail">
                                                    <div class="preview-icon bg-primary">
                                                        <i class="mdi mdi-file-document"></i>
                                                    </div>
                                                </div>

                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject"><?=$row['anggota2']?></h6>
                                                        <p class="text-muted mb-0"><?=$row['nip2']?>
                                                            <br>
                                                            <?=$row['jabatan2']?> | <?=$row['pg2']?>
                                                        </p>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?=indo_date($row['tanggal'])?></p>
                                                        <!-- <p class="text-muted mb-0">30 tasks, 5 issues </p> -->
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-thumbnail">
                                                    <div class="preview-icon bg-primary">
                                                        <i class="mdi mdi-file-document"></i>
                                                    </div>
                                                </div>

                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject"><?=$row['anggota3']?></h6>
                                                        <p class="text-muted mb-0"><?=$row['nip3']?>
                                                            <br>
                                                            <?=$row['jabatan3']?> | <?=$row['pg3']?>
                                                        </p>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted"><?=indo_date($row['tanggal'])?></p>
                                                        <!-- <p class="text-muted mb-0">30 tasks, 5 issues </p> -->
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<!-- remove st -->
<?php foreach($st as $row): ?>
<div class="modal fade" id="remove<?=$row['id_surat'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="margin-top:-3rem;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-12 text-center">
                        <h5>Anda yakin ingin menghapus Surat Tugas <br>An. <?=$row['nm_pegawai'];?> </h5>
                    </div>

                    <div class="col-12 d-flex justify-content-end mt-3">
                        <a href="<?=site_url('remove-surat/'.$row['id_surat'])?>" type="submit" name="submit" class="btn btn-block btn-danger me-1 mb-1" style="width:100%;">
                            Remove
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- print all -->
<div class="modal fade" id="print" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document" style="margin-top:-10rem;">
        <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title">Print ALL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="text-dark" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="post" action="<?=site_url('cetak-surat')?>">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Tanggal ST <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="tanggal" placeholder="Tanggal Surat">
                        </div>
                        <!-- <div class="form-group col-md-4">
                            <label>Sampai Tanggal <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="tgl_selesai" placeholder="Tanggal Mulai">
                        </div> -->
                        <div class="form-group col-md-6">
                            <label>Nama Pegawai <span class="text-danger">*</span></label>
                            <select name="nm_pegawai" class="form-control custom-select" required>
                            <?php foreach($st as $rows): ?>
                                <option value="<?=$rows['nm_pegawai'];?>"><?=$rows['nm_pegawai'];?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-check"></i> Simpan</button>
                            <button data-dismiss="modal" class="btn btn-danger"><i class="fas fa-times"></i> Tutup</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
