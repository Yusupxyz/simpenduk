<div class="content-wrapper">
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h4 style="text-align:center">
                    <b style="line-height:25px">
                        TAMBAH DATA KEMATIAN <br>
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
                <form action="<?php echo base_url('kematian/proses_edit'); ?>" method="post">

                    <!-- kolom ke-1 -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Penduduk</label>
                                <input type="hidden" name="id" value="<?php echo $kematian->id; ?>"
                                    class="form-control" />
                                    <select name="nik" class="form-control select2" required>
                                <option value="" selected disabled>- pilih penduduk -</option>
                                <?php foreach ($penduduk as $p): ?>
                                        <option value="<?php echo $p->nik; ?>" <?php echo $p->nik == $kematian->nik ? 'selected' : ''; ?>>
                                            <?php echo $p->nik . ' - ' . $p->nama; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select> 
                            </div>
                                <div class="form-group">
                                    <label>Tanggal Wafat</label>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <select name="hari_wafat" class="form-control" required>
                                                <option value="<?php echo $kematian->hari_wafat; ?>" selected>
                                                    <?php echo $kematian->hari_wafat; ?></option>
                                                <option value="Senin">Senin</option>
                                                <option value="Selasa">Selasa</option>
                                                <option value="Rabu">Rabu</option>
                                                <option value="Kamis">Kamis</option>
                                                <option value="jumat">jumat</option>
                                                <option value="Sabtu">Sabtu</option>
                                                <option value="Minggu">Minggu</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-5">
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="date" name="tanggal_wafat"
                                                    value="<?php echo $kematian->tanggal_wafat; ?>"
                                                    class="form-control pull-right" placeholder="tanggal wafat">
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="input-group time">
                                                <div class="input-group-addon">

                                                    <label for=""> Pukul</label>
                                                </div>
                                                <input type="time" name="pukul" value="<?php echo $kematian->pukul; ?>"
                                                    class="form-control" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                        <label>Tempat Wafat</label>
                                        <input type="text" name="tempat" value="<?php echo $kematian->tempat; ?>" class="form-control" required />
                                    </div>
                                <div class="form-group">
                                        <label>Penyebab Kematian</label>
                                        <input type="text" name="sebab_wafat" value="<?php echo $kematian->sebab_wafat; ?>" class="form-control" required />
                                    </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea name="keterangan" class="form-control" value="<?php echo $kematian->keterangan; ?>" rows="3"></textarea>
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