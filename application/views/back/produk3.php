<section class="content">
        <div class="container-fluid">
            
            <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Tambah Produk
                            </h2>
                        </div>
                        <div class="body">
                            <?php echo form_open_multipart('BackController/ubah_pro');?>                                
                                <div class="row clearfix">
								<input type="hidden" name='kd_produk' value='<?= $produk->kd_produk ?>'>
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Nama Produk</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="nm_produk" class="form-control" value='<?= $produk->nm_produk ?>' required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Kategori produk</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" name="kategori_produk">
													<option selected="selected"><?= $produk->kategori_produk ?></option>
                                                    <option value="">-- Pilih Kategori Produk --</option>
                                                    <?php foreach ($kategori_produk as $katpro): ?>
                                                        <option value="<?= $katpro->nm_kategori_produk ?>">
                                                            <?= $katpro->nm_kategori_produk ?>
                                                        </option>
                                                    <?php endforeach; ?> 
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Tampilan Gambar Produk</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div>
                                            <img style="width: 200px" src="<?= base_url('assets/images/produk/'.$produk->gambar_produk) ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Gambar Produk</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" name="gambar_produk" class="form-control" placeholder="Masukkan Gambar Produk">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Harga Produk</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="harga_produk" class="form-control" value='<?= $produk->harga_produk ?>' required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Deskripsi Produk</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                            <textarea id="ckeditor" name="deskripsi_produk"><?= $produk->deskripsi_produk ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Petunjuk Produk</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" name="petunjuk_produk"><?= $produk->petunjuk_produk ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Tanggal Produk</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="tanggal_produk" class="form-control" value='<?= $produk->tanggal_produk ?>' disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Link Tokopedia</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="link_tokped" class="form-control" value='<?= $produk->link_tokped ?>' required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Link Shopee</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="link_shopee" class="form-control" value='<?= $produk->link_shopee ?>' required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <a href="<?= base_url('back/produk1') ?>" type="button" class="btn bg-red btn-sm waves-effect">
                                            <i class="material-icons">arrow_back</i>
                                            <span>Kembali</span>
                                        </a>
                                        <button type="submit" class="btn bg-blue btn-sm waves-effect">
                                            <i class="material-icons">save</i>
                                            <span>Simpan</span>
                                        </button>
                                    </div>
                                </div>
                            <?php echo form_close();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
