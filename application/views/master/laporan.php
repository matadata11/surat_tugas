<div class="page-header">
        <h3 class="page-title"> Data Pelaporan Perjalanan Dinas </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Pelaporan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Input Laporan</li>
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
        <a data-bs-toggle="modal" data-bs-target="#add"> <button type="button" class="btn btn-inverse-primary btn-fw">Input Laporan</button></a>
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
                                    <th>Nama Pegawai</th>
                                    <th>NIP</th>
                                    <th>Jabatan</th>
                                    <th>Pangkat/Gol</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            <!-- <?php $no=1; foreach($pegawai as $row): ?>
                                <tr>
                                    <td><?=$no++;?></td>
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
                                <?php endforeach; ?> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>