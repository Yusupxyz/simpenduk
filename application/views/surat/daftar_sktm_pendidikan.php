<div class="content-wrapper">
    <section class="content">
        <div class="box box-info">
            <div class="box-header">


                <h4 style="text-align:center"><b>DATA SURAT KETERANGAN TIDAK MAMPU PENDIDIKAN</b></h4>
                <hr>
            </div>

            <div class="box-body table-responsive">

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
                <p>
                    <a href="<?php echo base_url('surat/sktm_pendidikan/tambah'); ?>" class="btn btn-success">Tambah
                        Surat Keterangan Tidak Mampu</a>
                </p>
                <table id="data" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr class="active">
                            <th style="text-align:center">No</th>
                            <th style="text-align:center">No. Surat</th>
                            <th style="text-align:center">NIK Ayah</th>
                            <th style="text-align:center">Nama Ayah</th>
                            <th style="text-align:center">NIK Anak</th>
                            <th style="text-align:center">Nama Anak</th>
                            <th style="text-align:center">Tanda Tangan</th>
                            <th style="text-align:center">Aksi</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($surat as $surat) {
                            $anak = $this->db->query("SELECT * FROM penduduk WHERE nik='$surat->nik_anak'")->row();
                            ?>
                        <tr>
                            <td style="text-align:center"><?php echo $no; ?></td>
                            <td><?php echo $surat->no_surat; ?></td>
                            <td><?php echo $surat->nik; ?></td>
                            <td><?php echo $surat->nama; ?></td>
                            <td><?php echo $anak->nik; ?></td>
                            <td><?php echo $anak->nama; ?></td>
                            <td><?php echo $surat->nama_petugas; ?></td>
                            <td style="text-align:center">
                                <a href="<?php echo base_url('surat/sktm_pendidikan/edit/' . $surat->id_sktm_pendidikan); ?>"
                                    class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                <a href="<?php echo base_url('surat/sktm_pendidikan/hapus/' . $surat->id_sktm_pendidikan); ?>"
                                    class="btn btn-danger btn-xs"
                                    onClick="return confirm('Yakin Akan Menghapus Data?');"><i
                                        class="fa fa-trash-o"></i> Hapus</a>
                                <a target="blank"
                                    href="<?php echo base_url('surat/sktm_pendidikan/cetak/' . $surat->id_sktm_pendidikan); ?>"
                                    class="btn btn-info btn-xs"><i class="fa fa-print"></i> Cetak</a>
                        </tr>
                        </td>
                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
    </section>
</div>