<div class="content-wrapper">
    <section class="content">
        <div class="box box-info">
            <div class="box-header">


                <h4 style="text-align:center"><b>DATA PENGUNA</b></h4>
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
                    <a href="<?php echo base_url('pengguna/tambah'); ?>" class="btn btn-success">Tambah Data
                        Pengguna</a>


                    <a href="<?php echo base_url('#'); ?>" target="_blank">
                    </a>
                </p>
                <table id="data" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr class="active">
                            <th style="text-align:center">No</th>
                            <th style="text-align:center">Nama</th>
                            <th style="text-align:center">NIP</th>
                            <th style="text-align:center">Username</th>
                            <th style="text-align:center">Jabatan</th>
                            <th style="text-align:center">Level</th>
                            <th style="text-align:center">Aksi</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
            $no = 1;
            foreach ($pengguna as $pengguna) {
              ?>
                        <tr>
                            <td style="text-align:center"><?php echo $no; ?></td>
                            <td><?php echo $pengguna->nama_petugas; ?></td>
                            <td><?php echo $pengguna->nip; ?></td>
                            <td><?php echo $pengguna->username; ?></td>
                            <td><?php echo $pengguna->jabatan; ?></td>
                            <td><?php echo $pengguna->level; ?></td>
                            <td style="text-align:center">
                                <a href="<?php echo base_url('pengguna/edit/' . $pengguna->id); ?>"
                                    class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                <a href="<?php echo base_url('pengguna/hapus/' . $pengguna->id); ?>"
                                    class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>
                            </td>
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