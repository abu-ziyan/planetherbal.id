<section class="content">
        <div class="container-fluid">
                     <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Produk
                            </h2><br />
                            <a href="<?= base_url('back/produk2') ?>" type="button" class="btn bg-blue btn-sm waves-effect">
                                <i class="material-icons">add</i>
                                <span>Tambah Kategori Produk</span>
                            </a>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Produk</th>
                                            <th>Kategori</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Produk</th>
                                            <th>Kategori</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php $no = 1; foreach ($produk as $pro): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $pro->nm_produk ?></td>
                                            <td><?= $pro->kategori_produk ?></td>
                                            <td><img style="width: 75px; heigh: 75px;" src="<?= base_url('assets/images/produk/'.$pro->gambar_produk) ?>"></td>
                                            <td>
                                                <a href="<?= base_url('BackController/edit_pro/'.$pro->kd_produk) ?>" type="button" class="btn bg-amber btn-sm waves-effect">
                                                    <i class="material-icons">edit</i>
                                                    <span>Ubah</span>
                                                </a>
                                                <button type="button" class="btn bg-red btn-sm waves-effect" data-toggle="modal" data-target="#hapus">
													<i class="material-icons">delete</i>
													<span>Hapus</span>
												</button>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>

    <div class="modal fade" id="hapus" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header bg-red">
					<h4 class="modal-title" id="smallModalLabel">Penghapusan Data</h4>
				</div>
				<div class="modal-body">
					Yakin data <?= $katpro->nm_kategori_proikel ?> akan dihapus?
				</div>
				<div class="modal-footer">                            
					<button type="button" class="btn bg-teal btn-sm waves-effect" data-dismiss="modal">
						<i class="material-icons">clear</i>
						<span>Tidak</span>
					</button>
					<a href="<?= base_url('BackController/hapus_pro/'.$pro->kd_produk) ?>" type="button" class="btn bg-red btn-sm waves-effect">
						<i class="material-icons">delete</i>
						<span>Hapus</span>
					</a>
				</div>
			</div>
		</div>
	</div>
