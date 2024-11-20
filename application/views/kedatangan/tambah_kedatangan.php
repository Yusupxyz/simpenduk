<div class="content-wrapper">
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h4 style="text-align:center">
                    <b style="line-height:25px">
                        TAMBAH DATA KEDATANGAN <br>
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

                <form action="<?php echo base_url('kedatangan/proses_tambah'); ?>" method="post">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Nomor Induk Kependudukan</label>
                                <select name="nik" class="form-control select2" required>
                                    <option value="" selected disabled>- pilih penduduk -</option>
                                    <?php foreach ($penduduk as $p): ?>
                                        <option value="<?php echo $p->nik; ?>">
                                            <?php echo $p->nik . ' - ' . $p->nama; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>   
                            </div>
                            <div class="form-group">
                                <label>Alasan Kedatangan</label>
                                <select name="alasan_datang" class="form-control" required>
                                    <option value="" selected disabled>- pilih -</option>
                                    <option value="Pekerjaan">Pekerjaan</option>
                                    <option value="Keamanan">Keamanan</option>
                                    <option value="Kesehatan">Kesehatan</option>
                                    <option value="Perumahan">Perumahan</option>
                                    <option value="Keluarga">Keluarga</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Kedatangan</label>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="date" name="tanggal_datang" class="form-control pull-right">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Alamat Tujuan</label>
                                <textarea name="alamat_tujuan" class="form-control" rows="3" required></textarea>
                            </div>

                            <div class="form-group">
                                <label>Klasifikasi Kedatangan</label>
                                <select name="klasifikasi_datang" class="form-control" required>
                                    <option value="" selected disabled>- pilih -</option>
                                    <option value="Antar Kecamatan">Antar Kecamatan</option>
                                    <option value="Antar Kab/Kota">Antar Kab/Kota</option>
                                    <option value="Antar Provinsi">Antar Provinsi</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <center>
                        <div class="form-group">
                            <button onClick="window.history.go(-1);" class="btn btn-success">Simpan</button>
                            <a href="<?php echo base_url('kedatangan/tampil'); ?>" class="btn btn-danger">Batal</a>
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