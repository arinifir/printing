<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Produk</h4>
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
                        <a href="#">Data Master</a>
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
                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                <i class="fa fa-plus"></i>
                                Tambah Data
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->
                        <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header no-bd">
                                        <h5 class="modal-title">
                                            <span class="fw-bold">Data Baru</span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="small text-danger">Isi data produk dengan benar.</p>
                                        <?php if (isset($error)) {
                                            echo $error;
                                        }; ?>
                                        <form action="<?= base_url('Admin/tambahproduk') ?>" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Nama Produk</label>
                                                        <input name="nama" type="text" class="form-control" placeholder="nama produk">
                                                    </div>
                                                </div>
                                                <?= form_error('nama', '<p class="text-danger', '</p>'); ?>
                                                <div class="col-md-6 pr-0">
                                                    <div class="form-group form-group-default">
                                                        <label>Harga Produk</label>
                                                        <input name="harga" type="number" class="form-control" placeholder="harga produk">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Stok Produk</label>
                                                        <input name="stok" type="number" class="form-control" placeholder="stok produk">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Kategori Produk</label>
                                                        <select name="kategori" class="form-control" placeholder="stok produk">
                                                            <option disabled selected>pilih kategori...</option>
                                                            <?php foreach ($kategori as $k) { ?>
                                                                <option value="<?= $k->id_kategori; ?>"><?= $k->kategori; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Gambar Produk</label>
                                                        <input name="gambar_produk" type="file" class="form-control" placeholder="gambar produk">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Deskripsi Produk</label>
                                                        <textarea name="desk" class="form-control" placeholder="deskripsi produk"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer no-bd">
                                        <button type="submit" id="addRowButton" class="btn btn-primary">Tambah</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <?php foreach ($produk as $p) { ?>
                            <div class="modal fade" id="editRowModal<?= $p->kd_produk; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h5 class="modal-title">
                                                <span class="fw-bold">Edit Data <?= $p->kd_produk; ?></span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="small text-danger">Isi data produk dengan benar.</p>
                                            <?php if (isset($error)) {
                                                echo $error;
                                            }; ?>
                                            <form action="<?= base_url('Admin/editproduk') ?>" method="post" enctype="multipart/form-data">
                                                <div class="form-group" align="center">
                                                    <img src="<?php echo base_url('assets/product/' . $p->gambar_produk) ?>" width="86" />
                                                </div>
                                                <input name="kode" type="text" class="form-control" value="<?= $p->kd_produk; ?>" hidden>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Nama Produk</label>
                                                            <input name="nama" type="text" class="form-control" placeholder="nama produk" value="<?= $p->nama_produk; ?>">
                                                        </div>
                                                    </div>
                                                    <?= form_error('nama', '<p class="text-danger', '</p>'); ?>
                                                    <div class="col-md-6 pr-0">
                                                        <div class="form-group form-group-default">
                                                            <label>Harga Produk</label>
                                                            <input name="harga" type="number" class="form-control" placeholder="harga produk" value="<?= $p->harga_produk; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Stok Produk</label>
                                                            <input name="stok" type="number" class="form-control" placeholder="stok produk" value="<?= $p->stok_produk; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Kategori Produk</label>
                                                            <select name="kategori" class="form-control" placeholder="stok produk">
                                                                <option value="<?= $p->kategori_produk; ?>" selected><?= $p->kategori; ?></option>
                                                                <option disabled>pilih kategori...</option>
                                                                <?php foreach ($kategori as $k) { ?>
                                                                    <option value="<?= $k->id_kategori; ?>"><?= $k->kategori; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Gambar Produk</label>
                                                            <input name="gambar_produk" type="file" class="form-control" placeholder="gambar produk">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Deskripsi Produk</label>
                                                            <textarea name="desk" class="form-control" placeholder="deskripsi produk"><?= $p->desk_produk; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer no-bd">
                                            <button type="submit" id="addRowButton" class="btn btn-primary">Simpan</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php }
                        ?>
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 5%; text-align:center">Action</th>
                                        <th>Gambar</th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Kategori</th>
                                        <th>Deskripsi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th style="width: 5%; text-align:center">Action</th>
                                        <th>Gambar</th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Kategori</th>
                                        <th>Deskripsi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach ($produk as $p) { ?>
                                        <tr>
                                            <td>
                                                <div class="form-button-action">
                                                    <button type="button" data-toggle="modal" data-target="#editRowModal<?= $p->kd_produk; ?>" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <a href="<?= base_url('Admin/hapusproduk/' . $p->kd_produk); ?>" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td align="center"><img src="<?php echo base_url('assets/product/' . $p->gambar_produk) ?>" width="64" /></td>
                                            <td><?= $p->kd_produk; ?></td>
                                            <td><?= $p->nama_produk; ?></td>
                                            <td>Rp <?= $p->harga_produk; ?></td>
                                            <td><?= $p->stok_produk; ?></td>
                                            <td><?= $p->kategori; ?></td>
                                            <td><?= $p->desk_produk; ?></td>
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