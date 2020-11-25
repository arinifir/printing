<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Riwayat Transaksi</h4>
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
                                        <th>No Transaksi</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Status Transaksi</th>
                                        <th>Bukti Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($trans as $t) { ?>
                                        <td><?= $t->no_transaksi ?></td>
                                        <td><?= $t->tanggal_transaksi ?></td>
                                        <td>
                                            <?php if($t->status_transaksi == 0){
                                                echo 'Menunggu Pembayaran';
                                            }else if($t->status_transaksi == 1){
                                                echo 'Konfirmasi Pembayaran';
                                            }else if($t->status_transaksi == 2){
                                                echo 'Pengemasan';
                                            }else if($t->status_transaksi == 3){
                                                echo 'Pengiriman';
                                            } ?></td>
                                        <td>
                                            <?php if ($t->bukti_pembayaran == '') { ?>
                                                <a href="<?= base_url('Main/pembayaran/' . $t->no_transaksi); ?>" type="button" data-toggle="tooltip" class="btn btn-danger text-white" data-original-title="Tambah">
                                                    Upload
                                                </a>
                                            <?php }else{ ?>
                                                <img src="<?php echo base_url('assets/bukti/' . $t->bukti_pembayaran) ?>" width="64" />
                                            <?php } ?>
                                        </td>
                                        </form>
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