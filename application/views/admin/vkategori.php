<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Kategori</h4>
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
                        <a href="#">Kategori</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Tabel Kategori</h4>
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
                                        <form action="<?= base_url('Admin/tambahkategori') ?>" method="post">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Nama Kategori</label>
                                                        <input name="nama" type="text" class="form-control" placeholder="nama kategori">
                                                    </div>
                                                </div>
                                                <?= form_error('nama', '<p class="text-danger', '</p>'); ?>
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
                        <?php foreach ($kategori as $k) { ?>
                            <div class="modal fade" id="editRowModal<?= $k->id_kategori; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h5 class="modal-title">
                                                <span class="fw-bold">Edit Data <?= $k->id_kategori; ?></span>
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
                                            <form action="<?= base_url('Admin/editkategori') ?>" method="post">
                                                <input name="id" type="text" class="form-control " value="<?= $k->id_kategori; ?>" hidden>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Nama Kategori</label>
                                                            <input name="nama" type="text" class="form-control" placeholder="nama produk" value="<?= $k->kategori; ?>">
                                                        </div>
                                                    </div>
                                                    <?= form_error('nama', '<p class="text-danger', '</p>'); ?>
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
                                        <th>No</th>
                                        <th>Nama Kategori</th>
                                        <th>Produk by Kategori</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th style="width: 5%; text-align:center">Action</th>
                                        <th>No</th>
                                        <th>Nama Kategori</th>
                                        <th>Produk by Kategori</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $no=1; foreach ($kategori as $k) { ?>
                                        <tr>
                                            <td>
                                                <div class="form-button-action">
                                                    <button type="button" data-toggle="modal" data-target="#editRowModal<?= $k->id_kategori;; ?>" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <a href="<?= base_url('Admin/hapuskategori/' . $k->id_kategori); ?>" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td><?= $no++; ?></td>
                                            <td><?= $k->kategori;; ?></td>
                                            <td><a href="<?= base_url('Admin/prokat/' . $k->id_kategori); ?>" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-secondary" data-original-title="Lihat">
                                                    <i class="fa fa-eye"></i>
                                                </a>
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