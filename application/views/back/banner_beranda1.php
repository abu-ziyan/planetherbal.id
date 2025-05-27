<section class="content">
		<?= form_open('BackController/input_bh'); ?>
            <?php if($this->session->flashdata('pesan') !== null): ?>
                <div class="alert bg-teal alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?= $this->session->flashdata('pesan') ?>
                </div>
            <?php endif;?>
        <div class="container-fluid">
                     <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Banner Beranda
                            </h2><br />
                            <a href="<?= base_url('back/banner_beranda2') ?>" type="button" class="btn bg-blue btn-sm waves-effect">
                                <i class="material-icons">add</i>
                                <span>Tambah Banner</span>
                            </a>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
									<?php $no = 1; foreach ($banner_beranda as $bh): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><img style="width: 75px; heigh: 75px;" src="<?= base_url('assets/images/banner/'.$bh->gambar_banner_beranda) ?>"></td>
                                            <td>
                                                <a href="<?= base_url('BackController/edit_bh/'.$bh->kd_banner_beranda) ?>" type="button" class="btn bg-amber btn-sm waves-effect">
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
					Yakin data <?= $bh->kd_banner_beranda?> akan dihapus?
				</div>
				<div class="modal-footer">                            
					<button type="button" class="btn bg-teal btn-sm waves-effect" data-dismiss="modal">
						<i class="material-icons">clear</i>
						<span>Tidak</span>
					</button>
					<a href="<?= base_url('BackController/hapus_bh/'.$bh->kd_banner_beranda) ?>" type="button" class="btn bg-red btn-sm waves-effect">
						<i class="material-icons">delete</i>
						<span>Hapus</span>
					</a>
				</div>
			</div>
		</div>
	</div>
