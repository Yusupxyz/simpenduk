<div class="content-wrapper">
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h4 style="text-align:center">
                    <b style="line-height:25px">
                        TAMBAH DATA KELAHIRAN <br>
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
                <form action="<?php echo base_url('kelahiran/proses_edit'); ?>" method="post">

                    <!-- kolom ke-1 -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Nama Anak</label>
                                <input type="hidden" name="id_kelahiran" value="<?php echo $kelahiran->id_kelahiran; ?>"
                                    class="form-control" />
                                <input type="text" name="nama_anak" value="<?php echo $kelahiran->nama_anak; ?>" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Nama Ayah</label>   
                                    <select name="nik_ayah" class="form-control select2" required>
                                <option value="" selected disabled>- pilih penduduk -</option>
                                <?php foreach ($penduduk as $p): ?>
                                        <option value="<?php echo $p->nik; ?>" <?php echo $p->nik == $kelahiran->nik_ayah ? 'selected' : ''; ?>>
                                            <?php echo $p->nik . ' - ' . $p->nama; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select> 
                            </div>
                            <div class="form-group">
                                <label>Nama Ibu</label>
                                    <select name="nik_ibu" class="form-control select2" required>
                                <option value="" selected disabled>- pilih penduduk -</option>
                                <?php foreach ($penduduk as $p): ?>
                                        <option value="<?php echo $p->nik; ?>" <?php echo $p->nik == $kelahiran->nik_ibu ? 'selected' : ''; ?>>
                                            <?php echo $p->nik . ' - ' . $p->nama; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select> 
                            </div>

                            <div class="form-group">
                                <label>Jenis Kelamin Anak</label>
                                <select name="kelamin_anak" class="form-control" required>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tempat Tanggal Lahir</label>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <input type="text" name="tempat_lahir_anak" value="<?php echo $kelahiran->tempat_lahir_anak; ?>" class="form-control"
                                            placeholder=".Tempat">
                                    </div>
                                    <div class="col-xs-3">
                                        <select name="hari_lahir_anak" class="form-control" required>
                                            <option value="" selected disabled>- pilih -</option>
                                            <option value="Senin" <?php echo $kelahiran->hari_lahir_anak == 'Senin' ? 'selected' : ''; ?>>Senin</option>
                                            <option value="Selasa" <?php echo $kelahiran->hari_lahir_anak == 'Selasa' ? 'selected' : ''; ?>>Selasa</option>
                                            <option value="Rabu" <?php echo $kelahiran->hari_lahir_anak == 'Rabu' ? 'selected' : ''; ?>>Rabu</option>
                                            <option value="Kamis" <?php echo $kelahiran->hari_lahir_anak == 'Kamis' ? 'selected' : ''; ?>>Kamis</option>
                                            <option value="Jumat" <?php echo $kelahiran->hari_lahir_anak == 'Jumat' ? 'selected' : ''; ?>>Jumat</option>
                                            <option value="Sabtu" <?php echo $kelahiran->hari_lahir_anak == 'Sabtu' ? 'selected' : ''; ?>>Sabtu</option>
                                            <option value="Minggu" <?php echo $kelahiran->hari_lahir_anak == 'Minggu' ? 'selected' : ''; ?>>Minggu</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="date" name="tanggal_lahir_anak" value="<?php echo $kelahiran->tanggal_lahir_anak; ?>"
                                                class="form-control pull-right">
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="time" name="jam_lahir_anak" id="pukul" value="<?php echo $kelahiran->jam_lahir_anak; ?>"
                                                class="form-control pull-right">
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                                <div class="form-group">
                                    <button class="btn btn-success">Simpan</button>
                                    <a href="<?php echo base_url('kematian/tampil'); ?>"
                                        class="btn btn-danger">Batal</a>
                                </div>
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