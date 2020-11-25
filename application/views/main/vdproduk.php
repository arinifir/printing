<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Produk</h2>
                        <h5 class="text-white op-7 mb-2">Sistem Informasi Penjualan</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <!-- Card With Icon States Background -->
            <div class="row">
                <?php foreach ($produk as $p) { ?>
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round">
                            <div class="card-body" align="center">
                                <div>
                                    <img class="img-responsive" src="<?php echo base_url('assets/product/' . $p->gambar_produk) ?>" width="64">
                                </div>&nbsp;
                                <div class="row align-items-center">
                                    <div class="col col-stats ml-3 ml-sm-0" align="center">
                                        <div class="numbers">
                                            <p class="card-category"><i>Rp <?= $p->harga_produk; ?></i></p>
                                            <h4 class="card-title"><?= $p->nama_produk; ?></h4>
                                        </div>
                                    </div>
                                </div>&nbsp;
                                <form action="<?= base_url('Main/addcart/' . $p->kd_produk); ?>" method="post">
                                    <div class="col-md-6"><input type="number" name="qty" value=1 class="form-control"></div>&nbsp;
                                    <div class="col-icon">
                                        <button type="submit" class="btn btn-round btn-primary">
                                            <i class="fa fa-plus text-white"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="custom-toggle">
        <i class="flaticon-settings"></i>
    </div>
</div>
<!-- End Custom template -->
</div>