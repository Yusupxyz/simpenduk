<div class="content-wrapper">
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h4 style="text-align:center">
                    <b style="line-height:25px">
                        TAMBAH DATA PENGGUNA <br>
                    </b>
                </h4>
                <hr>
            </div>

            <div class="box-body">
                <?php
                if ($this->session->flashdata('sukses')) {
                    ?>
                <div class="callout callout-success">
                    <p style="font-size:14px">
                        <i class="fa fa-check"></i> <?php echo $this->session->flashdata('sukses'); ?>
                    </p>
                </div>
                <?php
                }
                ?>

                <?php
                if ($this->session->flashdata('error')) {
                    ?>
                <div class="callout callout-danger">
                    <p style="font-size:14px">
                        <i class="fa fa-check"></i> <?php echo $this->session->flashdata('error'); ?>
                    </p>
                </div>
                <?php
                }
                ?>

                <form action="<?php echo base_url('pengguna/proses_tambah'); ?>" method="post">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Nama Petugas <span style="color:red;">*</span></label>
                                <input type="text" name="nama" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>NIP</label>
                                <input type="number" name="nip" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Username<span style="color:red;">*</span></label>
                                <input type="text" name="username" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Level<span style="color:red;">*</span></label>
                                <select name="level" class="form-control" required>
                                    <option value="" selected disabled>- pilih -</option>
                                    <option value="admin">Admin</option>
                                    <option value="kepaladesa">Kepala Desa</option>
                                    <option value="sekretaris">Sekretaris Desa</option>
                                    <option value="kaurpemerintahan">Kaur Pemerintahan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Password<span style="color:red;">*</span></label>
                                <input type="password" name="password" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Ulangi Password<span style="color:red;">*</span></label>
                                <input type="password" name="ulangi_password" class="form-control" required />
                            </div>
                        </div>
                    </div>


                    <center>
                        <div class="form-group">
                            <button class="btn btn-success">Simpan</button>
                            <a href="<?php echo base_url('pengguna'); ?>" class="btn btn-danger">Batal</a>
                        </div>
                    </center>
                </form>

            </div>
    </section>
</div>

<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "- pilih penduduk -",
            allowClear: true
        });
    });
</script>