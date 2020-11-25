<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Keranjang</h4>
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
                        <a href="#">Cart</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Tabel Produk</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Harga Produk</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($this->cart->contents() as $p) { ?>
                                        <tr>
                                            <td>
                                                <a href="<?= base_url('Admin/hapuscart/' . $p['rowid']) ?>" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </td>
                                            <td><?= $no++; ?></td>
                                            <td><?= $p['name']; ?></td>
                                            <td>Rp <?= $p['price']; ?></td>
                                            <td><?= $p['qty'];; ?></td>
                                            <td><?= $p['subtotal'];; ?></td>
                                            </form>
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title col-md-6">Total</h4>
                            <button class="btn btn-primary ml-auto col-md-6" disabled>
                                Rp <?= $this->cart->total(); ?>
                            </button>
                        </div>
                    </div>
                    <form action="<?= base_url('Admin/final'); ?>" method="post">
                        <div class="card-footer">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title col-md-6">Pembayaran</h4>

                                <input name="bayar" type="number" class="form-control col-md-6">
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title"></h4>
                                <button type="submit" class="btn btn-primary btn-round ml-auto">
                                    Checkout
                                </button>
                            </div>
                        </div>
                    </form>

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