<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Transaksi</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Transaksi</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Data Transaksi</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Data Transaksi</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 5%; text-align:center">Action</th>
                                        <th>Bukti</th>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>No Telepon</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th style="width: 5%; text-align:center">Action</th>
                                        <th>Bukti</th>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>No Telepon</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach ($trans as $p) { ?>
                                        <tr>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="<?= base_url('Admin/hapusproduk/' . $p->no_transaksi); ?>" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td align="center"><img src="<?php echo base_url('assets/bukti/' . $p->bukti_pembayaran); ?>" width="64" /></td>
                                            <td><?= $p->no_transaksi; ?></td>
                                            <td><?= $p->tanggal_transaksi; ?></td>
                                            <td><?= $p->nama_user; ?></td>
                                            <td><?= $p->alamat_user; ?></td>
                                            <td><?= $p->no_user; ?></td>
                                            <td><?php if ($p->status_transaksi == 0) {
                                                    echo 'Menunggu Pembayaran';
                                                } else if ($p->status_transaksi == 1) {
                                                    echo 'Konfirmasi Pembayaran';
                                                } else if ($p->status_transaksi == 2) {
                                                    echo 'Pengemasan';
                                                } else if ($p->status_transaksi == 3) {
                                                    echo 'Pengiriman';
                                                } ?></td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="<?= base_url('Admin/hapusproduk/' . $p->no_transaksi); ?>" type="button" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Remove">
                                                        <i class="fa fa-check"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="container-fluid">
        <nav class="pull-left">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="https://www.themekita.com">
                        ThemeKita
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Help
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Licenses
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright ml-auto">
            2018, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.themekita.com">ThemeKita</a>
        </div>
    </div>
</footer>
</div>
</div>