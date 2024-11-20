<div class="content-wrapper">
    <section class="content">
        <div class=" box box-info">
            <div class="box-header">
                <h4 style="text-align:center; "><b>DATA KELAHIRAN DESA</b></h4>
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
                    <a href="<?php echo base_url('kelahiran/tambah'); ?>" class="btn btn-success">Tambah Data
                        Kelahiran</a>
                </p>
                <br>
                <table id="data" class="table table-bordered" width="200%" cellspacing="0">
                    <thead>
                        <tr class="active">
                            <th style="text-align:center">No</th>
                            <th style="text-align:center">Nama Anak</th>
                            <th style="text-align:center">Nama Ayah</th>
                            <th style="text-align:center">Nama Ibu</th>
                            <th style="text-align:center">Jenis Kelamin</th>
                            <th style="text-align:center">Tanggal Lahir</th>
                            <th style="text-align:center">Tempat Lahir</th>
                            <th style="text-align:center">Aksi</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($kelahiran as $kelahiran) {
                            ?>
                        <tr>
                            <td style="text-align:center"><?php echo $no; ?></td>
                            <td><?php echo $kelahiran->nama_anak; ?></td>
                            <td><?php echo $kelahiran->nama_ayah; ?></td>
                            <td><?php echo $kelahiran->nama_ibu; ?></td>
                            <td><?php echo $kelahiran->kelamin_anak; ?></td>
                            <td><?php echo $kelahiran->hari_lahir_anak; ?>, <?php echo $kelahiran->tanggal_lahir_anak; ?> -
                                <?php echo $kelahiran->jam_lahir_anak; ?></td>
                            <td><?php echo $kelahiran->tempat_lahir_anak; ?></td>
                            <td style="text-align:center">
                                <a href="<?php echo base_url('kelahiran/edit/' . $kelahiran->id_kelahiran); ?>"
                                    class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Edit</a>

                                <a href="<?php echo base_url('kelahiran/hapus/' . $kelahiran->id_kelahiran); ?>"
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