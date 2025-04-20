<section class="content">
        <div class="container-fluid">
            
            <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Tambah Logo
                            </h2>
                        </div>
                        <div class="body">
                            <?php echo form_open_multipart('BackController/input_lg');?>                                
                                
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Gambar Logo</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" name="gambar_logo" class="form-control" placeholder="Masukkan Gambar Logo" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <a href="<?= base_url('back/headword1') ?>" type="button" class="btn bg-red btn-sm waves-effect">
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
