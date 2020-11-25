<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Pembelian</h4>
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
                        <a href="#">Produk</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Tabel Produk</h4>
                            <a href="<?= base_url('Admin/keranjang'); ?>" class="btn btn-secondary btn-round ml-auto">
                                Keranjang&nbsp;
                                <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Harga Produk</th>
                                        <th>Stok Produk</th>
                                        <th>Kategori Produk</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($produk as $p) { ?>
                                        <tr>
                                            <form action="<?= base_url('Admin/tambahcart/' . $p->kd_produk); ?>" method="post">
                                            <td><?= $no++; ?></td>
                                            <td><?= $p->kd_produk; ?></td>
                                            <td><?= $p->nama_produk; ?></td>
                                            <td>Rp <?= $p->harga_produk; ?></td>
                                            <td><input type="number" name="qty" class="form-control"></td>
                                            <td><?= $p->kategori; ?></td>
                                            <td>
                                                <button type="submit" data-toggle="tooltip" title="" class="btn btn-info" data-original-title="Tambah">
                                                    <i class="fa fa-plus"></i>
                                                </button>
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