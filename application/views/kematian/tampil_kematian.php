<div class="content-wrapper">
    <section class="content">
        <div class=" box box-info">
            <div class="box-header">
                <h4 style="text-align:center; "><b>DATA KEMATIAN DESA</b></h4>
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
<?php if ($this->session->userdata('level') == 'admin') { ?>
                <p>
                    <a href="<?php echo base_url('kematian/tambah'); ?>" class="btn btn-success">Tambah Data
                        Kematian</a>
                </p>
                <?php } ?>
                <br>
                <table id="data" class="table table-bordered" width="200%" cellspacing="0">
                    <thead>
                        <tr class="active">
                            <th style="text-align:center">No</th>
                            <th style="text-align:center">Nama</th>
                            <th style="text-align:center">Umur </th>
                            <th style="text-align:center">Jenis Kelamin</th>
                            <th style="text-align:center">Alamat</th>
                            <th style="text-align:center">Tanggal Wafat</th>
                            <th style="text-align:center">Tempat Wafat</th>
                            <th style="text-align:center">Penyebab Kematian</th>
                            <th style="text-align:center">Keterangan</th>
                            <?php if ($this->session->userdata('level') == 'admin') { ?>
                                <th style="text-align:center">Aksi</th>
                            <?php } ?>
                        </tr>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($kematian as $kematian) {
                            ?>
                        <tr>
                            <td style="text-align:center"><?php echo $no; ?></td>
                            <td><?php echo $kematian->nama; ?></td>
                            <?php
                            $birthDate = new DateTime($kematian->tanggal_lahir);
                            $deathDate = new DateTime($kematian->tanggal_wafat);
                            $age = $deathDate->diff($birthDate)->y;
                            ?>
                            <td><?php echo $age; ?> Tahun</td>
                            <td><?php echo $kematian->jenis_kelamin; ?></td>
                            <td><?php echo $kematian->alamat; ?></td>
                            <td><?= date('d F Y', strtotime($kematian->tanggal_wafat)); ?></td>
                            <td><?php echo $kematian->tempat; ?></td>
                            <td><?php echo $kematian->sebab_wafat; ?></td>
                            <td><?php echo $kematian->keterangan; ?></td>
                            <?php if ($this->session->userdata('level') == 'admin') { ?>
                                <td style="text-align:center">
                                <a href="<?php echo base_url('kematian/edit/' . $kematian->id); ?>"
                                    class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Edit</a>

                                <a href="<?php echo base_url('kematian/hapus/' . $kematian->id); ?>"
                                    class="btn btn-danger btn-xs"
                                    onClick="return confirm('Yakin Akan Menghapus Data?');"><i
                                        class="fa fa-trash-o"></i> Hapus</a>
                                </td>
                            <?php } ?>
                        </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
    </section>
</div>