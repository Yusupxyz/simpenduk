<div class="content-wrapper">
    <section class="content">
        <div class="box box-info">
            <div class="box-header">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <h4 style="text-align:center"><b>TAMBAH SURAT KEMATIAN</b></h4>
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

                                <form action="<?php echo base_url('surat/surat_kematian/tambah'); ?>" method="post">

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>NIK</label><a href="<?php echo base_url(); ?>penduduk/tambah/"
                                                class="btn btn-sm btn-primary pull-right">Tambah
                                                Penduduk</a><br /><br />
                                            <select name="id_kelahiran" class="form-control" id="nik" required>
                                                <?php
                                                foreach ($kematian as $kematian) :
                                                    ?>
                                                <option value="<?php echo $kematian->id; ?>">
                                                    <?php echo $kematian->nik; ?> - <?php echo $kematian->nama; ?>
                                                </option>
                                                <?php
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>NIK Pelapor</label>
                                            <select name="pelapor" class="form-control" id="nama" required>
                                                <?php
                                                foreach ($pelapor as $pelapor) :
                                                    ?>
                                                <option value="<?php echo $pelapor->nik; ?>">
                                                    <?php echo $pelapor->nik; ?> - <?php echo $pelapor->nama; ?>
                                                </option>
                                                <?php
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>
                                        
                                    <div class="bootstrap-timepicker">
                                        
                                        <div class="form-group">
                                            <label>No. Surat</label>
                                            <input type="text" name="no_surat" class="form-control"
                                                placeholder="No. Surat" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Hubungan Sebagai</label>
                                            <input type="text" name="hubungan" class="form-control"
                                                placeholder="Hubungan Sebagai" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Tanda Tangan</label>
                                            <select name="pejabat" class="form-control" required>
                                                <?php
                                                foreach ($pejabat as $data_pejabat) :
                                                    ?>
                                                <option value="<?php echo $data_pejabat->id; ?>">
                                                    <?php echo $data_pejabat->nama_petugas; ?></option>
                                                <?php
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="tambah_surat_kematian" class="btn btn-success"
                                                value="Simpan">
                                            <a href="<?php echo base_url('surat/surat_kematian/'); ?>"
                                                class="btn btn-danger">Batal</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>