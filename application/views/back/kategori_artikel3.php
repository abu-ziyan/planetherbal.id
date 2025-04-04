<section class="content">
        <div class="container-fluid">
            
            <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Ubah Kategori Artikel
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="<?= base_url('BackController/ubah_katart') ?>" method="post">
                                <div class="row clearfix">
                                <input type="hidden" name='kd_kategori_artikel' value='<?= $kategori_artikel->kd_kategori_artikel ?>'>
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Kode Kategori Artikel</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="kd_kategori_artikel" class="form-control" value="<?= $kategori_artikel->kd_kategori_artikel ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Nama Kategori Artikel</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="nm_kategori_artikel" class="form-control" value="<?= $kategori_artikel->nm_kategori_artikel ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Tampilan Gambar Kategori Artikel</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                            <img style="width: 75px;" src="<?= base_url($kategori_artikel->gambar_kategori_artikel) ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Gambar Kategori Produk</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" name="gambar_kategori_produk" accept="image/*" class="form-control" placeholder="Masukkan Gambar Kategori Produk" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <a href="<?= base_url('back/kategori_artikel1') ?>" type="button" class="btn bg-red btn-sm waves-effect">
                                            <i class="material-icons">arrow_back</i>
                                            <span>Kembali</span>
                                        </a>
                                        <button type="submit" class="btn bg-blue btn-sm waves-effect">
                                            <i class="material-icons">save</i>
                                            <span>Simpan</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
