<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="<?= base_url('assets/admin/') ?>/img/profile.png" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php echo  $this->session->userdata("nama") ?>
									<span class="user-level"><?php echo  $this->session->userdata("level") ?></span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item active">
							<a href="<?= base_url('Admin') ?>" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Data Master</h4>
						</li>
						<!-- <li class="nav-item">
							<a href="<?= base_url('Admin/produk') ?>">
								<i class="fas fa-users"></i>
								<p>Admin</p>
							</a>
						</li> -->
						<li class="nav-item">
							<a href="<?= base_url('Admin/produk') ?>">
								<i class="fas fa-box-open"></i>
								<p>Produk</p>
								<span class="badge badge-success">
									<?= $this->db->get('tb_produk')->num_rows(); ?>
								</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('Admin/kategori') ?>">
								<i class="fas fa-list-alt"></i>
								<p>Kategori</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Transaksi</h4>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('Admin/htrans') ?>">
								<i class="fas fa-shopping-basket"></i>
								<p>Data Transaksi</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Kasir</h4>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('Admin/pembelian') ?>">
								<i class="fas fa-cart-plus"></i>
								<p>Pembelian</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('Admin/keranjang') ?>">
								<i class="fas fa-shopping-cart"></i>
								<p>Keranjang</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->