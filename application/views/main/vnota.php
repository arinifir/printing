<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Menunggu Pembayaran</h4>
                <ul class="breadcrumbs">
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Cart</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item text-primary">
                        <a href="#">Pembayaran</a>
                    </li>
                </ul>
            </div>
            <div class="row mt--2">
                <div class="col-md-12">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="card-title">No Rekening</div>
                            <div class="card-category text-danger">1. Silahkan Screenshot Halaman Ini Terlebih Dahulu</div>
                            <div class="card-category text-danger">2. Lalu Melakukan Pembayaran dengan melakukan transfer ke nomor rekening yang ada dibawah ini</div>
                            <div class="card-category text-danger">3. Kemudian upload bukti pembayaran di halaman <strong>Profile->Transaksi</strong></div>
                            <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                                <p>BRI 0920821781290 dengan Nama Asep</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Pesanan</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Harga Produk</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($detail as $d) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $d->nama_produk; ?></td>
                                            <td>Rp <?= $d->harga_produk; ?></td>
                                            <td><?= $d->jumlah; ?></td>
                                            <td><?= $d->subtotal; ?></td>
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