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
        <!-- <a data-bs-toggle="modal" data-bs-target="#import"> <button type="button" class="btn btn-inverse-success btn-fw">Import</button></a> -->
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
                                    <th>Keterangan Tugas</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach($st as $row): ?>
                                <tr>
                                    <td><?=$no++;?></td>
                                    <td><?=$row['admin_surat']?></td>
                                    <td><a href="" data-bs-toggle="modal" data-bs-target="#lihat" style="text-decoration: none;"><?=$row['nm_pegawai']?></a></td>
                                    <td><?=$row['nip']?></td>
                                    <td><?=indo_date($row['tanggal'])?></td>
                                    <td><?=$row['keterangan']?></td>
                                    
                                    <td>
                                    <a data-bs-toggle="modal" data-bs-target="#anggota<?=$row['id_surat'];?>"><button class="btn btn-outline-info">Anggota</button></a>

                                    <a data-bs-toggle="modal" data-bs-target="#updated<?=$row['id_surat'];?>"><button class="btn btn-outline-warning">Update</button></a>

                                    <a data-bs-toggle="modal" data-bs-target="#remove<?=$row['id_surat'];?>"><button class="btn btn-outline-danger">Remove</button></a>
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