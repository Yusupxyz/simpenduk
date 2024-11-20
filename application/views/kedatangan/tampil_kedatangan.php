<div class="content-wrapper">
    <section class="content">
        <div class="box box-info">
            <div class="box-header">


                <h4 style="text-align:center"><b>DATA KEDATANGAN DESA</b></h4>
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
                    <a href="<?php echo base_url('kedatangan/tambah'); ?>" class="btn btn-success">Tambah Data Kedatangan</a>
                    <a href="<?php echo base_url('#'); ?>" target="_blank">
                    </a>
                </p>
                <table id="data" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr class="active">
                            <th style="text-align:center">No</th>
                            <th style="text-align:center">Nomor Induk Kependudukan</th>
                            <th style="text-align:center">Nama Lengkap</th>
                            <th style="text-align:center">Alamat</th>
                            <th style="text-align:center">Tanggal Kedatangan</th>
                            <th style="text-align:center">Alasan</th>
                            <th style="text-align:center">Alamat Tujuan</th>
                            <th style="text-align:center">Klasifikasi Kedatangan</th>
                            <th style="text-align:center">Aksi</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($kedatangan as $kedatangan) {
                            ?>
                        <tr>
                            <td style="text-align:center"><?php echo $no; ?></td>
                            <td><?php echo $kedatangan->nik; ?></td>
                            <td><?php echo $kedatangan->nama; ?></td>
                            <td><?php echo $kedatangan->alamat; ?></td>
                            <td><?php echo date_indo($kedatangan->tanggal_datang); ?></td>
                            <td><?php echo $kedatangan->alasan_datang; ?></td>
                            <td><?php echo $kedatangan->alamat_tujuan; ?></td>
                            <td><?php echo $kedatangan->klasifikasi_datang; ?></td>
                            <td style="text-align:center">
                                <a href="<?php echo base_url('kedatangan/edit/' . $kedatangan->id); ?>"
                                    class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                <a href="<?php echo base_url('kedatangan/hapus/' . $kedatangan->id); ?>"
                                    class="btn btn-danger btn-xs"
                                    onClick="return confirm('Yakin Akan Menghapus Data?');"><i
                                        class="fa fa-trash-o"></i> Hapus</a>
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