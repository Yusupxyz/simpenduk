<label class="content-wrapper">
    <section class="content">
        <label class="box box-info">
            <label class="box-header">

                <label class="container-fluid">
                    <label class="row">
                        <label class="col-md-6">
                            <div class="card">
                                <h4 style="text-align:center"><b>TAMBAH DATA PENDUDUK</b></h4>
                                <hr>
                            </div>

                            <label class="box-body">

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
                                        <i class="fa fa-times"></i> <?php echo $this->session->flashdata('error'); ?>
                                    </p>
                                </div>
                                <?php
                                }
                                ?>

                                <form action="<?php echo base_url('penduduk/proses_tambah'); ?>" method="post">


                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="text" name="nik" class="form-control" required />
                                    </div>

                                    <div class="form-group">
                                        <label>No Kartu Keluarga</label>
                                        <input type="text" name="no_kk" class="form-control" required />
                                    </div>

                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control" required />
                                    </div>

                                    <div class="form-group">
                                        <label>Tempat Tanggal Lahir</label>
                                        <div class="row">
                                            <div class="col-xs-7">
                                                <input type="text" name="tempat_lahir" class="form-control"
                                                    placeholder="Tempat">
                                            </div>
                                            <div class="col-xs-5">
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="date" name="tanggal_lahir"
                                                        class="form-control pull-right" id=""
                                                        placeholder="Tanggal Lahir">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control" required>
                                            <option value="" selected disabled>- pilih -</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea name="alamat" class="form-control" rows="3" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>RT</label>
                                        <input type="text" name="rt" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <label>RW</label>
                                        <input type="text" name="rw" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Agama</label>
                                        <select class="form-control selectlive" name="agama" required>
                                            <option value="" selected disabled>- pilih -</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Katholik">Katholik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Budha">Budha</option>
                                            <option value="Konghucu">Konghucu</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Pekerjaan</label>
                                        <input type="text" name="pekerjaan" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Status Perkawinan</label>
                                        <select name="status_perkawinan" class="form-control" required>
                                            <option value="" selected disabled>- pilih -</option>
                                            <option value="Kawin">Kawin</option>
                                            <option value="Belum Kawin">Belum Kawin</option>
                                            <option value="Cerai Mati">Cerai Mati</option>
                                            <option value="Cerai Hidup">Cerai Hidup</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="<?php echo base_url('penduduk/tampil'); ?>"
                                            class="btn btn-danger">Batal</a>
                                    </div>
                                    <?= form_close(); ?>
                            </label>
                            </form>
                        </label>
                    </label>
                </label>
            </label>
        </label>
</label>
</label>
</section>
</label>