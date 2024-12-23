<div class="content-wrapper">
    <section class="content">
        <div class="box box-info">
            <div class="box-header">


                <h4 style="text-align:center"><b>DATA PENDUDUK DESA</b></h4>
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
                    <?php if ($this->session->userdata('level') == 'admin') { ?>
                        <a href="<?php echo base_url('penduduk/tambah'); ?>" class="btn btn-success">Tambah Data Penduduk</a>
                    <?php } ?>


                    <a href="<?php echo base_url('#'); ?>" target="_blank">
                    </a>
                </p>
                <table id="data" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr class="active">
                            <th style="text-align:center">No</th>
                            <th style="text-align:center">NIK</th>
                            <th style="text-align:center">Nama</th>
                            <th style="text-align:center">Tanggal Lahir</th>
                            <th style="text-align:center">Jenis Kelamin</th>
                            <th style="text-align:center">Alamat</th>
                            <th style="text-align:center">Pekerjaan</th>
                            <th style="text-align:center">Aksi</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
            $no = 1;
            foreach ($penduduk as $penduduk) {
              ?>
                        <tr>
                            <td style="text-align:center"><?php echo $no; ?></td>
                            <td><?php echo $penduduk->nik; ?></td>
                            <td><?php echo $penduduk->nama; ?></td>
                            <td><?php echo date_indo($penduduk->tanggal_lahir); ?></td>
                            <td><?php echo $penduduk->jenis_kelamin; ?></td>
                            <td><?php echo $penduduk->alamat; ?></td>
                            <td><?php echo $penduduk->pekerjaan; ?></td>
                            <td style="text-align:center">
                                <?php if ($this->session->userdata('level') == 'admin') { ?>
                                    <a href="<?php echo base_url('penduduk/edit/' . $penduduk->nik); ?>"
                                        class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="<?php echo base_url('penduduk/hapus/' . $penduduk->nik); ?>"
                                        class="btn btn-danger btn-xs"
                                        onClick="return confirm('Yakin Akan Menghapus Data?');"><i
                                            class="fa fa-trash-o"></i> Hapus</a>
                                <?php } ?>
                                <a href="<?php echo base_url('penduduk/detail/' . $penduduk->nik); ?>"
                                    class="btn btn-info btn-xs"><i class="fa fa-info-circle"></i> Detail</a>
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